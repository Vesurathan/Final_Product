//start of the scrolling speed data script
var lastScrollTop = 0;
var lastTimestamp = Date.now();

function handleScroll(event) {
    var currentScrollTop = window.scrollY;
    var currentTimestamp = Date.now();

    // Calculate the distance scrolled
    var scrollDistance = currentScrollTop - lastScrollTop;

    // Calculate the time elapsed
    var timeElapsed = currentTimestamp - lastTimestamp;

    // Calculate the speed (pixels per millisecond)
    var scrollSpeed = Math.abs(scrollDistance) / timeElapsed;

    // Log or send the scroll speed to the server for analysis
    console.log('Scroll Speed:', scrollSpeed);

    // Update the last scroll position and timestamp
    lastScrollTop = currentScrollTop;
    lastTimestamp = currentTimestamp;

    // Send the scroll speed data to the server
    sendScrollSpeedData(scrollSpeed, csrfToken);
}

function sendScrollSpeedData(scrollSpeed, csrfToken) {
    // Send the scroll speed data to the server
    fetch('/store-scroll-speed', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                scroll_speed: scrollSpeed,
                user_id: '{{ auth()->id() }}'
            }),
      
})
}
   

// Add an event listener for scroll events
document.addEventListener('scroll', handleScroll);
// end of the scrolling speed script