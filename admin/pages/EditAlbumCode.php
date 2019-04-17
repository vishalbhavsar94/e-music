<?php
include('../conn.php');
if(isset($_REQUEST['delete_id'])){
	$delete_id = $_REQUEST['delete_id'];
	$Album_id = $_REQUEST['Album_id'];
	
	$sql = "select file from song_master where sid = $delete_id";	
	$res = mysql_query($sql);
	$sql2 = "delete from song_master where sid = $delete_id";
	$res2 = mysql_query($sql2);
	if($res){
		$file =  mysql_fetch_object($res);
		$root = $_SERVER['DOCUMENT_ROOT']."/online-music/admin2/";
		unlink($root.substr($file->file,3));
		?>
		<script>
			alert("Song Delete Successfully");
			window.location.href="../index.php?EditAlbum="+<?php echo $Album_id ?>	
		</script>
		<?php
	}	
}elseif(isset($_REQUEST['update'])){
	
	$Edit_id = $_REQUEST['update'];
	$name=$_FILES['songs']['name'];
	$src_path=$_FILES['songs']['tmp_name'];
	$eoro=$_FILES['songs']['error'];
	$sql = "select code from album_master where albid = $Edit_id";
	$res = mysql_query($sql) or die('Query not excutived');
	$code =  mysql_fetch_object($res);	
for($i=0;$i<count($name);$i++){

	$ext = pathinfo($name[$i], PATHINFO_EXTENSION);
	$dest_path="../assets/songs/".md5($name[$i]).".".$ext;
	//	print_r($src_path[$i]);
	move_uploaded_file($src_path[$i],$dest_path);
	$img=$dest_path;
	
	$qry1="INSERT INTO song_master  VALUES (NULL,'$code->code','$name[$i]','$Edit_id','$img','','')";
	$res1=mysql_query($qry1) or die ("Query not excutived");
	}
	?>
	<script type="text/javascript">
		alert('Songs Added Successfully');
		window.location.href="../index.php?EditAlbum="+<?php echo $Edit_id ?>;
	</script>
	<?php
}
?>