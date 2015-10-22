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
<!DOCTYPE html>
<html>
<head>
<!-- If you delete this tag, the sky will fall on your head -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Poligraff.by</title>

</head>
 <style>
 * { 
	margin:0;
	padding:0;
}
* { font-family: Century Gothic; }

img { 
	max-width: 100%; 
}
.collapse {
	margin:0;
	padding:0;
}
body {
	-webkit-font-smoothing:antialiased; 
	-webkit-text-size-adjust:none; 
	width: 100%!important; 
	height: 100%;
}
a { color: #2BA6CB;}

.btn {
    text-decoration: none;
    color: #FFF;
    background-color: #076696;
    padding: 10px 16px;
    font-weight: bold;
    margin-right: 10px;
    margin-left: 15px;
   
    text-align: center;
    cursor: pointer;
    display: inline-block;
}

p.callout {
	padding:15px;
	background-color:#ECF8FF;
	margin-bottom: 15px;
}
.callout a {
	font-weight:bold;
	color: #2BA6CB;
}

table.social {
	background-color: #ebebeb;
	
}
.social .soc-btn {
	padding: 3px 7px;
	font-size:12px;
	margin-bottom:10px;
	text-decoration:none;
	color: #FFF;font-weight:bold;
	display:block;
	text-align:center;
}
a.fb { background-color: #3B5998!important; }
a.tw { background-color: #1daced!important; }
a.gp { background-color: #DB4A39!important; }
a.ms { background-color: #000!important; }

.sidebar .soc-btn { 
	display:block;
	width:100%;
}
table.head-wrap { width: 100%;}

.header.container table td.logo { padding: 15px; }
.header.container table td.label { padding: 15px; padding-left:0px;}
table.body-wrap { width: 100%; background: #efefef;}
table.footer-wrap { width: 100%;	clear:both!important;
}
.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
.footer-wrap .container td.content p {
	font-size:10px;
	font-weight: bold;
	
}
h1,h2,h3,h4,h5,h6 {
font-family: Century Gothic, Arial, sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
}
h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

h1 { font-weight:200; font-size: 44px;     padding: 0px 15px;}
h2 { font-weight:200; font-size: 37px;}
h3 { font-weight:500; font-size: 27px;     padding: 0px 15px;}
h4 { font-weight:500; font-size: 23px;}
h5 { font-weight:900; font-size: 17px;}
h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

.collapse { margin:0!important;}

p, ul { 
	margin-bottom: 10px; 
	font-weight: normal; 
	font-size:14px; 
	line-height:1.6;
	    padding: 0px 15px;
}
p.lead { font-size:17px; }
p.last { margin-bottom:0px;}

ul li {
	margin-left:5px;
	list-style-position: inside;
}
ul.sidebar {
	background:#ebebeb;
	display:block;
	list-style-type: none;
}
ul.sidebar li { display: block; margin:0;}
ul.sidebar li a {
	text-decoration:none;
	color: #666;
	padding:10px 16px;
	margin-right:10px;
	cursor:pointer;
	border-bottom: 1px solid #777777;
	border-top: 1px solid #FFFFFF;
	display:block;
	margin:0;
}
ul.sidebar li a.last { border-bottom-width:0px;}
ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}
.container {
	display:block!important;
	max-width:600px!important;
	margin:0 auto!important; /* makes it centered */
	clear:both!important;
}

.content {
	padding:15px 0px;
	max-width:600px;
	margin:0 auto;
	display:block; 
}

.content table { width: 100%; }


.column {
	width: 300px;
	float:left;
}
.column tr td { padding: 15px; }
.column-wrap { 
	padding:0!important; 
	margin:0 auto; 
	max-width:600px!important;
}
.column table { width:100%;}
.social .column {
	width: 280px;
	min-width: 279px;
	float:left;
}

.clear { display: block; clear: both; }


@media only screen and (max-width: 600px) {
	
	a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

	div[class="column"] { width: auto!important; float:none!important;}
	
	table.social div[class="column"] {
		width:auto!important;
	}

}
 </style>
<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#efefef">
	<tr>
		<td></td>
		<td class="header container">
			
			
				<div class="content">
					<table bgcolor="#ffffff">
					<tr>
						<td><img src="http://cvr.by/images/card.jpg" /></td>
						<!-- <td align="right"><h6 class="collapse">контакты</h6></td>-->
					</tr>
				</table>
				</div>
				
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->


<!-- BODY -->
<p>'.$_POST["text"].'</p>
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#fff">

			<div class="content">
			<table>
				<tr>
					<td>
						
						<h3>Акции</h3>
						<p class="lead">Самые лучшие предложения от Poligraff за октябрь!</p>
						<a class="btn">Посмотреть</a>
						
						<!-- A Real Hero (and a real human being) -->
						<p><a href="http://poligraff.by"><img src="http://cvr.by/images/card1.jpg" /></a></p><!-- /hero -->
						
						<!-- Callout Panel -->
						<p class="callout">
							Хотите больше предложений? <a href="http://poligraff.by">Вам сюда!</a>
						</p><!-- /Callout Panel -->
						
						<h3>Новинки<small></small></h3>
						<p>Ручки и карандаши, полиграфическая продукция по самым низким ценам. </p>
						<a class="btn">Посмотреть</a>
							<p><a href="http://poligraff.by"><img src="http://cvr.by/images/card2.jpg" /></a></p><!-- /hero -->					
						<br/>
						<br/>							
												
						<!-- social & contact -->
						<table class="social" width="100%">
							<tr>
								<td>
									
									<!--- column 1 -->
									<table align="left" class="column">
										<tr>
											<td>				
												
												<h5 class="">Мы в соцсетях:</h5>
												<p class=""><!--- <a href="#" class="soc-btn fb">Facebook</a> <a href="#" class="soc-btn tw">Twitter</a> <a href="#" class="soc-btn gp">Google+</a>--> 
												<a href="#" class="soc-btn fb">VK</a> <a href="#" class="soc-btn gp">Youtube</a> 
												</p>
						
												<!-- Callout Panel -->
						<p class="callout">
							Вы хотите <a href="http://testemail.mvolna.by/unsubscribe.php?id='.$id.'">отписаться от рассылки?</a>
						</p><!-- /Callout Panel -->
											</td>
										</tr>
									</table><!-- /column 1 -->	
									
									<!--- column 2 -->
									<table align="left" class="column">
										<tr>
											<td>				
																			
												<h5 class="">Контактная информация</h5>												
												<p><strong>+375 (29) 331-96-90</strong><br/>
                Email: <strong><a href="emailto:info@vsebloknoty.by">info@poligraff.by</a></strong></p>
                
											</td>
										</tr>
									</table><!-- /column 2 -->
									
									<span class="clear"></span>	
									
								</td>
							</tr>
						</table><!-- /social & contact -->
					
					
					</td>
				</tr>
			</table>
			</div>
									
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
			
				<!-- content -->
				<div class="content">
				<table>
				<tr>
					<td align="center">
						<p>
							<a href="#">Каталог продукции</a> |
							<a href="#">Цены</a> |
							<a href="#"><unsubscribe>О нас</unsubscribe></a>
						</p>
					</td>
				</tr>
			</table>
				</div><!-- /content -->
				
		</td>
		<td></td>
	</tr>
</table><!-- /FOOTER -->
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