<?php
include('../conn.php');
if(isset($_REQUEST['delete_id'])){
	$delete_id = $_REQUEST['delete_id'];
	
	$resdlt=mysql_query("delete from admin where ID='$delete_id'");
    if(isset($resdlt))
	{
		?>
		<script>
			alert('UserDeleted Successfully');
			window.location.href="../index.php?Users";
		</script>
		<?php	
	}
}elseif(isset($_REQUEST['GetEdit'])){
	$GetEdit = $_REQUEST['GetEdit'];
	$sql = "select * from admin where id = $GetEdit";
	$res = mysql_query($sql);
	$data = mysql_fetch_array($res);
	echo json_encode($data);
}elseif(isset($_REQUEST['EditId'])){
	
	$EdtUser = $_REQUEST['EdtUser'];
	$EdtPass = $_REQUEST['EdtPass'];
	$EditId  = $_REQUEST['EditId'];
	$sql1="select password from admin where id = '$EditId' and password = '$EdtPass'";
	$res1 = mysql_query($sql1);
	$md = mysql_fetch_object($res1);
	if($md){
		$sql = "UPDATE admin SET username = '$EdtUser',password = '$EdtPass' WHERE id = $EditId";
	}else{
		$sql = "UPDATE admin SET username = '$EdtUser',password = md5('$EdtPass') WHERE id = $EditId";	
	}
	
	$res = mysql_query($sql) or die('Query not Exicutive');
	if($res){
		
		?>
		<script>
			alert('UserUpdated');
			window.location.href="../index.php?Users";
		</script>
		<?php
		
	}	
}
?>