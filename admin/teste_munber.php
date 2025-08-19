<script>
    var _selectItem = 'Hello120';

    // Use a regular expression to extract numbers
    var numbersOnly = _selectItem.replace(/\D/g, '');
    // Convert the extracted numbers to a new variable
    var extractedNumbers = parseInt(numbersOnly);
    console.log(extractedNumbers); // Output: 120

   
    alert(numbersOnly);
    alert(extractedNumbers);
    
    
    var _selectItem = "Hello120";
    var trimmedResult = _selectItem.replace(/\d+$/, '');
    console.log(trimmedResult); // Output: Hello

    alert(trimmedResult);


</script>