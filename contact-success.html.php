<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sucess Page</title>
</head>
<body>
    <main>
        <h1>Thank you!</h1>
        <p>Our records show you submitted the following:<br>
            Name: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?><br>
            Email: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?><br>
            Role: <?php echo htmlspecialchars($role, ENT_QUOTES, 'UTF-8'); ?><br>
            Message: <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?><br>
        </p>
    </main>
</body>
</html>
