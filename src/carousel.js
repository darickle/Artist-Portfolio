const slides = document.querySelectorAll(".slides img");
let slideIndex = 0;
let interval = null;

initializeCarousel();

function initializeCarousel() {
    slides[slideIndex].classList.add("displayImage");
}

function showSlide(index) {
    if (index >= slides.length) {
        slideIndex = 0;
    } else if (index < 0) {
        slideIndex = slides.length - 1;
    }
    slides.forEach(slide => {
        slide.classList.remove("displayImage");
    });
    slides[slideIndex].classList.add("displayImage");
}

function prevSlide() {
    slideIndex--;
    showSlide(slideIndex);
}

function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}