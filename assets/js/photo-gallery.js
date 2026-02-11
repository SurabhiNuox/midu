/**
 * Photo Gallery — Swiper slider; each slide is one image.
 * Navigation: prev/next circular buttons; 3 slides per view on desktop.
 */

(function () {
	'use strict';

	function init() {
		var section = document.querySelector('.photo-gallery-section');
		if (!section) return;

		if (typeof Swiper === 'undefined') return;

		var swiperEl = section.querySelector('.photo-gallery-swiper');
		var prevEl = section.querySelector('.photo-gallery-section__nav--prev');
		var nextEl = section.querySelector('.photo-gallery-section__nav--next');
		if (!swiperEl) return;

		var swiper = new Swiper(swiperEl, {
			spaceBetween: 16,
			loop: false,
			speed: 500,
			navigation: {
				nextEl: nextEl,
				prevEl: prevEl,
			},
			breakpoints: {
				0: {
					slidesPerView: 1.5,
					spaceBetween: 16,
				},
				640: {
					slidesPerView: 2,
					spaceBetween: 20,
				},
				1024: {
					slidesPerView: 2.9,
					spaceBetween: 32,
				},
			},
			on: {
				init: function (s) {
					updateNavDisabled(s);
				},
				slideChange: function (s) {
					updateNavDisabled(s);
				},
			},
		});

		function updateNavDisabled(s) {
			if (prevEl) prevEl.disabled = s.isBeginning;
			if (nextEl) nextEl.disabled = s.isEnd;
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
