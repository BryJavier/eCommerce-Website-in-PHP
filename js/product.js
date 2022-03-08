const viewMoreCategory = document.querySelectorAll('#view-more');
const viewMoreProduct = document.querySelectorAll('#product-name');
const productCategory = document.querySelectorAll('#category');
const qtyInput = document.querySelector('#qty');
const addToCartBtnProduct = document.querySelector('#add-to-cart-product');

var now = new Date();
var time = now.getTime();
var expireTime = time + 1000*36000;
now.setTime(expireTime);

function addViewProductCategory(){
    for (let index = 0; index < viewMoreCategory.length; index++) {
        viewMoreCategory[index].addEventListener('click',()=>{
            document.cookie = 'product_category='+ viewMoreCategory[index].ariaLabel +';expires=' + now.toUTCString()+';';
            document.cookie = 'category='+productCategory[index].innerHTML +';expires=' + now.toUTCString()+';';
        });
    }
}

function addViewProduct(){
    for (let index = 0; index < viewMoreProduct.length; index++) {
        viewMoreProduct[index].addEventListener('click',()=>{
            document.cookie = 'product_name='+ viewMoreProduct[index].innerHTML +';expires=' + now.toUTCString()+';';
            document.cookie = 'product_category='+ viewMoreProduct[index].ariaLabel +';expires=' + now.toUTCString()+';';
        });
    }
}

function addCartBtnProduct(){
    var product = JSON.parse(localStorage.getItem('cart'));
    var qtyIndex = product.products.indexOf(document.querySelector('#product-name').innerHTML);
    addToCartBtnProduct.addEventListener('click',()=>{
        if(qtyIndex != -1){
            product.qty[qtyIndex] = Number(product.qty[qtyIndex]) + Number(document.querySelector('#qty').value);
            product.price[qtyIndex] = Number(product.qty[qtyIndex]) * Number(product.origPrice[qtyIndex]);
            localStorage.setItem('cart', JSON.stringify(product));
            location.reload();
        }else{
            product.products.push(document.querySelector('#product-name').innerHTML);
            product.qty.push(document.querySelector('#qty').value);
            product.origPrice.push(Number(document.querySelector('#product-price').ariaLabel));
            product.price.push(Number(document.querySelector('#product-price').ariaLabel) * Number(document.querySelector('#qty').value));
            product.image.push(document.querySelector('#product-image').innerHTML);
            localStorage.setItem('cart', JSON.stringify(product));
            location.reload();
        }
    });

    
}

//Main function
addViewProductCategory();
addViewProduct();
addCartBtnProduct();




