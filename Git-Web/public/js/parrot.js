// Lưu trạng thái nút đã nhấn
let lastClickedButton = null;

// Hàm xử lý nhấn nút
function handleButtonClick(event) {
    // Loại bỏ lớp clicked từ nút trước đó nếu có
    if (lastClickedButton) {
        lastClickedButton.classList.remove('clicked');
    }

    // Thêm lớp clicked vào nút hiện tại
    event.target.classList.add('clicked');

    // Cập nhật nút đã nhấn gần đây
    lastClickedButton = event.target;
}

// Thêm sự kiện click cho tất cả các nút
document.querySelectorAll('.button').forEach(button => {
    button.addEventListener('click', handleButtonClick);
});

// Thêm sự kiện click cho tài liệu để xóa lớp clicked nếu nhấn ra ngoài
document.addEventListener('click', (event) => {
    if (!event.target.classList.contains('button')) {
        if (lastClickedButton) {
            lastClickedButton.classList.remove('clicked');
        }
        lastClickedButton = null;
    }
});
