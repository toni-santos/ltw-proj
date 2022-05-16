 function showHamburger() {
    const hc = document.getElementById("hamburger-content");
    const body = document.getElementsByTagName("body")[0];

    if (hc.style.display == "none"){
        hc.style.display = "flex";
        body.style.overflow = "hidden";
    } else {
        hc.style.display = "none";
        body.style.overflow = "scroll";
    }
}

window.addEventListener("resize", () => {
    const hc = document.getElementById("hamburger-content");
    const body = document.getElementsByTagName("body")[0];

    if (window.innerWidth >= 501 && hc.style.display != "none") {
        hc.style.display = "none";
        body.style.overflow = "scroll";
    }
});
