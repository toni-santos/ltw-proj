const fadeOut = [
    {transform: "scale(100%)"},
    {transform: "scale(0%)"}
]

const fadeIn = [
    {transform: "scale(0%)"},
    {transform: "scale(100%)"}
]

async function toggleFavRest(event) {

    event.preventDefault();
    event.stopPropagation();

    if (event.target.textContent == "favorite_border") {
        event.target.animate(fadeOut, {duration: 200, iterations: 1, easing: "ease-in"});
        event.target.textContent = "favorite";
        event.target.animate(fadeIn, {duration: 200, iterations: 1, easing: "ease-in"});
    } else {
        event.target.animate(fadeOut, {duration: 200, iterations: 1, easing: "ease-in"});
        event.target.textContent = "favorite_border";
        event.target.animate(fadeIn, {duration: 200, iterations: 1, easing: "ease-in"});
    }

    const id = event.composedPath()[2].querySelector('input').value;

    const response = await fetch("/api/api_favourite_rest.php?fvi=" + id);
    const success = await response.json();
    
}

async function toggleFavDish(event) {

    event.preventDefault();
    event.stopPropagation();

    if (event.target.textContent == "favorite_border") {
        event.target.animate(fadeOut, {duration: 200, iterations: 1, easing: "ease-in"});
        event.target.textContent = "favorite";
        event.target.animate(fadeIn, {duration: 200, iterations: 1, easing: "ease-in"});
    } else {
        event.target.animate(fadeOut, {duration: 200, iterations: 1, easing: "ease-in"});
        event.target.textContent = "favorite_border";
        event.target.animate(fadeIn, {duration: 200, iterations: 1, easing: "ease-in"});
    }

    const id = event.composedPath()[2].querySelector('input').value;

    const response = await fetch("/api/api_favourite_dish.php?fvi=" + id);
    const success = await response.json();
    
}