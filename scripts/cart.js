function decreaseAmount(event) {
    const input = event.composedPath()[1].children[1];

    if (parseInt(input.innerHTML) >= 2) {
        input.innerHTML = parseInt(input.innerHTML) - 1;
        document.querySelector(`#item-desc-${event.composedPath()[3].id.split('-')[2]} > a:last-child > span`).textContent = input.textContent;
    }

    updateTotal();
}

function increaseAmount(event) {
    const input = event.composedPath()[1].children[1];

    if (parseInt(input.innerHTML) < 98) {
        input.innerHTML = parseInt(input.innerHTML) + 1;
        document.querySelector(`#item-desc-${event.composedPath()[3].id.split('-')[2]} > a:last-child > span`).textContent = input.textContent;
    }

    updateTotal();
}

function removeItem(event) {
    event.composedPath()[2].remove();
    document.getElementById('item-desc-' + event.composedPath()[2].id.split('-')[2]).remove();

    updateTotal();
}

function updateTotal() {
    const items = document.querySelectorAll('.pay-desc-item');
    let total = 0;

    for (const item of items) {
        total += item.children[1].querySelector('span').textContent * item.children[1].textContent.split(' ')[1].slice(0, -1);
    }

    document.getElementById('cart-total').textContent = total + '€'; 
}

window.addEventListener('load', () => {
    updateTotal();
});