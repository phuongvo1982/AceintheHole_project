<!DOCTYPE html>
<html lang="en">
<head>
    <title>Success Page</title>
</head>
<body>
    <main>
        <h1>Thank you!</h1>
        <p>Our records show you submitted the following:<br>
            Name: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?><br>
            Age: <?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?><br>
            Gender: <?php echo htmlspecialchars($gender, ENT_QUOTES, 'UTF-8'); ?><br>
            Email: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?><br>
            Emergency Contact Name: <?php echo htmlspecialchars($emergency_name, ENT_QUOTES, 'UTF-8'); ?><br>
            Emergency Contact Phone Number: <?php echo htmlspecialchars($emergency_phone_number, ENT_QUOTES, 'UTF-8'); ?><br>
            T-shirt Size: <?php echo htmlspecialchars($size, ENT_QUOTES, 'UTF-8'); ?><br>
            Role: <?php echo htmlspecialchars($role, ENT_QUOTES, 'UTF-8'); ?><br>
            Saturday Course: <?php echo htmlspecialchars($saturday_courses, ENT_QUOTES, 'UTF-8'); ?><br>
            Sunday Course: <?php echo htmlspecialchars($sunday_courses, ENT_QUOTES, 'UTF-8'); ?><br>
        </p>
    </main>
</body>
</html>
