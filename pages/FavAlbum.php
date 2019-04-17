<?php
include('../conn.php');
if(isset($_REQUEST['Song_id']) && isset($_REQUEST['User_id'])){
	
	$Song_id = $_REQUEST['Song_id'];
	$User_id = $_REQUEST['User_id'];
	$sql = "select * from fav_album where user_id = $User_id and sid = $Song_id";
	$res = mysql_query($sql) or die('Query Not exicuted');
	$fav = mysql_fetch_object($res);
	if(!$fav){
		$sql = "insert into fav_album value('','$User_id','$Song_id')";
		$res = mysql_query($sql);
		if($res){
			echo "Song Added To Favourite List";
		}
		}else{
			echo "Song AllReady On Favourite List";
		}
	
	
}elseif(isset($_REQUEST['Fav_id'])){
	$Fav_id = $_REQUEST['Fav_id'];
	$sql = "delete from fav_album where id = $Fav_id";
	$res = mysql_query($sql);
	if($res){
		echo"Song Removed From FavouriteList";
	}
}
	
?>