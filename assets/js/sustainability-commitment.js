/**
 * Sustainability Commitment — sticky scroll section
 * Vertical clip-path wipe (like codepen.io/gridmorphic/pen/WbQPRwv):
 * Current image clips from bottom, next reveals from top — 1:1 with scroll, no transition.
 */

(function () {
	'use strict';

	function getScrollTop() {
		if (window.lenis && typeof window.lenis.scroll === 'number') {
			return window.lenis.scroll;
		}
		return window.pageYOffset !== undefined
			? window.pageYOffset
			: document.documentElement.scrollTop;
	}

	// Vertical wipe: current clips from bottom (inset 0 0 X% 0), next reveals from top (inset Y% 0 0 0)
	// X = 100 * subProgress (current slides up), Y = 100 * (1 - subProgress) (next slides down)
	function setVerticalWipe(slides, index, subProgress) {
		var total = slides.length;
		if (total === 0) return;
		index = Math.max(0, Math.min(index, total - 1));
		slides.forEach(function (slide, i) {
			var clip;
			var z = 0;
			if (i === index) {
				// Current: clip from bottom — slides up and out
				clip = 'inset(0 0 ' + (100 * subProgress) + '% 0)';
				z = 2;
			} else if (i === index + 1) {
				// Next: reveal from top — slides down into view
				clip = 'inset(' + (100 * (1 - subProgress)) + '% 0 0 0)';
				z = 1;
			} else if (i < index) {
				clip = 'inset(0 0 100% 0)';
				z = 0;
			} else {
				clip = 'inset(100% 0 0 0)';
				z = 0;
			}
			slide.style.clipPath = clip;
			slide.style.webkitClipPath = clip;
			slide.style.zIndex = z;
			slide.classList.toggle('is-active', i === index);
		});
	}

	function updateSlider() {
		var section = document.querySelector('.sustainability-commitment-section');
		if (!section) return;

		var sticky = section.querySelector('.sustainability-commitment-section__sticky');
		var bgSlides = section.querySelectorAll('.sustainability-commitment__bg-slide');
		var cardBlocks = section.querySelectorAll('.sustainability-commitment__card-block');
		if (!sticky || bgSlides.length === 0) return;

		var totalSlides = bgSlides.length;
		var scrollY = getScrollTop();
		var rect = section.getBoundingClientRect();
		var sectionTop = scrollY + rect.top;
		var sectionHeight = section.offsetHeight;
		var scrollInto = scrollY - sectionTop;
		var progress = Math.max(0, Math.min(1, scrollInto / sectionHeight));
		var index = Math.min(totalSlides - 1, Math.max(0, Math.floor(progress * totalSlides)));
		var subProgress = progress * totalSlides - index;
		var shouldPin = rect.top <= 0 && rect.bottom > 0;

		if (rect.top > 0) {
			sticky.classList.remove('is-pinned');
			setVerticalWipe(bgSlides, 0, 0);
			setVerticalWipe(cardBlocks, 0, 0);
			return;
		}

		if (rect.bottom <= 0 || scrollInto >= sectionHeight) {
			sticky.classList.remove('is-pinned');
			setVerticalWipe(bgSlides, totalSlides - 1, 1);
			setVerticalWipe(cardBlocks, totalSlides - 1, 1);
			return;
		}

		if (shouldPin) sticky.classList.add('is-pinned');
		else sticky.classList.remove('is-pinned');
		setVerticalWipe(bgSlides, index, subProgress);
		setVerticalWipe(cardBlocks, index, subProgress);
	}

	function init() {
		var section = document.querySelector('.sustainability-commitment-section');
		if (!section) return;

		var bgSlides = section.querySelectorAll('.sustainability-commitment__bg-slide');
		var cardBlocks = section.querySelectorAll('.sustainability-commitment__card-block');
		if (bgSlides.length === 0) return;

		setVerticalWipe(bgSlides, 0, 0);
		setVerticalWipe(cardBlocks, 0, 0);
		updateSlider();

		(function rafUpdate() {
			updateSlider();
			requestAnimationFrame(rafUpdate);
		})();
		if (window.lenis && typeof window.lenis.on === 'function') {
			window.lenis.on('scroll', updateSlider);
		}
		window.addEventListener('scroll', updateSlider, { passive: true });
		window.addEventListener('resize', updateSlider);
		window.addEventListener('load', function () { updateSlider(); });
		setTimeout(updateSlider, 200);
		setTimeout(updateSlider, 800);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () { setTimeout(init, 150); });
	} else {
		setTimeout(init, 150);
	}
})();
