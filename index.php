<form action="" method="post" enctype="multipart/form-data">
    email: <input type="email" name="email">
    subject: <input type="text" name="subject">
    message: <input type="text" name="message">
    <button type="submit" name="send">send</button>
</form>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';


if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sangameshwargupta2018@gmail.com';
    $mail->Password = 'sdonjiqjbbxnoltv';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $mail->Port = 465;

    $mail->setFrom('sangameshwargupta2018@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->addReplyTo('sangameshwargupta2018@gmail.com');
    $mail->isHTML(true);
   
// $attachment='C:\xampp\htdocs\phpmailer\RESUME_ARUN_SAI_NIHITH.docx';
//   $mail->addAttachment($attachment , 'RESUME_ARUN_SAI_NIHITH.docx');
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];
  

    $mail->send();

    echo "
    <script>
    alert('sent successfully');
    document.location.href = 'index.php';
    </script>
    ";
}
?>