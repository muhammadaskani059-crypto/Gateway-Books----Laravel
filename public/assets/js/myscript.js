var CART_KEY = "cart";

function getCart() {
    return JSON.parse(localStorage.getItem(CART_KEY)) || [];
}

function saveCart(cart) {
    localStorage.setItem(CART_KEY, JSON.stringify(cart));
    renderCart();
}

function cartCount(cart) {
    return cart.reduce(function (sum, item) {
        return sum + item.qty;
    }, 0);
} 

function cartTotal(cart) {
    return cart.reduce(function (sum, item) {
        return sum + item.price * item.qty;
    }, 0);
}

function cartItemHtml(item) {
    return `
        <li>
            <a href="#" class="mc-remove cart-remove" data-id="${item.id}">&times;</a>
            <img src="/uploads/${item.img}" alt="">
            <span class="mc-name">${item.name}</span>
            <span class="mc-meta">${item.qty} x Rs/ ${item.price}</span>
        </li>`;
}

function addToCart(book) {
    var cart = getCart();
    var existing = cart.find(function (item) {
        return item.id === book.id;
    });

    if (existing) {
        existing.qty++;
    } else {
        book.qty = 1;
        cart.push(book);
    }

    saveCart(cart);
}

function removeFromCart(id) {
    saveCart(
        getCart().filter(function (item) {
            return item.id !== id;
        }),
    );
}

function renderCart() {
    var cart = getCart();
    var html = "";

    cart.forEach(function (item) {
        html += cartItemHtml(item);
    });

    if (html === "") {
        html = '<p class="mc-empty">Your basket is empty.</p>';
    }

    document.getElementById("cart-items").innerHTML = html;
    document.getElementById("cart-count").innerText = cartCount(cart);
    document.getElementById("cart-total").innerText = cartTotal(cart);

    // the remove buttons were just re-created, so bind them again
    document.querySelectorAll(".cart-remove").forEach(function (btn) {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            removeFromCart(this.dataset.id);
        });
    });
}

renderCart();

document.querySelectorAll(".add-to-cart").forEach(function (btn) {
    btn.addEventListener("click", function () {
        addToCart({
            id: this.dataset.id,
            name: this.dataset.name,
            price: parseInt(this.dataset.price),
            img: this.dataset.img,
        });
        
        renderCart();
    });
});

function checkoutItemHtml(item) {
    return `
        <li>
            <img src="/uploads/${item.img}" alt="">
            <span class="co-name">${item.name}</span>
            <span class="co-meta">${item.qty} x Rs/ ${item.price}</span>
            <span class="co-sub">Rs/ ${item.price * item.qty}</span>
        </li>`;
}

function renderCheckout() {
    var list = document.getElementById("checkout-items");
    if (!list) return; // not on the checkout page

    var cart = getCart();
    var html = "";

    cart.forEach(function (item) {
        html += checkoutItemHtml(item);
    });

    list.innerHTML = html;
    document.getElementById("checkout-total").innerText = cartTotal(cart);
}

renderCheckout();

function bindPaymentToggle() {
    var radios = document.querySelectorAll('input[name="payment_method"]');
    var cardBox = document.getElementById("card-box");

    if (!cardBox) return; // not on the checkout page

    radios.forEach(function (radio) {
        radio.addEventListener("change", function () {
            cardBox.style.display = this.value === "card" ? "block" : "none";
        });
    });
}
bindPaymentToggle();

function bindCheckoutSubmit() {
    var form = document.getElementById("checkout-form");
    if (!form) return;

    form.addEventListener("submit", function () {
        document.getElementById("cart-input").value = JSON.stringify(getCart());
    });
}
bindCheckoutSubmit();