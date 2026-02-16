<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <h2 class="display-4 mb-4 text-center">Your Shopping Cart</h2>
    
    <div class="row">
        <div class="col-lg-8">
            <div id="cart-items-container">
                <!-- Cart items will be injected here by JavaScript -->
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 d-flex justify-content-between">
                <a href="products.php" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                </a>
                <button onclick="clearCart()" class="btn btn-outline-danger">
                    <i class="fas fa-trash-alt me-2"></i>Clear Cart
                </button>
            </div>
        </div>
        
        <div class="col-lg-4 mt-5 mt-lg-0">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h4 class="mb-4">Order Summary</h4>
                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <span id="cart-subtotal">$0.00</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Delivery</span>
                    <span class="text-success">FREE</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4">
                    <span class="fw-bold h5">Total</span>
                    <span class="fw-bold h5 text-primary" id="cart-total">$0.00</span>
                </div>
                
                <a href="checkout.php" id="checkout-btn" class="btn btn-primary btn-lg w-100 disabled">
                    Proceed to Checkout
                </a>
                
                <div class="mt-4 text-center">
                    <p class="small text-muted mb-0"><i class="fas fa-lock me-2"></i>Secure ordering & privacy</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    displayCartItems();
});

function displayCartItems() {
    const container = document.getElementById('cart-items-container');
    const subtotalEl = document.getElementById('cart-subtotal');
    const totalEl = document.getElementById('cart-total');
    const checkoutBtn = document.getElementById('checkout-btn');
    
    if (cart.length === 0) {
        container.innerHTML = `
            <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                <i class="fas fa-shopping-basket fa-4x text-muted mb-3"></i>
                <h3>Your cart is empty</h3>
                <p class="text-muted">Looks like you haven't added anything to your cart yet.</p>
                <a href="products.php" class="btn btn-primary mt-3">Start Shopping</a>
            </div>
        `;
        subtotalEl.innerText = '$0.00';
        totalEl.innerText = '$0.00';
        checkoutBtn.classList.add('disabled');
        return;
    }
    
    let html = '';
    let total = 0;
    
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        
        html += `
            <div class="card border-0 shadow-sm rounded-4 mb-3 p-3">
                <div class="row align-items-center">
                    <div class="col-3 col-md-2">
                        <img src="${item.image || 'https://placehold.co/100'}" class="img-fluid rounded-3" alt="${item.name}">
                    </div>
                    <div class="col-9 col-md-5">
                        <h5 class="mb-1">${item.name}</h5>
                        <p class="text-muted small mb-0">$${item.price.toFixed(2)} each</p>
                    </div>
                    <div class="col-6 col-md-3 mt-3 mt-md-0">
                        <div class="input-group input-group-sm" style="width: 120px;">
                            <button class="btn btn-outline-secondary" onclick="updateQuantity(${item.id}, -1)">-</button>
                            <input type="text" class="form-control text-center bg-white" value="${item.quantity}" readonly>
                            <button class="btn btn-outline-secondary" onclick="updateQuantity(${item.id}, 1)">+</button>
                        </div>
                    </div>
                    <div class="col-4 col-md-1 text-end mt-3 mt-md-0">
                        <span class="fw-bold">$${itemTotal.toFixed(2)}</span>
                    </div>
                    <div class="col-2 col-md-1 text-end mt-3 mt-md-0">
                        <button class="btn btn-link text-danger" onclick="removeFromCart(${item.id})">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
    subtotalEl.innerText = `$${total.toFixed(2)}`;
    totalEl.innerText = `$${total.toFixed(2)}`;
    checkoutBtn.classList.remove('disabled');
}

function updateQuantity(id, delta) {
    const item = cart.find(i => i.id === id);
    if (item) {
        item.quantity += delta;
        if (item.quantity <= 0) {
            removeFromCart(id);
        } else {
            saveCart();
            displayCartItems();
            updateCartIcon();
        }
    }
}

function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    saveCart();
    displayCartItems();
    updateCartIcon();
}

function clearCart() {
    if (confirm('Are you sure you want to clear your cart?')) {
        cart = [];
        saveCart();
        displayCartItems();
        updateCartIcon();
    }
}
</script>

<?php include 'includes/footer.php'; ?>
