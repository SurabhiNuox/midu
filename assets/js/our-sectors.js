/**
 * Our Sectors — GSAP animation when section enters view
 * 1. Center circle (with rings and label) scales up and fades in
 * 2. Lines fade in with the circle
 * 3. Sector cards scale up and fade in one by one with stagger
 * Fallback: if observer never fires (e.g. smooth scroll), run animation after 2.5s so elements are always visible.
 */

(function () {
	'use strict';

	function init() {
		if (typeof gsap === 'undefined') return;

		var section = document.querySelector('.our-sectors');
		if (!section) return;

		var center = section.querySelector('.our-sectors__center');
		var lines = section.querySelectorAll('.our-sectors__line');
		var cardInners = section.querySelectorAll('.our-sectors__card-inner');
		if (!center || !cardInners.length) return;

		var ease = 'power3.out';
		var durationCenter = 1;
		var durationCard = 0.65;
		var staggerCard = 0.22;
		var hasRun = false;

		function runAnimation() {
			if (hasRun) return;
			hasRun = true;

			// Ensure initial state (in case fallback runs before observer)
			gsap.set(center, { opacity: 0, scale: 0.65, xPercent: -50, yPercent: -50 });
			gsap.set(lines, { opacity: 0 });
			gsap.set(cardInners, { opacity: 0, scale: 0.88 });

			var tl = gsap.timeline({ ease: ease });

			tl.to(center, {
				opacity: 1,
				scale: 1,
				xPercent: -50,
				yPercent: -50,
				duration: durationCenter,
				ease: ease,
				force3D: true,
				overwrite: true
			});

			if (lines.length) {
				tl.to(lines, { opacity: 1, duration: 0.5, ease: ease }, '-=0.35');
			}

			tl.to(cardInners, {
				opacity: 1,
				scale: 1,
				duration: durationCard,
				stagger: staggerCard,
				ease: ease,
				force3D: true
			}, 0.4);
		}

		// Hide elements until animation runs (so they are visible after runAnimation)
		gsap.set(center, { opacity: 0, scale: 0.65, xPercent: -50, yPercent: -50 });
		gsap.set(lines, { opacity: 0 });
		gsap.set(cardInners, { opacity: 0, scale: 0.88 });

		// Only run when section is actually visible (not covered by sustainability sticky)
		function isSustainabilityPinned() {
			var sticky = document.querySelector('.sustainability-commitment-section__sticky.is-pinned');
			return !!sticky;
		}

		function isSectionInView() {
			var r = section.getBoundingClientRect();
			return r.top < window.innerHeight && r.bottom > 0;
		}

		function tryRunAnimation() {
			if (hasRun) return;
			if (!isSectionInView()) return;
			if (isSustainabilityPinned()) return;
			observer.unobserve(section);
			runAnimation();
		}

		var observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (!entry.isIntersecting) return;
					tryRunAnimation();
				});
			},
			{ rootMargin: '0px', threshold: 0 }
		);
		observer.observe(section);

		// When coming from sustainability: animation runs after sticky unpins so it is visible
		window.addEventListener('sustainability-unpinned', function () {
			tryRunAnimation();
		});

		// Fallback: always show elements after 2.5s so they are never stuck hidden (e.g. if observer never fires with Lenis/smooth scroll)
		setTimeout(function () {
			if (hasRun) return;
			observer.unobserve(section);
			runAnimation();
		}, 2500);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
