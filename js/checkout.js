const cartItems = document.querySelector('#cart-items');
const cartTotalPrice = document.querySelector('#total-price');
const cart = JSON.parse(localStorage.getItem('cart'));

var totalPrice = 0;

for (let index = 0; index < cart.products.length; index++) {
    cartItems.innerHTML += '<li class="list-group-item d-flex justify-content-between lh-condensed">'+
                                '<div>'+
                                    '<h6 class="my-0">'+cart.products[index]+'</h6>'+
                                    '<small class="text-muted">Qty: '+cart.qty[index]+'</small>'+
                                '</div>'+
                            '<span class="text-muted">₱'+cart.price[index]+'</span>'+
                            '</li>';

    totalPrice += cart.price[index];
}

cartTotalPrice.innerHTML = '₱' + totalPrice;

const radios = document.querySelectorAll('#radio');

for (let index = 0; index < radios.length; index++) {
    radios[index].addEventListener('change',()=>{
        if(radios[index].ariaLabel == 'cod'){
            document.getElementById('payment-info').innerHTML = '';
        }else{
            document.getElementById('payment-info').innerHTML = '<div class="row" >'+
                                                                    '<div class="col-md-6 mb-3">'+
                                                                        '<label for="cc-name">Name on card</label>'+
                                                                        '<input type="text" class="form-control" id="cc-name" placeholder="" required="">'+
                                                                        '<small class="text-muted">Full name as displayed on card</small>'+
                                                                        '<div class="invalid-feedback">Name on card is required</div>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-6 mb-3">'+
                                                                        '<label for="cc-number">Credit card number</label>'+
                                                                        '<input type="text" class="form-control" id="cc-number" placeholder="" required="">'+
                                                                        '<div class="invalid-feedback">Credit card number is require</div>'+
                                                                    '</div>'+
                                                                '</div>'+

                                                                '<div class="row">'+
                                                                    '<div class="col-md-3 mb-3">'+
                                                                        '<label for="cc-expiration">Expiration</label>'+
                                                                        '<input type="text" class="form-control" id="cc-expiration" placeholder="" required="">'+
                                                                        '<div class="invalid-feedback">Expiration date required</div>'+
                                                                    '</div>'+
                                                                    '<div class="col-md-3 mb-3">'+
                                                                        '<label for="cc-expiration">CVV</label>'+
                                                                        '<input type="text" class="form-control" id="cc-cvv" placeholder="" required="">'+
                                                                        '<div class="invalid-feedback">Security code required</div>'+
                                                                    '</div>'+
                                                                '</div>';
        }
    });

    const productJSON = document.querySelector('#product-json');

    productJSON.value = localStorage.getItem('cart');

}



