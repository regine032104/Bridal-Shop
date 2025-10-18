<?php
require_once('../backend/session_check.php');

// Check if user is logged in
if (!isLoggedIn()) {
    header('Location: ../pages/home.php');
    exit;
}

// Get user data directly from session to avoid function issues
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;

// Validate session data
if (!$user_id || !$user_name || !$user_email) {
    // Clear invalid session and redirect
    session_destroy();
    header('Location: ../pages/home.php');
    exit;
}

// Get user's full data from database
require_once('../backend/connections.php');
$stmt = $pdo->prepare("SELECT * FROM customers WHERE customer_id = ?");
$stmt->execute([$user_id]);
$userData = $stmt->fetch();

// Handle address update
$updateMessage = '';
$updateType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_address'])) {
    $street_address = trim($_POST['street_address']);
    $city = trim($_POST['city']);
    $province = trim($_POST['province']);
    $barangay = trim($_POST['barangay']);
    $zip_code = trim($_POST['zip_code']);

    try {
        $updateStmt = $pdo->prepare("UPDATE customers SET street_address=?, city=?, province=?, barangay=?, zip_code=? WHERE customer_id=?");
        $result = $updateStmt->execute([$street_address, $city, $province, $barangay, $zip_code, $user_id]);

        if ($result) {
            $updateMessage = 'Address updated successfully!';
            $updateType = 'success';
            // Refresh user data
            $stmt = $pdo->prepare("SELECT * FROM customers WHERE customer_id = ?");
            $stmt->execute([$user_id]);
            $userData = $stmt->fetch();
        } else {
            $updateMessage = 'Failed to update address. Please try again.';
            $updateType = 'error';
        }
    } catch (PDOException $e) {
        $updateMessage = 'Database error: ' . $e->getMessage();
        $updateType = 'error';
    }
}
?>
<?php
require_once('../layouts/app.php');

renderHeader([
    'title' => 'Profile Settings - Promise Shop',
    'isLoggedIn' => true,
    'bodyClass' => 'flex min-h-screen flex-col bg-neutral-50',
    'mainClass' => 'flex-1 py-16 md:py-20'
]);
?>

<div class="mx-auto max-w-screen-xl px-4">
    <div class="mb-12 text-center">
        <h1
            class="font-Tinos text-center text-2xl leading-none tracking-widest text-slate-900 uppercase md:tracking-[0.6em] lg:tracking-[0.8em]">
            Profile Settings</h1>
        <p class="mx-auto max-w-3xl py-5 text-slate-700">Manage your account information and shipping address.</p>
    </div>

    <?php if ($updateMessage && $updateType === 'success'): ?>
        <div class="mb-8 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
            <?= htmlspecialchars($updateMessage); ?>
        </div>
    <?php elseif ($updateMessage): ?>
        <div class="mb-8 rounded-lg border border-red-200 bg-red-50 p-4 text-red-700">
            <?= htmlspecialchars($updateMessage); ?>
        </div>
    <?php endif; ?>

    <div class="grid gap-8 lg:grid-cols-2">
        <div class="card">
            <h2 class="mb-6 text-2xl font-semibold text-slate-900">Personal Information</h2>
            <div class="space-y-4 text-neutral">
                <div>
                    <span class="form-label text-slate-700">Full Name</span>
                    <p><?= htmlspecialchars($userData['first_name'] . ' ' . $userData['last_name']); ?></p>
                </div>
                <div>
                    <span class="form-label text-slate-700">Email Address</span>
                    <p><?= htmlspecialchars($userData['email']); ?></p>
                </div>
                <div>
                    <span class="form-label text-slate-700">Phone Number</span>
                    <p><?= htmlspecialchars($userData['contact_number'] ?? 'Not provided'); ?></p>
                </div>
                <div>
                    <span class="form-label text-slate-700">Member Since</span>
                    <p><?= date('F j, Y', strtotime($userData['date_created'])); ?></p>
                </div>
            </div>
        </div>

        <div class="card">
            <h2 class="mb-6 text-2xl font-semibold text-slate-900">Shipping Address</h2>
            <form method="post" class="space-y-4">
                <div>
                    <label for="street_address" class="form-label text-slate-700">Street Address</label>
                    <input type="text" id="street_address" name="street_address"
                        value="<?= htmlspecialchars($userData['street_address'] ?? ''); ?>" class="form-input"
                        placeholder="Enter your street address" required />
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label for="city" class="form-label text-slate-700">City</label>
                        <input type="text" id="city" name="city"
                            value="<?= htmlspecialchars($userData['city'] ?? ''); ?>" class="form-input"
                            placeholder="Enter city" required />
                    </div>
                    <div>
                        <label for="province" class="form-label text-slate-700">Province</label>
                        <input type="text" id="province" name="province"
                            value="<?= htmlspecialchars($userData['province'] ?? ''); ?>" class="form-input"
                            placeholder="Enter province" required />
                    </div>
                </div>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <label for="barangay" class="form-label text-slate-700">Barangay</label>
                        <input type="text" id="barangay" name="barangay"
                            value="<?= htmlspecialchars($userData['barangay'] ?? ''); ?>" class="form-input"
                            placeholder="Enter barangay" required />
                    </div>
                    <div>
                        <label for="zip_code" class="form-label text-slate-700">ZIP Code</label>
                        <input type="text" id="zip_code" name="zip_code"
                            value="<?= htmlspecialchars($userData['zip_code'] ?? ''); ?>" class="form-input"
                            placeholder="Enter ZIP code" required />
                    </div>
                </div>
                <button type="submit" name="update_address" class="btn-primary hover:text-slate-900 w-full">Update
                    Address</button>
            </form>
        </div>
    </div>

    <div class="mt-8">
        <div class="card">
            <h2 class="mb-6 text-2xl font-semibold text-slate-900">Quick Actions</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <a href="orders.php" class="btn-secondary w-full justify-center">View My Orders</a>
                <button type="button" class="btn-secondary w-full justify-center" onclick="logout()">Logout</button>
            </div>
        </div>
    </div>
</div>

<?php
renderFooter([
    'scripts' => [
        '<script src="https://unpkg.com/motion@latest/dist/motion.umd.js"></script>',
        '<script src="../js/main.js"></script>',
        '<script src="../js/validation-integration.js"></script>',
        '<script src="../js/auth.js"></script>',
        '<script src="../js/reveal.js"></script>',
        '<script src="../js/scroll-fade.js"></script>',
        '<script>function logout(){if(confirm(\'Are you sure you want to logout?\')){window.location.href=\'../backend/logout.php\';}}</script>'

    ]
]);
?>