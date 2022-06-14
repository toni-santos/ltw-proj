"use strict"

async function decreaseAmount(event, itemid) {
    const input = event.composedPath()[1].children[2];
    const removable = event.composedPath()[3];
    const id = document.getElementsByName('cartItemDishID')[itemid].value;
    const sideValueRemovable = document.getElementById('item-desc-' + event.composedPath()[3].id.split('-')[2]);
    const sideValue = document.querySelector(`#item-desc-${event.composedPath()[3].id.split('-')[2]} > a:last-child > span`);
    
    if (parseInt(input.textContent) == 1) {
        removeItemDecreasing(id, removable, sideValueRemovable);
    } else if (parseInt(input.textContent) >= 2) {
        input.textContent = parseInt(input.textContent) - 1;
        sideValue.textContent = input.textContent;
        const response = await fetch("/api/api_orders.php?dishID=" + id + "&decrease=on");
        const success = await response.json();
    }
   
    updateTotal();
}

async function increaseAmount(event, itemid) {
    const input = event.composedPath()[1].children[2];
    const id = document.querySelectorAll('#cartItemDishID')[itemid].value;

    if (parseInt(input.textContent) < 98) {
        input.textContent = parseInt(input.textContent) + 1;
        document.querySelector(`#item-desc-${event.composedPath()[3].id.split('-')[2]} > a:last-child > span`).textContent = input.textContent;
    }

    updateTotal();
    
    const response = await fetch("../api/api_orders.php?dishID=" + id + "&increase=on");
    const success = await response.json();
}

async function removeItem(event, itemid) {
    event.composedPath()[2].remove();
    const id = event.composedPath()[2].children[1].children[1].value;
    document.getElementById('item-desc-' + event.composedPath()[2].id.split('-')[2]).remove();

    updateTotal();

    const response = await fetch("../api/api_orders.php?dishID=" + id + "&remove=on");
    const success = await response.json();
}

async function removeItemDecreasing(id, removable, sideValueRemovable) {
    removable.remove();
    sideValueRemovable.remove();

    updateTotal();

    const response = await fetch("../api/api_orders.php?dishID=" + id + "&remove=on");
    const success = await response.json();
}

function updateTotal() {
    const items = document.querySelectorAll('.pay-desc-item');
    let total = 0;

    for (const item of items) {
        total += item.children[1].querySelector('span').textContent * item.children[1].textContent.split(' ')[1].slice(0, -1);
    }

    document.getElementById('cart-total').textContent = (total).toFixed(2) + '€'; 
}

window.addEventListener('load', () => {
    updateTotal();
});