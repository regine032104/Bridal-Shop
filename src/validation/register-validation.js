// Register Modal Validation with jQuery
// This file contains the validation logic for the register modal form

$(document).ready(function() {
    
    // Custom validation method for space validation
    $.validator.addMethod("noSpaces", function(value, element) {
        return this.optional(element) || /^\S*$/.test(value);
    }, "Spaces are not allowed");
    
    // Custom validation method for phone numbers (allows + and numbers only)
    $.validator.addMethod("phoneNumber", function(value, element) {
        return this.optional(element) || /^\+?[0-9\s\-\(\)]+$/.test(value);
    }, "Please enter a valid phone number");

    // Custom validation method for ZIP codes (allows numbers only)
    $.validator.addMethod("zipCode", function(value, element) {
        return this.optional(element) || /^\+?[0-9]+$/.test(value);
    }, "Please enter a valid ZIP code");
    
    // Custom validation method for password strength
    $.validator.addMethod("strongPassword", function(value, element) {
        return this.optional(element) || 
            /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
    }, "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character");
    
    // Register form validation
    $("#register-form").validate({
        rules: {
            "first_name": {
                required: true,
                minlength: 2
            },
            "last_name": {
                required: true,
                minlength: 2
            },
            "email": {
                required: true,
                email: true,
                noSpaces: true
            },
            "contact_number": {
                required: true,
                phoneNumber: true,
                noSpaces: true
            },
            "password": {
                required: true,
                minlength: 6,
                noSpaces: true
            },
            "confirm_password": {
                required: true,
                equalTo: "#reg-password",
                noSpaces: true
            }
        },
        messages: {
            "first_name": {
                required: "Please enter your first name",
                minlength: "First name must be at least 2 characters long"
            },
            "last_name": {
                required: "Please enter your last name",
                minlength: "Last name must be at least 2 characters long"
            },
            "email": {
                required: "Please enter your email address",
                email: "Please enter a valid email address",
                noSpaces: "Spaces are not allowed in email"
            },
            "contact_number": {
                required: "Please enter your contact number",
                phoneNumber: "Please enter a valid phone number (only + and numbers allowed)"
            },
            "password": {
                required: "Please enter a password",
                minlength: "Password must be at least 6 characters long",
                noSpaces: "Spaces are not allowed in password"
            },
            "confirm_password": {
                required: "Please confirm your password",
                equalTo: "Passwords do not match",
                noSpaces: "Spaces are not allowed in confirm password"
            }
        },
        errorClass: "error",
        validClass: "valid",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            // Form is valid, submit via AJAX
            submitRegistrationForm(form);
            return false; // Prevent default form submission
        }
    });
    
    // Keyup validation for email field
    $("#reg-email").on("keyup", function() {
        $(this).valid();
    });
    
    // Disable space keypress on specific fields
    $("#reg-email, #reg-contact, #reg-password, #reg-confirm-password").on("keypress", function(e) {
        // Prevent space key (keyCode 32)
        if (e.which === 32) {
            e.preventDefault();
            return false;
        }
    });
    
    // Reset form validation when opening register modal
    function resetRegisterFormValidation() {
        $("#register-form").validate().resetForm();
        $("#register-form").find('input').removeClass('error valid');
    }
    
    // Make reset function globally available
    window.resetRegisterFormValidation = resetRegisterFormValidation;
    
    // AJAX form submission function
    function submitRegistrationForm(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        
        // Show loading state
        submitBtn.textContent = 'Creating Account...';
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
                    showMessage('register-message', response.message, 'success');
                    // Reset form
                    form.reset();
                    resetRegisterFormValidation();
                    // Close modal after 2 seconds
                    setTimeout(function() {
                        closeModal('register-modal');
                    }, 2000);
                } else {
                    // Show error message
                    showMessage('register-message', response.message, 'error');
                }
            },
            error: function(xhr, status, error) {
                // Show error message
                showMessage('register-message', 'Registration failed. Please try again.', 'error');
            },
            complete: function() {
                // Reset button state
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        });
    }
    
    // Function to show messages
    function showMessage(elementId, message, type) {
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
    
    // Make functions globally available
    window.submitRegistrationForm = submitRegistrationForm;
    window.showMessage = showMessage;
});
