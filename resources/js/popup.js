if (session("success")) probability = "{{ session('success') }}";
let message = "";
// Assuming the probability value is directly in the session message,
// and parsing it to get the numeric value.
let probabilityValue = parseFloat(probability.replace(/[^\d.]/g, ""));

if (probabilityValue < 50) {
    message = "Customer can't perform cash on delivery.";
} else {
    message = "Customer can perform cash on delivery.";
}

// Showing the probability and the message
alert(`Probability: ${probability}\n${message}`);

endif;

if (session("error")) alert("{{ session('error') }}");

endif;
