const form = document.getElementById('form');

function updateForm(event) {
    checkFilled(event);
    checkDone(event);
}

function checkDone(event) {
    // activate button
    let activate = true;
    const button = form.lastElementChild;
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
        event.target.innerHTML = "visibility_off";
    } else {
        event.target.innerHTML = "visibility";
        pwd.type = "password";
    }
}

function updateCounter(event) {
    const cnt = event.composedPath()[1].children[3];

    cnt.innerHTML = event.target.value.length + "/8" ;
}

function setFocus(event) {
    const el = event.composedPath()[1].children[0];
    
    el.focus();
}