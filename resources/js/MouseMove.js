// Function to send mouse move data to the server
function sendMouseMoveData(x, y) {
    fetch("/store-mouse-move", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify({
            x: x,
            y: y,
            user_id: "{{ auth()->id() }}",
        }),
    });
}

// Function to handle mouse move events
function handleMouseMove(event) {
    var x = event.clientX;
    var y = event.clientY;

    // Log mouse move data to the console
    console.log("Mouse moved to:", {
        x: x,
        y: y,
    });

    // Limit the frequency of data sent to the server (e.g., every 200 milliseconds)
    if (
        !handleMouseMove.lastSent ||
        Date.now() - handleMouseMove.lastSent > 400
    ) {
        // Call the function to send data to the server
        sendMouseMoveData(x, y);

        // Update the last sent timestamp
        handleMouseMove.lastSent = Date.now();
    }
}

// Add an event listener for mouse move events
document.addEventListener("mousemove", handleMouseMove);

//end of the mouse movement script
