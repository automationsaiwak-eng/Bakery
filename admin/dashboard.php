<?php include 'header.php'; ?>

<?php
// Mock stats for now, real stats would come from DB
$total_products = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$total_orders = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$total_revenue = $pdo->query("SELECT SUM(total_amount) FROM orders")->fetchColumn() ?: 0;
$pending_orders = $pdo->query("SELECT COUNT(*) FROM orders WHERE order_status = 'pending'")->fetchColumn();
?>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="admin-card stat-card">
            <i class="fas fa-box"></i>
            <h3><?php echo $total_products; ?></h3>
            <p class="text-muted mb-0">Total Products</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="admin-card stat-card">
            <i class="fas fa-shopping-bag"></i>
            <h3><?php echo $total_orders; ?></h3>
            <p class="text-muted mb-0">Total Orders</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="admin-card stat-card">
            <i class="fas fa-dollar-sign"></i>
            <h3>$<?php echo number_format($total_revenue, 2); ?></h3>
            <p class="text-muted mb-0">Total Revenue</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="admin-card stat-card">
            <i class="fas fa-clock text-warning"></i>
            <h3><?php echo $pending_orders; ?></h3>
            <p class="text-muted mb-0">Pending Orders</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="admin-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Recent Orders</h4>
                <a href="orders.php" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $recent_orders = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC LIMIT 5")->fetchAll();
                        if (empty($recent_orders)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-4">No orders found yet.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recent_orders as $order): ?>
                                <tr>
                                    <td>#<?php echo $order['id']; ?></td>
                                    <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                    <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                                    <td>
                                        <span class="badge bg-<?php 
                                            echo $order['order_status'] == 'completed' ? 'success' : 
                                                ($order['order_status'] == 'pending' ? 'warning' : 'primary'); 
                                        ?>">
                                            <?php echo ucfirst($order['order_status']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('M d, Y', strtotime($order['created_at'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="admin-card p-4 h-100">
            <h4 class="mb-4">Quick Actions</h4>
            <div class="d-grid gap-3">
                <a href="product_add.php" class="btn btn-outline-primary py-3">
                    <i class="fas fa-plus me-2"></i>Add New Product
                </a>
                <a href="products.php" class="btn btn-outline-secondary py-3">
                    <i class="fas fa-edit me-2"></i>Manage Menu
                </a>
                <a href="orders.php?status=pending" class="btn btn-outline-warning py-3">
                    <i class="fas fa-clock me-2"></i>Process Pending Orders
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('nav-dashboard').classList.add('active');
</script>

<?php include 'footer.php'; ?>
