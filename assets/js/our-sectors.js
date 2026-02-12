/**
 * Our Sectors — GSAP animation when section enters view
 * 1. Title fades up
 * 2. Center circle (with rings and label) scales up and fades in
 * 3. Lines fade in with the circle
 * 4. Sector cards scale up and fade in one by one with stagger
 * 5. CTA button fades up
 * Fallback: if observer never fires (e.g. smooth scroll), run animation after 2.5s so elements are always visible.
 */

(function () {
	'use strict';

	function init() {
		if (typeof gsap === 'undefined') return;

		var section = document.querySelector('.our-sectors');
		if (!section) return;

		var titleEl = section.querySelector('.our-sectors__title');
		var center = section.querySelector('.our-sectors__center');
		var lines = section.querySelectorAll('.our-sectors__line');
		var cardInners = section.querySelectorAll('.our-sectors__card-inner');
		var ctaWrap = section.querySelector('.our-sectors__cta-wrap');
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
			if (titleEl) gsap.set(titleEl, { opacity: 0, y: 24 });
			gsap.set(center, { opacity: 0, scale: 0.65, xPercent: -50, yPercent: -50 });
			gsap.set(lines, { opacity: 0 });
			gsap.set(cardInners, { opacity: 0, scale: 0.88 });
			if (ctaWrap) gsap.set(ctaWrap, { opacity: 0, y: 20 });

			var tl = gsap.timeline({ ease: ease });

			if (titleEl) {
				tl.to(titleEl, { opacity: 1, y: 0, duration: 0.7, ease: ease });
			}

			tl.to(center, {
				opacity: 1,
				scale: 1,
				xPercent: -50,
				yPercent: -50,
				duration: durationCenter,
				ease: ease,
				force3D: true,
				overwrite: true
			}, titleEl ? 0.15 : 0);

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

			if (ctaWrap) {
				tl.to(ctaWrap, { opacity: 1, y: 0, duration: 0.6, ease: ease }, 1.35);
			}
		}

		// Hide elements until animation runs (so they are visible after runAnimation)
		if (titleEl) gsap.set(titleEl, { opacity: 0, y: 24 });
		gsap.set(center, { opacity: 0, scale: 0.65, xPercent: -50, yPercent: -50 });
		gsap.set(lines, { opacity: 0 });
		gsap.set(cardInners, { opacity: 0, scale: 0.88 });
		if (ctaWrap) gsap.set(ctaWrap, { opacity: 0, y: 20 });

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

		// Run animation when section enters viewport (e.g. 10% visible = "entering" the section)
		var observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (!entry.isIntersecting) return;
					tryRunAnimation();
				});
			},
			{ rootMargin: '0px', threshold: 0.1 }
		);
		observer.observe(section);

		// When coming from sustainability: animation runs after sticky unpins so it is visible
		window.addEventListener('sustainability-unpinned', function () {
			tryRunAnimation();
		});

		// Fallback: only when section is in view (e.g. Lenis/smooth scroll may not fire observer)
		setTimeout(function () {
			if (hasRun) return;
			if (!isSectionInView() || isSustainabilityPinned()) return;
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
