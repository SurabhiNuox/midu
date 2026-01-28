/**
 * Lenis Smooth Scroll Initialization
 * Initializes Lenis smooth scrolling for the entire website
 */

document.addEventListener('DOMContentLoaded', function() {
	// Check if Lenis is loaded
	if (typeof Lenis === 'undefined') {
		console.warn('Lenis library is not loaded');
		return;
	}

	// Initialize Lenis with premium smooth scroll settings (matching ceermotors.com)
	const lenis = new Lenis({
		duration: 1.8, // Longer duration for buttery smooth scroll
		easing: (t) => 1 - Math.pow(1 - t, 3), // Cubic ease-out for smoother feel
		direction: 'vertical',
		gestureDirection: 'vertical',
		smooth: true,
		mouseMultiplier: 0.6, // Lower multiplier for gentler, more controlled scrolling
		smoothTouch: false,
		touchMultiplier: 1.2, // Smoother touch scrolling
		infinite: false,
		wheelMultiplier: 0.8, // Additional control for wheel scrolling
	});

	// Get scroll value
	function raf(time) {
		lenis.raf(time);
		requestAnimationFrame(raf);
	}

	requestAnimationFrame(raf);

	// Make Lenis available globally if needed
	window.lenis = lenis;

	// Optional: Add scroll event listener
	lenis.on('scroll', ({ scroll, limit, velocity, direction, progress }) => {
		// You can add custom scroll-based animations here if needed
	});

	// Handle anchor links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function(e) {
			const href = this.getAttribute('href');
			
			// Skip if it's just "#"
			if (href === '#' || href === '') {
				return;
			}

			const target = document.querySelector(href);
			
			if (target) {
				e.preventDefault();
				lenis.scrollTo(target, {
					offset: -80, // Offset for fixed header
					duration: 2.2, // Premium smooth anchor scrolling
					easing: (t) => 1 - Math.pow(1 - t, 3), // Match main easing
				});
			}
		});
	});
});
