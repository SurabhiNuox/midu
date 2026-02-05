/**
 * Show sticky header on mouse movement (not scroll).
 * Header stays visible when viewing the first banner section; elsewhere it shows on mousemove and hides after delay.
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
		// In view when any part of the first section overlaps the viewport
		return rect.bottom > 0 && rect.top < viewHeight;
	}

	function showHeader() {
		if (!header) return;
		header.classList.add('is-visible');
		clearTimeout(timeoutId);
		if (isInFirstSection()) {
			return;
		}
		timeoutId = setTimeout(function () {
			header.classList.remove('is-visible');
		}, delay);
	}

	function updateHeaderForScroll() {
		if (!header) return;
		if (isInFirstSection()) {
			header.classList.add('is-visible');
			clearTimeout(timeoutId);
		} else {
			header.classList.remove('is-visible');
			clearTimeout(timeoutId);
		}
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
