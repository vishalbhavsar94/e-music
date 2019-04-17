<?php
include("../conn.php");
$name = strtoupper($_REQUEST['name']);
$desc = strtoupper($_REQUEST['art_desc']);
$artist_img = $_FILES['upload']['name'];
$mcode=date_default_timezone_set('Asia/Calcutta').date("Ymdhms");
$ext = pathinfo($artist_img, PATHINFO_EXTENSION);
$src_path=$_FILES['upload']['tmp_name'];

$dest_path="../assets/artist/".$mcode.".".$ext;
move_uploaded_file($src_path,$dest_path);
$img=$dest_path;

$sql = "insert into artist values(NULL,'$name','$desc','$img')";
$re = mysql_query($sql);
if($re){?>

    <script type="text/javascript">
		alert('New Artist Added...! ');
		window.location.href="../index.php?AddArtist";
	</script>

<?php 
    }
?>