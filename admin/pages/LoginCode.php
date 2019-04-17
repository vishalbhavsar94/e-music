<?php
include('../conn.php');
if(isset($_REQUEST['login'])){
	
	$name = $_REQUEST['name'];
	$pass = $_REQUEST['password'];
	$sql = "select * from admin where username='$name' and password= md5('$pass')";
	$res = mysql_query($sql);
	$user = mysql_fetch_object($res);
	if($user){
		session_start();
		$_SESSION['login_user'] = $user->username;	
		$_SESSION['user_type'] = $user->type_id;	
		$_SESSION['admin'] = TRUE;
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