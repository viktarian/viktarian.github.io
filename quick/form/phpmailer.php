<?php
echo'test1<br>';
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();

//$mail->Host='smtp.mail.ru';
$mail->Host='smtp.yandex.ru';

$mail->SMTPAuth=true;

// $mail->Username='viktarian1';
// $mail->Password='vitik145145145';
$mail->SMTPSecure='ssl';

$mail->Username='test@cvr.by';
$mail->Password='2KPafAFAyEyEI5ccBYee';
// $mail->SMTPSecure='tls';

$mail->Port='465';

//$mail->setFrom('viktarian1@mail.ru', 'First Last');

// $mail->setFrom('viktarian1@yandex.ru', 'First Last');

$mail->setFrom('test@cvr.by', 'First Last');

//$mail->addAddress('cvr.user@yandex.ru', 'John Doe');//spam
//$mail->addAddress('v.getpost@gmail.com', 'John Doe');//good
$mail->addAddress('viktarian2@mail.ru', 'John Doe');//good
echo'test9<br>';
$mail->isHTML(true);
echo'test6<br>';
$mail->Subject = 'PHPMailer sendmail test';
$mail->Body = '<p>Body</p>';
$mail->AltBody = 'This is a plain-text message body';
echo'test3<br>';
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else {
    echo "Message sent!";
}
echo'test2<br>';
?>