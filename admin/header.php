<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
require_once '../includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Deluxe Bakery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #5D4037;
            --accent-color: #F8BBD0;
        }
        body { background-color: #f4f7f6; }
        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: var(--primary-color);
            color: white;
            padding-top: 20px;
            z-index: 1000;
        }
        #sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 0;
        }
        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            color: white;
            background-color: rgba(255,255,255,0.1);
            border-left: 4px solid var(--accent-color);
        }
        #main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
        }
        .admin-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            background: white;
        }
        .stat-card {
            padding: 20px;
            text-align: center;
        }
        .stat-card i {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
    </style>
</head>
<body>

<div id="sidebar">
    <div class="px-4 mb-4">
        <h4 class="fw-bold"><i class="fas fa-bread-slice me-2"></i>Admin</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php" id="nav-dashboard">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="products.php" id="nav-products">
                <i class="fas fa-box me-2"></i>Products
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="orders.php" id="nav-orders">
                <i class="fas fa-shopping-cart me-2"></i>Orders
            </a>
        </li>
        <li class="nav-item mt-4">
            <hr class="mx-3 opacity-25">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../index.php">
                <i class="fas fa-external-link-alt me-2"></i>View Website
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </li>
    </ul>
</div>

<div id="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 id="page-title">Dashboard</h2>
        <div class="user-info">
            <span class="text-muted">Welcome, </span>
            <span class="fw-bold"><?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
        </div>
    </div>
