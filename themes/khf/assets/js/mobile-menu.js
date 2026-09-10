(function() {
	'use strict';

	var toggle = document.querySelector('.wp-block-navigation__responsive-toggle');
	var container = document.querySelector('.wp-block-navigation__responsive-container');

	if (!toggle || !container) {
		return;
	}

	toggle.addEventListener('click', function() {
		container.classList.toggle('khf-mobile-menu-open');
		toggle.setAttribute('aria-expanded', container.classList.contains('khf-mobile-menu-open'));
	});

	container.addEventListener('click', function(e) {
		if (e.target === container) {
			container.classList.remove('khf-mobile-menu-open');
			toggle.setAttribute('aria-expanded', 'false');
		}
	});

	document.addEventListener('keydown', function(e) {
		if (e.key === 'Escape' && container.classList.contains('khf-mobile-menu-open')) {
			container.classList.remove('khf-mobile-menu-open');
			toggle.setAttribute('aria-expanded', 'false');
		}
	});

	var class1 = document.getElementById('khf_class1');
	var class2 = document.getElementById('khf_class2');

	if (!class1 || !class2) {
		return;
	}

	function syncDisabled() {
		var v1 = class1.value;
		var v2 = class2.value;

		Array.from(class1.options).forEach(function(opt) {
			opt.disabled = opt.value === v2;
		});
		Array.from(class2.options).forEach(function(opt) {
			opt.disabled = opt.value === v1;
		});
	}

	class1.addEventListener('change', syncDisabled);
	class2.addEventListener('change', syncDisabled);
	syncDisabled();

	class1.addEventListener('keydown', function(e) {
		if (e.key === 'Escape') {
			class1.focus();
		}
	});
})();
