document.getElementById('pet-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Cập nhật thuộc tính của đối tượng pet
    pet.id = document.getElementById('pet-id').value;
    pet.name = document.getElementById('pet-name').value;
    pet.price = parseInt(document.getElementById('pet-price').value);
    pet.priceSale = parseInt(document.getElementById('pet-price-sale').value);
    pet.quantity = parseInt(document.getElementById('pet-quantity').value);
    pet.urlImg = document.getElementById('pet-image').value;

    // Lưu đối tượng pet vào localStorage
    localStorage.setItem(pet.id, JSON.stringify(pet));
});
