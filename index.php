<?php
if(isset($_REQUEST['home'])){
	
	$content = "pages/Album.php";
	require('EmusicTmpl.php');
	
}elseif(isset($_REQUEST['AlbumDetail'])){
	$content = "pages/AlbumDetail.php";
	require('EmusicTmpl.php');
}elseif(isset($_REQUEST['Cat_id'])){
	$content = "pages/Album.php";
	require('EmusicTmpl.php');
}elseif(isset($_REQUEST['Search'])){
	$content = "pages/Search.php";
	require('EmusicTmpl.php');
}elseif(isset($_REQUEST['FavAlbumList'])){
	$content = "pages/FavAlbumList.php";
	require('EmusicTmpl.php');
}elseif(isset($_REQUEST['Artist'])){
	$content = "pages/Artist.php";
	require('EmusicTmpl.php');
}elseif(isset($_REQUEST['ArtistAlbum'])){
	$content = "pages/ArtistAlbum.php";
	require('EmusicTmpl.php');
}elseif(isset($_REQUEST['PlayListDetail'])){
	$content = "pages/PlayListDetail.php";
	require('EmusicTmpl.php');
}elseif(isset($_REQUEST['ResetPassword'])){
	$content = "pages/ResetPassword.php";
	require('ResetPassTmpl.php');
}
else{
	$content = "pages/Album.php";
	require('EmusicTmpl.php');
}
?>