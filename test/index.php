<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Registration Email</title>
</head>
<body>
    <h2>Send Registration Email</h2>
    <!-- Form that sends POST request to the PHP script -->
    <form action="send_email.php" method="post">
        <label for="id">Enter User ID:</label>
        <input type="number" id="id" name="id" required>
        <br><br>
        <button type="submit">Send Registration Link</button>
    </form>
</body>
</html>
