let slideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlides() {
    // Calculate the width of a slide
    const slideWidth = slides[0].clientWidth;

    // Update the transform property to show the next slide
    const offset = -slideIndex * slideWidth;
    document.querySelector('.slides').style.transform = `translateX(${offset}px)`;
    
    // Move to the next slide
    slideIndex++;
    if (slideIndex >= totalSlides) {
        slideIndex = 0;
    }

    // Automatically move to the next slide after 3 seconds
    setTimeout(showSlides, 3000);
}

// Initialize the slider
showSlides();
