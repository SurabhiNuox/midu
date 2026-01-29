/**
 * Projects Slider — CEER "Inspired by a nation" style
 * Section is tall (N × 50vh). When scroll is inside that range, viewport is fixed (pin).
 * Scroll progress inside the section drives which slide is visible.
 * Works with Lenis (transform scroll) and native scroll.
 */

(function () {
	'use strict';

	function getScrollTop() {
		if (window.lenis && typeof window.lenis.scroll === 'number') {
			return window.lenis.scroll;
		}
		return window.pageYOffset !== undefined
			? window.pageYOffset
			: document.documentElement.scrollTop;
	}

	function setActiveSlide(slides, index) {
		index = Math.max(0, Math.min(index, slides.length - 1));
		slides.forEach(function (slide, i) {
			slide.classList.toggle('is-active', i === index);
		});
	}

	function setContentColumn(column, strip, blocks, index, progress) {
		index = Math.max(0, Math.min(index, blocks.length - 1));
		blocks.forEach(function (block, i) {
			block.classList.remove('is-active', 'is-near');
			if (i === index) {
				block.classList.add('is-active');
			} else if (i === index - 1 || i === index + 1) {
				block.classList.add('is-near');
			}
		});
		if (!strip || progress === undefined) return;
		
		// Get header height to calculate available slider height
		var outerSection = document.querySelector('.projects_section');
		var header = outerSection ? outerSection.querySelector('.project-header') : null;
		var headerHeight = header ? header.offsetHeight : 0;
		var sliderHeight = window.innerHeight - headerHeight;
		
		var blockHeight = sliderHeight * 0.33;
		var totalSlides = blocks.length;
		// Smooth interpolation: center position based on progress
		// At progress 0, block 0 is centered; at progress 1, last block is centered
		// Each block's center should align with slider center (not viewport center)
		var targetBlockCenter = progress * (totalSlides - 1) * blockHeight + blockHeight * 0.5;
		var offsetPx = sliderHeight * 0.5 - targetBlockCenter;
		strip.style.transform = 'translateY(' + offsetPx + 'px)';
	}

	function updateSlider() {
		var section = document.querySelector('.projects-slider-section');
		if (!section) return;

		var sticky = section.querySelector('.projects-slider-section__sticky');
		var slides = section.querySelectorAll('.projects-slider__slide');
		var column = section.querySelector('.projects-slider__content-column');
		var strip = section.querySelector('.projects-slider__content-strip');
		var blocks = section.querySelectorAll('.projects-slider__content-block');
		if (!sticky || slides.length === 0) return;

		var totalSlides = slides.length;
		var scrollY = getScrollTop();
		var rect = section.getBoundingClientRect();
		var sectionTop = scrollY + rect.top;
		var sectionHeight = section.offsetHeight;
		var scrollInto = scrollY - sectionTop;
		
		// Pin when section top reaches viewport top
		var shouldPin = rect.top <= 0 && rect.bottom > 0;
		
		var progress = Math.max(0, Math.min(1, scrollInto / sectionHeight));
		
		// Calculate when last content reaches top
		// Get header and slider dimensions for content positioning
		var header = document.querySelector('.projects_section .project-header');
		var headerHeight = header ? header.offsetHeight : 0;
		var sliderHeight = window.innerHeight - headerHeight;
		var blockHeight = sliderHeight * 0.33; // Match the calculation in setContentColumn
		var totalBlocks = blocks.length;
		
		// Calculate progress needed for last block's top to reach viewport top
		// In setContentColumn: targetBlockCenter = progress * (totalBlocks - 1) * blockHeight + blockHeight * 0.5
		// offsetPx = sliderHeight * 0.5 - targetBlockCenter
		// When progress = 1: last block center is at sliderHeight * 0.5 (centered)
		// To get last block top to viewport top: need to move up by blockHeight * 0.5
		// The content strip moves: progress * (totalBlocks - 1) * blockHeight
		// To move last block from center (progress=1) to top: need additional progress
		// Additional progress = (blockHeight * 0.5) / ((totalBlocks - 1) * blockHeight)
		// But we need to account for sectionHeight, so: additional scroll = blockHeight * 0.5
		// Additional progress = (blockHeight * 0.5) / sectionHeight
		var progressForLastAtTop = 1 + (blockHeight * 0.5) / sectionHeight;
		var maxProgress = progressForLastAtTop;
		var adjustedProgress = Math.max(0, Math.min(maxProgress, scrollInto / sectionHeight));
		
		// Active = block whose center is at viewport center (not top)
		var index = Math.min(
			totalSlides - 1,
			Math.max(0, Math.round(Math.min(1, adjustedProgress) * (totalSlides - 1)))
		);

		// Before section reaches viewport top: no pin, show first slide
		if (rect.top > 0) {
			sticky.classList.remove('is-pinned');
			setActiveSlide(slides, 0);
			if (blocks.length) setContentColumn(column, strip, blocks, 0, 0);
			return;
		}

		// After section has completely scrolled past: no pin, show last slide
		// Unpin only when last content (Quba Mosque) reaches the top
		var isCurrentlyPinned = sticky.classList.contains('is-pinned');
		if (isCurrentlyPinned) {
			// When pinned, unpin only when last content's top reaches viewport top
			if (adjustedProgress >= progressForLastAtTop || scrollInto >= sectionHeight * progressForLastAtTop) {
				sticky.classList.remove('is-pinned');
				setActiveSlide(slides, totalSlides - 1);
				if (blocks.length) setContentColumn(column, strip, blocks, totalSlides - 1, 1);
				return;
			}
		} else {
			// When not pinned, use normal check
			if (rect.bottom <= 0 || scrollInto >= sectionHeight) {
				sticky.classList.remove('is-pinned');
				setActiveSlide(slides, totalSlides - 1);
				if (blocks.length) setContentColumn(column, strip, blocks, totalSlides - 1, 1);
				return;
			}
		}

		// Section is in viewport: pin the slider
		if (shouldPin) {
			sticky.classList.add('is-pinned');
		} else {
			sticky.classList.remove('is-pinned');
		}
		
		setActiveSlide(slides, index);
		if (blocks.length) setContentColumn(column, strip, blocks, index, adjustedProgress);
	}

	function init() {
		var section = document.querySelector('.projects-slider-section');
		if (!section) return;

		var slides = section.querySelectorAll('.projects-slider__slide');
		if (slides.length === 0) return;

		var strip = section.querySelector('.projects-slider__content-strip');
		var blocks = section.querySelectorAll('.projects-slider__content-block');
		setActiveSlide(slides, 0);
		if (blocks.length) setContentColumn(null, strip, blocks, 0, 0);
		updateSlider();

		// Always use RAF so progress updates every frame while pinned (scroll position changes)
		(function rafUpdate() {
			updateSlider();
			requestAnimationFrame(rafUpdate);
		})();
		if (window.lenis && typeof window.lenis.on === 'function') {
			window.lenis.on('scroll', updateSlider);
		}
		window.addEventListener('scroll', updateSlider, { passive: true });

		window.addEventListener('resize', updateSlider);
		window.addEventListener('load', function () {
			updateSlider();
		});
		setTimeout(updateSlider, 200);
		setTimeout(updateSlider, 800);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			setTimeout(init, 150);
		});
	} else {
		setTimeout(init, 150);
	}
})();
