const jewelryItems = {
    "Gold Jewellery": "GoldJewel/GoldJewel.html",
    "Necklaces": "Necklaces/Necklace.html",
    "Earrings": "Earings/Earring.html",
    "Bracelets": "Bracelets/Bracelets.html",
    "Rings": "Rings/Rings.html",
    "Pendants": "Pendants/Pendants.html",
    "Bangles": "Bangles.html",
    "Anklet": "anklet.html",
    "Chains": "Chains/Chains.html",
    "Rings": "Rings/Rings.html"
    // Add more jewelry items as needed
  };
  
  const searchInput = document.getElementById("searchInput");
  const autocompleteResults = document.getElementById("autocompleteResults");
  const searchButton = document.getElementById("searchButton");
  
  searchInput.addEventListener("input", function() {
    const inputValue = this.value.toLowerCase();
    let matches = [];
  
    if (inputValue.length > 0) {
      matches = Object.keys(jewelryItems).filter(item => item.toLowerCase().includes(inputValue));
    }
  
    displayMatches(matches);
  });
  
  function displayMatches(matches) {
    const html = matches.map(item => `<li>${item}</li>`).join("");
    autocompleteResults.innerHTML = html;
  }
  
  // autocompleteResults.addEventListener("click", function(event) {
  //   if (event.target.tagName === "LI") {
  //     searchInput.value = event.target.textContent;
  //     autocompleteResults.innerHTML = "";
  //   }
  // });
  
  autocompleteResults.addEventListener("click", function(event) {
    if (event.target.tagName === "LI") {
      searchInput.value = event.target.textContent;
      // Prevent hiding searchInput and autocompleteResults
      event.stopPropagation();
    }
  });
  
  searchButton.addEventListener("click", function() {
    const searchTerm = searchInput.value.trim();
    if (searchTerm) {
      // Check if the searched item exists in the jewelryItems object
      if (jewelryItems.hasOwnProperty(searchTerm)) {
        // Redirect to the corresponding HTML page for the searched item
        window.location.href = jewelryItems[searchTerm]; // Redirect to the corresponding page
      } else {
        alert("Item not found. Please try again.");
      }
    } else {
      alert("Please enter a search term.");
    }

    searchInput.value = "";
  });
  

// const searchhInput = document.getElementById("searchhInput");
// const listProductHTML = document.getElementById("listProductHTML");

// // Load product data from JSON file
// fetch('popSelection.json')
//   .then(response => response.json())
//   .then(data => {
//     // Filter and display products based on user's search query
//     searchhInput.addEventListener("input", function() {
//       const searchTerm = searchhInput.value.trim().toLowerCase();
//       const filteredProducts = data.products.filter(product => {
//         // Check if any part of the product name contains the search term
//         return product.name.toLowerCase().includes(searchTerm);
//       });
//       displayFilteredProducts(filteredProducts);
//     });
//   })
//   .catch(error => console.error('Error loading product data:', error));

// // Function to display filtered products
// function displayFilteredProducts(products) {
//   listProductHTML.innerHTML = ""; // Clear previous content
//   products.forEach(product => {
//     const priceLKR = formatPrice(product.price); // Assuming you have a function to format the price
//     const newProduct = document.createElement("div");
//     newProduct.classList.add("product");
//     newProduct.innerHTML =
//         `<i class='bx bx-cart-add addCart addCartIcon'></i>
//         <img src="${product.image}" alt="">
//         <h2>${product.name}</h2>
//         <div class="price">${priceLKR}</div>`;
//     listProductHTML.appendChild(newProduct);
//   });
// }

// // Function to format price (replace with your own implementation)
// function formatPrice(price) {
//   // Your implementation to format the price
// }

  