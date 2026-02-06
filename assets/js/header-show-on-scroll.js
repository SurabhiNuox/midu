/**
 * Header visibility: show when scrolling (up or down), hide only when user stops (viewing sections).
 * In the first banner section the header stays visible; elsewhere it shows on scroll and hides after idle delay.
 */
(function () {
	'use strict';

	var timeoutId;
	var header = document.getElementById('masthead');
	var delay = 1200;
	var firstSectionEl = null;

	function getFirstSection() {
		if (firstSectionEl) return firstSectionEl;
		firstSectionEl =
			document.querySelector('.main-banner') ||
			document.querySelector('.inner-banner') ||
			document.querySelector('main section') ||
			document.querySelector('#content section');
		return firstSectionEl;
	}

	function isInFirstSection() {
		var section = getFirstSection();
		if (!section) return false;
		var rect = section.getBoundingClientRect();
		var viewHeight = window.innerHeight;
		return rect.bottom > 0 && rect.top < viewHeight;
	}

	function isInOurSectorsSection() {
		var section = document.querySelector('.our-sectors');
		if (!section) return false;
		var rect = section.getBoundingClientRect();
		var viewHeight = window.innerHeight;
		return rect.bottom > 0 && rect.top < viewHeight;
	}

	function showHeader() {
		if (!header) return;
		if (isInOurSectorsSection()) return;
		header.classList.add('is-visible');
		clearTimeout(timeoutId);
		if (isInFirstSection()) return;
		timeoutId = setTimeout(function () {
			header.classList.remove('is-visible');
		}, delay);
	}

	function updateHeaderForScroll() {
		if (!header) return;
		header.classList.add('is-visible');
		clearTimeout(timeoutId);
		if (isInFirstSection()) return;
		timeoutId = setTimeout(function () {
			header.classList.remove('is-visible');
		}, delay);
	}

	function init() {
		header = document.getElementById('masthead');
		if (!header) return;

		window.addEventListener('mousemove', showHeader, { passive: true });
		window.addEventListener('scroll', updateHeaderForScroll, { passive: true });

		updateHeaderForScroll();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
