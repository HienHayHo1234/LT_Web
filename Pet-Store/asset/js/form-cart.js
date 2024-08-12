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
    const productSelect = document.getElementById('product');
    const totalAmountSpan = document.getElementById('totalAmount');

    function validateForm() {
        const name = document.getElementById('name').value.trim();
        const address = document.getElementById('address').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const gender = document.getElementById('gender').value;
        const product = document.getElementById('product').value;

        if (name && address && phone && gender && product) {
            infoMessage.style.display = 'none';
            formCompleteMessage.style.display = 'block';
            submitButton.style.display = 'inline-block';
        } else {
            infoMessage.style.display = 'block';
            formCompleteMessage.style.display = 'none';
            submitButton.style.display = 'none';
        }
    }

    form.addEventListener('input', validateForm);
});
