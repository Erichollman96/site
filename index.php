<!DOCTYPE html>
<html>
<head>

</head>
<body>

<div class="row">
    <div class="col-md-4">
        <label>
            Comparing multiple players? (max 5)
            <input type="radio" name="editList" id="multiplayerno"> No
            <input type="radio" name="editList" id="multiplayeryes"> Yes
        </label>
        <br>
        <label>
            Choose a statistic category from this list:
            <input list="statcategory" name="choosestat" />
        </label>
        <datalist id="statcategory">
            <option value="Passing">
            <option value="Rushing">
            <option value="Receiving">
        </datalist>
        <label>
            Choose a player from this list:
            <input list="players" name="chooseplayer" />
        </label>
        <datalist id="players">
            <option value="Tom Brady">
            <option value="Firefox">
        </datalist>
        <br>
        <button id="addplayerbtn" type="button" hidden>
            + Add a player
        </button>
        <ul id="inputList"></ul>

    </div>

    <button id="runButton">Run Python Script</button>

    <script>
        document.getElementById("runButton").addEventListener("click", function () {
            const { exec } = require('child_process');
            const pythonScript = 'statscraperushing.py';

            exec(`python ${pythonScript}`, (error, stdout, stderr) => {
                if (error) {
                    console.error(`Error executing Python script: ${error}`);
                    return;
                }

                console.log(`Python script output: ${stdout}`);
            });
        });
    </script>

    <script>
        // Get references to the radio buttons
        var multiplayeryes = document.getElementById("multiplayeryes");
        var multiplayerno = document.getElementById("multiplayerno");
        var addplayerbtn = document.getElementById("addplayerbtn");

        // Add event listeners to the radio buttons
        multiplayeryes.addEventListener("change", toggleButton);
        multiplayerno.addEventListener("change", toggleButton);
        addplayerbtn.addEventListener("change", toggleButton);


        // Function to toggle the button based on radio button selection
        function toggleButton() {
            if (multiplayeryes.checked) {
                addplayerbtn.style.display = "block"; // Show the button
            } else {
                addplayerbtn.style.display = "none"; // Hide the button
            }
        }
    </script>

    <script>
        // Function to add an input field
        function addInputField() {
            // Create a new input element
            var input = document.createElement("input");
            input.type = "text";
            input.placeholder = "Add a player...";

            // Create a list item element
            var listItem = document.createElement("li");

            // Append the input field to the container
            listItem.appendChild(input);

            // Get the list where you want to insert the input field
            var list = document.getElementById("inputList");

             // Append the list item to the list
            list.appendChild(listItem);
        }

        // Get the button element and add a click event listener to it
        var addButton = document.getElementById("addplayerbtn");
        addButton.addEventListener("click", addInputField);
    </script>

   <h1>Generate a Graph</h1>

<form action="/submit" method="post">
<label for="user_input">Enter a year:</label>
        <input type="text" id="user_input" name="user_input">
<input type="submit" value="Generate Graph">

</form>

</div>

<img src="/home/erich/Projects/NewProjects/footballstats/CurrentGraph.png" alt="No graph!">

</body>
</html>