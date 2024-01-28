@extends('auth.layouts')

@section('content')

<head>

    <script>
        var csrfToken = '{{ csrf_token() }}';
    </script>

    <script>
        // Function to send mouse move data to the server
        function sendMouseMoveData(x, y) {
            fetch('/store-mouse-move', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    x: x,
                    y: y,
                    user_id: '{{ auth()->id() }}'
                }),
            });
        }

        // Function to handle mouse move events
        function handleMouseMove(event) {
            var x = event.clientX;
            var y = event.clientY;

            // Log mouse move data to the console
            console.log('Mouse moved to:', {
                x: x,
                y: y
            });

            // Limit the frequency of data sent to the server (e.g., every 200 milliseconds)
            if (!handleMouseMove.lastSent || (Date.now() - handleMouseMove.lastSent > 200)) {
                // Call the function to send data to the server
                sendMouseMoveData(x, y);

                // Update the last sent timestamp
                handleMouseMove.lastSent = Date.now();
            }



        }

        // Add an event listener for mouse move events
        document.addEventListener('mousemove', handleMouseMove);
        //end of the mouse movement script



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
        {
            document.addEventListener('DOMContentLoaded', function() {
                // Your existing code here
                document.getElementById('view').addEventListener('click', function() {
                    console.log('view_Button clicked!');
                    sendEventData('view_button_click', {
                        buttonId: 'view'
                    });
                });

                document.getElementById('post').addEventListener('click', function() {
                    console.log('post_Button clicked!');
                    sendEventData('post_button_click', {
                        buttonId: 'post'
                    });
                });

                document.getElementById('delete').addEventListener('click', function() {
                    console.log('delete_Button clicked!');
                    sendEventData('delete_button_click', {
                        buttonId: 'delete'
                    });
                });


                document.getElementById('show').addEventListener('click', function() {
                    console.log('show_Button clicked!');
                    sendEventData('show_button_click', {
                        buttonId: 'show'
                    });
                });


                document.getElementById('chat').addEventListener('click', function() {
                    console.log('chat_Button clicked!');
                    sendEventData('chat_button_click', {
                        buttonId: 'chat'
                    });
                });


                document.getElementById('create').addEventListener('click', function() {
                    console.log('create_Button clicked!');
                    sendEventData('create_button_click', {
                        buttonId: 'create'
                    });
                });



            });

            function sendEventData(eventType, eventData) {
                fetch('/track-button-click', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        action: eventType,
                        button_id: eventData.buttonId,
                        user_id: '{{ auth()->id() }}'
                    }),
                });
            }

        } {

            // start of keyboardEvents

            var keyPresses = [];

            document.addEventListener('keydown', function(event) {
                keyPresses.push(event.key);

                if (keyPresses.length >= 5) {
                    sendEventData('key_pressed_batch', {
                        keys: keyPresses
                    });
                    keyPresses = [];
                }
            });

            window.addEventListener('beforeunload', function() {
                if (keyPresses.length > 0) {
                    sendEventData('key_pressed_batch', {
                        keys: keyPresses
                    });
                }
            });

            function sendEventData(eventType, eventData) {
                fetch('/track-key-event', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        type: eventType,
                        data: eventData,
                        user_id: '{{ auth()->id() }}'
                    }),
                });
            }

        }
    </script>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">POST BUZZ</div>
                <div class="card-body">
                    <div id="successAlert" class="alert alert-success">
                        You are logged in!
                    </div>
                </div>
                <div class="row">
                    <h1>Button Click Tracking Example</h1>

                    <!-- Bootstrap Buttons -->
                    <button id="view" class="btn btn-danger">View</button>`
                    <br>
                    <button id="post" class="btn btn-danger">Post</button>

                    <!-- Add as many buttons as needed -->
                </div>
                <div class="row">

                    <table id="" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <button id="show" class="btn btn-primary">show</button>
                <br>
                <button id="chat" class="btn btn-primary">chat</button>
                <br>
                <button id="create" class="btn btn-success">Create</button>
                <br>
                <button id="delete" class="btn btn-success">Delete</button>
            </div>

        </div>
    </div>
    </div>
</body>

@endsection