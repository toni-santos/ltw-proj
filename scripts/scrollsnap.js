function snapContent(event, scrollVal, scrollable, orientation) {
    const content = document.getElementById(scrollable);

    if (orientation == "vertical") {
        content.children[event.target.id.split("-")[1]].scrollIntoView({ behavior: "smooth"});
        
        const parent = event.composedPath()[1];
        
        for (child of parent.children) {
            if (child.classList.contains("current-tab")) {
                child.classList.remove("current-tab");
            }    
        }

        event.target.classList.add("current-tab");
    } else if (orientation == "horizontal") {
        const parent = event.composedPath()[1];
        
        for (child of parent.children) {
            if (child.classList.contains("active")) {
                child.classList.remove("active");
                child.classList.add("inactive");
            }    
        }

        event.target.classList.remove("inactive");
        event.target.classList.add("active");

        content.scrollTo({
            left: scrollVal * event.target.id.split("-")[2],
            behavior: 'smooth'
        });
    } else {
        console.error("invalid orientation: " + orientation);
    }

}