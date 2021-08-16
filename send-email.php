<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        $toEmail_1 = 'geral@arquetipus.pt'; // $_POST['email'];
        $toname_1 = 'Arquetipus'; // $_POST['name'];

        $toEmail_2 = 'nelson-matos@hotmail.com'; // $_POST['email'];
        $toname_2 = 'Nelson Matos'; // $_POST['name'];

        $subject = $_POST['subject'];
        $message = $_POST['message'];

        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'arquetipus3d@gmail.com';                     //SMTP username
        $mail->Password   = '!idt4450';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('arquetipus3d@gmail.com', 'Arquetipus 3D Website');
        $mail->addAddress($toEmail_1, $toname_1);
        $mail->addAddress($toEmail_2, $toname_2);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Contacto de cliente - ' . $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>