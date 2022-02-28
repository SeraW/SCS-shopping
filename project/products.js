let strCookie = getCookie("cart");
let cart = [];
let cartCount = cart.length;
if (strCookie != null) {
    cart = JSON.parse(strCookie);
    cartCount = cart.length;
}
jsonCart = JSON.stringify(cart);

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    id = ev;
    console.log(id);
}

function cartBtn(ev){
    console.log(ev);
    var img = document.getElementById(`img${ev}`).src;
    var productName = document.getElementById(`name${ev}`).textContent;
    var productCost = document.getElementById(`price${ev}`).textContent;
    cartCount += 1;
    shoppingCart(ev);
    var html = `<div class="card horizontal small" id="card${cartCount}">
                    <div class="card-image">
                        <img src="${img}">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <span style="color:black; font-weight:bold" class="card-title">${productName}</span>
                            <p>${productCost}</p>
                        </div>
                        <div class="card-action">
                            <a id="remove${cartCount}" href="javascript:void(0);" onclick="removeCart(${cartCount});">Remove From Cart</a>
                        </div>
                    </div>
                </div>`
    document.querySelector('#div1').insertAdjacentHTML('beforeend', html);
    jsonCart = JSON.stringify(cart);
    WriteCookie();
}

function drop(ev) {

    var img = document.getElementById(`img${id}`).src;
    var productName = document.getElementById(`name${id}`).textContent;
    var productCost = document.getElementById(`price${id}`).textContent;
    cartCount += 1;
    shoppingCart(id);
    var html = `<div class="card horizontal small" id="card${cartCount}">
                    <div class="card-image">
                        <img src="${img}">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <span style="color:black; font-weight:bold" class="card-title">${productName}</span>
                            <p>${productCost}</p>
                        </div>
                        <div class="card-action">
                            <a id="remove${cartCount}" href="javascript:void(0);" onclick="removeCart(${cartCount});">Remove From Cart</a>
                        </div>
                    </div>
                </div>`
    document.querySelector('#div1').insertAdjacentHTML('beforeend', html);
    jsonCart = JSON.stringify(cart);
    WriteCookie();
}

function removeCart(removeID) {
    cartCount -= 1;
    document.getElementById(`card${removeID}`).remove();
    cart.splice(removeID - 1, 1);
    jsonCart = JSON.stringify(cart);
    WriteCookie();
    let count = 1;
    for (let i = 1; i <= cartCount + 1; i++) {
        if (i != removeID) {
            document.getElementById("card" + i).id = "card" + count;
            document.getElementById("remove" + i).setAttribute('onclick', `removeCart(${count})`)
            document.getElementById("remove" + i).id = "remove" + count;
            count += 1;
        }
    }
}

function shoppingCart(value) {
    cart.push(value);
}

function WriteCookie() {
    cookievalue = escape(document.myform.customer.value) + ";";
    document.cookie = "cart=" + jsonCart;
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}