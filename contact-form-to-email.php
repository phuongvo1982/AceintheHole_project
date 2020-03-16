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
    $email = $_POST['email'];
    $role = $_POST['role'];
    $message = $_POST['message'];
    date_default_timezone_set('Etc/UTC');

    try {
        $sql = 'INSERT INTO contact SET
            name = :name,
            email = :email,
            role = :role,
            message = :message';
        $s = $pdo->prepare($sql);
        $s->bindValue(':name', $name);
        $s->bindValue(':email', $email);
        $s->bindValue(':role', $role);
        $s->bindValue(':message', $message);

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
    $mail->Subject = 'CAS222 Contact form';
        //Keep it simple - don't use HTML
        $mail->isHTML(true);
        //Build a simple message body
        $mail->Body = <<<EOT
    Email: $email<br>
    Name: $name<br>
    Role: $role<br>
    Message: $message
EOT;

        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            echo "Mailer Error:" .  $mail->ErrorInfo;
        } else {
            include 'contact-success.html.php';
        }
    } else {
    include 'index.php';
    }
?>



