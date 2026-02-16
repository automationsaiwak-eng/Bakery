<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <h2 class="display-4 mb-4 text-center">Checkout</h2>
    
    <div class="row">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-4">
                <h4 class="mb-4">Billing & Delivery Details</h4>
                <form id="checkout-form" action="place_order.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="customer_name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="customer_phone" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Delivery Address</label>
                            <textarea name="customer_address" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Order Notes (Optional)</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="e.g. Please ring the doorbell..."></textarea>
                        </div>
                    </div>
                    
                    <!-- Hidden input for cart data -->
                    <input type="hidden" name="cart_data" id="cart-data-input">
                </form>
            </div>
        </div>
        
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-light">
                <h4 class="mb-4">Order Review</h4>
                <div id="checkout-summary">
                    <!-- Summary items will be injected by JS -->
                </div>
                
                <hr>
                
                <div class="d-flex justify-content-between mb-4">
                    <span class="fw-bold h5">Total Amount</span>
                    <span class="fw-bold h5 text-primary" id="checkout-total">$0.00</span>
                </div>
                
                <div class="alert alert-info small">
                    <i class="fas fa-info-circle me-2"></i>We currently only accept <strong>Cash on Delivery</strong> and <strong>WhatsApp Ordering</strong>.
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" form="checkout-form" class="btn btn-primary btn-lg">
                        Place Order (Cash on Delivery)
                    </button>
                    <button type="button" onclick="placeWhatsAppOrder()" class="btn btn-success btn-lg">
                        <i class="fab fa-whatsapp me-2"></i>Order via WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    if (cart.length === 0) {
        window.location.href = 'products.php';
        return;
    }
    
    displayCheckoutSummary();
    
    // Prepare cart data for form submission
    document.getElementById('cart-data-input').value = JSON.stringify(cart);
});

function displayCheckoutSummary() {
    const summaryContainer = document.getElementById('checkout-summary');
    const totalEl = document.getElementById('checkout-total');
    
    let html = '';
    let total = 0;
    
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        html += `
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">${item.quantity}x ${item.name}</span>
                <span>$${itemTotal.toFixed(2)}</span>
            </div>
        `;
    });
    
    summaryContainer.innerHTML = html;
    totalEl.innerText = `$${total.toFixed(2)}`;
}

function placeWhatsAppOrder() {
    const name = document.querySelector('input[name="customer_name"]').value;
    const phone = document.querySelector('input[name="customer_phone"]').value;
    const address = document.querySelector('textarea[name="customer_address"]').value;
    
    if (!name || !phone || !address) {
        alert('Please fill in your delivery details first!');
        return;
    }
    
    let message = `*New Order from Deluxe Bakery*%0A%0A`;
    message += `*Customer:* ${name}%0A`;
    message += `*Phone:* ${phone}%0A`;
    message += `*Address:* ${address}%0A%0A`;
    message += `*Items:*%0A`;
    
    let total = 0;
    cart.forEach(item => {
        message += `- ${item.quantity}x ${item.name} ($${(item.price * item.quantity).toFixed(2)})%0A`;
        total += item.price * item.quantity;
    });
    
    message += `%0A*Total Amount: $${total.toFixed(2)}*%0A`;
    message += `%0AThank you!`;
    
    const whatsappUrl = `https://wa.me/1234567890?text=${message}`;
    window.open(whatsappUrl, '_blank');
}
</script>

<?php include 'includes/footer.php'; ?>
