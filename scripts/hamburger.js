 function showHamburger(event) {
    const hc = document.getElementById("hamburger-content");
    const body = document.getElementsByTagName("body")[0];

    if (hc.classList.contains("disappear")) {
        body.style.overflow = "hidden";
        event.target.innerHTML = "close";
        hc.classList.add("appear");
        hc.classList.remove("disappear");
    } else {
        body.style.overflow = "scroll";
        event.target.innerHTML = "menu";
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
        him.innerHTML = "menu";
    } else if (window.innerWidth <= 500 && hc.style.visibility != "visible") {
        hc.style.visibility = "visible";
    }
});
