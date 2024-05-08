<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <div class="content bg-dark text-light pb-3">
        <div class="container pt-4 px-4 mb-20">
            <div class="bg rounded h-140 p-5">
                <h2 class="mb-4">Delivery Prediction</h2>
                <form method="POST" action="{{ route('check.probability') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" required oninvalid="this.setCustomValidity('Please enter customer name')" oninput="setCustomValidity('')">
                    </div>
                    <div class="mb-3">
                        <label for="customer_address" class="form-label">Customer Address</label>
                        <input type="text" class="form-control" id="customer_address" name="customer_address" required oninvalid="this.setCustomValidity('Please enter customer address')" oninput="setCustomValidity('')">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="customer_phone" class="form-label">Customer Phone</label>
                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" required oninvalid="this.setCustomValidity('Please enter customer phone')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-md-6">
                            <label for="customer_email" class="form-label">Customer Email</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" required oninvalid="this.setCustomValidity('Please enter a valid email address')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cod" class="form-label">Cash On Delivery</label>
                            <input type="text" class="form-control" id="cod" name="cod" required oninvalid="this.setCustomValidity('Please enter COD amount')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-md-6">
                            <label for="weight" class="form-label">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight" required oninvalid="this.setCustomValidity('Please enter weight')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pickup_address" class="form-label">Pickup Address</label>
                        <input type="text" class="form-control" id="pickup_address" name="pickup_address" required oninvalid="this.setCustomValidity('Please enter pickup address')" oninput="setCustomValidity('')">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="origin_city_name" class="form-label">Origin City Name</label>
                            <input type="text" class="form-control" id="origin_city_name" name="origin_city_name" required oninvalid="this.setCustomValidity('Please enter origin city name')" oninput="setCustomValidity('')">
                        </div>
                        <div class="col-md-6">
                            <label for="destination_city_name" class="form-label">Destination City Name</label>
                            <input type="text" class="form-control" id="destination_city_name" name="destination_city_name" required oninvalid="this.setCustomValidity('Please enter destination city name')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <label for="origin_country" class="form-label">Origin Country</label>
                    <input type="text" class="form-control" id="origin_country" name="origin_country" required oninvalid="this.setCustomValidity('Please enter origin country')" oninput="setCustomValidity('')">
            </div>
            <button type="submit" class="btn btn-primary" name="action" value="save">Save & Execute</button>
            </form>
        </div>
    </div>

    <!-- Probability Modal -->
    <div class="modal fade" id="probabilityModal" tabindex="-1" aria-labelledby="probabilityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="probabilityModalLabel">Delivery Probability</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Dynamic content will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var inputs = document.querySelectorAll('input');
            var isValid = true;

            inputs.forEach(function(input) {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                alert('Please fill in all fields.');
                return false;
            }

            return true;
        }
    </script>

    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let probability = "{{ session('success') }}";
            let message = "";
            // Assuming the probability value is directly in the session message,
            // and parsing it to get the numeric value.
            let probabilityValue = parseFloat(probability.replace(/[^\d.]/g, ''));


            // Populate and show the modal
            let modalBody = document.querySelector('#probabilityModal .modal-body');
            modalBody.innerHTML = `<p><span class="badge text-bg-success">${probability}</span></p><p>${message}</p>`;

            // Assuming you have Bootstrap's JavaScript loaded
            let probabilityModal = new bootstrap.Modal(document.getElementById('probabilityModal'));
            probabilityModal.show();
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show error in a modal or an alert
            alert("{{ session('error') }}");
        });
    </script>
    @endif

    <!-- @if(session('success'))
    <script>
        let probability = "{{ session('success') }}";
        let message = "";
        // Assuming the probability value is directly in the session message,
        // and parsing it to get the numeric value.
        let probabilityValue = parseFloat(probability.replace(/[^\d.]/g, ''));

        if (probabilityValue < 50) {
            message = "Customer can't perform cash on delivery.";
        } else {
            message = "Customer can perform cash on delivery.";
        }

        // Showing the probability and the message
        alert(`Probability: ${probability}\n${message}`);
    </script>
    @endif

    @if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
    @endif -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>