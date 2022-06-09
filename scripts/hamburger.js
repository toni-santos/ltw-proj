function showHamburger(event) {
    const hc = document.getElementById("hamburger-content");
    const body = document.getElementsByTagName("body")[0];

    if (hc.classList.contains("disappear")) {
        body.style.overflow = "hidden";
        event.target.textContent = "close";
        hc.classList.add("appear");
        hc.classList.remove("disappear");
    } else {
        body.style.overflow = "scroll";
        event.target.textContent = "menu";
        hc.classList.add("disappear");
        hc.classList.remove("appear");
    }
}

window.addEventListener("resize", () => {
    const hc = document.getElementById("hamburger-content");
    const body = document.getElementsByTagName("body")[0];
    const him = document.getElementById("hamburger-icon-menu");

    if (window.innerWidth >= 501 && hc.style.visibility != "hidden") {
        hc.style.visibility = "hidden";
        body.style.overflow = "scroll";
        him.textContent = "menu";
    } else if (window.innerWidth <= 500 && hc.style.visibility != "visible") {
        hc.style.visibility = "visible";
    }
});

document.getElementsByTagName("body")[0].addEventListener("click", (event) => {
    if (Object.values(event.composedPath()).includes(document.querySelector("#hamburger-content")) == false) {
        if (Object.values(event.composedPath()).includes(document.querySelector(".nav-hamburger")) == false) {
            const hc = document.getElementById("hamburger-content");
            const body = document.getElementsByTagName("body")[0];
            const icon = document.getElementById("hamburger-icon-menu");

            if (hc.classList.contains("appear")) {
                body.style.overflow = "scroll";
                icon.textContent = "menu";
                hc.classList.add("disappear");
                hc.classList.remove("appear");
            }            
        }
    }
});