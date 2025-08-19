<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table Scraping Example</title>
</head>
<body>

<table id="myTable">
  <thead>
    <tr>
      <th>Name</th>
      <th>Age</th>
      <th>Country</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>John Doe</td>
      <td>25</td>
      <td>USA</td>
    </tr>
    <tr>
      <td>Jane Doe</td>
      <td>30</td>
      <td>Canada</td>
    </tr>
    <!-- Add more rows as needed -->
  </tbody>
</table>

<div id="output"></div>

<script>
  // Function to scrape data from the table and display it
  function scrapeAndDisplayTable() {
    // Get the table element by its ID
    var table = document.getElementById('myTable');
    
    // Get all rows from the table
    var rows = table.getElementsByTagName('tr');
    
    // Create an output element
    var outputElement = document.getElementById('output');
    
    // Loop through the rows
    for (var i = 0; i < rows.length; i++) {
      // Get the cells in the current row
      var cells = rows[i].getElementsByTagName('td');
      
      // Display the data in the output element
      for (var j = 0; j < cells.length; j++) {
        outputElement.innerHTML += cells[j].innerText + ' ';
      }
      
      // Add a line break after each row
      outputElement.innerHTML += '<br><hr>';
    }
  }

  // Call the function to scrape the table and display the data
  scrapeAndDisplayTable();
</script>

</body>
</html>
