/**
 * Hamburger menu toggle for viewports below 1060px.
 * Toggles .is-menu-open on .site-header and .menu-open on body.
 */
(function () {
	'use strict';

	var header = document.querySelector('.site-header');
	var hamburger = document.querySelector('.hamburger-btn');
	var overlay = document.querySelector('.mobile-menu-overlay');
	var drawer = document.getElementById('mobile-menu-drawer');
	var closeBtn = document.querySelector('.mobile-menu-drawer__close');

	if (!header || !hamburger) return;

	function openMenu() {
		header.classList.add('is-menu-open');
		document.body.classList.add('menu-open');
		hamburger.classList.add('is-active');
		hamburger.setAttribute('aria-expanded', 'true');
		hamburger.setAttribute('aria-label', hamburger.getAttribute('data-label-close') || 'Close menu');
		if (overlay) overlay.setAttribute('aria-hidden', 'false');
		if (drawer) drawer.setAttribute('aria-hidden', 'false');
	}

	function closeMenu() {
		header.classList.remove('is-menu-open');
		document.body.classList.remove('menu-open');
		hamburger.classList.remove('is-active');
		hamburger.setAttribute('aria-expanded', 'false');
		hamburger.setAttribute('aria-label', hamburger.getAttribute('data-label-open') || 'Open menu');
		if (overlay) overlay.setAttribute('aria-hidden', 'true');
		if (drawer) drawer.setAttribute('aria-hidden', 'true');
	}

	function toggleMenu() {
		if (header.classList.contains('is-menu-open')) {
			closeMenu();
		} else {
			openMenu();
		}
	}

	hamburger.addEventListener('click', function (e) {
		e.preventDefault();
		toggleMenu();
	});

	if (overlay) {
		overlay.addEventListener('click', closeMenu);
	}

	if (closeBtn) {
		closeBtn.addEventListener('click', closeMenu);
	}

	// Close on escape key
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape' && header.classList.contains('is-menu-open')) {
			closeMenu();
		}
	});

	// Close when switching to desktop (resize above 1060px)
	window.addEventListener('resize', function () {
		if (window.matchMedia('(min-width: 1061px)').matches && header.classList.contains('is-menu-open')) {
			closeMenu();
		}
	});
})();
