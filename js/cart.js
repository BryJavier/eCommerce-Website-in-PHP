const addToCartBtn = document.querySelectorAll("#add-to-cart");
const productName = document.querySelectorAll("#product-name");
const productPrice = document.querySelectorAll("#product-price");
const productImage = document.querySelectorAll("#product-image");
const checkoutBtnDesktop = document.querySelector('#checkout-btn');
const checkoutBtnMobile = document.querySelector('#checkout-btn-mbl');


//Checks if the shopping cart object is in localstorage
if(localStorage.getItem('cart') === null){
    //Shopping cart object
    let cart = {
        products: [],
        qty: [],
        origPrice:[],
        price: [],
        image: []
    }

    localStorage.setItem('cart', JSON.stringify(cart));
}


function addAddToCartBtn(){
    for (let index = 0; index < addToCartBtn.length; index++) {

        //Adds an event listener to all add-to-cart buttons
        addToCartBtn[index].addEventListener('click',()=>{
            //Converts the JSON string in localStorage to an object
            let addCart = JSON.parse(localStorage.getItem('cart'));
    
            //Checks if the product is already in the cart
            if(addCart.products.includes(productName[index].innerHTML)){
                let cart_index = addCart.products.indexOf(productName[index].innerHTML);
                addCart.qty[cart_index] += 1;
                addCart.price[cart_index] += Number(productPrice[index].ariaLabel);
            }else{
                addCart.products.push(productName[index].innerHTML);
                addCart.qty.push(1);
                addCart.origPrice.push(Number(productPrice[index].ariaLabel));
                addCart.price.push(Number(productPrice[index].ariaLabel));
                addCart.image.push(productImage[index].innerHTML);
            }
    
            //Converts the object back to string for localStorage
            localStorage.setItem('cart',JSON.stringify(addCart));

            window.location.reload();
        });   
    }
}



function addRemoveItemBtn(){

    /* -----------------
        DESKTOP VIEW
       -----------------
    */
    const removeBtnDesktop = document.querySelectorAll("#remove-item");
    for (let index = 0; index < removeBtnDesktop.length; index++) {
        removeBtnDesktop[index].addEventListener('click',()=>{
            let removeItem = JSON.parse(localStorage.getItem('cart'));
            removeItem.products.splice(index,1);
            removeItem.price.splice(index,1);
            removeItem.origPrice.splice(index,1);
            removeItem.image.splice(index,1);
            removeItem.qty.splice(index,1);

            location.reload();
            localStorage.setItem('cart', JSON.stringify(removeItem));
        });
    }

    /* -----------------
        MOBILE VIEW
        -----------------
    */
    const addBtnMobile = document.querySelectorAll("#plus");
    for (let index = 0; index < addBtnMobile.length; index++) {
        addBtnMobile[index].addEventListener('click',()=>{
            let addItem = JSON.parse(localStorage.getItem('cart'));
            addItem.qty[index] += 1;
            addItem.price[index] = addItem.qty[index] * addItem.origPrice[index];

            location.reload();
            localStorage.setItem('cart', JSON.stringify(addItem));
        });   
    }

    const removeBtnMobile = document.querySelectorAll("#minus");
    for (let index = 0; index < removeBtnMobile.length; index++) {
        removeBtnMobile[index].addEventListener('click', ()=>{
            let removeItem = JSON.parse(localStorage.getItem('cart'));

            if(removeItem.qty[index] > 1){
                removeItem.qty[index] -= 1;
                removeItem.price[index] = removeItem.qty[index] * removeItem.origPrice[index];
    
                location.reload();
                localStorage.setItem('cart', JSON.stringify(removeItem));
            }else{
                removeItem.products.splice(index,1);
                removeItem.price.splice(index,1);
                removeItem.origPrice.splice(index,1);
                removeItem.image.splice(index,1);
                removeItem.qty.splice(index,1);

                removeItem.price[index] = removeItem.qty[index] * removeItem.origPrice[index];

                location.reload();
                localStorage.setItem('cart', JSON.stringify(removeItem));
            }
            
        });
        
    }

    const removeAllBtnMobile = document.querySelectorAll('.mblcrtitm-rmvbtn');
    for (let index = 0; index < removeAllBtnMobile.length; index++) {
       removeAllBtnMobile[index].addEventListener('click', ()=>{
            let removeItem = JSON.parse(localStorage.getItem('cart'));
            removeItem.products.splice(index,1);
            removeItem.price.splice(index,1);
            removeItem.origPrice.splice(index,1);
            removeItem.image.splice(index,1);
            removeItem.qty.splice(index,1);

            location.reload();
            localStorage.setItem('cart', JSON.stringify(removeItem));
       });
        
    }
}



