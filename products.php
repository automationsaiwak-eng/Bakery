<?php 
require_once 'includes/db.php';
include 'includes/header.php'; 

$category = isset($_GET['category']) ? $_GET['category'] : '';

// Fetch products from database
if ($category) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE category = ? AND is_active = 1");
    $stmt->execute([$category]);
} else {
    $stmt = $pdo->query("SELECT * FROM products WHERE is_active = 1");
}
$products = $stmt->fetchAll();
?>

<div class="container py-5">
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <h2 class="display-4"><?php echo $category ? $category : 'Our Products'; ?></h2>
            <p class="text-muted">Freshly baked treats delivered to your door.</p>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="btn-group" role="group">
                <a href="products.php" class="btn btn-outline-primary <?php echo !$category ? 'active' : ''; ?>">All</a>
                <a href="products.php?category=Cakes" class="btn btn-outline-primary <?php echo $category == 'Cakes' ? 'active' : ''; ?>">Cakes</a>
                <a href="products.php?category=Breads" class="btn btn-outline-primary <?php echo $category == 'Breads' ? 'active' : ''; ?>">Breads</a>
                <a href="products.php?category=Cookies" class="btn btn-outline-primary <?php echo $category == 'Cookies' ? 'active' : ''; ?>">Cookies</a>
                <a href="products.php?category=Pastries" class="btn btn-outline-primary <?php echo $category == 'Pastries' ? 'active' : ''; ?>">Pastries</a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <?php if (empty($products)): ?>
            <div class="col-12 text-center py-5">
                <i class="fas fa-cookie-bite fa-4x text-muted mb-3"></i>
                <h3>No products found in this category.</h3>
                <p>We are currently updating our delicious menu. Check back soon!</p>
                <a href="products.php" class="btn btn-primary">Show All Products</a>
            </div>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 category-card shadow-sm border-0">
                        <img src="<?php echo htmlspecialchars($product['image'] ? $product['image'] : 'https://placehold.co/400x300?text=' . urlencode($product['name'])); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>" style="height: 200px; object-fit: crop;">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <span class="badge bg-light text-dark">$<?php echo number_format($product['price'], 2); ?></span>
                            </div>
                            <p class="card-text text-muted small flex-grow-1"><?php echo htmlspecialchars($product['description']); ?></p>
                            <button onclick="addToCart(<?php echo $product['id']; ?>, '<?php echo addslashes($product['name']); ?>', <?php echo $product['price']; ?>, '<?php echo htmlspecialchars($product['image']); ?>')" class="btn btn-primary w-100 mt-3">
                                <i class="fas fa-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
