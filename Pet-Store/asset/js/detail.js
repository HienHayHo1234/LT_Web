function openModal() {
    document.getElementById('product-modal').style.display = 'flex';
}

function closeModal(event) {
    if (event) event.stopPropagation(); // Ngăn chặn việc sự kiện buble lên khi nhấn vào vùng modal-content
    document.getElementById('product-modal').style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == document.getElementById('product-modal')) {
        closeModal();
    }
}
