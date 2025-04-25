function addProduct() {
    var form = document.getElementById("productForm");
    var formData = new FormData(form);

    var product = {};
    formData.forEach(function(value, key){
        product[key] = value;
    });

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_product.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send(JSON.stringify(product));
}
