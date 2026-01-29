/**
 * Explore Our World – GSAP animations on scroll-into-view
 * Elements hidden until section is in view. Then text, then odd cards slide down,
 * even cards slide up (same time). Smooth easing, no flash-before-animate.
 */

(function() {
	'use strict';

	function init() {
		if (typeof gsap === 'undefined') {
			return;
		}

		const section = document.querySelector('.explore-our-world');
		if (!section) return;

		const title = section.querySelector('.explore-header .second_title');
		const desc = section.querySelector('.explore-header p');
		const grid = section.querySelector('.explore-cards-grid');
		const cards = grid ? Array.from(grid.querySelectorAll('.explore-card')) : [];
		const oddCards = cards.filter(function(_, i) { return i % 2 === 0; });
		const evenCards = cards.filter(function(_, i) { return i % 2 === 1; });

		const textEls = [title, desc].filter(Boolean);
		const slideDistance = 120;
		const ease = 'power3.out';

		// Hide immediately so nothing shows before we animate
		gsap.set(textEls, { opacity: 0, y: 24 });
		gsap.set(oddCards, { opacity: 0, y: -slideDistance });
		gsap.set(evenCards, { opacity: 0, y: slideDistance });
		cards.forEach(function(el) {
			el.style.transition = 'none';
		});

		function runAnimation() {
			cards.forEach(function(el) {
				el.style.transition = 'none';
			});

			const tl = gsap.timeline({
				onComplete: function() {
					cards.forEach(function(el) {
						el.style.transition = '';
					});
				}
			});

			// 1. Text first
			if (textEls.length) {
				tl.to(textEls, {
					opacity: 1,
					y: 0,
					duration: 0.9,
					stagger: 0.1,
					ease: ease,
					force3D: true
				});
			}

			// 2. Odd cards slide down, even slide up (same time)
			const cardDuration = 1;
			const pos = textEls.length ? '-=0.2' : 0;

			if (oddCards.length) {
				tl.to(oddCards, {
					opacity: 1,
					y: 0,
					duration: cardDuration,
					ease: ease,
					force3D: true
				}, pos);
			}
			if (evenCards.length) {
				tl.to(evenCards, {
					opacity: 1,
					y: 0,
					duration: cardDuration,
					ease: ease,
					force3D: true
				}, '<');
			}
		}

		const observer = new IntersectionObserver(
			function(entries) {
				entries.forEach(function(entry) {
					if (!entry.isIntersecting) return;
					observer.unobserve(entry.target);
					runAnimation();
				});
			},
			{ rootMargin: '0px 0px -10% 0px', threshold: 0.08 }
		);

		observer.observe(section);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
