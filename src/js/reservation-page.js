(function($){
  if (typeof $ === 'undefined') return;
  $(function () {
    function showError(id, msg) { $(id).text(msg).removeClass('hidden'); }
    function hideError(id) { $(id).addClass('hidden').text(''); }
    function isNameValid(name) { return /^[A-Za-z\s'\-]{2,}$/.test((name||'').trim()); }
    function isEmailValid(email) { return /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test((email||'').trim()); }
    function isPhoneValid(phone) { return /^\d{10,13}$/.test((phone||'').trim()); }
    function isDateValid(date) {
      if (!date) return false;
      var today = new Date(); today.setHours(0,0,0,0);
      var inputDate = new Date(date);
      return inputDate >= today;
    }
    function isTimeValid(time) { return /^([01]\d|2[0-3]):([0-5]\d)$/.test(time||''); }
    function isGuestsValid(guests) { return /^\d+$/.test(guests||'') && parseInt(guests,10) >= 1; }
    function isMessageValid(msg) { var t=(msg||'').trim(); return t.length === 0 || t.length >= 10; }

    $('#reservation-form input, #reservation-form textarea').on('blur change', function(){
      validateField($(this).attr('id'));
    });

    function validateField(fieldId){
      var val = $('#' + fieldId).val();
      switch(fieldId){
        case 'res-name': isNameValid(val) ? hideError('#res-name-error') : showError('#res-name-error', 'Please enter a valid name (letters, spaces, apostrophes, hyphens, min 2 characters).'); break;
        case 'res-email': isEmailValid(val) ? hideError('#res-email-error') : showError('#res-email-error', 'Please enter a valid email address.'); break;
        case 'res-phone': isPhoneValid(val) ? hideError('#res-phone-error') : showError('#res-phone-error', 'Enter a valid phone number (10–13 digits).'); break;
        case 'res-date': isDateValid(val) ? hideError('#res-date-error') : showError('#res-date-error', 'Date must not be in the past.'); break;
        case 'res-time': isTimeValid(val) ? hideError('#res-time-error') : showError('#res-time-error', 'Enter a valid time (HH:MM).'); break;
        case 'res-guests': isGuestsValid(val) ? hideError('#res-guests-error') : showError('#res-guests-error', 'Number of guests must be at least 1.'); break;
        case 'res-message': isMessageValid(val) ? hideError('#res-message-error') : showError('#res-message-error', 'Message must be at least 10 characters if filled.'); break;
      }
    }

    $('#reservation-form').on('submit', function(e){
      var valid = true;
      var name = $('#res-name').val();
      var email = $('#res-email').val();
      var phone = $('#res-phone').val();
      var date = $('#res-date').val();
      var time = $('#res-time').val();
      var guests = $('#res-guests').val();
      var message = $('#res-message').val();

      if (!isNameValid(name)) { showError('#res-name-error', 'Please enter a valid name (letters, spaces, apostrophes, hyphens, min 2 characters).'); valid = false; } else { hideError('#res-name-error'); }
      if (!isEmailValid(email)) { showError('#res-email-error', 'Please enter a valid email address.'); valid = false; } else { hideError('#res-email-error'); }
      if (!isPhoneValid(phone)) { showError('#res-phone-error', 'Enter a valid phone number (10–13 digits).'); valid = false; } else { hideError('#res-phone-error'); }
      if (!isDateValid(date)) { showError('#res-date-error', 'Date must not be in the past.'); valid = false; } else { hideError('#res-date-error'); }
      if (!isTimeValid(time)) { showError('#res-time-error', 'Enter a valid time (HH:MM).'); valid = false; } else { hideError('#res-time-error'); }
      if (!isGuestsValid(guests)) { showError('#res-guests-error', 'Number of guests must be at least 1.'); valid = false; } else { hideError('#res-guests-error'); }
      if (!isMessageValid(message)) { showError('#res-message-error', 'Message must be at least 10 characters if filled.'); valid = false; } else { hideError('#res-message-error'); }

      if (!valid) { e.preventDefault(); }
    });
  });
})(window.jQuery);
