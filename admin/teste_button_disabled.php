<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buttons Example</title>
</head>
<body>

    <!-- First button -->
    <button id="button1" onclick="handleButtonClick()">Click me to disable Button 2</button>

    <!-- Second button -->
    <button id="button2" onclick="handleButtonClick2()">Button 2</button>

    <!-- Third button to enable Button 2 -->
    <button id="button3" onclick="handleButton3Click()">Click me to enable Button 2</button>

    <!-- Your script to handle button click -->
    <script>
        function handleButtonClick() {
            alert("Button 1 clicked!");

            // Disable Button 2
            document.getElementById('button2').disabled = true;
        }

        function handleButtonClick2() {
            alert("Button 2 clicked!");
        }

        function handleButton3Click() {
            alert("Button 3 clicked!");

            // Enable Button 2
            document.getElementById('button2').disabled = false;
        }
    </script>

</body>
</html>

<br><br>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Example</title>
</head>
<body>

    <!-- Select dropdown -->
    <select id="selectOption" onchange="handleSelectChange()">
        <option value="1">Disable Button 2</option>
        <option value="2">Enable Button 2</option>
    </select>

    <!-- Button 1 -->
    <button id="button1" onclick="handleButtonClick()">Button 1</button>

    <!-- Button 2 -->
    <button id="button2" onclick="handleButtonClick2()">Button 2</button>

    <!-- Your script to handle select change and button clicks -->
    <script>
        function handleButtonClick() {
            alert("Button 1 clicked!");
        }

        function handleButtonClick2() {
            alert("Button 2 clicked!");
        }

        function handleSelectChange() {
            var selectedOption = document.getElementById('selectOption').value;
            if (selectedOption === '1') {
                // Disable Button 2
                document.getElementById('button2').disabled = true;
            } else if (selectedOption === '2') {
                // Enable Button 2
                document.getElementById('button2').disabled = false;
            }
        }
    </script>

</body>
</html>

<br><br>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Example</title>
</head>
<body>

    <!-- Select dropdown -->
    <select id="selectOption">
        <option value="1">Disable Button 2</option>
        <option value="2">Enable Button 2</option>
    </select>

    <!-- Button 1 -->
    <button id="button1" onclick="handleButtonClick()">Click me to disable select</button>

    <!-- Button 2 -->
    <button id="button2" onclick="handleButtonClick2()">Button 2</button>

    <!-- Your script to handle button clicks -->
    <script>
        function handleButtonClick() {
            alert("Button 1 clicked!");
            document.getElementById('selectOption').disabled = true;
        }

        function handleButtonClick2() {
            alert("Button 2 clicked!");
        }
    </script>

</body>
</html>
