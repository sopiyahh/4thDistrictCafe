let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    document.documentElement.style.overflowY = 'scroll';
    cartItem.classList.remove('active');
}   


let cartItem = document.querySelector('#container-menu');


if (loggedIn != "") {
    document.querySelector('#user-btn').onclick = () =>{
        if (cartItem.classList.contains('active') && !document.querySelector('#container-menu #content-menu').classList.contains('profile')){
            navigateToSection('profile');
        } else {
            if (cartItem.classList.contains('active')) {
                document.documentElement.style.overflowY = 'scroll';
            } else {
                navigateToSection('profile');
                document.documentElement.style.overflowY = 'hidden';
            }

            cartItem.classList.toggle('active');
        }
        
    }

    document.querySelector('#cart-btn').onclick = () => {
        if (cartItem.classList.contains('active') && !document.querySelector('#container-menu #content-menu').classList.contains('cart')) {
            navigateToSection('cart');
        } else {
            if (cartItem.classList.contains('active')){
                document.documentElement.style.overflowY = 'scroll';
            } else {
                navigateToSection('cart');
                document.documentElement.style.overflowY = 'hidden';

            }
            cartItem.classList.toggle('active');
        }
       
    }
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}

function navigateToSection(sectionId) {
    const sectionElement = document.getElementById(sectionId);
    if (sectionElement) {
        sectionElement.scrollIntoView({ behavior: 'smooth' });
    }
}

// Attach event listeners
document.querySelectorAll('#container-menu #sidebar a').forEach(a => {
    a.addEventListener('click', function (e) {
        e.preventDefault();
        const sectionId = this.getAttribute('href').substring(1);
        navigateToSection(sectionId);
    });
});

// Attach scroll event listener
document.querySelector('#container-menu #content-menu').addEventListener('scroll', (event) => {
    let currentSectionId = '';
    document.querySelector('#container-menu #content-menu').classList.remove('profile', 'cart', 'orders', 'history');
    document.querySelectorAll('#container-menu #content-menu section').forEach(section => {
        const sectionTop = section.offsetTop - 200,
            sectionBottom = sectionTop + section.offsetHeight,
            contentTop = document.querySelector('#container-menu #content-menu').scrollTop;


        if (contentTop >= sectionTop && contentTop < sectionBottom) {
            currentSectionId = section.id;
            document.querySelector('#container-menu #content-menu').classList.add(section.id);
        }
        // console.log(document.querySelector('#container-menu #content-menu').scrollTop);
    });

    document.querySelectorAll('#container-menu #sidebar a').forEach(a => {
        a.classList.remove('active');
    });

    document.querySelector(`#container-menu #sidebar a[href="#${currentSectionId}"]`).classList.add('active');
});


//dictionary of items
const drinkItems = {
    'blueberry-soda': {
        'price': 70,
        'prev-price': 79,
        'name': 'Blueberry Soda'
    },
    'strawberry-soda': {
        'price': 70,
        'prev-price': 79,
        'name': 'Strawberry Soda'
    },
    'lychee-soda': {
        'price': 70,
        'prev-price': 79,
        'name': 'Lychee Soda'
    },
    'matcha-latte': {
        'price': 115,
        'prev-price': 129,
        'name': 'Matcha Latte'
    },
    'cafe-americano': {
        'price': 75,
        'prev-price': 85,
        'name': 'Cafe Americano'
    },
    'caramel-macchiato': {
        'price': 120,
        'prev-price': 130,
        'name': 'Caramel Macchiato'
    }
};

const otherItems = {
    'chocolate-muffins': {
        'price': 70,
        'prev-price': 85,
        'name': 'Chocolate Muffins'
    },
    'chocolate-chip-cookies': {
        'price': 55,
        'prev-price': 60,
        'name': 'Chocolate Chip Cookies'
    },
    'ground-coffee': {
        'price': 179,
        'prev-price': 200,
        'name': 'Ground Coffee'
    }
};

