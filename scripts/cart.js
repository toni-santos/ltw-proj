function decreaseAmount(event) {
    const input = event.composedPath()[1].children[1];

    if (parseInt(input.innerHTML) >= 2) {
        input.innerHTML = parseInt(input.innerHTML) - 1;
        document.getElementById('item-desc-' + event.composedPath()[3].id.split('-')[2]).children[1].children[0].innerHTML = input.innerHTML;
    }
}

function increaseAmount(event) {
    const input = event.composedPath()[1].children[1];

    if (parseInt(input.innerHTML) < 98) {
        input.innerHTML = parseInt(input.innerHTML) + 1;
        document.querySelector('#item-desc-'+ event.composedPath()[3].id.split('-')[2] + ' > a:last-child > span').innerHTML = input.innerHTML;
    }
}

function removeItem(event) {
    event.composedPath()[2].remove();
    document.getElementById('item-desc-' + event.composedPath()[2].id.split('-')[2]).remove();
}
