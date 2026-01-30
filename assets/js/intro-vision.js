/**
 * Intro Vision 2030 — AlUla Peregrina–style full-page loader
 * 1. Video plays ONLY inside mask (full viewport, dark elsewhere)
 * 2. Mask zooms larger and disappears
 * 3. Text appears from bottom, full-width video visible
 * 4. Unlock scroll, section becomes part of page
 */
(function () {
	'use strict';

	function init() {
		var section = document.getElementById('intro-vision');
		var maskPhase = document.getElementById('intro-mask-phase');
		var maskBg = section ? section.querySelector('.intro-vision__mask-bg') : null;
		var content = document.getElementById('intro-vision-content');
		var fullVideo = section ? section.querySelector('.intro-vision__full-video') : null;
		var maskWrap = section ? section.querySelector('.intro-vision__mask-wrap') : null;

		if (!section || !maskPhase || !content || !fullVideo || !maskWrap || !maskBg) return;

		// Loader mode: section fixed, lock body scroll
		section.classList.add('intro-vision--active');
		document.body.classList.add('has-intro-active');

		if (typeof gsap === 'undefined') {
			content.style.opacity = '1';
			content.style.visibility = 'visible';
			content.style.transform = 'none';
			fullVideo.style.opacity = '1';
			fullVideo.style.visibility = 'visible';
			maskPhase.style.display = 'none';
			section.classList.remove('intro-vision--active');
			section.classList.add('intro-vision--complete');
			document.body.classList.remove('has-intro-active');
			return;
		}

		// Start full-width video (hidden until mask phase ends)
		var fullVideoEl = fullVideo.querySelector('video');
		if (fullVideoEl) {
			fullVideoEl.play().catch(function () {});
		}

		var tl = gsap.timeline({
			defaults: { ease: 'power2.inOut' },
			onComplete: function () {
				section.classList.remove('intro-vision--active');
				section.classList.add('intro-vision--complete');
				document.body.classList.remove('has-intro-active');
			}
		});

		// 1) First: show mask-bg (hold ~3s)
		tl.to({}, { duration: 3 });

		// 2) Then: intro-vision__mask-bg zooms larger and disappears
		tl.to(maskBg, {
			scale: 4,
			opacity: 0,
			duration: 1.4,
			ease: 'power2.in',
			overwrite: true,
			transformOrigin: 'center center'
		}, 0);
		tl.to(maskPhase, {
			opacity: 0,
			duration: 1,
			ease: 'power2.in'
		}, 0.5);

		// After mask is gone: hide mask phase, show full-width video and text
		tl.set(maskPhase, { visibility: 'hidden', pointerEvents: 'none' }, 1.4);
		tl.set(maskBg, { scale: 1, opacity: 1 }, 1.4); // reset for any reuse
		tl.set(fullVideo, { visibility: 'visible' }, 1.4);
		tl.to(fullVideo, {
			opacity: 1,
			duration: 0.6
		}, 1.4);

		// Text from bottom
		tl.to(content, {
			opacity: 1,
			visibility: 'visible',
			transform: 'translateY(0)',
			duration: 0.8,
			ease: 'power2.out'
		}, 1.6);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			setTimeout(init, 100);
		});
	} else {
		setTimeout(init, 100);
	}
})();
