function removeMessage(event) {
    event.target.remove();
    const mb = document.querySelectorAll('.message-box');
    if (mb.length > 0) {
        for (const box of mb) {
            console.log(box.style.top - 60 + "px")
            box.style.top = parseInt(box.style.top) - 60 + "px";
        }
    }
}