// Đảm bảo rằng file pets.js đã được tải trước khi chạy mã này
document.getElementById('pet-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Tạo đối tượng pet
    const pet = {
        id: document.getElementById('pet-id').value,
        name: document.getElementById('pet-name').value,
        price: parseInt(document.getElementById('pet-price').value),
        priceSale: parseInt(document.getElementById('pet-price-sale').value),
        quantity: parseInt(document.getElementById('pet-quantity').value),
        urlImg: ''
    };

    // Xử lý file hình ảnh
    const fileInput = document.getElementById('pet-image');
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        
        // Cập nhật urlImg với tên của hình ảnh
        pet.urlImg = file.name;

        // Lưu đối tượng pet vào localStorage
        localStorage.setItem(pet.id, JSON.stringify(pet));

    } else {
        alert('Vui lòng chọn một hình ảnh.');
    }
});

// Xóa toàn bộ localStorage khi trang được tải
// window.addEventListener('load', function() {
//     localStorage.clear();
// });

