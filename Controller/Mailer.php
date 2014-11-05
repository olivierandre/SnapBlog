<?php
	
	namespace Controller;

	use \PHPMailer;

	class Mailer {
		
		public function sendThankYou($username, $email, $type) {

			if($type === "comment") {
				$body = "Merci pour votre commentaire :-)";
			} else {
				$body = "Merci pour votre nouveau blog :-)";
			}

			$mail = new PHPMailer();
			$mail->CharSet = 'UTF-8';

			///INFOS DE CONNEXION
	        $mail->isSMTP();                                    //On utilise SMTP
	        $mail->Username = "machinchoseformation@gmail.com"; //nom d'utilisateur
	        $mail->Password = "38Utc_Sd5KdI4sz0Gr2Y4g";         //mot de passe
	        $mail->Host = 'smtp.mandrillapp.com';               //smtp.gmail.com pour gmail
	        $mail->Port = 587;                                  //Le numéro de port
	        $mail->SMTPAuth = true;                             //On utilise l'authentification SMTP ?
	        //$mail->SMTPSecure = 'tls';                        //décommenter pour gmail

			$mail->From = "snapblog@snapblog.com";
			$mail->FromName = $username;
			$mail->addAddress($email);     // Add a recipient

			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Merci !';
			$mail->Body    = $body;

			//envoie le message
	        if (!$mail->send()) {
	            echo "Mailer Error: " . $mail->ErrorInfo;
	            return FALSE;
	        } else {
	            echo "Message sent!";
	            return TRUE;
	        }

		}
	}
?>