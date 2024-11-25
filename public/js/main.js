// hover display and click display for shoes
document.addEventListener('DOMContentLoaded', function() {
    const groups = document.querySelectorAll('.group');

    groups.forEach(function(group) {
        const mainImage = group.querySelector('.main-image');
        const hoverImages = group.querySelectorAll('.hover-image');
        let originalSrc = mainImage.src;

        hoverImages.forEach(function(hoverImage) {
            hoverImage.addEventListener('mouseover', function() {
                mainImage.src = hoverImage.src;
            });

            hoverImage.addEventListener('mouseout', function() {
                mainImage.src = originalSrc;
            });

            hoverImage.addEventListener('click', function() {
                originalSrc = hoverImage.src;
                mainImage.src = hoverImage.src;
            });
        });
    });
});

// increase quantity for shoes
document.addEventListener('DOMContentLoaded', function() {
    const increaseButtons = document.querySelectorAll('.increase-quantity');
    const decreaseButtons = document.querySelectorAll('.decrease-quantity');

    increaseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.nextElementSibling;
            input.value = parseInt(input.value) + 1;
        });
    });

    decreaseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });
});
