<?php
include('../conn.php');
if(isset($_REQUEST['psw']) && isset($_REQUEST['cpsw'])){
	$psw = $_REQUEST['psw'];
	$cpsw = $_REQUEST['cpsw'];
	$id = $_REQUEST['id'];
	$email = $_REQUEST['email'];
	
	$sql = "update users set pass = md5('$psw')where id = $id";
	$res = mysql_query($sql);
	if($res){
		?>
		<script>
			alert('Password Update Successfully');
		</script>
		<?php
		header("location:Login.php?email=$email&password=$psw");		
	}else{
		?>
		<script>
			alert('Some Problem..');
		</script>
		<?php
	}
}
?>