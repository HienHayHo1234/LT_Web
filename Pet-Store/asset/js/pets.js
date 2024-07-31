const parrot = {
    urlImg: '../asset/images/vet/green-parrot.jpg',
    id: "green-parrot",
    name: "Vẹt xanh",
    price: 1000000,
    priceSale: 890000,
    quanlity: 1,
    quanlityStore: null
};

// pet.js
const pet = {
    id: '',
    name: '',
    price: 0,
    priceSale: 0,
    quantity: 0,
    quantityStore: 0,
    urlImg: ''
};


document.addEventListener('DOMContentLoaded', () => {
    // Lấy container để hiển thị sản phẩm
    const petContainer = document.getElementById('pet-container');

    // Lấy dữ liệu từ localStorage
    const petId = 'green-parrot'; // Bạn có thể thay đổi id theo ý muốn
    const petData = JSON.parse(localStorage.getItem(petId));

    if (petData) {
        // Tạo nội dung HTML từ dữ liệu
        petContainer.innerHTML = `
            <div class="container">
                <img src="${petData.urlImg}" alt="${petData.name}">
                <div class="row">
                    <p class="name-pet">${petData.name}</p>
                    <button class="heart" id="button1">❤</button>
                </div>
                <p class="text-price">Giá: <span class="price">${petData.price.toLocaleString()}đ</span> ➱ ${petData.priceSale.toLocaleString()}đ </p>
                <button class="button view-detail" id="button2">Xem chi tiết</button>
                <button class="button order" id="button3" onclick="addToCart('${petData.id}', '${petData.name}', ${petData.price})">Đặt hàng</button>
            </div>
        `;
    } else {
        petContainer.innerHTML = '<p>Không có dữ liệu sản phẩm để hiển thị.</p>';
    }
});
