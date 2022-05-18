function snapContent(event, scrollVal) {
    const content = document.getElementById("bottom-content");

    content.scrollTo({
        top: scrollVal*event.target.id.split("-")[1],
        behavior: 'smooth'
    });
}