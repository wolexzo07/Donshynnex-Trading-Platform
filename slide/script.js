let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

document.getElementById('nextButton').addEventListener('click', function() {
    moveToNextItem();
});

document.getElementById('prevButton').addEventListener('click', function() {
    moveToPreviousItem();
});

function moveToNextItem() {
    if (currentIndex < totalItems - 1) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }
    updateCarousel();
}

function moveToPreviousItem() {
    if (currentIndex > 0) {
        currentIndex--;
    } else {
        currentIndex = totalItems - 1;
    }
    updateCarousel();
}

function updateCarousel() {
    const offset = -currentIndex * 100;
    document.querySelector('.carousel-inner').style.transform = 'translateX(' + offset + '%)';
}
