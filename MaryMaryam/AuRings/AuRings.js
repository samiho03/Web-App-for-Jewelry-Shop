let listProductHTML = document.querySelector('.listProduct');
let listCartHTML = document.querySelector('.listCart');
let iconCart = document.querySelector('.icon-cart');
let iconCartSpan = document.querySelector('.icon-cart span');
let body = document.querySelector('body');
let closeCart = document.querySelector('.close');
let products = [];
let cart = [];


iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
    body.classList.toggle('blurOtherElements');
})
closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
    body.classList.toggle('blurOtherElements');
})

    const addDataToHTML = () => {
    // remove datas default from HTML

        // add new datas
        if (products.length > 0) {
            products.forEach(product => {
                let newProduct = document.createElement('div');
                newProduct.dataset.id = product.id;
                newProduct.classList.add('item');
        
                // Convert price to LKR format
                let priceLKR = 'LKR ' + product.price.toFixed(2);
        
                newProduct.innerHTML =
                    // `<img src="${product.image}" alt="">
                    // <h2>${product.name}</h2>
                    // <div class="price">${priceLKR}</div>
                    // <button class="addCart">Add To Cart</button>`;
                    `<i class='bx bx-cart-add addCart addCartIcon'></i>
                    <img src="${product.image}" alt="">
                    <h2>${product.name}</h2>
                    <div class="price">${priceLKR}</div>`
                    ;
                listProductHTML.appendChild(newProduct);
            });
        }
        
    }
    listProductHTML.addEventListener('click', (event) => {
        let positionClick = event.target;
        if(positionClick.classList.contains('addCart')){
            let id_product = positionClick.parentElement.dataset.id;
            addToCart(id_product);
        }
    })
const addToCart = (product_id) => {
    let positionThisProductInCart = cart.findIndex((value) => value.product_id == product_id);
    if(cart.length <= 0){
        cart = [{
            product_id: product_id,
            quantity: 1
        }];
    }else if(positionThisProductInCart < 0){
        cart.push({
            product_id: product_id,
            quantity: 1
        });
    }else{
        cart[positionThisProductInCart].quantity = cart[positionThisProductInCart].quantity + 1;
    }
    addCartToHTML();
    addCartToMemory();
}
const addCartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
}
const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    let totalAmount = 0; // Initialize total amount

    if (cart.length > 0) {
        cart.forEach(item => {
            totalQuantity += item.quantity; // Increment total quantity
            let newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.dataset.id = item.product_id;

            let positionProduct = products.findIndex((value) => value.id == item.product_id);
            let info = products[positionProduct];
            listCartHTML.appendChild(newItem);
            let itemPrice = info.price * item.quantity; // Calculate price for this item
            totalAmount += itemPrice; // Add price to total amount
            newItem.innerHTML = `
            <div class="image">
                <img src="${info.image}">
            </div>
            <div class="name">
                ${info.name}
            </div>
            <div class="totalPrice">LKR ${itemPrice.toFixed(2)}</div> <!-- Display individual item price in LKR format -->
            <div class="quantity">
                <span class="minus"><</span>
                <span>${item.quantity}</span>
                <span class="plus">></span>
            </div>
            `;
        })
    }
    iconCartSpan.innerText = totalQuantity;
    // Add total amount to the HTML in LKR format
    listCartHTML.innerHTML += `<div class="totalAmount"> <span class="totalName"> Total : </span>  
    <span class="totalVal"> LKR ${totalAmount.toFixed(2)} </span>
    </div>`;
}



listCartHTML.addEventListener('click', (event) => {
    let positionClick = event.target;
    if(positionClick.classList.contains('minus') || positionClick.classList.contains('plus')){
        let product_id = positionClick.parentElement.parentElement.dataset.id;
        let type = 'minus';
        if(positionClick.classList.contains('plus')){
            type = 'plus';
        }
        changeQuantityCart(product_id, type);
    }
})
const changeQuantityCart = (product_id, type) => {
    let positionItemInCart = cart.findIndex((value) => value.product_id == product_id);
    if(positionItemInCart >= 0){
        let info = cart[positionItemInCart];
        switch (type) {
            case 'plus':
                cart[positionItemInCart].quantity = cart[positionItemInCart].quantity + 1;
                break;
        
            default:
                let changeQuantity = cart[positionItemInCart].quantity - 1;
                if (changeQuantity > 0) {
                    cart[positionItemInCart].quantity = changeQuantity;
                }else{
                    cart.splice(positionItemInCart, 1);
                }
                break;
        }
    }
    addCartToHTML();
    addCartToMemory();
}



// Function to filter products based on search input
const searchProducts = () => {
    // Get the search input value and split it into individual words
    const searchInput = document.getElementById('search-input').value.toLowerCase().trim();
    const searchWords = searchInput.split(' ');

    // Filter products based on search input
    const filteredProducts = products.filter(product => {
        // Convert product name to lowercase for case-insensitive search
        const productName = product.name.toLowerCase();
        // Check if all search words are included in the product name
        return searchWords.every(word => productName.includes(word));
    });

    // Clear the current product list
    listProductHTML.innerHTML = '';

    // Display appropriate message if no products match the search
    if (filteredProducts.length === 0) {
        listProductHTML.innerHTML = "<p class='no-results-message'>No products found, Please try a different search term !</p>";
        return;
    }

    // Add filtered products to the HTML
    filteredProducts.forEach(product => {
        let newProduct = document.createElement('div');
        newProduct.dataset.id = product.id;
        newProduct.classList.add('item');

        // Convert price to LKR format
        let priceLKR = 'LKR ' + product.price.toFixed(2);

        newProduct.innerHTML =
            `<i class='bx bx-cart-add addCart addCartIcon'></i>
             <img src="${product.image}" alt="">
             <h2>${product.name}</h2>
             <div class="price">${priceLKR}</div>`;
        listProductHTML.appendChild(newProduct);
    });
};

