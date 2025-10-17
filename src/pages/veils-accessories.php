<?php
require_once('../backend/session_check.php');
require_once('../backend/connections.php');

$isLoggedIn = isLoggedIn();

$stmt = $pdo->prepare('SELECT * FROM products WHERE product_id > 6 ORDER BY date_added DESC');
$stmt->execute();
$accessory_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_accessories = count($accessory_products);

require_once('../layouts/app.php');

renderHeader([
    'title' => 'Veils and Accessories - Promise Shop',
    'isLoggedIn' => $isLoggedIn,
    'bodyClass' => 'flex min-h-screen flex-col bg-white',
    'mainClass' => 'flex-1'
]);
?>

<section class="mx-auto max-w-screen-xl px-4 py-10">
    <div class="w-full">
        <!-- Breadcrumbs -->
        <nav class="mb-6">
          <ol class="flex items-center space-x-2 text-sm text-slate-700">
            <li><a href="../pages/home.php" class="hover:text-pink-500">Home</a></li>
            <li class="text-gray-400">/</li>
            <li><a href="../pages/collections.php" class="hover:text-pink-500">Collections</a></li>
            <li class="text-slate-700">/</li>
            <li class="text-slate-700 font-medium">Veils and Accessories</li>
          </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="font-Tinos text-4xl text-slate-900 mb-4">Veils and Accessories</h1>
        
        <!-- Results and Sort -->
        <div class="flex items-center justify-between mb-8">
          <p class="text-slate-700">Showing 1-<?=min(9, $total_accessories)?> of <?=$total_accessories?> results</p>
          <div class="flex items-center gap-4">
            <!-- Sort Dropdown -->
            <select class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-candy-peach focus:border-candy-peach">
              <option>Default sorting</option>
              <option>Sort by popularity</option>
              <option>Sort by average rating</option>
              <option>Sort by latest</option>
              <option>Sort by price: low to high</option>
              <option>Sort by price: high to low</option>
            </select>
          </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php if (empty($accessory_products)): ?>
            <div class="col-span-full text-center py-12">
              <h3 class="font-Tinos text-2xl text-slate-900 mb-4">No accessories found</h3>
              <p class="text-slate-700">Check back later for new arrivals!</p>
            </div>
          <?php else: ?>
            <?php foreach ($accessory_products as $product): ?>
              <div class="bg-white rounded-lg shadow-md overflow-hidden border border-candy-lavender transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <div class="relative">
                  <a href="product-detail.php?id=<?=$product['product_id']?>">
                    <img src="../<?=str_replace('src/img/', 'img/', $product['image_path'])?>" alt="<?=htmlspecialchars($product['product_name'])?>" class="w-full h-80 object-cover hover:scale-105 transition-transform duration-300">
                  </a>
                  <div class="absolute top-3 right-3">
                    <button class="bg-white/80 hover:bg-white rounded-full p-2 text-pink-500 transition-colors">
                      ♡
                    </button>
                  </div>
                </div>
                <div class="p-6 text-center">
                  <h3 class="font-Tinos text-xl text-pink-950 mb-2">
                    <a href="product-detail.php?id=<?=$product['product_id']?>" class="hover:text-pink-800 transition-colors">
                      <?=htmlspecialchars($product['product_name'])?>
                    </a>
                  </h3>
                  <p class="text-slate-700 text-sm mb-2">
                    <?=htmlspecialchars(substr($product['description'], 0, 80))?>...
                  </p>
                  <p class="text-slate-900  text-xs mb-4">
                    Material: <?=htmlspecialchars($product['material'])?>
                  </p>
                  <p class="font-Unna-bold text-slate-900 text-lg font-semibold"><?=format_price($product['price'])?></p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>


        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
          <nav class="flex items-center space-x-2">
            <button class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-candy-peach">←</button>
            <button class="px-3 py-2 text-sm font-medium bg-candy-peach text-white rounded-md">1</button>
            <button class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-candy-peach">2</button>
            <button class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-candy-peach">→</button>
          </nav>
        </div>
  </div>
</section>

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
