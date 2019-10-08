<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

//if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $firstname = $_POST['firstname'];
  $email = $_POST['mail'];
  $subject = $_POST['subject'];
  $message = $_POST['msg'];

  $mail = new PHPMailer(true);

  $mail->SMTPDebug = 2;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'mbeites@gmail.com';
  $mail->Password = 'xxuwsujdxnszycxp';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  //Recipients
  $mail->setFrom($email, $name);
  $mail->addAddress('mbeites@gmail.com', 'Mickael Beites');
  $mail->addReplyTo('info@example.com', 'Information');
  $mail->addCC('cc@example.com');
  $mail->addBCC('cc@example.com');

  /*$mail->addAttachment('/var/tmp/file.tar.gz');
  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
  */

  $mail->isHTML(true);
  $mail->Subject = $subject;
  $mail->Body = $message;

  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
      echo "Message sent!";
      header('Location: index.html');
      //Section 2: IMAP
      //Uncomment these to save your message in the 'Sent Mail' folder.
      #if (save_mail($mail)) {
      #    echo "Message saved!";
      #}
}
