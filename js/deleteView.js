
var deleteButtonId;

document.getElementById('module_delete_button').addEventListener('click', activateOverlay);
document.getElementById('category_delete_button').addEventListener('click', activateOverlay);
document.getElementById('literature_delete_button').addEventListener('click', activateOverlay);



function activateOverlay(){
    var overlay = document.getElementById('overlay');
    
    if(overlay.classList.contains('overlay--invisible')){
        overlay.classList.remove('overlay--invisible');
        overlay.classList.add('overlay--visible');
    }
}

