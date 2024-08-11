function clickButtonAdd() {
    document.getElementById('add-form').innerHTML = `
        <a href="parrot.html" class="back-link">Quay Lại</a>
        <h1>Thêm Sản Phẩm Mới</h1>
        <form id="pet-form">
            <div class="form-group">
                <label for="pet-id">ID:</label>
                <input type="text" id="pet-id" name="pet-id" required>
            </div>
            <div class="form-group">
                <label for="pet-name">Tên:</label>
                <input type="text" id="pet-name" name="pet-name" required>
            </div>
            <div class="form-group">
                <label for="pet-price">Giá:</label>
                <input type="number" id="pet-price" name="pet-price" required>
            </div>
            <div class="form-group">
                <label for="pet-price-sale">Giá Khuyến Mãi:</label>
                <input type="number" id="pet-price-sale" name="pet-price-sale" required>
            </div>
            <div class="form-group">
                <label for="pet-quantity">Số Lượng:</label>
                <input type="number" id="pet-quantity" name="pet-quantity" required>
            </div>
            <div class="form-group">
                <label for="pet-image">URL Hình Ảnh:</label>
                <input type="file" id="pet-image" name="pet-image" required>
            </div>
            <button type="submit">Thêm Sản Phẩm</button>
        </form>
    `;

    document.getElementById('pet-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const pet = {
            id: document.getElementById('pet-id').value,
            name: document.getElementById('pet-name').value,
            price: parseInt(document.getElementById('pet-price').value),
            priceSale: parseInt(document.getElementById('pet-price-sale').value),
            quantity: parseInt(document.getElementById('pet-quantity').value),
            urlImg: ''
        };

        const fileInput = document.getElementById('pet-image');
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            pet.urlImg = file.name;
            localStorage.setItem(pet.id, JSON.stringify(pet));

            // Chuyển đến trang parrot.html
            window.location.href = `pets/parrot.html`;
        } else {
            alert('Vui lòng chọn một hình ảnh.');
        }
    });
}
