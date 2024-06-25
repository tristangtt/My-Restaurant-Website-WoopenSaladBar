/*   Student Name: Hsin Tang
     File Name: checkout.js
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: This page use for checkout the cart and calculate the total prices */

// Function to calculate the total price and display a simple alert (you can customize this)
function checkout() {
    const totalPrice = calculateTotalPrice();
    alert(`Total Price: $${totalPrice.toFixed(2)}`);
}

function calculateTotalPrice() {
    // Calculate the total price of items in the cart
    let total = 0;

    cart.forEach(item => {
        total += item.totalPrice;
    });

    return total;
}

function reset() {
    cart = [];
    updateCartUI();
}