/**
 * Show sticky header when user scrolls (up or down).
 * Adds .is-visible to header on scroll; removes it after scroll stops.
 */
(function () {
	'use strict';

	var timeoutId;
	var header = document.getElementById('masthead');
	var delay = 1200;

	function showHeader() {
		if (!header) return;
		header.classList.add('is-visible');
		clearTimeout(timeoutId);
		timeoutId = setTimeout(function () {
			header.classList.remove('is-visible');
		}, delay);
	}

	function init() {
		header = document.getElementById('masthead');
		if (!header) return;

		window.addEventListener('scroll', showHeader, { passive: true });
		window.addEventListener('wheel', showHeader, { passive: true });
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