function login_doc(
    title_1 = `Your Journey to the Perfect Sip Begins Here`,
    subtitle_1 = `Log in to savor the familiar taste of your favorite brew. Your daily dose of caffeine awaits!`,
    title_2 = `New to the 4th District Cafe?`,
    subtitle_2 = `Sign up and join our coffee-loving community. Experience exclusive perks and discover new blends!`,
    buttons = `<input type="submit" name="login" value="log-in now" class="btn login" onclick="loginForm_click(event)">`
) {

    return `<form method="POST" class="login-user">
            <h3>${title_1}</h3>
            <h1>${subtitle_1}</h1>
            <div class="inputs">
                <div class="inputBox">
                    <span class="fas fa-user"></span>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="inputBox">
                    <span class="fas fa-lock"></span>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="post_buttons">
                ${buttons}
            </div>
            <div class="lower-options">
                <div class="seperator"></div>
                <h2>${title_2}</h2>
                <h1>${subtitle_2}</h1>
                <input type="button" value="sign-up" class="btn" onclick="gosign_click(event)">
            </div>
        </form>`
}

function signup_doc(
    title_1 = `Your Journey to the Perfect Sip Begins Here`,
    subtitle_1 = `Sign up and join our coffee-loving community. Experience exclusive perks and discover new blends!`,
    title_2 = `Already have an account?`,
    subtitle_2 = `Log in to savor the familiar taste of your favorite brew. Your daily dose of caffeine awaits!`,
    buttons = `<input type="submit" name="signup" value="sign-up now" class="btn login" onclick="signupForm_click(event)">`
) {

    return `<form method="POST" class="signup-user">
                <h3>${title_1}</h3>
                <h1>${subtitle_1}</h1>
                <div class="inputs">
                    <div class="inputBox">
                        <span class="fas fa-portrait"></span>
                        <input id="input-fname" name="fullname" type="text" placeholder="Full Name" required>
                    </div>
                    <div class="inputBox">
                        <span class="fas fa-home"></span>
                        <input id="input-addr" name="address" type="text" placeholder="Address" required>
                    </div>
                    <div class="inputBox">
                        <span class="fas fa-phone"></span>
                        <input id="input-phone" name="phone" type="tel" placeholder="Phone Number" required>
                    </div>
                    <div class="inputBox">
                        <span class="fas fa-envelope"></span>
                        <input id="input-email" name="email" type="email" placeholder="Email" required>
                    </div>
                    <div class="inputBox">
                        <span class="fas fa-user"></span>
                        <input id="input-uname" name="username" type="text" placeholder="Username" required>
                    </div>
                    <div class="inputBox">
                        <span class="fas fa-lock"></span>
                        <input id="input-pass" name="password" type="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="post_buttons">
                    ${buttons}
                </div>
                <div class="lower-options">
                    <div class="seperator"></div>
                    <h2>${title_2}</h2>
                    <h1>${subtitle_2}</h1>
                    <input type="button" value="log-in" class="btn" onclick="golog_click(event)">
                </div>
            </form>`
}

// get each drinkitems (dictionary) then add to menu
for (const [key, value] of Object.entries(drinkItems)) {
    document.querySelector('.menu .box-container').innerHTML +=
        `<div class="box ${key}">
                <img src=".\\images\\${key}.png" alt="">
                <h3>${value['name']}</h3>
                <div class="price">₱${value['price']}.00 <span>₱${value['prev-price']}.00</span></div>
                ${loggedIn != "" ? `<div class="icons">
                    <a id="${key}-fav" class="fas fa-heart" onclick="toggleFavorites(event, '${key}')"></a>
                    <a id="${key}-crt" class="fas fa-shopping-cart" onclick="addToCart(event, '${key}', ${value['price']})"></a>
                </div>` : ""}
            </div>`;
}

// get each otheritems (dictionary) then add to menu
for (const [key, value] of Object.entries(otherItems)) {
    document.querySelector('.products .box-container').innerHTML +=
        `<div class="box">
                ${loggedIn != "" ? `<div class="icons">
                    <a id="${key}-fav" class="fas fa-heart" onclick="toggleFavorites(event, '${key}')"></a>
                    <a id="${key}-crt" class="fas fa-shopping-cart" onclick="addToCart(event, '${key}', ${value['price']})"></a>
                </div>` : ""}
                
                <div class="image">
                    <img src=".\\images\\${key}.png" alt="">
                </div>
                <div class="content">
                    <h3>${value['name']}</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="price">₱${value['price']} <span>₱${value['prev-price']}</span></div>
                </div>
            </div>
        `;
}

function gosign_click(event) {
    is_login = false;
    update(["account"])
}

function golog_click(event) {
    is_login = true;
    update(["account"])
}




