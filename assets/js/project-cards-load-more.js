/**
 * Project cards grid — Load more button: reveal next batch of hidden cards.
 */
(function () {
	'use strict';

	function init() {
		var sections = document.querySelectorAll( '.project-cards-section' );
		sections.forEach( function ( section ) {
			var btn = section.querySelector( '.project-cards-load-more' );
			if ( ! btn ) return;

			var grid = section.querySelector( '.project-cards-grid' );
			if ( ! grid ) return;

			var perPage = parseInt( section.getAttribute( 'data-per-page' ), 10 ) || 6;

			function revealNext( e ) {
				if ( e ) {
					e.preventDefault();
					e.stopPropagation();
				}
				var toReveal = grid.querySelectorAll( '.project-card-wrap.project-card--hidden' );
				var count = Math.min( perPage, toReveal.length );
				for ( var i = 0; i < count; i++ ) {
					toReveal[ i ].classList.remove( 'project-card--hidden' );
				}
				var remaining = grid.querySelectorAll( '.project-card-wrap.project-card--hidden' );
				if ( remaining.length === 0 ) {
					var actions = section.querySelector( '.project-cards-section__actions' );
					if ( actions ) {
						actions.style.display = 'none';
					}
				}
			}

			btn.addEventListener( 'click', revealNext );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
})();
