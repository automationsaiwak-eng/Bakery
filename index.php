<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-3 mb-4">Taste the Magic of Fresh Baking</h1>
                <p class="lead mb-5">From artisanal breads to decadent cakes, we bring you the finest baked goods made with love and tradition. Order online and get them delivered to your doorstep!</p>
                <div class="d-grid d-md-flex justify-content-md-start">
                    <a href="products.php" class="btn btn-primary btn-lg px-4 me-md-2 mb-3 mb-md-0">Order Now</a>
                    <a href="about.php" class="btn btn-secondary btn-lg px-4">Our Story</a>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=2072&auto=format&fit=crop" alt="Bakery Hero" class="img-fluid rounded-shadow" style="border-radius: 30px; box-shadow: 20px 20px 60px #d9d0c4, -20px -20px 60px #ffffff;">
            </div>
        </div>
    </div>
</section>

<!-- Featured Categories -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5">Explore Our Specialties</h2>
            <div class="mx-auto" style="width: 100px; height: 3px; background-color: var(--pastel-pink);"></div>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="category-card p-4">
                    <div class="mb-3">
                        <i class="fas fa-cake-candles fa-3x text-primary"></i>
                    </div>
                    <h3>Cakes</h3>
                    <p>Celebration cakes, cupcakes, and more.</p>
                    <a href="products.php?category=Cakes" class="btn btn-link text-soft-brown fw-bold">View More</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card p-4">
                    <div class="mb-3">
                        <i class="fas fa-bread-slice fa-3x text-primary"></i>
                    </div>
                    <h3>Breads</h3>
                    <p>Sourdough, baguette, and whole grain.</p>
                    <a href="products.php?category=Breads" class="btn btn-link text-soft-brown fw-bold">View More</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card p-4">
                    <div class="mb-3">
                        <i class="fas fa-cookie fa-3x text-primary"></i>
                    </div>
                    <h3>Cookies</h3>
                    <p>Soft, crunchy, and filled delights.</p>
                    <a href="products.php?category=Cookies" class="btn btn-link text-soft-brown fw-bold">View More</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-card p-4">
                    <div class="mb-3">
                        <i class="fas fa-mug-hot fa-3x text-primary"></i>
                    </div>
                    <h3>Pastries</h3>
                    <p>Croissants, danishes, and puffs.</p>
                    <a href="products.php?category=Pastries" class="btn btn-link text-soft-brown fw-bold">View More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Call to Action -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?q=80&w=1926&auto=format&fit=crop" alt="Pastries" class="img-fluid rounded-4">
            </div>
            <div class="col-lg-6 offset-lg-1">
                <h2 class="display-5 mb-4">Freshly Baked Every Morning</h2>
                <p>At Deluxe Bakery, we believe that the best moments start with a crumb of joy. Our bakers start before sunrise to ensure that every loaf of bread and every delicate pastry is at its peak when it reaches you.</p>
                <div class="mt-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <span>100% Organic Ingredients</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <span>Traditional Sourdough Starters</span>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <span>Farm Fresh Dairy Products</span>
                    </div>
                </div>
                <a href="about.php" class="btn btn-outline-dark mt-4">Discover Our Process</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