function loginForm_click(event) {
    event.preventDefault();

    if (loggedIn != "") {
        if (!confirm("Are you sure you want to log-in to another account?\nThis will log-out your current account."))
            return;
        
    }



    const formData = new FormData(document.querySelector('.login-user'));
    var formObject = {}, emptyFields = [];
    formData.forEach(function (value, key) { 
        if (value === ""){
            emptyFields.push(key);
        }
        formObject[key] = value; 
    });

    if (emptyFields.length > 0){
        alert(`Please fill-up the following fields: ${emptyFields.join(", ")}`);
        return;
    }


    fetch(`./php/account.php?action=login&${new URLSearchParams(formObject).toString()}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`Welcome back to the 4th District Cafe, ${data.username}!`);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}

function signupForm_click(event, login = true) {
    event.preventDefault();

    if (loggedIn != "" && login) {
        if (!confirm("Are you sure you want to log-in to another account?\nThis will log-out your current account."))
            return;

    }

    const formData = new FormData(document.querySelector('.signup-user'));
    var formObject = {}, emptyFields = [];
    formData.forEach(function (value, key) {
        if (value === "") {
            emptyFields.push(key);
        }
        formObject[key] = value; 
    });

    if (emptyFields.length > 0) {
        alert(`Please fill-up the following fields: ${emptyFields.join(", ")}`);
        return;
    }

    fetch(`./php/account.php?action=register&autologin=${login}&${new URLSearchParams(formObject).toString()}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`Account ${data.username} successfully created!`);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}

function logout_click(event) {
    if (!confirm("Are you sure you want to log-out?"))
        return;

    fetch(`./php/account.php?action=logout`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`Goodbye, ${data.username}!`);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}

function updateAcct_click(event){
    event.preventDefault();

    const formData = new FormData(document.querySelector('#profile form'));
    var formObject = {}, emptyFields = [];
    formData.forEach(function (value, key) {
        if (value === "") {
            emptyFields.push(key);
        }
        formObject[key] = value;
    });

    if (!confirm("Are you sure you want to update your account informations?"))
        return;

    if (formObject['password'] !== formObject['confirm-password']){

        return alert("Password and Confirm Password does not match!");
    }

    fetch(`./php/account.php?action=update&${new URLSearchParams(formObject).toString()}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`Account updated successfully!`);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}


function deleteAcct_click(event) {
    event.preventDefault();

    if (!confirm("Are you sure you want to delete your account?"))
        return;

    fetch(`./php/account.php?${new URLSearchParams({ 'action': 'delete', 'username' : loggedIn}).toString()}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`Account deleted successfully!`);
                location.reload();x
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}


// combine drinkItems and otherItems
const items = { ...drinkItems, ...otherItems };

