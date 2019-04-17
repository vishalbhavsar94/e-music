<?php
include('../conn.php');
if(isset($_REQUEST['Song_id']) && $_REQUEST['Song_id']!=""){

	
	$Song_id = $_REQUEST['Song_id'];
	$sql = "select * from song_master where sid = $Song_id";
	$res = mysql_query($sql);
	$song = mysql_fetch_object($res);
	
	$file = $song->FILE; 
	$name = $song->TITLE; 

	$file = "http://localhost/e-music/admin/".substr($file,3); 
	echo $name;


	$sql1 = "update song_master set count_download = count_download+1 where sid = $Song_id";
	mysql_query($sql1);
	
	header("Content-type: application/x-file-to-save"); //
	header("Content-Disposition: attachment; filename=".basename($name)); 
	readfile($file); 
	
}

?>
