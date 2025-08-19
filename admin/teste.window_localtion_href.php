<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Form Page</title>
</head>
<body>

    <form id="myForm">
        <!-- Your form fields go here -->
        <input type="submit" value="Submit">
    </form>

    <script>
        document.getElementById('myForm').addEventListener('submit', function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Your code to handle the form submission goes here

            // Close the current page or perform any other action
            window.close(); // This will close the current browser tab/window
        });
    </script>

</body>
</html>
