const fadeOut = [
    {transform: "scale(100%)"},
    {transform: "scale(0%)"}
]

const fadeIn = [
    {transform: "scale(0%)"},
    {transform: "scale(100%)"}
]

async function toggleFav(event) {

    event.preventDefault();
    event.stopPropagation();

    if (event.target.innerHTML == "favorite_border") {
        event.target.animate(fadeOut, {duration: 200, iterations: 1, easing: "ease-in"});
        event.target.innerHTML = "favorite";
        event.target.animate(fadeIn, {duration: 200, iterations: 1, easing: "ease-in"});
    } else {
        event.target.animate(fadeOut, {duration: 200, iterations: 1, easing: "ease-in"});
        event.target.innerHTML = "favorite_border";
        event.target.animate(fadeIn, {duration: 200, iterations: 1, easing: "ease-in"});
    }

    const id = document.querySelector('.fav-rest-form > input');

    const response = await fetch("/api/api_favourites.php?fvi=" + id.value);
    const success = await response.json();
    
}