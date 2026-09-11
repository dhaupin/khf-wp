(function() {
	'use strict';

	const toggle = document.querySelector('.wp-block-navigation__responsive-toggle');
	const container = document.querySelector('.wp-block-navigation__responsive-container');

	if (!toggle || !container) {
		return;
	}

	const menu = container.querySelector('.wp-block-navigation__responsive-container-content') || container;
	const focusableElements = 'a[href], button, textarea, input, select, [tabindex]:not([tabindex="-1"])';
	let lastFocusedElement = null;

	function getFocusableElements() {
		return Array.from(menu.querySelectorAll(focusableElements)).filter(el => !el.hasAttribute('disabled') && el.offsetParent !== null);
	}

	function trapFocus(e) {
		if (e.key !== 'Tab') {
			return;
		}

		const focusable = getFocusableElements();
		if (focusable.length === 0) {
			return;
		}

		const firstElement = focusable[0];
		const lastElement = focusable[focusable.length - 1];

		if (e.shiftKey && document.activeElement === firstElement) {
			e.preventDefault();
			lastElement.focus();
		} else if (!e.shiftKey && document.activeElement === lastElement) {
			e.preventDefault();
			firstElement.focus();
		}
	}

	function openMenu() {
		container.classList.add('khf-mobile-menu-open');
		toggle.setAttribute('aria-expanded', 'true');
		lastFocusedElement = document.activeElement;
		menu.addEventListener('keydown', trapFocus);
		focusableElements = getFocusableElements();
		if (focusableElements.length > 0) {
			focusableElements[0].focus();
		}
	}

	function closeMenu() {
		container.classList.remove('khf-mobile-menu-open');
		toggle.setAttribute('aria-expanded', 'false');
		menu.removeEventListener('keydown', trapFocus);
		if (lastFocusedElement) {
			lastFocusedElement.focus();
		}
	}

	toggle.addEventListener('click', function() {
		const isOpen = container.classList.contains('khf-mobile-menu-open');
		if (isOpen) {
			closeMenu();
		} else {
			openMenu();
		}
	});

	container.addEventListener('click', function(e) {
		if (e.target === container) {
			closeMenu();
		}
	});

	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape' && container.classList.contains('khf-mobile-menu-open')) {
			closeMenu();
		}
	});

	menu.addEventListener('click', function(e) {
		const link = e.target.closest('a[href^="#"]');
		if (link) {
			closeMenu();
		}
	});

	const anchorLinks = document.querySelectorAll('a[href^="#"]');
	anchorLinks.forEach(function(link) {
		link.addEventListener('click', function(e) {
			const href = link.getAttribute('href');
			if (href === '#') {
				return;
			}

			const target = document.querySelector(href);
			if (target) {
				e.preventDefault();
				const header = document.querySelector('.khf-site-header');
				const headerHeight = header ? header.offsetHeight : 0;
				const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 16;

				window.scrollTo({
					top: targetPosition,
					behavior: 'smooth'
				});

				target.setAttribute('tabindex', '-1');
				target.focus({ preventScroll: true });
				target.removeAttribute('tabindex');
			}
		});
	});

	if (!toggle.hasAttribute('aria-label')) {
		toggle.setAttribute('aria-label', 'Toggle navigation menu');
	}

	toggle.setAttribute('aria-expanded', 'false');
	toggle.setAttribute('aria-controls', 'khf-navigation-menu');
	menu.id = menu.id || 'khf-navigation-menu';
})();