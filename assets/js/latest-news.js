/**
 * Latest News — Swiper slider; each slide is one news card (news-card template part).
 * Smooth entrance animation when section enters view.
 */

(function () {
	'use strict';

	function initEntranceAnimation() {
		if (typeof gsap === 'undefined') return;
		var section = document.querySelector('.latest-news');
		if (!section) return;

		var header = section.querySelector('.latest-news__header');
		var sliderWrap = section.querySelector('.latest-news__slider-wrap');
		var elements = [header, sliderWrap].filter(Boolean);
		if (elements.length === 0) return;

		var ease = 'power3.out';
		var yStart = 28;
		var duration = 0.7;
		var stagger = 0.12;

		gsap.set(elements, { opacity: 0, y: yStart });
		var hasAnimated = false;
		var observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (!entry.isIntersecting || hasAnimated) return;
					hasAnimated = true;
					observer.unobserve(entry.target);
					gsap.to(elements, {
						opacity: 1,
						y: 0,
						duration: duration,
						ease: ease,
						stagger: stagger,
						overwrite: true
					});
				});
			},
			{ rootMargin: '0px', threshold: 0.15 }
		);
		observer.observe(section);
	}

	function init() {
		var section = document.querySelector('.latest-news');
		if (!section) return;

		initEntranceAnimation();

		if (typeof Swiper === 'undefined') return;

		var swiperEl = section.querySelector('.latest-news-swiper');
		var prevEl = section.querySelector('.latest-news__nav--prev');
		var nextEl = section.querySelector('.latest-news__nav--next');
		if (!swiperEl) return;

		new Swiper('.latest-news-swiper', {
			slidesPerView: 1,
			spaceBetween: 24,
			loop: false,
			speed: 500,
			navigation: {
				nextEl: nextEl,
				prevEl: prevEl,
			},
			breakpoints: {
				640: {
					slidesPerView: 2,
					spaceBetween: 24,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 28,
				},
			},
			on: {
				init: function (swiper) {
					updateNavDisabled(swiper);
				},
				slideChange: function (swiper) {
					updateNavDisabled(swiper);
				},
			},
		});

		function updateNavDisabled(swiper) {
			if (prevEl) prevEl.disabled = swiper.isBeginning;
			if (nextEl) nextEl.disabled = swiper.isEnd;
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
