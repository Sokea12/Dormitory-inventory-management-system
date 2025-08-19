
// Define the function to be executed on click
function handleClick() {
  alert("Button clicked!");
}

// Get the button element by its ID
var a = document.getElementById("myButton");

// Attach the handleClick function to the button's onclick event
a.onclick = handleClick;

// <!DOCTYPE html>
// <html lang="en">
// <head>
//   <meta charset="UTF-8">
//   <meta name="viewport" content="width=device-width, initial-scale=1.0">
//   <title>Clickable List</title>
//   <style>
//     /* Add some basic styling to the list items */
//     ul {
//       list-style-type: none;
//       padding: 0;
//     }

//     li {
//       cursor: pointer;
//       padding: 10px;
//       margin: 5px;
//       border: 1px solid #ccc;
//     }

//     li.active {
//       background-color: #e0e0e0;
//     }
//   </style>
// </head>
// <body>

// <!-- Create an unordered list with list items -->
// <ul id="troopList">
//   <li onclick="activateItem(this)">Troop 1</li>
//   <li onclick="activateItem(this)">Troop 2</li>
//   <li onclick="activateItem(this)">Troop 3</li>
//   <!-- Add more items as needed -->
// </ul>

// <script>
//   // Function to handle item activation
//   function activateItem(item) {
//       alert(item);
//     // Remove 'active' class from all list items
//     var listItems = document.querySelectorAll('#troopList li');
//     listItems.forEach(function(li) {
//       li.classList.remove('active');
//     });

//     // Add 'active' class to the clicked item
//     item.classList.add('active');
    
//     // Perform any additional actions here
//     // For example, you can retrieve the text content of the clicked item
//     var troopName = item.textContent;
//     console.log(troopName + ' clicked!');
//   }
// </script>

// </body>
// </html>
