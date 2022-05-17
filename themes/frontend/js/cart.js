const cartBtn = document.querySelector('.add-to-cart');
const cartIcon = document.getElementById('cartcount');
const closeCartBtn = document.querySelector('.close-button');
const cartDOM = document.querySelector('.cart');
const bodyDOM = document.querySelector('body');


cart = [];
const cartOverlay = document.querySelector('.cart-overlay');

class CartUI {
    getBagButtons() {
        const buttons = [...document.querySelectorAll(".add-to-cart")];
        buttons.forEach(button => {
            let id = button.dataset.id;
            let inCart = cart.find(item => item.id === id);

            if(inCart){
                button.disabled = true;
            }
        });
    }
    showCart() {
        // Show the curtain
      $("#sidebar-cart-curtain").fadeIn(500);
      bodyDOM.classList.add("show-sidebar-cart");
    }

    setupCart() {


        cartIcon.addEventListener('click', function(event) {
            event.preventDefault();
            $("#sidebar-cart-curtain").fadeIn(500);
            bodyDOM.classList.add("show-sidebar-cart");
        });
        closeCartBtn.addEventListener("click", function(event) {
        
            event.preventDefault();
            $("#sidebar-cart-curtain").fadeOut(500);
            bodyDOM.classList.remove("show-sidebar-cart");
            event.preventDefault();
        });
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const ui = new CartUI();
    ui.setupCart();
    ui.getBagButtons();

});

