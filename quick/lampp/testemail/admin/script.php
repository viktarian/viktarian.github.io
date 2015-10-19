<?php
include('../config.php');
include('../library/ClassMySQL.php');
require '../library/PHPMailer/PHPMailerAutoload.php';
$mysql=new ClassMySQL();
if(isset($_POST['process']) and $_POST['process']=='script1'){
	$mysql->update($table='subscription',$name_column='send',$info=$_POST['send'],$id=$_POST['idNote']);
	echo'база успешно обновлена';
}

if(isset($_POST['process']) and $_POST['process']=='script2'){
	//база
	$lastId=$mysql->lastId($table='subscription',$name_column='id');
	$id=$lastId;
	
	for($id_user=$id;$id_user>0;$id_user=$id_user-1){
		// $idNote=$mysql->textCell($table='subscription',$name_column='id',$id=$id_user);
		$send=$mysql->textCell($table='subscription',$name_column='send',$id=$id_user);
		// if($id_user==$idNote){
		if($send=='1'){
		
			
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

			$mail->setFrom('test@cvr.by', 'Центр выгодных решений');
			//$mail->setFrom('test@cvr.by', 'CVR');

			//$mail->addAddress('cvr.user@yandex.ru', 'John Doe');//spam
			$mail->addAddress($email, $name);//good
			// $mail->addAddress('viktarian2@mail.ru', 'John Doe');//good
			$mail->isHTML(true);
			$mail->CharSet = "utf-8";
			$mail->Subject = 'PHPMailer sendmail test';
			// <p>Здравствуйте, '.$name.'</p>
			// <p>'.$_POST["text"].'</p>
			
			$mail->Body = '
<p>'.$_POST["text"].'</p>
';
$doc = new DOMDocument();
    @$doc->loadHTML($body);
    $xpd = new DOMXPath($doc);
    0&&$node = new DOMElement();
    $result = $xpd->query('//img');
    foreach($result as $node){
        $attr = $node->getAttribute('src');
        $re = '/(http:\/\/.*?)?(\/.*+)/i';
        if(preg_match_all($re, $attr, $matches)){
            if(!empty($matches[1][0])&&0)
                continue;
            $attr = 'http://'.$_SERVER['HTTP_HOST'].$matches[2][0];
        }
        $node->setAttribute('src',$attr);
    }
    false&&$node=new DOMElement()&&$child=new DOMElement();
    $result = $xpd->query('//style/..');
    foreach($result as $node){
        foreach($node->childNodes as $child){
            if(strtolower($child->nodeName)=='style'){
                $node->removeChild($child);
                $css = $child->textContent;
                $re = '/(.*?)\{([^}]+)\}/';
                if(preg_match_all($re, $css, $matches)){
                    foreach($matches[1] as $idx=>$css_selector){
                        $css_text = $matches[2][$idx];
                        $css_text = preg_replace('/\s+/',' ',$css_text);
                        $css = new CSSQuery($doc);
                        foreach($css->query($css_selector) as $selected_node){
                            $style = $selected_node->getAttribute('style');
                            $selected_node->setAttribute('style', $style?$css_text:$style.';'.$css_text);
                        }
                    }
                }
            }
        }
    }
    $mail->body = $doc->saveHTML();





			//<p><a href="http://testemail.mvolna.by/unsubscribe.php?id='.$id.'">отписаться</a></p>
			$mail->AltBody = 'This is a plain-text message body';
			//send the message, check for errors
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} 
			else {
				echo "Сообщение отправлено!";
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