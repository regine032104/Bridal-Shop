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
  <main class="mx-auto max-w-screen-xl px-4 py-8 justify-center"> ">
    <section class="mb-12 card grid grid-cols-1 gap-6 ">
      <div>
        <h3 class="mb-2 text-lg font-semibold text-slate-900 sm:text-xl">
          Reservation Form
        </h3>
        <p class="mb-4 text-sm font-Unna text-slate-700 sm:text-base">
          Fill in your details below to schedule your visit. We’ll confirm your reservation via email.
        </p>

        <form id="reservation-form" class="space-y-4" novalidate>
          <div>
            <label for="res-name" class="form-label text-slate-900">Full Name <span
                class="text-red-500">*</span></label>
            <input id="res-name" name="name" value="<?php echo htmlspecialchars($user_name); ?>" autocomplete="name"
              class="form-input" />
          </div>

          <div>
            <label for="res-email" class="form-label text-slate-900">Email <span class="text-red-500">*</span></label>
            <input id="res-email" name="email" value="<?php echo htmlspecialchars($user_email); ?>" autocomplete="email"
              class="form-input" />
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="res-date" class="form-label text-slate-900">Preferred Date <span
                  class="text-red-500">*</span></label>
              <input type="date" id="res-date" name="date" class="form-input" />
            </div>
            <div>
              <label for="res-time" class="form-label text-slate-900">Preferred Time <span
                  class="text-red-500">*</span></label>
              <input type="time" id="res-time" name="time" class="form-input" />
            </div>
          </div>

          <div>
            <label for="res-service" class="form-label text-slate-900">Service Type <span
                class="text-red-500">*</span></label>
            <select id="res-service" name="service" class="form-input">
              <option value="" disabled selected>Select a service</option>
              <option value="fitting">Fitting Appointment</option>
              <option value="consultation">Style Consultation</option>
              <option value="custom-design">Custom Design Request</option>
            </select>
          </div>

          <div>
            <label for="res-notes" class="form-label text-slate-900">Additional Notes</label>
            <textarea id="res-notes" name="notes" class="form-input h-32 resize-none"></textarea>
          </div>

          <button type="submit" class="btn-primary w-full text-white hover:text-slate-900">
            Submit Reservation
          </button>
        </form>
      </div>

</div>
</div>
</section>
</main>

<?php
renderFooter([
  'scripts' => [
    '<script src="https://unpkg.com/motion@latest/dist/motion.umd.js"></script>',
    '<script src="../js/main.js"></script>',
    '<script src="../js/validation-integration.js"></script>',
    '<script src="../js/auth.js"></script>',
    '<script src="../js/reveal.js"></script>',
    '<script src="../js/reviews.js"></script>'
  ]
]);
?>