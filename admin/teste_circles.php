<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Circle Design</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 20px;
    }

    .blue-circle {
      background-color: blue;
    }

    .half-circle {
      background: linear-gradient(to right, blue 50%, white 50%);
    }

    .blue-border {
      background-color: white;
      border: 2px solid blue;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="circle blue-circle"></div>
        <span>Blue Circle</span>
      </div>
      <div class="col-md-4">
        <div class="circle half-circle"></div>
        <span>Half Blue Circle</span>
      </div>
      <div class="col-md-4">
        <div class="circle blue-border"></div>
        <span>Circle with Blue Border</span>
      </div>
    </div>
  </div>
</body>
</html>
