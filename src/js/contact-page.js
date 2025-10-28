(function($){
  if (typeof $ === 'undefined') return;
  $(function () {
    function showError(id, msg) { $(id).text(msg).removeClass('hidden'); }
    function hideError(id) { $(id).addClass('hidden').text(''); }
    function isNameValid(name) { return /^[A-Za-z\s'\-]{2,}$/.test((name||'').trim()); }
    function isEmailValid(email) { return /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test((email||'').trim()); }
    function isMessageValid(msg) { return (msg||'').trim().length >= 10; }

    $('#contact-form input, #contact-form textarea').on('blur change', function () {
      validateField($(this).attr('id'));
    });

    function validateField(fieldId) {
      var val = $('#' + fieldId).val();
      switch (fieldId) {
        case 'contact-name':
          isNameValid(val) ? hideError('#contact-name-error') : showError('#contact-name-error', 'Please enter a valid name (letters, spaces, apostrophes, hyphens, min 2 characters).');
          break;
        case 'contact-email':
          isEmailValid(val) ? hideError('#contact-email-error') : showError('#contact-email-error', 'Please enter a valid email address.');
          break;
        case 'contact-message':
          isMessageValid(val) ? hideError('#contact-message-error') : showError('#contact-message-error', 'Message must be at least 10 characters.');
          break;
      }
    }

    $('#contact-form').on('submit', function (e) {
      var valid = true;
      var name = $('#contact-name').val();
      var email = $('#contact-email').val();
      var message = $('#contact-message').val();

      if (!isNameValid(name)) { showError('#contact-name-error', 'Please enter a valid name (letters, spaces, apostrophes, hyphens, min 2 characters).'); valid = false; } else { hideError('#contact-name-error'); }
      if (!isEmailValid(email)) { showError('#contact-email-error', 'Please enter a valid email address.'); valid = false; } else { hideError('#contact-email-error'); }
      if (!isMessageValid(message)) { showError('#contact-message-error', 'Message must be at least 10 characters.'); valid = false; } else { hideError('#contact-message-error'); }

      if (!valid) { e.preventDefault(); }
    });
  });
})(window.jQuery);
