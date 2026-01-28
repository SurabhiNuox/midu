/**
 * Main Banner Swiper Initialization
 * Handles the Swiper slider for the main banner section
 */

document.addEventListener('DOMContentLoaded', function() {
	const bannerSwiper = document.querySelector('.main-banner-swiper');
	
	if (!bannerSwiper) {
		return;
	}

	// Check if Swiper is loaded
	if (typeof Swiper === 'undefined') {
		console.warn('Swiper library is not loaded');
		return;
	}

	// Initialize Swiper
	const swiper = new Swiper('.main-banner-swiper', {
		// Basic settings
		slidesPerView: 1,
		spaceBetween: 0,
		loop: false, // Set to true when you have multiple slides
		
		// Autoplay (optional - uncomment if needed)
		// autoplay: {
		// 	delay: 5000,
		// 	disableOnInteraction: false,
		// },
		
		// Effect (optional - can be 'slide', 'fade', 'cube', 'coverflow', 'flip')
		effect: 'slide',
		
		// Speed
		speed: 1000,
		
		// Pagination (optional - uncomment if needed)
		// pagination: {
		// 	el: '.swiper-pagination',
		// 	clickable: true,
		// },
		
		// Navigation arrows (optional - uncomment if needed)
		// navigation: {
		// 	nextEl: '.swiper-button-next',
		// 	prevEl: '.swiper-button-prev',
		// },
		
		// Keyboard control
		keyboard: {
			enabled: true,
			onlyInViewport: true,
		},
		
		// Mousewheel control (optional)
		// mousewheel: {
		// 	enabled: true,
		// },
		
		// Allow touch
		touchEventsTarget: 'container',
		
		// Prevent clicks
		preventClicks: true,
		preventClicksPropagation: true,
		
		// On init callback
		on: {
			init: function() {
				// Play video if it exists
				const video = bannerSwiper.querySelector('.banner-video');
				if (video) {
					video.play().catch(function(error) {
						console.log('Video autoplay prevented:', error);
					});
				}
			},
			slideChange: function() {
				// Pause all videos
				const videos = bannerSwiper.querySelectorAll('.banner-video');
				videos.forEach(function(video) {
					video.pause();
				});
				
				// Play video in active slide
				const activeSlide = bannerSwiper.querySelector('.swiper-slide-active');
				if (activeSlide) {
					const activeVideo = activeSlide.querySelector('.banner-video');
					if (activeVideo) {
						activeVideo.play().catch(function(error) {
							console.log('Video autoplay prevented:', error);
						});
					}
				}
			}
		}
	});

	// Handle video play/pause on visibility change
	document.addEventListener('visibilitychange', function() {
		const activeSlide = bannerSwiper.querySelector('.swiper-slide-active');
		if (activeSlide) {
			const activeVideo = activeSlide.querySelector('.banner-video');
			if (activeVideo) {
				if (document.hidden) {
					activeVideo.pause();
				} else {
					activeVideo.play().catch(function(error) {
						console.log('Video autoplay prevented:', error);
					});
				}
			}
		}
	});
});
