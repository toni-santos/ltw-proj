const filedish = document.getElementById("pfp-input-dish");
const filerest = document.getElementById("pfp-input-rest");
const imgdish = document.getElementById("profile-img-dish");
const imgrest = document.getElementById("profile-img-rest");

filedish.addEventListener("change", handleFiles);
filerest.addEventListener("change", handleFiles);
function handleFiles(e) {
    if (e.target == filedish){
        const reader = new FileReader();
        const f = new Blob(['abc'], {type: 'text/plain'});
        reader.onload = (e) => {
            imgdish.src = e.target.result;
        }
        reader.readAsDataURL(filedish.files[0]);
    } else if  (e.target == filerest) {
        const reader = new FileReader();
        const f = new Blob(['abc'], {type: 'text/plain'});
        reader.onload = (e) => {
            imgrest.src = e.target.result;
        }
        reader.readAsDataURL(filerest.files[0]);
    }    
}