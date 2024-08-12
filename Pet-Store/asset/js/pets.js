document.addEventListener('DOMContentLoaded', function() {
    // Tạo container cho sản phẩm
    const mainContainer = document.querySelector('main'); // Chọn thẻ <main>
    const mainContainerId = mainContainer.getAttribute('id');

    if (mainContainer) {
        displayAllPets(mainContainer, mainContainerId); // Gọi hàm hiển thị tất cả sản phẩm
    }
});

function displayAllPets(mainContainer, mainContainerId) {
    // Xóa nội dung cũ của mainContainer trước khi thêm sản phẩm mới
    mainContainer.innerHTML = '';

    for (let i = 0; i < localStorage.length; i++) {
        const petId = localStorage.key(i);

        // Kiểm tra xem id có chứa chuỗi 'parrot' không
        if (petId.includes(mainContainerId)) {
            const petData = JSON.parse(localStorage.getItem(petId));

            if (petData) {
                const petDiv = document.createElement('div');
                petDiv.className = 'pet-container';
                petDiv.innerHTML = `
                    <div class="container">
                        <img src="../../asset/images/${mainContainerId}/${petData.urlImg}" alt="${petData.name}">
                        <div class="row">
                            <p class="name-pet">${petData.name}</p>
                            <button class="heart" id="button1">❤</button>
                        </div>
                        <p class="text-price">Giá: <span class="price">${petData.price.toLocaleString()}đ</span> ➱ ${petData.priceSale.toLocaleString()}đ </p>
                        <button class="button view-detail" id="button2">Xem chi tiết</button>
                        <button class="button order" id="button3" onclick="addToCart('${petData.id}', '${petData.name}', ${petData.price})">Đặt hàng</button>
                    </div>
                `;
                mainContainer.appendChild(petDiv);
            }
        }
    }
}
function toggleHeart(button) {
    button.classList.toggle('active');
}