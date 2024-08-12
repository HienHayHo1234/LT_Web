function showOrderForm(productId) {
    // Hiển thị form đặt hàng
    var orderForm = document.getElementById('orderForm');
    orderForm.style.display = '';
    // Gán giá trị productId vào hidden input
    document.getElementById('productId').value = productId;
    // Cuộn trang đến form đặt hàng
    orderForm.scrollIntoView({
        behavior: 'smooth'
    });
}

function btnClose() {
    var orderForm = document.getElementById('orderForm');
    orderForm.style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('orderFormElement');
    const infoMessage = document.getElementById('infoMessage');
    const formCompleteMessage = document.getElementById('formCompleteMessage');
    const submitButton = document.querySelector('.btn-submit');

    function validateForm() {
        const name = document.getElementById('name').value.trim();
        const address = document.getElementById('address').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const size = document.getElementById('size').value.trim();
        const gender = document.getElementById('gender').value;

        if (name && address && phone && gender) {
            infoMessage.style.display = 'none'; // Ẩn thông báo yêu cầu điền thông tin
            formCompleteMessage.style.display = 'block'; // Hiển thị thông báo hoàn tất
            submitButton.style.display = 'inline-block'; // Hiện nút gửi
        } else {
            infoMessage.style.display = 'block'; // Hiển thị thông báo yêu cầu điền thông tin
            formCompleteMessage.style.display = 'none'; // Ẩn thông báo hoàn tất
            submitButton.style.display = 'none'; // Ẩn nút gửi
        }
    }

    form.addEventListener('input', validateForm);
});
