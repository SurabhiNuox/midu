/**
 * Featured Projects — Swiper slider; each slide is one project card.
 * Navigation: prev/next buttons; 3 slides per view on desktop.
 */

(function () {
	'use strict';

	function init() {
		var section = document.querySelector('.featured-projects-section');
		if (!section) return;

		if (typeof Swiper === 'undefined') return;

		var swiperEl = section.querySelector('.featured-projects-swiper');
		var prevEl = section.querySelector('.featured-projects-section__nav--prev');
		var nextEl = section.querySelector('.featured-projects-section__nav--next');
		if (!swiperEl) return;

		var swiper = new Swiper(swiperEl, {
			slidesPerView: 1,
			spaceBetween: 20,
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
