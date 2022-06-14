const form = document.getElementById('form');

function updateForm(event) {
    checkFilled(event);
    checkDone(event);
}

function checkDone(event) {
    // activate button
    let activate = true;
    const form = event.composedPath()[3];
    const button = document.getElementById('confirm-' + form.id.split('-')[1])
    Object.values(form.children[0].getElementsByTagName("input")).forEach(element => {
        if (element.value.length == 0) {
            activate = false;
        }
    });

    if (activate) {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
}

function checkFilled(event) {
    // show warning
    const warning = event.composedPath()[1].lastElementChild;

    if (event.target.value.length == 0) {
        warning.classList.add("opaque");
        warning.classList.remove("transparent");
    } else {
        warning.classList.remove("opaque");
        warning.classList.add("transparent");
    }
}

function showPassword(event) {
    const pwd = event.composedPath()[1].children[0];

    if (pwd.type === "password") {
        pwd.type = "text";
        event.target.textContent = "visibility_off";
    } else {
        event.target.textContent = "visibility";
        pwd.type = "password";
    }
}

function updateCounter(event) {
    const cnt = event.composedPath()[1].children[3];

    cnt.textContent = event.target.value.length + "/8" ;
}

function setFocus(event) {
    const el = event.composedPath()[1].children[0];
    
    el.focus();
}

function showLogin() {
    const dialog = document.getElementById('dialog-login');
    dialog.showModal();
}

function closeLogin() {
    const dialog = document.getElementById('dialog-login');
    dialog.close();
}

function showSignup() {
    const dialog = document.getElementById('dialog-signup');
    dialog.showModal();
}

function closeSignup() {
    const dialog = document.getElementById('dialog-signup');
    dialog.close();
}

function showUserEdit() {
    const dialog = document.getElementById('dialog-user-edit');
    dialog.showModal();
}

function closeUserEdit() {
    const dialog = document.getElementById('dialog-user-edit');
    dialog.close();
}

function showRestaurantDialog() {
    const dialog = document.getElementById('dialog-restaurant-registration');
    dialog.showModal();
}

function closeRestaurantDialog() {
    const dialog = document.getElementById('dialog-restaurant-registration');
    dialog.close();
}

function showRestaurantEdit() {
    const dialog = document.getElementById('dialog-restaurant-edit');
    dialog.showModal();
}

function closeRestaurantEdit() {
    const dialog = document.getElementById('dialog-restaurant-edit');
    dialog.close();
}

function showDishAdd() {
    const dialog = document.getElementById('dialog-dish-add');
    dialog.showModal();
}

function closeDishAdd() {
    const dialog = document.getElementById('dialog-dish-add');
    dialog.close();
}

function showCheckout(event) {
    const dialog = document.getElementById('dialog-checkout');
    dialog.showModal();
}

function closeCheckout(event) {
    const dialog = document.getElementById('dialog-checkout');
    dialog.close();
}

function inputFile(event) {
    const input = document.getElementById('pfp-input');
    input.click();
    event.preventDefault();
}