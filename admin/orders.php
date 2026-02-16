<?php include 'header.php'; ?>

<?php
// Handle Status Update
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];
    $stmt = $pdo->prepare("UPDATE orders SET order_status = ? WHERE id = ?");
    $stmt->execute([$new_status, $order_id]);
    echo "<script>alert('Status updated!');</script>";
}

$status_filter = isset($_GET['status']) ? $_GET['status'] : '';

if ($status_filter) {
    $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_status = ? ORDER BY created_at DESC");
    $stmt->execute([$status_filter]);
} else {
    $stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
}
$orders = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">Order Management</h3>
    <div class="btn-group">
        <a href="orders.php" class="btn btn-outline-secondary <?php echo !$status_filter ? 'active' : ''; ?>">All</a>
        <a href="orders.php?status=pending" class="btn btn-outline-secondary <?php echo $status_filter == 'pending' ? 'active' : ''; ?>">Pending</a>
        <a href="orders.php?status=processing" class="btn btn-outline-secondary <?php echo $status_filter == 'processing' ? 'active' : ''; ?>">Processing</a>
        <a href="orders.php?status=completed" class="btn btn-outline-secondary <?php echo $status_filter == 'completed' ? 'active' : ''; ?>">Completed</a>
    </div>
</div>

<div class="row g-4">
    <?php if (empty($orders)): ?>
        <div class="col-12">
            <div class="admin-card text-center py-5">
                <i class="fas fa-shopping-basket fa-3x text-muted mb-3"></i>
                <p class="text-muted">No orders found.</p>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($orders as $order): ?>
            <div class="col-12">
                <div class="admin-card p-4">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <h5 class="mb-0 fw-bold">Order #<?php echo $order['id']; ?></h5>
                            <small class="text-muted"><?php echo date('M d, H:i', strtotime($order['created_at'])); ?></small>
                        </div>
                        <div class="col-md-3">
                            <h6 class="mb-1"><?php echo htmlspecialchars($order['customer_name']); ?></h6>
                            <p class="mb-0 small text-muted"><i class="fas fa-phone me-1"></i><?php echo htmlspecialchars($order['customer_phone']); ?></p>
                        </div>
                        <div class="col-md-3">
                            <p class="mb-0 small text-muted"><i class="fas fa-map-marker-alt me-1"></i><?php echo htmlspecialchars($order['customer_address']); ?></p>
                        </div>
                        <div class="col-md-1">
                            <h6 class="mb-0 fw-bold">$<?php echo number_format($order['total_amount'], 2); ?></h6>
                        </div>
                        <div class="col-md-3">
                            <form action="" method="POST" class="d-flex gap-2">
                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                <select name="status" class="form-select form-select-sm">
                                    <option value="pending" <?php echo $order['order_status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="processing" <?php echo $order['order_status'] == 'processing' ? 'selected' : ''; ?>>Processing</option>
                                    <option value="completed" <?php echo $order['order_status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                    <option value="cancelled" <?php echo $order['order_status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                </select>
                                <button type="submit" name="update_status" class="btn btn-primary btn-sm">Update</button>
                                <a href="order_view.php?id=<?php echo $order['id']; ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-eye"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
    document.getElementById('nav-orders').classList.add('active');
    document.getElementById('page-title').innerText = 'Order History';
</script>

<?php include 'footer.php'; ?>
