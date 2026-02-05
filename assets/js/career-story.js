/**
 * Career Story – Employee Stories testimonial swiper
 * Stacked vertical cards:
 * - Active slide on front (no rotation, scale 1)
 * - Previous slide offset -10px
 * - Older slides -20px, -30px, etc (via cardsEffect perSlideOffset)
 */
(function () {
	'use strict';

	function init() {
		var section = document.querySelector('.career_story_section');
		if (!section) return;
		if (typeof Swiper === 'undefined') return;

		var swiperEl = section.querySelector('.career_story_swiper');
		var paginationEl = section.querySelector('.career_story_pagination');
		if (!swiperEl || !paginationEl) return;

		new Swiper(swiperEl, {
			direction: 'vertical',
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			speed: 500,
			effect: 'cards',
			cardsEffect: {
				perSlideOffset: 12,
				perSlideRotate: 0,
				rotate: false,
				slideShadows: false,
			},
			grabCursor: true,
			allowTouchMove: true,
			pagination: {
				el: paginationEl,
				clickable: true,
			},
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();

