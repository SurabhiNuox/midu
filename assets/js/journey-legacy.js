/**
 * Our Journey & Legacy — Swiper slider with timeline year tabs
 * Prev/next buttons and year tabs control the Swiper; slideChange syncs active year.
 */

(function () {
	'use strict';

	function init() {
		var section = document.querySelector('.journey-legacy');
		if (!section) return;

		if (typeof Swiper === 'undefined') return;

		var prevBtn = section.querySelector('.journey-legacy__nav-btn--prev');
		var nextBtn = section.querySelector('.journey-legacy__nav-btn--next');
		var yearBtns = section.querySelectorAll('.journey-legacy__year');
		var swiperEl = section.querySelector('.journey-legacy-swiper');
		if (!swiperEl || !yearBtns.length) return;

		var swiper = new Swiper('.journey-legacy-swiper', {
			slidesPerView: 1,
			spaceBetween: 24,
			loop: false,
			speed: 600,
			effect: 'slide',
			allowTouchMove: true,
			navigation: {
				nextEl: nextBtn,
				prevEl: prevBtn,
			},
			breakpoints: {
				1300: {
					slidesPerView: 1.2,
					spaceBetween: 50
				},
				1060: {
					slidesPerView: 1,
					spaceBetween: 32
				},
				767: {
					slidesPerView: 1,
					spaceBetween: 24
				}
			},
			on: {
				init: function () {
					updateYearActive(this.activeIndex);
					updateNavDisabled(this);
				},
				slideChange: function () {
					updateYearActive(this.activeIndex);
					updateNavDisabled(this);
				},
			},
		});

		function updateYearActive(index) {
			yearBtns.forEach(function (btn, i) {
				var isActive = i === index;
				btn.classList.toggle('is-active', isActive);
				btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
			});
		}

		function updateNavDisabled(instance) {
			if (prevBtn) prevBtn.disabled = instance.isBeginning;
			if (nextBtn) nextBtn.disabled = instance.isEnd;
		}

		yearBtns.forEach(function (btn, i) {
			btn.addEventListener('click', function () {
				if (swiper && i !== swiper.activeIndex) {
					swiper.slideTo(i);
				}
			});
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
