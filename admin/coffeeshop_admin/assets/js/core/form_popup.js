var modal = document.getElementById('form_popup');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
