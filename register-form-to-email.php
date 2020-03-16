<?php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=savingch_cas222', 'savingch_cas222user', 'Dusty2018$');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
    $error = 'Unable to connect to the database server.';
    include 'error.html.php';
    exit();
}

$msg = '';
//Don't run this unless we're handling a form submission
if (isset($_POST['name']) AND empty($_POST['honeypot'])) {
    /* Since the form has been submitted, let's capture the submission values so we can display them to the user on the success page */
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $emergency_name = $_POST['emergency_name'];
    $emergency_phone_number = $_POST['emergency_phone_number'];
    $size = $_POST['size'];
    $role = $_POST['role'];
    $saturday_courses = $_POST['saturday_courses'];
    $sunday_courses = $_POST['sunday_courses'];
    date_default_timezone_set('Etc/UTC');

    try {
        $sql = 'INSERT INTO registration SET
            name = :name,
            age = :age,
            gender = :gender,
            email = :email,
            emergency_name = :emergency_name,
            emergency_phone_number = :emergency_phone_number,
            size = :size,
            role = :role,
            saturday_courses = :saturday_courses,
            sunday_courses = :sunday_courses';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $name);
        $s->bindValue(':age', $age);
        $s->bindValue(':gender', $gender);
        $s->bindValue(':email', $email);
        $s->bindValue(':emergency_name', $emergency_name);
        $s->bindValue(':emergency_phone_number', $emergency_phone_number);
        $s->bindValue(':size', $size);
        $s->bindValue(':role', $role);
        $s->bindValue(':saturday_courses', $saturday_courses);
        $s->bindValue(':sunday_courses', $sunday_courses);

        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error fetching content: ' . $e->getMessage();
        include 'error.html.php';
        /* edit the include file path that works for the current site folder and file
 structure */
        exit();
    }

    require 'PHPMailer/PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->Host = 'mail.savingchildrenlife.com';
    $mail->Port = 587;

    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password
    $mail->Username = "phpmailer@savingchildrenlife.com";
    $mail->Password = "Dusty2018$";

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('phpmailer@savingchildrenlife.com', 'Phuong Vo');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('phuong.vo9@pcc.edu', 'Phuong Vo');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    $mail->addReplyTo($email, $name);
    $mail->Subject = 'CAS222 Registration Form';
        //Keep it simple - don't use HTML
        $mail->isHTML(true);
        //Build a simple message body
        $mail->Body = <<<EOT
    Email: $email<br>
    Name: $name<br>
    Age: $age<br>
    Gender: $gender<br>
    Emergency Contact Name: $emergency_name<br>
    Emergency Contact Phone Number: $emergency_phone_number<br>
    Size: $size<br>
    Role: $role<br>
    Saturday Course: $saturday_courses<br>
    Sunday Course: $sunday_courses
EOT;

        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            echo "Mailer Error:" .  $mail->ErrorInfo;
        } else {
            include 'registration-success.html.php';
        }
    } else {
    include 'index.php';
    }
?>
