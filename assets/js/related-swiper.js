/**
 * Related News / Related Events – Swiper (.relatedSwiper)
 * News-details and event-details have no nav/pagination markup – only add when elements exist.
 */
(function () {
	function init() {
		if (typeof Swiper === "undefined") return;
		var containers = document.querySelectorAll(".relatedSwiper");
		if (!containers.length) return;
		containers.forEach(function (el) {
			if (el.swiper) return;
			var slides = el.querySelectorAll(".swiper-slide");
			var slideCount = slides.length;
			var useLoop = slideCount >= 4;
			var section = el.closest(".related_news_listing");
			var nextBtn = section ? section.querySelector(".approch_next") : null;
			var prevBtn = section ? section.querySelector(".approch_prev") : null;
			if (!nextBtn) nextBtn = document.querySelector(".news_listing-cards .approch_next, .related_news_listing .approch_next");
			if (!prevBtn) prevBtn = document.querySelector(".news_listing-cards .approch_prev, .related_news_listing .approch_prev");
			var pagEl = el.querySelector(".swiper-pagination");
			var opts = {
				spaceBetween: 35,
				loop: useLoop,
				speed: 600,
				autoplay: slideCount > 1 ? { delay: 4000, disableOnInteraction: false } : false,
				breakpoints: {
					0: { slidesPerView: 1, spaceBetween: 20 },
					600: { slidesPerView: 2, spaceBetween: 25 },
					1024: { slidesPerView: 3, spaceBetween: 35 },
				},
			};
			if (nextBtn && prevBtn) opts.navigation = { nextEl: nextBtn, prevEl: prevBtn };
			if (pagEl) opts.pagination = { el: pagEl, clickable: true };
			try {
				new Swiper(el, opts);
			} catch (err) {
				console.warn("relatedSwiper init:", err);
			}
		});
	}
	if (typeof jQuery !== "undefined") {
		jQuery(document).ready(init);
		jQuery(window).on("load", init);
	} else {
		document.addEventListener("DOMContentLoaded", init);
		window.addEventListener("load", init);
	}
})();
