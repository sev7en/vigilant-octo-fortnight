<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <form id="registrationForm">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="key">Account Key (50 chars):</label>
        <input type="text" id="key" name="key" pattern=".{50,50}" title="Key must be 50 characters" required><br>

        <button type="button" onclick="submitForm()">Submit</button>
    </form>

    <script>
        function submitForm() {
            var username = document.getElementById("username").value;
            var key = document.getElementById("key").value;

            var data = {
                username: username,
                key: key
            };

            // Assuming you have a PHP script to handle the data on the server
            fetch('/saveUserData.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
