(function() {
	'use strict';

	/**
	 * Workshop Registration Form Handler
	 * Handles $45 checkout flow via Stripe/PayPal integration
	 * 
	 * TODO: Implement form validation
	 * TODO: Add Stripe Elements or PayPal SDK integration
	 * TODO: Handle payment confirmation and redirect
	 * TODO: Show loading state during payment processing
	 * TODO: Display success/error messages with aria-live regions
	 * TODO: Prefill form data from URL params if available
	 * TODO: Add honeypot field for spam protection
	 */

	const forms = document.querySelectorAll('.khf-workshop-registration-form, .khf-workshop-form');

	if (!forms.length) {
		return;
	}

	forms.forEach(function(form) {
		const submitButton = form.querySelector('button[type="submit"]');
		const paymentStatus = form.querySelector('.khf-payment-status');

		function setLoading(isLoading) {
			if (submitButton) {
				submitButton.disabled = isLoading;
				submitButton.textContent = isLoading ? 'Processing...' : 'Register for $45';
			}
		}

		function showMessage(message, isError = false) {
			if (paymentStatus) {
				paymentStatus.textContent = message;
				paymentStatus.className = 'khf-payment-status' + (isError ? ' is-error' : ' is-success');
				paymentStatus.setAttribute('role', 'alert');
				paymentStatus.setAttribute('aria-live', 'polite');
			}
		}

		function validateForm(formData) {
			const requiredFields = ['workshop_id', 'attendee_name', 'attendee_email'];
			const errors = [];

			requiredFields.forEach(function(field) {
				if (!formData.get(field)) {
					errors.push(field);
				}
			});

			const email = formData.get('attendee_email');
			if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
				errors.push('attendee_email');
			}

			return errors;
		}

		form.addEventListener('submit', async function(e) {
			// Skip AJAX handling for direct PayPal forms
			if (form.action && form.action.includes('paypal.com')) {
				return;
			}

			e.preventDefault();

			const formData = new FormData(form);
			const errors = validateForm(formData);

			if (errors.length > 0) {
				showMessage('Please fill in all required fields correctly.', true);
				return;
			}

			setLoading(true);
			showMessage('');

			try {
				// TODO: Replace with actual payment processing
				// const response = await fetch(khfAjax.ajaxurl, {
				// 	method: 'POST',
				// 	body: new URLSearchParams({
				// 		action: 'khf_workshop_registration',
				// 		nonce: khfAjax.nonce,
				// 		...Object.fromEntries(formData)
				// 	})
				// });
				// const result = await response.json();

				// Simulated delay for demo
				await new Promise(resolve => setTimeout(resolve, 1500));

				// TODO: Handle real response
				// if (result.success) { ... } else { ... }

				throw new Error('Payment integration not yet implemented');
			} catch (error) {
				console.error('Workshop registration error:', error);
				showMessage('Registration failed. Please try again or contact us.', true);
			} finally {
				setLoading(false);
			}
		});
	});

	// Smooth scroll for any anchor links within the forms
	forms.forEach(function(form) {
		const anchorLinks = form.querySelectorAll('a[href^="#"]');
		anchorLinks.forEach(function(link) {
			link.addEventListener('click', function(e) {
				const href = link.getAttribute('href');
				if (href === '#') return;

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
				}
			});
		});
	});
})();