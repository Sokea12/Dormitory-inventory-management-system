<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile Form</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
  }
  h2 {
    color: #333;
  }
  form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
  label {
    font-weight: bold;
  }
  input[type="file"] {
    display: none; /* Hide the file input */
  }
  .avatar-wrapper {
    position: relative;
    width: 150px;
    height: 150px;
    margin-bottom: 20px;
    cursor: pointer;
  }
  .avatar {
    border-radius: 50%;
    overflow: hidden;
    width: 100%;
    height: 100%;
    background-color: #e0e0e0;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 60px; /* Adjust the size of the icon */
    position: relative;
  }
  .avatar img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>
</head>
<body>

<h2>User Profile</h2>

<form id="profileForm" action="/submit_profile" method="post" enctype="multipart/form-data">
  <label for="avatar">Avatar:</label><br>
  <div class="avatar-wrapper">
    <div class="avatar">
      <i class="fas fa-user"></i> <!-- Font Awesome icon -->
    </div>
  </div>
  


  <input type="submit" value="Submit">
  
  <button type="button" style="padding: 0.300rem 0.300rem;" class="btn ql-image text-primary" data-toggle="tooltip" data-placement="bottom" title="បញ្ចូលរូបភាព" style="padding: 0.1rem 1.25rem;" onclick="document.getElementById('avatarInput').click()">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  width="24" height="24" fill="currentColor" class="w-5 h-5">
      <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd">
      </svg>
      <input type="file" id="avatarInput" name="avatar" accept="image/*" onchange="previewAvatar(event)"><br>
  </button>
</form>

<script>
function previewAvatar(event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function(event) {
    const imgElement = document.querySelector('.avatar img');
    if (imgElement) {
      imgElement.src = event.target.result;
    } else {
      const newImgElement = document.createElement('img');
      newImgElement.src = event.target.result;
      newImgElement.alt = 'Avatar';
      document.querySelector('.avatar').appendChild(newImgElement);
    }
  };

  reader.readAsDataURL(file);
}

document.getElementById('profileForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the form from submitting normally

  // Gather form data
  const formData = new FormData(this);
  
  // Display form data
  let formDataString = '';
  for (const [key, value] of formData.entries()) {
    formDataString += `${key}: ${value}\n`;
  }
  alert(formDataString);
});
</script>

</body>
</html>




