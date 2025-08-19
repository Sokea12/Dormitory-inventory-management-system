<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image and Display in Textarea</title>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add any CSS stylesheets or internal styles here -->
    <style>
        /* Your CSS styles go here */
        #myTextarea {
            resize: none; /* Disable manual resizing */
            overflow: hidden; /* Hide scrollbar */
            min-height: 50px; /* Set minimum height */
        }
        #image-preview {
            margin-top: 10px;
            max-width: 2%;
            height: auto;
        }
        .upload-icon {
            font-size: 24px;
            color: #333;
            cursor: pointer;
        }
        .upload-icon:hover {
            color: #666;
        }
    </style>
</head>
<body>
<div id="content-container">
                                    <div id="quill-tool">
                                        <button class="ql-bold" data-toggle="tooltip" data-placement="bottom" title="Bold"></button>
                                        <button class="ql-underline" data-toggle="tooltip" data-placement="bottom" title="Underline"></button>
                                        <button class="ql-italic" data-toggle="tooltip" data-placement="bottom" title="Add italic text <cmd+i>"></button>
                                        <!-- <button class="ql-image" data-toggle="tooltip" data-placement="bottom" title="Upload image"></button> -->
                                        <button class="ql-code-block" data-toggle="tooltip" data-placement="bottom" title="Show code"></button>
                                    </div>
                                    <div id="quill-toolbar" style="min-height: 150px;"> </div>

                                   <div id="tbnRemovefile" class="alert alert-secondary mt-3" role="alert">
                                        <div class="iq-alert-text">A simple alert—check it out!</div>
                                        <input type="file" name="filepo" id="filepo">
                                        <a type="button" class="tbnRemovefile" onclick="removeFile()">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  width="24" height="24" fill="currentColor" class="w-5 h-5">
                                            <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
    <!-- Your HTML content goes here -->
    <div>
        <textarea id="myTextarea" rows="4" cols="50">Enter text here...</textarea>
        <br>
        <label for="image-upload" class="upload-icon"><i class="fas fa-upload"></i></label>
        <input type="file" id="image-upload" accept="image/*" style="display: none;">
    </div>
    <div id="image-preview"></div>

    <!-- Add any JavaScript scripts here -->
    <script>
        // Add event listener to the upload button
        document.querySelector('.upload-icon').addEventListener('click', function() {
            document.getElementById('image-upload').click();
        });

        // Handle file selection
        document.getElementById('image-upload').addEventListener('change', function(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imagePreview = document.getElementById('image-preview');
                imagePreview.innerHTML = '<img src="' + e.target.result + '" alt="Uploaded Image" style="max-width: 100%; height: auto;">';
            };

            reader.readAsDataURL(file);
        });
    </script>
</body>
</html>
