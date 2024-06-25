/*   Student Name: Hsin Tang
     File Name: search.js
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: This page use for customer search the item */

document.addEventListener('DOMContentLoaded', () => {
    const searchButton = document.querySelector('.search button');
        if (searchButton) {
            searchButton.addEventListener('click', searchItems);
        }
});
    

function searchItems() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(function (item) {
        const itemName = item.querySelector('h3').textContent.toLowerCase();
        const addButton = item.querySelector('button');

        if (itemName.includes(searchInput)) {
            item.style.display = 'block';
            addButton.style.display = 'inline-block';
        } else {
            item.style.display = 'none';
            addButton.style.display = 'none';
        }
    });
}

