<?php
include('../conn.php');

$date=date("d/m/y");
$mcode=strtoupper($_REQUEST['mcode']);
$title=strtoupper($_REQUEST['title']);
$month=strtoupper($_REQUEST['month']);
$year=strtoupper($_REQUEST['year']);
$type_id=strtoupper($_REQUEST['type_id']);
$artist = $_REQUEST['artist'];
$released = strtoupper($_REQUEST['released']);		
$name=$_FILES['upload']['name'];
$ext = pathinfo($name, PATHINFO_EXTENSION);
$src_path=$_FILES['upload']['tmp_name'];

$dest_path="../assets/poster/".$mcode.".".$ext;
move_uploaded_file($src_path,$dest_path);
$img=$dest_path;
$ar = implode(",",$artist);
$qry="INSERT INTO album_master  VALUES (NULL,'$mcode','$title','$month','$year','$date','$img','$type_id','$ar','$released')";
$res=mysql_query($qry);
		
if($res){
			
	$albid=mysql_insert_id();	
			
	$name=$_FILES['songs']['name'];
	$src_path=$_FILES['songs']['tmp_name'];
	$eoro=$_FILES['songs']['error'];

	for($i=0;$i<count($name);$i++){


		$ext = pathinfo($name[$i], PATHINFO_EXTENSION);
			
		$dest_path="../assets/songs/".md5($name[$i]).".".$ext;

		move_uploaded_file($src_path[$i],$dest_path);
		$img=$dest_path;
			

		$qry1="INSERT INTO song_master  VALUES (NULL,'$mcode','$name[$i]','$albid','$img','','')";

		$res1=mysql_query($qry1) or die ("Query not excutived");
	}
	?>
	<script type="text/javascript">
		alert('New Movie Generated ');
		window.location.href="../index.php?AddAlbum";
	</script>
	
	<?php
}
?>