function updateCart(){
    //Convert JSON string to object
    let cartUpdate = JSON.parse(localStorage.getItem('cart'));
    if(cartUpdate.products.length == 0){
        //Shopping cart object
        let cart = {
            products: [],
            qty: [],
            origPrice:[],
            price: [],
            image: []
        }

        localStorage.setItem('cart', JSON.stringify(cart));

        var headerWelcome = document.querySelector('#cart-empty');
        headerWelcome.style.display = 'block';
        headerWelcome.innerHTML = '<h1>No Items in Cart... </>';
    }else{    
        /* -----------------
            DESKTOP VIEW
           -----------------
        */
        var counter = document.querySelector('.counter');
        counter.innerHTML = cartUpdate.products.length;
        
        for (let index = 0; index < cartUpdate.products.length; index++) {
            var productHeader = document.querySelector('.cart-row');
            var cartCard = document.createElement('div');
            cartCard.className = 'crtitm-row';
            cartCard.innerHTML = '<div class="nme">'+
                                    '<div class="crtitm-ttl">'+ cartUpdate.products[index] +'</div>'+
                                '</div>'+
                                '<div class="image"><img class="cart-image" src="'+cartUpdate.image[index]+'"></div>'+
                                '<div class="prdctcst">QTY: '+cartUpdate.qty[index]+'</div>'+
                                '<div class="amnt">₱ '+cartUpdate.price[index]+'</div>'+
                                '<div class="cls-btn" id="remove-item"> <i class="material-icons">remove_circle</i></div>'
                                ;
            productHeader.appendChild(cartCard);
        }


        var totalPrice = document.querySelector('.ttlamnt-titl');
        //Adds all of the numbers in price array
        var sum = cartUpdate.price.reduce(function(a, b){
            return a + b;
        }, 0);
        totalPrice.innerHTML = 'Total Amount: ₱' + sum;

        /* -----------------
            MOBILE VIEW
            -----------------
        */

        for (let index = 0; index < cartUpdate.products.length; index++) {
                //Get the div to append
            var productHeader = document.querySelector('.mblcrt-view');
            
            var cartCard = document.createElement('div');
            cartCard.className = 'cart-card-mob';
            cartCard.innerHTML = '<div class="mblcrt-head">' + 
                                        '<div class="mblcrtitm-ttl">'+ cartUpdate.products[index] +'</div>' +
                                        '<div class="mblcrtitm-ttl"> <img src="'+cartUpdate.image[index]+'"'+'</div>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="mblcrtitm-cnter-main">'+
                                    '<div class="product-quantity" *ngIf="item.isInCart">'+
                                    '<div>Quantity</div>'+
                                    '<div class="product-counter">'+
                                        '<input class="mblcrtitm-decrease-btn" id="minus" type="button"'+
                                        'value="-" />'+
                                        '<input class="mblcrtitm-count" id="quantity" type="text" value="'+ cartUpdate.qty[index] +'" name=""product" + i"/>'+
                                        '<input class="mblcrtitm-increase-btn" id="plus" type="button"'+
                                        'value="+" />'+
                                    '</div>'+
                                '<div class="mblcrtitm-prdctprc"> </div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="mblcrtitm-fter">'+
                                    '<button class="mblcrtitm-rmvbtn"> Remove </button>'+
                                    '<button class="mblcrtitm-prcbtn">₱ '+ cartUpdate.price[index] +'</button>'+
                                '</div>'
                                ;

            productHeader.appendChild(cartCard);   
        }
        
        totalPrice = document.querySelector('.mblcrt-ttlamnt-amnt');

        //Adds all of the numbers in price array
        var sum = cartUpdate.price.reduce(function(a, b){
            return a + b;
        }, 0);
        totalPrice.innerHTML = 'Total: ₱' + sum
    }

    
}

function addCheckoutBtn(){
    var products = JSON.parse(localStorage.getItem('cart'));

    //Desktop View
    if(products.products.length == 0){
        checkoutBtnDesktop.disabled = true;
        checkoutBtnDesktop.style.backgroundColor = "grey";
    }else{
        checkoutBtnDesktop.addEventListener('click', ()=>{
            location.replace('checkout.php');
        }); 
    }

    //Mobile View
    if(products.products.length == 0){
        checkoutBtnMobile.disabled = true;
        checkoutBtnMobile.style.backgroundColor = "grey";
    }else{
        checkoutBtnMobile.addEventListener('click', ()=>{
            location.replace('checkout.php');
        }); 
    }
    
}

//Main Function
var path = window.location.pathname;
var page = path.split("/").pop();

if(page == "all_products.php"){
    addAddToCartBtn();
    updateCart();
}else if(page == "product_category.php"){
    addAddToCartBtn();
    updateCart();
}else if(page == "product_page.php"){
    addAddToCartBtn();
    updateCart();
}else if(page == "search_page.php"){
    addAddToCartBtn();
    updateCart();
}else{
    updateCart();
    addRemoveItemBtn();
    addCheckoutBtn();
}

  
