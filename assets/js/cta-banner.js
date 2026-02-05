/**
 * CTA Banner — smooth entrance animation when section enters view.
 */

(function () {
	'use strict';

	function init() {
		var section = document.querySelector('.cta-banner');
		if (!section) return;

		if (typeof gsap === 'undefined') return;

		var shape = section.querySelector('.cta-banner__shape');
		var textEl = shape ? shape.querySelector('p') : null;
		var btn = shape ? shape.querySelector('.btn-primary') : null;
		var elements = [textEl, btn].filter(Boolean);
		if (elements.length === 0) return;

		var ease = 'power3.out';
		var yStart = 28;
		var duration = 0.7;
		var stagger = 0.12;

		gsap.set(elements, { opacity: 0, y: yStart });
		var hasAnimated = false;
		var observer = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (entry) {
					if (!entry.isIntersecting || hasAnimated) return;
					hasAnimated = true;
					observer.unobserve(entry.target);
					gsap.to(elements, {
						opacity: 1,
						y: 0,
						duration: duration,
						ease: ease,
						stagger: stagger,
						overwrite: true
					});
				});
			},
			{ rootMargin: '0px', threshold: 0.15 }
		);
		observer.observe(section);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
