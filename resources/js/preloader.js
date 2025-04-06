document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lottie animation
    const animation = lottie.loadAnimation({
        container: document.getElementById('lottie-animation'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/animations/your-lottie-file.json' // Update this path to your JSON file
    });

    // Function to hide preloader and show content
    function hidePreloader() {
        const preloader = document.getElementById('preloader');
        const mainContent = document.getElementById('main-content');
        const body = document.body;

        // Add fade-out class to preloader
        preloader.classList.add('fade-out');

        // Show main content
        mainContent.classList.add('visible');

        // Remove loading class from body
        body.classList.remove('loading');

        // Remove preloader from DOM after animation
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500);
    }

    // Hide preloader when:
    // 1. Animation has played at least once
    // 2. All content is loaded
    // 3. Minimum display time has passed
    const minimumLoadTime = 2000; // 2 seconds minimum display time
    const startTime = Date.now();

    window.addEventListener('load', () => {
        const elapsedTime = Date.now() - startTime;
        const remainingTime = Math.max(minimumLoadTime - elapsedTime, 0);

        setTimeout(hidePreloader, remainingTime);
    });

    // Optional: Add animation complete listener
    animation.addEventListener('complete', () => {
        const elapsedTime = Date.now() - startTime;
        if (elapsedTime >= minimumLoadTime && document.readyState === 'complete') {
            hidePreloader();
        }
    });
}); 