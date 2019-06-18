<?php
	// require_once "/home/debi5d/public_html/analytics/config.php";
	// require_once "/home/debi5d/public_html/analytics/lib/medoo/medoo.php";
	
	function sendmail($emailtujuan,$emailsubject,$content,$emailCC,$attachment = array()){
		require_once("class.phpmailer.php");
		try {
			$mail = new PHPMailer(true); //New instance, with exceptions enabled

			$mail->IsSMTP();                           // tell the class to use SMTP
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Port       = 587;                    // set the SMTP server port
			$mail->Host       = "smtp.gmail.com"; // SMTP server
			$mail->Username   = "activation@limadigit.com";     // SMTP server username
			$mail->Password   = "l1m4d1g1t";            // SMTP server password

			//$mail->IsSendmail();  // tell the class to use Sendmail
			$mail->SMTPDebug = 0;
			$mail->SMTPSecure = 'tls';
			// $mail->AddReplyTo("turboact.roadtoeuro4@limadigit.com","Turboact");

			// $mail->AddReplyTo("explore@limadigit.com","Explore");

			// $mail->From       = "turboact.roadtoeuro4@limadigit.com";
			// $mail->FromName   = "Turboact";
			$mail->setFrom('lesehan@limadigit.com', 'Pertamina Enduro');


			$to = $emailtujuan;

			$mail->AddAddress($to);
			
			foreach($emailCC as $val) {
				$mail->AddCC($val);
			}
			
			$mail->Subject  = $emailsubject;

			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			$mail->WordWrap   = 80; // set word wrap

			$mail->MsgHTML($content);
			
			if($attachment != "" && !empty($attachment)) {
				foreach($attachment as $value) {
					$mail->AddAttachment($value);
				}
			}

			$mail->IsHTML(true); // send as HTML

			$send = $mail->Send();
			if(!$send) {
				return 'Message could not be sent. <br/> Mailer Error: ' . $mail->ErrorInfo;
			} else {
				return 'Message has been sent';
			}
		}catch (phpmailerException $e){
			echo $mail->ErrorInfo;
			echo $e->errorMessage();
			exit;
		}
	}
	
	
?>