// load-html.js
function loadHTML() {
    let elements = document.querySelectorAll('[data-include-html]');
    elements.forEach(function(element) {
        let file = element.getAttribute('data-include-html');
        if (file) {
            fetch(file)
                .then(response => response.text())
                .then(data => {
                    element.innerHTML = data;
                    element.removeAttribute('data-include-html');
                    loadHTML(); // Đệ quy để load các file HTML tiếp theo (nếu có)
                })
                .catch(error => console.error('Error loading HTML:', error));
        }
    });
}

document.addEventListener('DOMContentLoaded', loadHTML);
