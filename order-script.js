// Image Slider Functionality
let currentSlideIndex = 0;

function moveSlide(sliderId, direction) {
  const slides = document.querySelectorAll(`#${sliderId} .slider-image`);
  const dots = document.querySelectorAll(`#${sliderId} .dot-indicators span`);
  currentSlideIndex += direction;

  if (currentSlideIndex >= slides.length) {
    currentSlideIndex = 0;
  } else if (currentSlideIndex < 0) {
    currentSlideIndex = slides.length - 1;
  }

  // Hide all images
  slides.forEach((slide) => slide.style.display = 'none');

  // Show current image
  slides[currentSlideIndex].style.display = 'block';

  // Update dots
  dots.forEach((dot) => dot.classList.remove('active'));
  dots[currentSlideIndex].classList.add('active');
}

// Initialize Slider for each product
document.addEventListener('DOMContentLoaded', () => {
  const sliders = document.querySelectorAll('.image-slider');
  sliders.forEach((slider, index) => {
    const slides = slider.querySelectorAll('.slider-image');
    const dotsContainer = document.querySelector(`#dots${index + 1}`);
    
    // Create dots dynamically
    slides.forEach((slide, i) => {
      const dot = document.createElement('span');
      dot.classList.add('dot');
      dot.addEventListener('click', () => {
        currentSlideIndex = i;
        moveSlide(slider.id, 0);
      });
      dotsContainer.appendChild(dot);
    });

    // Show first image
    slides[0].style.display = 'block';
    dotsContainer.children[0].classList.add('active');
  });
});

// Toggle Features
function toggleFeatures(featureId, button) {
  const features = document.getElementById(featureId);
  if (features.style.display === 'none' || features.style.display === '') {
    features.style.display = 'block';
    button.textContent = 'Features ↑';
  } else {
    features.style.display = 'none';
    button.textContent = 'Features ↓';
  }
}