<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require('./PHPMailer/src/PHPMailer.php');
  require('./PHPMailer/src/SMTP.php');
  require('./PHPMailer/src/Exception.php');


  $mail = new PHPMailer(TRUE);
  /* SMTP parameters. */
  /* SMTP debug level */
  $mail->SMTPDebug = 2;
  /* Tells PHPMailer to use SMTP. */
  $mail->isSMTP();
  /* SMTP server address. */
  $mail->Host = 'smtp.gmail.com';
  /* Use SMTP authentication. */
  $mail->SMTPAuth = TRUE;
  /* Set the encryption system. */
  $mail->SMTPSecure = 'tls';
  /* SMTP authentication username. */
  $mail->Username = $my_email_addr;
  /* SMTP authentication password. */
  $mail->Password = getenv('EMAIL_PWD');
  /* Set the SMTP port. */
  $mail->Port = 587;

?>