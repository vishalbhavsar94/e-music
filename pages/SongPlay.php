<?php
include('../conn.php');
if(isset($_REQUEST['Song_id'])){
	$Song_id = $_REQUEST['Song_id'];
	$sql = "select file from song_master where sid  = $Song_id";
	$res = mysql_query($sql);
	$file = mysql_fetch_array($res);
	
	$sql1 = "update song_master set count_play = count_play+1 where sid = $Song_id";
	mysql_query($sql1);
	
	echo json_encode($file);
}

?>