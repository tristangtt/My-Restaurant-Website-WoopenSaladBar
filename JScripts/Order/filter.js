/*   Student Name: Hsin Tang
     File Name: filter.js
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: This page use for display the menu with catrgory */

const categoriesUrl = "categories.php";

document.addEventListener('DOMContentLoaded', () => {
    fetchCategories();
    fetchMenuItems(); // Fetch menu items after fetching categories
});

async function fetchCategories() {
    try {
        const response = await fetch(categoriesUrl);
        const data = await response.json();

        if (response.ok) {
            // Call the populateFilterDropdown function with categories
            populateFilterDropdown(data);
        } else {
            console.error('Error fetching categories:', data.error);
        }
    } catch (error) {
        console.error('Error fetching categories:', error.message);
    }
}

function populateFilterDropdown(categories) {
    console.log(categories); // Add this line for debugging
    const categoryFilterDropdown = document.getElementById('categoryFilter');

    categories.forEach(category => {
        const option = document.createElement('option');
        option.value = category;
        option.textContent = category;
        categoryFilterDropdown.appendChild(option);
    });
}

async function fetchMenuItems() {
    try {
        const response = await fetch(backendUrl);
        const data = await response.json();

        if (response.ok) {
            // Call the displayMenuItems function with menu items
            displayMenuItems(data);
        } else {
            console.error('Error fetching menu items:', data.error);
        }
    } catch (error) {
        console.error('Error fetching menu items:', error.message);
    }
}

function filterMenu() {
    const selectedCategory = document.getElementById('categoryFilter').value;
    fetchMenuItemsFiltered(selectedCategory);
}

function fetchMenuItemsFiltered(selectedCategory) {
    fetch(backendUrl)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                const filteredItems = selectedCategory
                    ? data.filter(item => item.category_name === selectedCategory)
                    : data;

                displayMenuItems(filteredItems);
            } else {
                console.error('Error or empty response from menu items API');
            }
        })
        .catch(error => {
            console.error('Error fetching menu items:', error.message);
        });
}



