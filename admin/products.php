<?php include 'header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Manage Menu</h3>
    <a href="product_add.php" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Product
    </a>
</div>

<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $products = $pdo->query("SELECT * FROM products ORDER BY category, name")->fetchAll();
                if (empty($products)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">No products found. Add your first item!</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td>
                                <img src="<?php echo htmlspecialchars($product['image'] ? $product['image'] : 'https://placehold.co/50'); ?>" class="rounded" alt="Thumb" style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td class="fw-bold"><?php echo htmlspecialchars($product['name']); ?></td>
                            <td><span class="badge bg-outline-primary text-primary border border-primary"><?php echo htmlspecialchars($product['category']); ?></span></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                            <td>
                                <?php if ($product['is_active']): ?>
                                    <span class="badge bg-success">Active</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="product_edit.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="product_delete.php?id=<?php echo $product['id']; ?>" class="btn btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('nav-products').classList.add('active');
    document.getElementById('page-title').innerText = 'Product Management';
</script>

<?php include 'footer.php'; ?>
