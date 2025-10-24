// Login Modal Validation with jQuery
$(document).ready(function() {
    
    // Login form validation
    $("#login-form").validate({
        rules: {
            "email": {
                required: true,
                email: true
            },
            "password": {
                required: true,
                minlength: 1
            }
        },
        messages: {
            "email": {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            "password": {
                required: "Please enter your password"
            }
        },
        errorClass: "error",
        validClass: "valid",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            // Form is valid, submit via AJAX
            submitLoginForm(form);
            return false; // Prevent default form submission
        }
    });
    
    // AJAX form submission function
    function submitLoginForm(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        // Show loading state
        submitBtn.textContent = 'Signing In...';
        submitBtn.disabled = true;
        
        // Get form data
        const formData = new FormData(form);
        
        // Submit via AJAX
        $.ajax({
            url: form.action,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    // Show success message
                    showLoginMessage('login-message', response.message, 'success');

                    // Close modal and redirect to the provided redirect URL (or home) after a short delay
                    setTimeout(function() {
                        try { closeModal('login-modal'); } catch (e) { /* ignore */ }
                        var dest = (response.redirect) ? response.redirect : '../pages/home.php';
                        // Navigate to destination
                        window.location.href = dest;
                    }, 800);
                } else {
                    // Show error message
                    showLoginMessage('login-message', response.message, 'error');
                }
            },
            error: function(xhr, status, error) {
                // Show error message
                showLoginMessage('login-message', 'Login failed. Please try again.', 'error');
            },
            complete: function() {
                // Reset button state
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });
    }
    
    // Function to show login messages
    function showLoginMessage(elementId, message, type) {
        const messageElement = document.getElementById(elementId);
        if (messageElement) {
            messageElement.textContent = message;
            messageElement.className = type === 'success' ? 'text-green-600 bg-green-100 p-3 rounded mb-4' : 'text-red-600 bg-red-100 p-3 rounded mb-4';
            messageElement.classList.remove('hidden');
            
            // Auto-hide after 5 seconds
            setTimeout(function() {
                messageElement.classList.add('hidden');
            }, 5000);
        }
    }
    
    // Function to update navbar for logged in user
    function updateNavbarForLoggedInUser(user) {
        // Hide guest menu
        const guestMenu = document.getElementById('guest-menu');
        if (guestMenu) {
            guestMenu.style.display = 'none';
        }
        
        // Show user menu
        const userMenu = document.getElementById('user-menu');
        if (userMenu) {
            userMenu.classList.remove('hidden');
        }
        
        // Update user info
        const userName = document.getElementById('user-name');
        const userEmail = document.getElementById('user-email');
        if (userName) {
            userName.textContent = 'Welcome, ' + user.name;
        }
        if (userEmail) {
            userEmail.textContent = user.email;
        }
        
        // Update account text
        const accountText = document.getElementById('account-text');
        if (accountText) {
            accountText.textContent = user.name;
        }
    }
    
    // Make functions globally available
    window.submitLoginForm = submitLoginForm;
    window.showLoginMessage = showLoginMessage;
    window.updateNavbarForLoggedInUser = updateNavbarForLoggedInUser;
});