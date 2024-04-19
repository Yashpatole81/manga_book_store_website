// script.js

document.addEventListener("DOMContentLoaded", function () {
    const productsContainer = document.getElementById("products-container");

    // Fetch products using JavaScript
    fetchProducts();

    function fetchProducts() {
        // Fetch products from your PHP API (replace with your API endpoint)
        fetch("/api/products.php")
            .then((response) => response.json())
            .then((data) => {
                // Iterate through the products and display them on the webpage
                data.forEach((product) => {
                    const productElement = document.createElement("div");
                    productElement.classList.add("product");
                    productElement.innerHTML = `
                        <h2>${product.name}</h2>
                        <p>${product.description}</p>
                        <p>Price: $${product.price.toFixed(2)}</p>
                        <p>In Stock: ${product.quantity_in_stock}</p>
                        <p>Category: ${product.category}</p>
                        <img src="${product.image_url}" alt="${product.name}">
                    `;
                    productsContainer.appendChild(productElement);
                });
            })
            .catch((error) => {
                console.error("Error fetching products:", error);
            });
    }
});
