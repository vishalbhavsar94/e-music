<?php
include('../conn.php');
$pl_name=  $_REQUEST['name'];
$mcode=strtoupper(date_default_timezone_set('Asia/Calcutta').date("Ymdhms"));
$poster=$_FILES['poster']['name'];
$ext = pathinfo($poster, PATHINFO_EXTENSION);
$src_path=$_FILES['poster']['tmp_name'];
$dest_path="../assets/playlist/".$mcode.".".$ext;
move_uploaded_file($src_path,$dest_path);
$img=$dest_path;
$chk = $_REQUEST['check_list']; 
$song_ids = implode(',',$chk);
$sql = "insert into playlist values('','$pl_name','$img','$song_ids')";
mysql_query($sql);
?>
    <script type="text/javascript">
		 alert('New PlayList Generated...!');
		 window.location.href="../index.php?PlayList";
	</script>
<?php
?>