function update(element = ["favorites", "cart", "account", "history"]) {

    console.log(`${element.includes("favorite")} ${element.includes("cart")} ${element.includes("account")}`)

        
    if (element.includes("favorites") && loggedIn !== "") {
        fetch("./php/db.php?showdata=true")
            .then(response => response.json())
            .then(data => {



                favorites = document.querySelector('.favorites .box-container');
                favorites.innerHTML = '';

                for (const [key, value] of Object.entries(items)) {
                    document.getElementById(`${key}-fav`).classList.remove('active');
                }

                data['favorites'].forEach(element => {
                    favorites.innerHTML += `<div class="box ${element}">
                            <a id="${element}-fav" class="fa fa-close" onclick="toggleFavorites(event, '${element}')"></a>
                            <img src=".\\images\\${element}.png" alt="">
                            <h3>${items[element]['name']}</h3>
                            <div class="price">₱${items[element]['price']} <span>₱${items[element]['prev-price']}</span></div>
                            <div class="icons">
                                <a id="${element}-crt" class="fas fa-shopping-cart" onclick="addToCart(event, '${element}', ${items[element]['price']})"></a>
                            </div>
                        </div>`;
                    document.getElementById(`${element}-fav`).classList.add('active');
                });

                if (data.favorites.length == 0) {
                    favorites.innerHTML = `<div class="box empty"><h3>No favorites yet.</h3></div> `;
                }

            })
            .catch(error => console.error('Error:', error));
    }

    if (element.includes("cart") && loggedIn !== "") {
        const url = './php/cart.php?action=getCart';
        const totalPriceElement = document.querySelector('#cart .body-contents .total-price');
        const cartList = document.querySelector('#cart .body-contents #cart-list');
        cartList.innerHTML = '';

        var totalPrice = 0;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const dict_items = data['items'];
                // for each item in cart


                for (const [key, value] of Object.entries(dict_items)) {
                    cartList.innerHTML += `
                    <div class="cart-item">
                        <span class="fas fa-times close" onclick="removeFromCart(event,'${key}')"></span>
                        <img src=".\\images\\${key}.png" alt="">
                        <div class="content">
                            <h3>${items[key]['name']}</h3>
                            <div class="price">₱${items[key]['price'].toFixed(2)}<span class="fas fa-times"> ${value[1]}</span></div>
                        </div>
                    </div>`;
                    totalPrice += items[key]['price'];
                    totalPriceElement.innerHTML = `Total: ₱${totalPrice.toFixed(2)}`;
                }


            })
            .catch(error => console.error('Error:', error));



    }

    if (element.includes("account")) {
        var login_doc_fnl = "", signup_doc_fnl = "", title_head = "";

        if (loggedIn != "") {
            login_doc_fnl = login_doc(
                'Experience the 4th District Cafe!',
                'Log in to savor the familiar taste of your favorite brew. Your daily dose of caffeine awaits!',
                'Want to register other account?',
                'Click the button below to register another account.',
                `<input type="submit" name="login" value="log-in another account" class="btn login" onclick="loginForm_click(event)">`);
            signup_doc_fnl = signup_doc(
                'Let others experience the 4th District Cafe!',
                'Create an account for your friends and family. Enter their details below. Share the love!',
                'Want to use other account?',
                'Click the button below to log in to your other account.',
                `<input type="submit" name="signup" value="register account" class="btn login" onclick="signupForm_click(event, false)">
                <input type="submit" name="signup_logout" value="register then login the account" class="btn login" onclick="signupForm_click(event)">`);
            
            title_head = `<span class="name">${is_login ? "log-in" : "register"}</span> ${is_login ? "other account" : "account"} `;
        } else {
            login_doc_fnl = login_doc();
            signup_doc_fnl = signup_doc();
            title_head = `<span class="name">${is_login ? "log-in" : "sign-up"}</span> now `;
            
        }

        document.querySelector('#account').innerHTML =
            `<section class="login" id="login">
                    <h1 class="heading"> ${title_head} </h1>
                    <div class="row">
                        ${is_login ? login_doc_fnl : signup_doc_fnl} 
                </div>
            </section>`;

        fetch(`./php/account.php?action=getdata&username=${loggedIn}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log(data);
                    document.getElementById('fname').value = data.data['fullname'];
                    document.getElementById('addr').value =  data.data['address'];
                    document.getElementById('phone').value = data.data['phone'];
                    document.getElementById('email').value = data.data['email'];
                    document.getElementById('uname').value = data.data['username'];
                    document.getElementById('pass').value =  data.data['password'];
                }
            })
            .catch(error => console.error('Error:', error));

    }

    if (element.includes("history") && loggedIn !== ""){
        const url = './php/history.php?action=get';
       /*  const ordersList = document.querySelector('#orders .body-contents #orders-list');
        const historyList = document.querySelector('#history .body-contents #history-list');
        
        ordersList.innerHTML = '';
        historyList.innerHTML = '';
 */
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const dict_items = Object.entries(data['history']);

                document.querySelector('#content-menu #orders #orders-list').innerHTML = '';
                document.querySelector('#content-menu #history #orders-list').innerHTML = '';


                // for each order in history, get the index as the id
                dict_items.forEach((element) => {
                    
                    // if order is not yet received
                    const order = element[1];
                    console.log(order);
                    
                    const orderItems = JSON.parse(order['items']);
                    const orderDate = new Date(order['buy_date']);
                    const orderDateStr = orderDate.toLocaleString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                    const orderTimeStr = orderDate.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                    const orderTotal = order['total'];
                    const orderID = order['uuid'];
                    var orderItemsStr = '';
                    
                    for (const [key, value] of Object.entries(orderItems)) {
                        orderItemsStr += 
                        `<div class="item">
                            <img src=".\\images\\${key}.png" alt="">
                            <div class="item-name">${items[key]['name']}</div>
                            <div class="item-price">₱${items[key]['price']}<span class="fas fa-times"> ${value[1]}</span></div>
                        </div>`;
                    }


                    const orderReceivedDate = new Date(order['received_date']);
                    const orderReceivedDateStr = orderReceivedDate.toLocaleString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                    const orderReceivedTimeStr = orderReceivedDate.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
                    
                    if (order['received_date'] === null){
                        // add to orders
                        document.querySelector('#content-menu #orders #orders-list').innerHTML += 
                        `<div class="order">
                            <div class="order-header">
                                <div class="date">Ordered on ${orderDateStr} ${orderTimeStr}</div>
                                <h3>Order ID: ${orderID}</h3>
                            </div>
                            <div class="order-items">${orderItemsStr}</div>
                            <div class="order-lower">
                                <div class="deliver-button">
                                    <button class="btn" data-uuid="${orderID}" onclick="receiveDelivery_click(event)">Receive Delivery</button>
                                </div>
                                <div class="order-content">
                                    <div class="order-status">Status: Pending</div>
                                    <div class="order-total">Total: ₱${orderTotal}</div>
                                </div>
                            </div>
                        </div>`;

                    } else {
                        // add to history
                        document.querySelector('#content-menu #history #orders-list').innerHTML +=
                        `<div class="order">
                            <div class="order-header">
                                <div>
                                    <div class="date" style="margin-bottom: 0.2rem;">Ordered on ${orderDateStr} ${orderTimeStr}</div>
                                    <div class="date">Received on ${orderReceivedDateStr} ${orderReceivedTimeStr}</div>
                                </div>
                                <h3>Order ID: ${orderID}</h3>
                            </div>
                            <div class="order-items">${orderItemsStr}</div>
                            <div class="order-content">
                                <div class="order-total">Total: ₱${orderTotal}</div>
                            </div>
                        </div>`;
                    }

                });


            })
            .catch(error => console.error('Error:', error));


    } 
}

update();






// function for adding/removing from favorites
function toggleFavorites(event, item) {
    if (event.target.classList.contains('active')) {
        if (!confirm("Are you sure you want to remove this item from your favorites?"))
            return;
    } else {
        if (!confirm("Are you sure you want to add this item to your favorites?"))
            return;
    }

    fetch(`./php/favorites.php?${new URLSearchParams({ 'action': 'toggle', 'itemId': item }).toString()}`)
        .then(response => response.json())
        .then(data => {
            //console.log(data);
            update(["favorites"]);

            if (data.exists) {
                event.target.classList.remove("active");
            } else {
                event.target.classList.add('active');
            }

        })
}

// function for removing to cart
function removeFromFavorites(event, item) {
    if (!confirm("Are you sure you want to remove this item from your favorites?"))
        return;

    fetch(`./php/favorites.php?${new URLSearchParams({ 'action': 'remove', 'itemId': item }).toString()}`)
        .then(response => response.json())
        .then(data => {
            //console.log(data);
            update(["favorites"]);

        })
        .catch(error => console.error('Error:', error));
}



function addToCart(event, productName, price) {
    if (!confirm("Are you sure you want to add this item to your cart?"))
        return;

    const url = `./php/cart.php?${new URLSearchParams({ 'action': 'add', 'productName': productName, 'price': price }).toString()}`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            update(["cart"]);
        })
        .catch(error => console.error('Error:', error));
}

function removeFromCart(event, productName) {
    if (!confirm("Are you sure you want to remove this item from your cart?"))
        return;

    const url = `./php/cart.php?${new URLSearchParams({ 'action': 'remove', 'productName': productName }).toString()}`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            update(["cart"]);
        })
        .catch(error => console.error('Error:', error));
}

function getCart(event) {
    const url = './php/cart.php?action=getCart';
    fetch(url)
        .then(response => response.json())
        .then(data => console.log('Shopping Cart:', data))
        .catch(error => console.error('Error:', error));
}


function checkoutCart_click(event){
    event.preventDefault();

    if (!confirm("Are you sure you want to checkout?"))
        return;

    fetch(`./php/account.php?${new URLSearchParams({ 'action': 'getdata', 'username': loggedIn}).toString()}`)
        .then(response => response.json())
        .then(data => {
            fetch(`./php/history.php?${new URLSearchParams({ 'action': 'add', 'address': data.data['address']}).toString()}`)
                .then(response => response.json())
                .then(data2 => {
                    if (data2.status === 'success') {
                        alert(`Checkout successful!`);
                        update(["history", "cart"]);
                    } else {
                        alert(data2.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            })
        .catch(error => console.error('Error:', error));
}

function receiveDelivery_click(event){
    event.preventDefault();

    if (!confirm("Are you sure you want to receive the delivery?"))
        return;

    fetch(`./php/history.php?action=receive&uuid=${event.target.getAttribute("data-uuid")}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`Delivery received!`);
                update(["history"]);
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}


