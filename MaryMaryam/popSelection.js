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
                    ` <i class='bx bx-cart-download downloadCartIcon hidden'></i>
                    <i class='bx bx-cart-add addCart addCartIcon'></i>
                   
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
    
            // Find the parent item and toggle classes on its child elements
            let parentItem = positionClick.parentElement;
            parentItem.querySelector('.addCartIcon').classList.toggle('hidden');
            parentItem.querySelector('.downloadCartIcon').classList.toggle('hidden');
        } 
    });
    
 
    
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


const initApp = () => {
    // get data product
    fetch('popSelection.json')
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