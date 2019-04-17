<?php
session_start();
if(!isset($_SESSION['login_user'])){
	$content = "pages/Login.php";
		require "LoginTmpl.php";
		exit;	
}
if(isset($_REQUEST['AddAlbum'])){
	$content = "pages/AddAlbum.php";
	require "adminTmpl.php";
}else if(isset($_REQUEST['AddCatagory'])){
	$content = "pages/AddCatagory.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['AddUser'])){
	$content = "pages/AddUser.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['ViewAlbum'])){
	$content = "pages/ViewAlbum.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['Users'])){
	$content = "pages/Users.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['FrontUsers'])){
	$content = "pages/FrontUsers.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['AddArtist'])){
	$content = "pages/AddArtist.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['ViewArtist'])){
	$content = "pages/ViewArtist.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['PlayList'])){
	$content = "pages/PlayList.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['ViewPlayList'])){
	$content = "pages/ViewPlayList.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['EditPlayList'])){
	$content = "pages/EditPlayList.php";
	require "adminTmpl.php";
	
}else if(isset($_REQUEST['EditAlbum'])){
	$EditAlbum = $_REQUEST['EditAlbum'];
	if($EditAlbum){
		$content = "pages/EditAlbum.php";
		require "adminTmpl.php";	
	}else{
		$content = "pages/ViewAlbum.php";
		require "adminTmpl.php";	
	}
		
}else if(isset($_REQUEST['EditArtist'])){
	$EditArtist = $_REQUEST['EditArtist'];
	if($EditArtist){
		$content = "pages/EditArtist.php";
		require "adminTmpl.php";
	}else{
		$content = "pages/EditArtist.php";
		require "adminTmpl.php";	
	}
		
}else if(isset($_REQUEST['Login'])){
	
	$content = "pages/Login.php";
	require "LoginTmpl.php";
	
}
else{
	if(isset($_SESSION['admin'])){
		
		$content = "pages/Dashbord.php";
		require "adminTmpl.php";
	}else{
		$content = "pages/Login.php";
		require "LoginTmpl.php";	
	}	
}
?>