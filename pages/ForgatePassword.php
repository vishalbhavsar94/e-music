<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
 
include('../conn.php');
if(isset($_REQUEST['email'])){
	$email = $_REQUEST['email'];
	$sql = "select * from users where email_id = '$email'";
	$res = mysql_query($sql);
	$id = mysql_fetch_object($res);
	if($id){
		
		$mail = new PHPMailer;

		//Enable SMTP debugging. 
		$mail->SMTPDebug = 3;                               
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();            
		//Set SMTP host name                          
		$mail->Host = "smtp.gmail.com";
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;                          
		//Provide username and password     
		$mail->Username = "vishalbhavsar94@gmail.com";                 
		$mail->Password = "redminote3";                          
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";                           
		//Set TCP port to connect to 
		$mail->Port = 587;                                   

		$mail->From = "vishalbhavsar94@gmail.com";
		$mail->FromName = "E-music";

		$mail->addAddress($id->email_id,$id->name);

		$mail->isHTML(true);
		$path = "http://localhost/e-music/index.php?ResetPassword&id=$id->id&email=$id->email_id";
		$mail->Subject = "ResetPassword Link";
		$mail->Body = "<h2>Click Belowe Link to Reset Your Password...</h2></br>
						<a href='$path' class='btn btn-primary'>RESET</a>";
		$mail->AltBody ="<a href='#' class='btn btn-primary'>RESET</a>";

		if(!$mail->send()){
			echo "Mailer Error: " . $mail->ErrorInfo;
		} 
		else{
			?>
			<script>
				alert('Link Has been sent successfully');	
				window.location.href="../index.php";
			</script>
			<?php
		}	
		
	}else{
		?>
		<script>
				alert('Email-id is NotRegistred');	
				window.location.href="../index.php";
		</script>
		<?php
	}
}
?>