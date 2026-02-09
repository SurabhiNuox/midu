/**
 * About page — add .in-view when sections enter the viewport (for scroll-triggered animations).
 */
(function () {
	'use strict';

	function init() {
		var aboutPage = document.querySelector( '.about_page' );
		if ( ! aboutPage ) return;

		var mainContent = aboutPage.querySelector( '.main_content' );
		if ( ! mainContent ) return;

		var sections = mainContent.querySelectorAll(
			'.overview-section, .mission-vision-section, .philosophy-section, .what-we-do-section'
		);
		if ( ! sections.length ) return;

		var observer = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						entry.target.classList.add( 'in-view' );
					}
				} );
			},
			{
				rootMargin: '0px 0px -40px 0px',
				threshold: 0.1
			}
		);

		sections.forEach( function ( section ) {
			observer.observe( section );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();
