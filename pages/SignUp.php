<?php
include('../conn.php');
$name =  $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$pass =  $_REQUEST['pass'];
	
	if($name!='' && $phone!='' && $email!='' && $pass!=''){
		$sql="select email_id from users where email_id = '$email'";
		$res = mysql_query($sql);
		$em = mysql_fetch_object($res);
		if(!$em){
			$sql="insert users value('','$name','$email',md5('$pass'),'$phone')";
			$res = mysql_query($sql);
			if($res){
				?>
				<script>
					alert('Account Create Successfully');
					window.location.href="../index.php";
				</script>
				<?php
			}else{
				?>
				<script>
					alert('There is some Problem please try again later');
					window.location.href="../index.php";
				</script>
				<?php
			}
		}else{
			?>
				<script>
					alert('Email id Registred Allready');
					window.location.href="../index.php";
				</script>
				<?php
		}		
	}
	else{
		?>
				<script>
					alert('Somthing gone Wrong please try letter');
					window.location.href="../index.php";
				</script>
				<?php
	}
?>