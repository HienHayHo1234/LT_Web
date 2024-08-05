let slideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlides() {
    // Hide all slides
    slides.forEach(slide => slide.classList.remove('active'));
    
    // Move to the next slide
    slideIndex++;
    if (slideIndex > totalSlides) {
        slideIndex = 1;
    }
    
    // Show the current slide
    slides[slideIndex - 1].classList.add('active');
    
    // Automatically move to the next slide after 3 seconds
    setTimeout(showSlides, 3000);
}

// Initialize the slider
showSlides();