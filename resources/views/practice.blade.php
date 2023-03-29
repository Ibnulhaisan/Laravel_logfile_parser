<!DOCTYPE html>
<html>
<head>
    <title>jQuery Example</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<!-- HTML content -->
<h1>jQuery Example</h1>
<p>Click the button to change the text color.</p>
<button id="change-color">Change Color</button>
<p id="text">This is the original text.</p>

<!-- jQuery script -->
<script>
    // Wait for the document to load
    $(document).ready(function() {
        // Add a click event listener to the button
        $('#change-color').click(function() {
            // Change the text color to red
            $('#text').css('color', 'red');
        });
    });
</script>
</body>
</html>
