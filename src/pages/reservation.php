<?php
require_once('../backend/session_check.php');
$isLoggedIn = isLoggedIn();

// Get user data directly from session for consistency
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;
require_once('../layouts/app.php');
renderHeader([
  'title' => 'About - Promise',
  'isLoggedIn' => $isLoggedIn,
  'bodyClass' => 'flex min-h-screen flex-col bg-white',
  'mainClass' => 'flex-1'
]);
// HERO
$title = "BOOK YOUR";
$highlight = 'RESERVATION';
$subtitle = "Reserve your appointment with Promise Atelier for fittings, consultations, or custom designs.";
$extra_class = "py-32";

include('../components/hero.html');
?>

<div class="mx-auto max-w-screen-xl px-4 py-20">

  <!-- Reservation Form -->
  <section class="mb-12 card grid grid-cols-1 gap-6">
    <div>
      <h3 class="mb-2 text-lg font-semibold text-slate-900 sm:text-xl">Reservation Form</h3>
      <p class="mb-4 text-sm font-Unna text-slate-700 sm:text-base">Fill in your details below to schedule your visit.
        We’ll confirm your reservation via email.</p>
      <form id="reservation-form" action="" method="POST" class="space-y-4" novalidate>
        <div>
          <label for="res-name" class="block text-slate-900 font-medium mb-1">Full Name <span
              class="text-red-500">*</span></label>
          <input id="res-name" name="name" type="text" required minlength="2" autocomplete="name"
            placeholder="Your full name" value="<?php echo htmlspecialchars($user_name); ?>"
            class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
          <p class="text-red-500 text-sm mt-1 hidden" id="res-name-error"></p>
        </div>
        <div>
          <label for="res-email" class="block text-slate-900 font-medium mb-1">Email <span
              class="text-red-500">*</span></label>
          <input id="res-email" name="email" type="email" required autocomplete="email" placeholder="you@email.com"
            value="<?php echo htmlspecialchars($user_email); ?>"
            class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
          <p class="text-red-500 text-sm mt-1 hidden" id="res-email-error"></p>
        </div>
        <div>
          <label for="res-phone" class="block text-slate-900 font-medium mb-1">Phone Number <span
              class="text-red-500">*</span></label>
          <input id="res-phone" name="phone" type="text" required maxlength="13" minlength="10"
            placeholder="e.g. 09123456789"
            class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
          <p class="text-red-500 text-sm mt-1 hidden" id="res-phone-error"></p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="res-date" class="block text-slate-900 font-medium mb-1">Date <span
                class="text-red-500">*</span></label>
            <input id="res-date" name="date" type="date" required
              class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <p class="text-red-500 text-sm mt-1 hidden" id="res-date-error"></p>
          </div>
          <div>
            <label for="res-time" class="block text-slate-900 font-medium mb-1">Time <span
                class="text-red-500">*</span></label>
            <input id="res-time" name="time" type="time" required
              class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <p class="text-red-500 text-sm mt-1 hidden" id="res-time-error"></p>
          </div>
        </div>
        <div>
          <label for="res-guests" class="block text-slate-900 font-medium mb-1">Number of Guests <span
              class="text-red-500">*</span></label>
          <input id="res-guests" name="guests" type="number" required min="1" placeholder="e.g. 1"
            class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
          <p class="text-red-500 text-sm mt-1 hidden" id="res-guests-error"></p>
        </div>
        <div>
          <label for="res-message" class="block text-slate-900 font-medium mb-1">Message (optional)</label>
          <textarea id="res-message" name="message" rows="3"
            placeholder="Additional details (min 10 characters if filled)"
            class="w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400 resize-none"></textarea>
          <p class="text-red-500 text-sm mt-1 hidden" id="res-message-error"></p>
        </div>
        <button type="submit" class="w-full bg-pink-500 text-white py-2 rounded-xl hover:bg-pink-600 transition">Submit
          Reservation</button>
      </form>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(function () {
      function showError(id, msg) {
        $(id).text(msg).removeClass('hidden');
      }
      function hideError(id) {
        $(id).addClass('hidden').text('');
      }
      function isNameValid(name) {
        return /^[A-Za-z\s'\-]{2,}$/.test(name.trim());
      }
      function isEmailValid(email) {
        return /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test(email.trim());
      }
      function isPhoneValid(phone) {
        return /^\d{10,13}$/.test(phone.trim());
      }
      function isDateValid(date) {
        if (!date) return false;
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        var inputDate = new Date(date);
        return inputDate >= today;
      }
      function isTimeValid(time) {
        return /^([01]\d|2[0-3]):([0-5]\d)$/.test(time);
      }
      function isGuestsValid(guests) {
        return /^\d+$/.test(guests) && parseInt(guests) >= 1;
      }
      function isMessageValid(msg) {
        return msg.trim().length === 0 || msg.trim().length >= 10;
      }

      $('#reservation-form input, #reservation-form textarea').on('blur change', function () {
        validateField($(this).attr('id'));
      });

      function validateField(fieldId) {
        var val = $('#' + fieldId).val();
        switch (fieldId) {
          case 'res-name':
            isNameValid(val) ? hideError('#res-name-error') : showError('#res-name-error', 'Please enter a valid name (letters, spaces, apostrophes, hyphens, min 2 characters).');
            break;
          case 'res-email':
            isEmailValid(val) ? hideError('#res-email-error') : showError('#res-email-error', 'Please enter a valid email address.');
            break;
          case 'res-phone':
            isPhoneValid(val) ? hideError('#res-phone-error') : showError('#res-phone-error', 'Enter a valid phone number (10–13 digits).');
            break;
          case 'res-date':
            isDateValid(val) ? hideError('#res-date-error') : showError('#res-date-error', 'Date must not be in the past.');
            break;
          case 'res-time':
            isTimeValid(val) ? hideError('#res-time-error') : showError('#res-time-error', 'Enter a valid time (HH:MM).');
            break;
          case 'res-guests':
            isGuestsValid(val) ? hideError('#res-guests-error') : showError('#res-guests-error', 'Number of guests must be at least 1.');
            break;
          case 'res-message':
            isMessageValid(val) ? hideError('#res-message-error') : showError('#res-message-error', 'Message must be at least 10 characters if filled.');
            break;
        }
      }

      $('#reservation-form').on('submit', function (e) {
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

        if (!valid) {
          e.preventDefault();
        }
      });
    });
  </script>

  <?php
  renderFooter([
    'scripts' => [
      '<script src="https://unpkg.com/motion@latest/dist/motion.umd.js"></script>',
      '<script src="../js/main.js"></script>',
      '<script src="../js/validation-integration.js"></script>',
      '<script src="../js/auth.js"></script>',
      '<script src="../js/reveal.js"></script>',
      '<script src="../js/scroll-fade.js"></script>',
      '<script src="../js/reviews.js"></script>'
    ]
  ]);
  ?>