// Event listener to trigger search functionality when the search input changes
document.getElementById('search-input').addEventListener('input', searchProducts);



// Function to filter products based on selected categories
// const filterProducts = () => {
//     const checkboxes = document.querySelectorAll('.filter input[type="checkbox"]');
//     const selectedCategories = Array.from(checkboxes)
//                                     .filter(checkbox => checkbox.checked)
//                                     .map(checkbox => checkbox.value);

//     const filteredProducts = products.filter(product => {
//         // Check if the product belongs to any of the selected categories
//         return selectedCategories.includes(product.category);
//     });

//     // Clear the current product list
//     listProductHTML.innerHTML = '';

//     // Add filtered products to the HTML
//     filteredProducts.forEach(product => {
//         let newProduct = document.createElement('div');
//         newProduct.dataset.id = product.id;
//         newProduct.classList.add('item');

//         // Convert price to LKR format
//         let priceLKR = 'LKR ' + product.price.toFixed(2);

//         newProduct.innerHTML =
//             // `<img src="${product.image}" alt="">
//             // <h2>${product.name}</h2>
//             // <div class="price">${priceLKR}</div>
//             // <button class="addCart">Add To Cart</button>`;
//             `<i class='bx bx-cart-add addCart addCartIcon'></i>
//              <img src="${product.image}" alt="">
//              <h2>${product.name}</h2>
//               <div class="price">${priceLKR}</div>`
//                ;
//         listProductHTML.appendChild(newProduct);
//     });
// };


// Function to filter products based on selected categories
const filterProducts = () => {
    const checkboxes = document.querySelectorAll('.filter input[type="checkbox"]');
    const selectedCategories = Array.from(checkboxes)
                                    .filter(checkbox => checkbox.checked)
                                    .map(checkbox => checkbox.value);

    let filteredProducts;

    // Check if "All" checkbox is checked
    if (selectedCategories.includes('all')) {
        // If "All" checkbox is checked, show all products
        filteredProducts = products;
    } else {
        // Otherwise, filter products based on selected categories
        filteredProducts = products.filter(product => selectedCategories.includes(product.category));
    }

    // Clear the current product list
    listProductHTML.innerHTML = '';

    // Add filtered products to the HTML
    filteredProducts.forEach(product => {
        let newProduct = document.createElement('div');
        newProduct.dataset.id = product.id;
        newProduct.classList.add('item');

        // Convert price to LKR format
        let priceLKR = 'LKR ' + product.price.toFixed(2);

        newProduct.innerHTML =
            `<i class='bx bx-cart-add addCart addCartIcon'></i>
             <img src="${product.image}" alt="">
             <h2>${product.name}</h2>
             <div class="price">${priceLKR}</div>`;
        listProductHTML.appendChild(newProduct);
    });
};




// Event listener to trigger filtering when checkboxes are clicked
document.querySelectorAll('.filter input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', filterProducts);
});


// Function to update label styles based on checkbox state
const updateLabelStyles = () => {
    document.querySelectorAll('.filter input[type="checkbox"]').forEach(checkbox => {
        const label = checkbox.parentElement; // Get the label associated with the checkbox
        if (checkbox.checked) {
            label.classList.add('checked'); // Add a class to label when checkbox is checked
        } else {
            label.classList.remove('checked'); // Remove the class when checkbox is unchecked
        }
    });
};

// Event listener to trigger style update when checkboxes are clicked
document.querySelectorAll('.filter input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', updateLabelStyles);
});


// Function to fetch amount value from payherprocess.php
const fetchAmountValue = () => {
    // Create new XMLHttpRequest object
    let xhttp = new XMLHttpRequest();

    // Define function to handle response
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Response from server (amount value)
            let amountValue = parseFloat(this.responseText);
            // Add amount value to the total amount displayed in the cart
            addAmountToTotal(amountValue);
        }
    };

    // Open a new connection to payherprocess.php
    xhttp.open("GET", "payherprocess.php", true);

    // Send the request
    xhttp.send();
}

// Function to add amount value to the total amount displayed in the cart
const addAmountToTotal = (amountValue) => {
    // Find the total amount element in the cart
    let totalAmountElement = document.querySelector('.totalAmount');

    if (totalAmountElement) {
        // Extract the current total amount value
        let currentTotalAmount = parseFloat(totalAmountElement.textContent.split(' ')[1]);
        // Calculate the new total amount by adding the amount value
        let newTotalAmount = currentTotalAmount + amountValue;
        // Update the total amount element with the new total amount
        totalAmountElement.textContent = `Total: LKR ${newTotalAmount.toFixed(2)}`;
    }
}

// Call the fetchAmountValue function to fetch the amount value from payherprocess.php
fetchAmountValue();



const initApp = () => {
    // get data product
    fetch('AuRings.json')
    .then(response => response.json())
    .then(data => {
        products = data;
        addDataToHTML();

        // get data cart from memory
        if(localStorage.getItem('cart')){
            cart = JSON.parse(localStorage.getItem('cart'));
            addCartToHTML();
        }
    })
}
initApp();