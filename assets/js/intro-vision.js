/**
 * Intro Vision — scroll-driven pinned section (Element8 / DTA style)
 * 1. When section is reached, section gets sticky
 * 2. Only intro_video_mask zooms and disappears (follows scroll)
 * 3. intro_video_content enters — tied to scroll
 */
(function () {
	'use strict';

	function init() {
		var section = document.querySelector('.intro-vision');
		var container = section ? section.querySelector('.intro_video_container') : null;
		var mask = section ? section.querySelector('.intro_video_mask') : null;
		var content = section ? section.querySelector('.intro_video_content') : null;
		var video = section ? section.querySelector('.intro_video_container video') : null;

		if (!section || !container || !mask || !content) return;

		// Below 1060px: simple non-sticky layout, text visible by default (no ScrollTrigger)
		if (window.innerWidth <= 1060) {
			if (content) {
				content.style.visibility = '';
				content.style.top = '';
				content.style.transform = '';
			}
			return;
		}

		if (typeof gsap === 'undefined') return;

		if (typeof gsap.registerPlugin === 'function') {
			gsap.registerPlugin(gsap.ScrollTrigger || window.ScrollTrigger);
		}
		var ScrollTrigger = window.ScrollTrigger || gsap.ScrollTrigger;
		if (!ScrollTrigger) return;

		if (video) {
			video.play().catch(function () {});
		}

		// Keep intro-vision behind projects-slider (z-index 10) until its top reaches viewport top — no blank space
		function setSectionStacking() {
			var rect = section.getBoundingClientRect();
			section.style.zIndex = rect.top <= 0 ? '11' : '0';
		}
		setSectionStacking();
		ScrollTrigger.create({
			trigger: section,
			start: 'top top',
			onEnter: function () { section.style.zIndex = '11'; },
			onLeaveBack: function () { section.style.zIndex = '0'; }
		});
		window.addEventListener('scroll', setSectionStacking, { passive: true });
		window.addEventListener('resize', setSectionStacking);

		// When only intro_video_mask is visible: video (container) is zoomed in
		gsap.set(container, { scale: 1.2, transformOrigin: 'center center' });
		// Hide intro_video_content until last (no portion on first screen)
		gsap.set(content, { visibility: 'hidden', top: '150%', transform: 'translateY(-50%)' });

		// Pin only when intro-vision top hits viewport top (projects-slider fully scrolled away first)
		var tl = gsap.timeline({
			scrollTrigger: {
				trigger: section,
				start: 'top top',
				end: '+=100%',
				pin: true,
				scrub: 0.5,
				anticipatePin: 0,
				invalidateOnRefresh: true
			},
			defaults: { ease: 'none' }
		});

		setTimeout(function () { ScrollTrigger.refresh(); }, 200);

		// Only intro_video_mask zooms and disappears — follows scroll
		tl.to(mask, {
			scale: 2.5,
			opacity: 0,
			duration: 1,
			ease: 'none',
			transformOrigin: 'center center'
		}, 0);

		// When intro_video_mask zooms: video (container) zooms to normal at the same time
		tl.to(container, {
			scale: 1,
			duration: 1,
			ease: 'none',
			transformOrigin: 'center center'
		}, 0);

		// intro_video_content visible at last — after video full show and intro_video_mask completely gone
		tl.set(content, { visibility: 'visible' }, 1);
		tl.to(content, {
			top: '50%',
			transform: 'translateY(-50%)',
			duration: 0.35,
			ease: 'none'
		}, 1);
	}

	function onLoad() {
		if (window.ScrollTrigger) window.ScrollTrigger.refresh();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			setTimeout(init, 100);
		});
	} else {
		setTimeout(init, 100);
	}
	window.addEventListener('load', function () {
		if (typeof window.ScrollTrigger !== 'undefined') {
			setTimeout(onLoad, 100);
		}
	});
})();
