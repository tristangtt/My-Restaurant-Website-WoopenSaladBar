/*  Student Name: Yui Hei Wong
    File Name: Menu.js
    Student Number: 041105962
    Edit Date: 2024.Apr.01
    Description: This page is js for Menu.html.*/

// Add event listeners to category links
const categoryLinks = document.querySelectorAll('.category a');
categoryLinks.forEach(link => {
	link.addEventListener('click', (event) => {
	  event.preventDefault();
	  const category = event.target.dataset.category;
	  filterProducts(category);
	});
});

// Function to filter products based on category
function filterProducts(category) {
	const products = document.querySelectorAll('.product');
	products.forEach(product => {
	  if (category === 'all' || product.dataset.category === category) {
		product.style.display = 'block';
	  } else {
		product.style.display = 'none';
	  }
	});
}

// Show all products by default
filterProducts('all');