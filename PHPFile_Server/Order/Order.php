<!-- Student Name: Hsin Tang
     File Name: Order.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: This page used for customer older the item from the restaurent-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Group8">
        <link rel="stylesheet" href="../../CSSFiles/Style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Woopen Salad Bar - Order</title>
    </head>

    <body>
        <!--Header-->
        <div class="header">
            <div class="logo-container">
                <img src="../../images/logo.png" alt="Salad logo" >
            </div>

            <div class="header-right">
                <!-- Navigation -->
                <a href="../../HTMLFiles/index.html">Home</a>
                <a href="../../HTMLFiles/Menu.html">Menu</a>
                <a href="Order.php">Order</a>
                <a href="../Contact/Contact.php">Contact</a>
                <a href="../Register/Register.php">Register</a>
            </div>
        </div> <hr>

        <div class = "finditem">
            
            <div class="filter">
                <label for="categoryFilter">Filter by Category:</label>
                <select id="categoryFilter" onchange="filterMenu()">
                    <option value="">All Categories</option>
                </select>
            </div>

            <div class="search">
                <label>Search:</label>
                <input type="text" id="searchInput" placeholder="Search by item name">
                <button onclick="searchItems()">Search</button>
                <script src="../../JScripts/Order/search.js"></script>
            </div>
        </div>

        <main>
            <div id="menu-container"></div> 

            <div id="cart-container">
                <h2>Your Cart</h2>
                <ul id="cart"></ul>
                <button id="pay" onclick="checkout()">Checkout</button>
                <button id="reset" onclick="reset()">reset</button>
                <script src="../../JScripts/Order/checkout.js"></script>
            </div>
        </main>

        <!-- Contact Area -->
        <div class = "contact">  
            <p>Follow Us<p>
            <div class="contact-icon">
                <!-- social media icons-->
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>© 2024 Group8. All rights reserved.</p>
        </footer>   

        <script>
            // Assume this variable is defined globally or within the appropriate scope
            let cart = [];

            function addToCart(menuItemName, itemPrice) {
                const existingItem = cart.find(item => item.name === menuItemName);

                if (existingItem) {
                    existingItem.quantity++;
                    existingItem.totalPrice = existingItem.quantity * itemPrice;
                } else {
                    const newItem = {
                        name: menuItemName,
                        quantity: 1,
                        totalPrice: itemPrice
                    };
                    cart.push(newItem);
                }

                // Update the UI to reflect the changes
                updateCartUI();
            }

            function updateCartUI() {
                const cartElement = document.getElementById('cart');

                // Clear the existing content
                cartElement.innerHTML = '';

                // Display each item in the cart
                cart.forEach(item => {
                    const cartItemElement = document.createElement('li');
                    cartItemElement.innerHTML = `
                        ${item.quantity} x ${item.name} - $${item.totalPrice.toFixed(2)}
                        <button onclick="removeFromCart('${item.name}')">Remove from Cart</button>
                    `;
                    cartElement.appendChild(cartItemElement);
                });
            }

            function removeFromCart(menuItemName) {
        // Find the index of the item in the cart array
                const itemIndex = cart.findIndex(item => item.name === menuItemName);

                // Check if the item is in the cart
                if (itemIndex !== -1) {
                    // Remove the item from the cart array
                    cart.splice(itemIndex, 1);

                    // Update the UI to reflect the changes
                    updateCartUI();
                } else {
                    console.warn(`Item "${menuItemName}" not found in the cart.`);
                }
            }
        </script>

        <script>
            const backendUrl = "menu.php";

            document.addEventListener('DOMContentLoaded', () => {
                fetchMenuItems();
            });

            async function fetchMenuItems() {
                try {
                    const response = await fetch(backendUrl);
                    const data = await response.json();

                    if (response.ok) {
                        displayMenuItems(data);
                    } else {
                        console.error('Error fetching menu items:', data.error);
                    }
                } catch (error) {
                    console.error('Error fetching menu items:', error.message);
                }
            }

            function displayMenuItems(menuItems) {
                const menuContainer = document.getElementById('menu-container');
                menuContainer.innerHTML = ''; // Clear existing content

                menuItems.forEach(item => {
                    const itemDiv = document.createElement('div');
                    itemDiv.classList.add('menu-item');
                    
                    itemDiv.innerHTML = `
                        <h3>${item.menuitem_name}</h3>
                        <p>Category: ${item.category_name}</p>
                        <button onclick="addToCart('${item.menuitem_name}', ${item.item_price})">Add to Cart</button>
                    `;
                    menuContainer.appendChild(itemDiv);
                });
            }
        </script>

        <script src="../../JScripts/Order/filter.js"></script>
    </body>
</html>
