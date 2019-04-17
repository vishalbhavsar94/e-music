<?php
include('../conn.php');

if(isset($_REQUEST['delete_id'])){
	$delete_id = $_REQUEST['delete_id'];	
	$resdlt=mysql_query("delete from users where ID='$delete_id'");
	if(isset($resdlt)){
		?>
		<script>
			alert('User Deleted Successfully');
			window.location.href="../index.php?FrontUsers";
		</script>
		<?php	
	}
}elseif(isset($_REQUEST['GetEdit'])){
	$GetEdit = $_REQUEST['GetEdit'];
	$sql = "select * from users where id = $GetEdit";
	$res = mysql_query($sql);
	$data = mysql_fetch_array($res);
	echo json_encode($data);
}elseif(isset($_REQUEST['EditId'])){
	
	$EdtUser = $_REQUEST['EdtUser'];
	$EdtEmail = $_REQUEST['EdtEmail'];
	$EdtPass = $_REQUEST['EdtPass'];
	$EdtPhone = $_REQUEST['EdtPhone'];
	$EditId  = $_REQUEST['EditId'];
	$sql1="select pass from users where id ='$EditId'and pass='$EdtPass'";
	$res1 = mysql_query($sql1);
	$md = mysql_fetch_object($res1);
	if($md){
		$sql = "UPDATE users SET name = '$EdtUser',email_id='$EdtEmail',pass = '$EdtPass',phone='$EdtPhone' WHERE id = '$EditId'";
	}else{
		$sql = "UPDATE users SET name = '$EdtUser',email_id='$EdtEmail',pass = md5('$EdtPass'),phone='$EdtPhone' WHERE id = '$EditId'";	
	}
	
	$res = mysql_query($sql) or die('Query not Exicutive');
	if($res){
		
		?>
		<script>
			alert('UserUpdated');
			window.location.href="../index.php?FrontUsers";
		</script>
		<?php
		
	}
}
?>