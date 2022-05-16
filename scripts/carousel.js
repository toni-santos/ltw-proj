function changePick(event) {
    const sr = document.getElementById("spotlight-restaurant");
    const newCard = "restaurant-card-" + event.target.id.split("-")[2] ;

    // TODO: Write the backend for this... aka AJAX api :(
    if (sr.children[0].id != newCard) {
        console.log("switching");
    } else {
        console.log("not switching");
    }
}