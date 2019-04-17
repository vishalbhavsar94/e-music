<?php
include('../conn.php');
if(isset($_REQUEST['cat'])){
	
	$cat=strtoupper($_REQUEST['cat']);
	$qrychk1="select * From  movietype where type_name ='$cat'";
	$reschk1=mysql_query($qrychk1) or die ("Query not excutived");
	$chkrow1 = mysql_fetch_array($reschk1);
	if($chkrow1 == 0){
				
		$qry="INSERT INTO  movietype  VALUES (NULL, '$cat')";
		$res=mysql_query($qry) or die ("Query not excutived");
		
		if($res ==1){
			?>
			<script type="text/javascript">
				alert('New Category Generated ');
				window.location.href="../index.php?AddCatagory";
			</script>
			<?php
		}
				
	}
	else{
				
				
		?>
		<script type="text/javascript">
			alert(' Generation not executed Or Already Existed!');
			window.location.href="../index.php?AddCatagory";
		</script>
		<?php
	}
}elseif(isset($_REQUEST['delete_id'])){
	
	
	$delete_id=$_REQUEST['delete_id'];
	$sql="select count(albid) from album_master where type_id = $delete_id";
	$res = mysql_query($sql);
	$res = mysql_fetch_row($res);
	if($res[0] > 0){
		?>
		<script type="text/javascript">
			alert('Catagory is in used You Can not delete this Catagory ');
			window.location.href="../index.php?AddCatagory";
		</script>
		<?php
		exit;
	}
	$resdlt=mysql_query("delete from movietype where type_id='$delete_id'");
	if(isset($resdlt)){
		
		?>
		
		<script type="text/javascript">
			alert('Catagory deleted ');
			window.location.href="../index.php?AddCatagory";
		</script>
		<?php			
	}	
	
	
}elseif(isset($_REQUEST['GetEdit'])){
	$GetEdit = $_REQUEST['GetEdit'];
	$qryedit="select * From  movietype where type_id ='$GetEdit'";
	$resedit=mysql_query($qryedit) or die ("Query not excutived");
	$editrow = mysql_fetch_array($resedit);
	echo json_encode($editrow);
}elseif(isset($_REQUEST['EdtCat'])){
	
	$EdtCat=strtoupper($_REQUEST['EdtCat']);
	$EditID=strtoupper($_REQUEST['EditId']);
	$qrychk1="select * From movietype where type_name ='$EdtCat'";
	$reschk1=mysql_query($qrychk1) or die ("Query not excutived");
	$chkrow1 = mysql_fetch_array($reschk1);
	if($chkrow1 == 0){
			
		$qry1="Update movietype set type_name= '$EdtCat' where type_id='$EditID' ";
		$res1=mysql_query($qry1) or die ("Query not excutived");
		if($res1 ==1){
			?>
			<script type="text/javascript">
				alert('Catagory Updated');
				window.location.href="../index.php?AddCatagory";
			</script>
			<?php		
		}
	}
	else{
		?>
		<script type="text/javascript">
			alert('Data Not Update Or Already Existed ');
			window.location.href="../index.php?AddCatagory";
		</script>
		<?php
	}
}
?>