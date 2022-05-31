let down = false;

function showAdvanced(event) {
    const filters = document.getElementById("adv-filters");

    if (!down) {
        filters.style.height = "100%";
        event.target.animate([
            { transform: "rotate(0)" },
            { transform: "rotate(180deg)" }],
            {fill: "forwards", duration: 200, iterations: 1 });
        filters.animate([
            { transform: "translate(0, -100%)" },
            { transform: "translate(0, 0)" }],
            {fill: "forwards", duration: 600, iterations: 1 });
        filters.animate([
            { opacity: 0, },
            { opacity: 1 }],
            {fill: "forwards", duration: 800, iterations: 1 });
        down = true;
    } else {
        event.target.animate([
            { transform: "rotate(180deg)" },
            { transform: "rotate(0)" }],
            {fill: "forwards", duration: 200, iterations: 1 });
        filters.animate([
            { transform: "translate(0, 0)" },
            { transform: "translate(0, -100%)" }],
            {duration: 500, iterations: 1 });
        filters.animate([
            { opacity: 1, },
            { opacity: 0 }],
            {fill: "forwards", duration: 200, iterations: 1 });
    
        down = false;
        filters.style.height = "0px";
    }
}