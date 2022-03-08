const itemCounter = document.querySelector('#item-counter');
var products = JSON.parse(localStorage.getItem('cart'));


if(products.products.length == 0){
    itemCounter.innerHTML = '<i class="material-icons nav__icon">shopping_cart</i>'+
                            '<span class="nav__text">View Cart</span>';
}else{
    itemCounter.innerHTML = '<i class="material-icons nav__icon">shopping_cart</i><span class="counter counter-lg">Total Items:'+products.products.length+'</span>';
}