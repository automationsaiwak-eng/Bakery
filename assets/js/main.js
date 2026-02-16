// Cart Management
let cart = JSON.parse(localStorage.getItem('bakery_cart')) || [];

function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    if (cartCount) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.innerText = totalItems;
    }
}

function addToCart(productId, name, price, image) {
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: productId,
            name: name,
            price: price,
            image: image,
            quantity: 1
        });
    }
    
    saveCart();
    updateCartIcon();
    alert(name + " added to cart!");
}

function saveCart() {
    localStorage.setItem('bakery_cart', JSON.stringify(cart));
}

function updateCartIcon() {
    updateCartCount();
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    updateCartIcon();
});
