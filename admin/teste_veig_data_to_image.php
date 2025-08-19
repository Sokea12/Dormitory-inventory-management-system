<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>File Input</title>
</head>
<body>

<!-- Your file input element -->
<input type="file" id="avatarInput" name="avatarInput" accept="image/*" onchange="previewAvatar(event)" style="display: none">

<!-- Button to trigger file input -->
<button onclick="triggerFileInput()">Select File</button>

<!-- Preview image -->
<img id="previewImage" src="#" alt="Preview" style="display: none; max-width: 100px; max-height: 100px;">

<script>
// Function to trigger file input
function triggerFileInput() {
    document.getElementById('avatarInput').click();
}

// Function to handle file selection and preview
function previewAvatar(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewImage');

    // Ensure file is selected
    if (file) {
        const reader = new FileReader();

        // Set up reader onload callback
        reader.onload = function(e) {
            preview.src = e.target.result; // Set preview image source
            preview.style.display = 'block'; // Show preview image
        };

        // Read the file as a data URL
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}
</script>

</body>
</html>
