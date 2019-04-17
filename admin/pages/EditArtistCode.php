<?php
include("../conn.php");

 $artist_id = $_REQUEST['id'];
 $name = strtoupper($_REQUEST['name']);
 $desc = strtoupper($_REQUEST['art_desc']);
 $artist_img = $_FILES['upload']['name'];

if(isset($artist_img)&&$artist_img!=NULL){
    
    $mcode=date_default_timezone_set('Asia/Calcutta').date("Ymdhms");
    $ext = pathinfo($artist_img, PATHINFO_EXTENSION);
    $src_path=$_FILES['upload']['tmp_name'];

    $dest_path="../assets/artist/".$mcode.".".$ext;
    move_uploaded_file($src_path,$dest_path);
    $img=$dest_path;

    $sql = "update artist set img = '$dest_path' where id = '$artist_id'";
    $res = mysql_query($sql);

}

$sql1 = "update artist set name = '$name',art_desc = '$desc' where id = $artist_id";
$res1 = mysql_query($sql1);
if($res1){?>

    <script type="text/javascript">
		alert('Artist Updated...! ');
		window.location.href="../index.php?ViewArtist";
	</script>

<?php 
    }
?>