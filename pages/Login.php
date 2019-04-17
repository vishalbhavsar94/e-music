<?php
include('../conn.php');
if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	
	$sql = "select * from users where email_id='$email' and pass= md5('$password')";
	$res = mysql_query($sql);
	$user = mysql_fetch_object($res);
	if($user)
	{
		session_start();
		$_SESSION['login_user'] = $user->name;
		$_SESSION['user'] = true;
		$_SESSION['user_id']=$user->id;
		header('location: ../index.php');
	}else{
		
		?>
		<script>
			alert('UserName or Password NotMatch');
			window.location.href='../index.php';
		</script>
		
		<?php
		
	}
}

?>