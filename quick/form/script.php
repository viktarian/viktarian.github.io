<?php
include('config.php');
include('ClassMySQL.php');
require '../PHPMailer/PHPMailerAutoload.php';
$mysql=new ClassMySQL();
if(isset($_POST['process']) and $_POST['process']=='script1'){
	$mysql->update($table='subscription',$name_column='send',$info=$_POST['send'],$id=$_POST['idNote']);
	echo'база успешно обновлена';
}

if(isset($_POST['process']) and $_POST['process']=='script2'){
	//база
	$lastId=$mysql->lastId($table='subscription',$name_column='id');
	$id=$lastId;
	
	for($id_user=$id;$id_user>7;$id_user=$id_user-1){
		$idNote=$mysql->textCell($table='subscription',$name_column='id',$id=$id_user);
		if($id_user=$idNote){
		
			
			$name=$mysql->textCell($table='subscription',$name_column='name',$id=$id_user);
			$email=$mysql->textCell($table='subscription',$name_column='email',$id=$id_user);
			
			
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

			// $mail->setFrom('test@cvr.by', 'Центр выгодных решений');
			$mail->setFrom('test@cvr.by', 'CVR');

			//$mail->addAddress('cvr.user@yandex.ru', 'John Doe');//spam
			$mail->addAddress($email, $name);//good
			// $mail->addAddress('viktarian2@mail.ru', 'John Doe');//good
			$mail->isHTML(true);
			$mail->Subject = 'PHPMailer sendmail test';
			$mail->Body = '
			<p>Здравствуйте, '.$name.'</p>
			<p>'.$_POST["text"].'</p>
			<p><a href="http://testemail.mvolna.by/unsubscribe.php?id='.$id.'">отписаться</a></p>
			';
			$mail->AltBody = 'This is a plain-text message body';
			//send the message, check for errors
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} 
			else {
				echo "Message sent!";
			}
		
		}
	
	}
	
	
	
	/* require '../PHPMailer/PHPMailerAutoload.php';
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
	$mail->addAddress('v.getpost@gmail.com', 'John Doe');//good
	// $mail->addAddress('viktarian2@mail.ru', 'John Doe');//good
	$mail->isHTML(true);
	$mail->Subject = 'PHPMailer sendmail test';
	$mail->Body = '
	<p>Здравствуйте, </p>
	<p>textarea</p>
	<p><a href="http://testemail.mvolna.by/unsubscribe.php?id=7">отписаться</a></p>
	';
	$mail->AltBody = 'This is a plain-text message body';
	//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else {
		echo "Message sent!";
	} */
}
?>