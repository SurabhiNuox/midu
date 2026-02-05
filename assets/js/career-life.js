/**
 * Career Life: bind .career_life_video to open YouTube in Fancybox with iframe controls.
 */
(function () {
	'use strict';
	document.addEventListener('DOMContentLoaded', function () {
		if (typeof Fancybox === 'undefined') return;
		Fancybox.bind('[data-fancybox]', {
			type: 'iframe',
			iframe: {
				css: { width: '100%', height: '100%' },
				attr: { allow: 'autoplay; fullscreen', allowfullscreen: true }
			}
		});
	});
})();
