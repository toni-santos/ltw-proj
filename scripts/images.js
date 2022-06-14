const file = document.getElementById("pfp-input");
const img = document.getElementById("profile-img");
file.addEventListener("change", handleFiles);
function handleFiles() {
    const reader = new FileReader();
    const f = new Blob(['abc'], {type: 'text/plain'});
    reader.onload = (e) => {
        img.src = e.target.result;
    }
    reader.readAsDataURL(file.files[0]);
    
}