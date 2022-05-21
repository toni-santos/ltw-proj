window.addEventListener('load', () => {
    const wrapper = document.getElementById('content-wrapper');
    const bottom_content = document.getElementById('bottom-content').children;
    if (window.innerWidth > 800) {
        wrapper.style.height = bottom_content[0].clientHeight + "px";
    } else {
        const offset = document.getElementById('tabs').offsetHeight + 2;
        wrapper.style.height = bottom_content[0].clientHeight + offset + "px";
    }
});

const bottom_children = document.getElementById('bottom-content').children;
const tabs_children = document.getElementById('tabs').children;

for (tab in tabs_children) {
    if (isNaN(tab)) continue;
    tabs_children[tab].addEventListener('click', (event) => {
        const wrapper = document.getElementById('content-wrapper');
        const bottom_content = document.getElementById('bottom-content').children;

        if (window.innerWidth > 800){
            wrapper.style.height = bottom_content[event.target.id.split('-')[1]].clientHeight + "px";
        } else {
            const offset = document.getElementById('tabs').offsetHeight + 2;
            wrapper.style.height = bottom_content[event.target.id.split('-')[1]].clientHeight + offset + "px";
        }
    });
}

window.addEventListener("resize", () => {
    const wrapper = document.getElementById('content-wrapper');
    const bottom_content = document.getElementById('bottom-content').children;
    const tabs = document.getElementById('tabs');
    const active = tabs.querySelector('.current-tab');

    if (window.innerWidth > 800){
        wrapper.style.height = bottom_content[active.id.split('-')[1]].clientHeight + "px";
    } else {
        const offset = tabs.offsetHeight + 2;
        wrapper.style.height = bottom_content[active.id.split('-')[1]].clientHeight + offset + "px";
    }
});
