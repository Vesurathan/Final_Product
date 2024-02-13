@extends('auth.layouts')

@section('content')

<head>
    <!-- 
    <script>
        var csrfToken = '{{ csrf_token() }}';
    </script> -->

    <!-- <script>
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
            if (!handleMouseMove.lastSent || (Date.now() - handleMouseMove.lastSent > 300)) {
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
                document.getElementById('button_tab').addEventListener('click', function() {
                    console.log('Button Tab is clicked');
                    sendEventData('Button_Tab_click', {
                        buttonId: 'button_tab'
                    });
                });

                document.getElementById('Alerts_tab').addEventListener('click', function() {
                    console.log('Alerts_tab is clicked!');
                    sendEventData('Alerts_tab_click', {
                        buttonId: 'Alerts_tab'
                    });
                });

                document.getElementById('card_tab').addEventListener('click', function() {
                    console.log('card_tab is clicked!');
                    sendEventData('card_tab_click', {
                        buttonId: 'card_tab'
                    });
                });

                document.getElementById('form_tab').addEventListener('click', function() {
                    console.log('form_tab is clicked!');
                    sendEventData('form_tab_click', {
                        buttonId: 'form_tab'
                    });
                });


                document.getElementById('typography_tab').addEventListener('click', function() {
                    console.log('typography_tab clicked!');
                    sendEventData('typography_tab_click', {
                        buttonId: 'typography_tab'
                    });
                });


                document.getElementById('icon_tab').addEventListener('click', function() {
                    console.log('icon_tab clicked!');
                    sendEventData('icon_tab_click', {
                        buttonId: 'icon_tab'
                    });
                });


                document.getElementById('sample_tab').addEventListener('click', function() {
                    console.log('sample_tab clicked!');
                    sendEventData('sample_tab_click', {
                        buttonId: 'sample_tab'
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
    </script> -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />

</head>

<body>

    <div class=" row col-8" style="margin-left:350px;">
        <div class="card">
            <div class="card-body">
                <div id="successAlert" class="alert alert-success">
                    Admin is logged in!
                </div>
            </div>

        </div>
    </div>

    <!-- Body Wrapper-->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar" style="margin-top: 50px;">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">COMPANY COMPONENTS</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('customer.data') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>

                                <span id="button_tab" class="hide-menu">Customer</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('customer.dataview') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>

                                <span id="button_tab" class="hide-menu">Customer Data View</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                                <span id="Alerts_tab" class="hide-menu">Drivers Data</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                </span>
                                <span id="card_tab" class="hide-menu">Vehicles Data</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span id="form_tab" class="hide-menu">Probalitity Prediction</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-typography"></i>
                                </span>
                                <span id="typography_tab" class="hide-menu">Customers Data</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">EXTRA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-mood-happy"></i>
                                </span>
                                <span id="icon_tab" class="hide-menu">Reports</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i class="ti ti-aperture"></i>
                                </span>
                                <span id="sample_tab" class="hide-menu">Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!--  Header Start -->
            <header class="app-header">
            </header>
            <!--  Header End -->
            <div class="container-fluid" style="padding-top: 0px;">
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Sales Overview</h5>
                                    </div>
                                    <div>
                                        <select class="form-select">
                                            <option value="1">March 2023</option>
                                            <option value="2">April 2023</option>
                                            <option value="3">May 2023</option>
                                            <option value="4">June 2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Yearly Breakup -->
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <h5 class="card-title mb-9 fw-semibold">
                                            Yearly Breakup
                                        </h5>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="fw-semibold mb-3">RS 36,358</h4>
                                                <div class="d-flex align-items-center mb-3">
                                                    <span class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-arrow-up-left text-success"></i>
                                                    </span>
                                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                    <p class="fs-3 mb-0">last year</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-4">
                                                        <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                                        <span class="fs-2">2023</span>
                                                    </div>
                                                    <div>
                                                        <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                                        <span class="fs-2">2023</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-center">
                                                    <div id="breakup"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <!-- Monthly Earnings -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row alig n-items-start">
                                            <div class="col-8">
                                                <h5 class="card-title mb-9 fw-semibold">
                                                    Monthly Earnings
                                                </h5>
                                                <h4 class="fw-semibold mb-3">RS 6,820</h4>
                                                <div class="d-flex align-items-center pb-1">
                                                    <span class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-arrow-down-right text-danger"></i>
                                                    </span>
                                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                    <p class="fs-3 mb-0">last year</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-end">
                                                    <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-currency-dollar fs-6"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="earning"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <h5 class="card-title fw-semibold">Recent Transactions</h5>
                                </div>
                                <ul class="timeline-widget mb-0 position-relative mb-n5">
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            09:30
                                        </div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">
                                            Payment received from John Doe of RS 385.90
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            10:00 am
                                        </div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">
                                            New sale recorded
                                            <a href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            12:00 am
                                        </div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">
                                            Payment was made of RS 64.95 to Michael
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            09:30 am
                                        </div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">
                                            New sale recorded
                                            <a href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            09:30 am
                                        </div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">
                                            New arrival recorded
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            12:00 am
                                        </div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">
                                            Payment Done
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold mb-4">
                                    Recent Processes
                                </h5>
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Id</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Assigned</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Name</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Priority</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Budget</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">1</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                                    <span class="fw-normal">Web Designer</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">Elite Admin</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-primary rounded-3 fw-semibold">Low</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">RS 3.9</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">2</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                                                    <span class="fw-normal">Project Manager</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">Real Homes WP Theme</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-secondary rounded-3 fw-semibold">Medium</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">RS 24.5k</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">3</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Christopher Jamil</h6>
                                                    <span class="fw-normal">Project Manager</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">MedicalPro WP Theme</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-danger rounded-3 fw-semibold">High</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">RS 12.8k</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">4</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                                                    <span class="fw-normal">Frontend Engineer</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">Hosting Press HTML</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-success rounded-3 fw-semibold">Critical</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">RS 2.4k</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s5.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">MacBook Air Pro</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 650
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 900</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s7.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Red Valvet Dress</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 150
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 200</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Cute Soft Teddybear</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 285
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 345</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
                                <a href="javascript:void(0)"><img src="../assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..." /></a>
                                <a href="javascript:void(0)" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></a>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fw-semibold fs-4">Boat Headphone</h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="fw-semibold fs-4 mb-0">
                                        RS 50
                                        <span class="ms-2 fw-normal text-muted fs-3"><del>RS 65</del></span>
                                    </h6>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                        <li>
                                            <a class="" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>

@endsection