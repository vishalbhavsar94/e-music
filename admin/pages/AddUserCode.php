<?php
include('../conn.php');
if(isset($_REQUEST['UserName'])){
	
	$username = $_REQUEST['UserName'];
	$cnfpass = $_REQUEST['cpsw'];

	$sql = "INSERT INTO admin (username,password,type_id)
	VALUES('$username',md5('$cnfpass'),'2')";
	$result =  mysql_query($sql);
	if($result){
		?>
		<script>
			alert('User Added Successfully');
			window.location.href="../index.php?AddUser";
		</script>
		<?php
	}else{
		?>
		<script>
			alert('There is SomeProblem');
			window.location.href="../index.php?AddUser";
		</script>
		<?php
	}
		
}
?>