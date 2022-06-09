function selectStar(event) {
    const star_container = event.composedPath()[2];
    const rating = event.composedPath()[1].id.split('-')[2];

    star_container.querySelector('#star-' + rating).checked = true;

    for (let i = 0; i < 5; i++) {
        let star = star_container.querySelector('#star-label-' + i + ' > span');

        if (i <= rating) {
            star.textContent = "star";
        } else {
            star.textContent = "star_outline";
        }
            
    }
}