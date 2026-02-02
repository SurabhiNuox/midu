// nice select
jQuery(document).ready(function () {
	jQuery("select").niceSelect();
});


// News card list / Related news – Swiper (relatedSwiper)
jQuery(document).ready(function () {
	if (jQuery(".relatedSwiper").length) {
		new Swiper(".relatedSwiper", {
			spaceBetween: 35,
			loop: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false,
			},
			speed: 600,
			navigation: {
				nextEl: ".news_listing-cards .approch_next, .related_news_listing .approch_next",
				prevEl: ".news_listing-cards .approch_prev, .related_news_listing .approch_prev",
			},
			pagination: {
				el: ".relatedSwiper .swiper-pagination",
				clickable: true,
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
					spaceBetween: 20,
				},
				600: {
					slidesPerView: 2,
					spaceBetween: 25,
				},
				1024: {
					slidesPerView: 3,
					spaceBetween: 35,
				},
			},
		});
	}
});