/**
 * Latest News — Swiper slider; each slide is one news card (news-card template part).
 */

(function () {
	'use strict';

	function init() {
		var section = document.querySelector('.latest-news');
		if (!section) return;

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
