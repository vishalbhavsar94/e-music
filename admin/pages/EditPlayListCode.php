<?php
include('../conn.php');

if(isset($_REQUEST['delete_id'])){
    $playlist_id = $_REQUEST['playlist_id'];
    $delete_id = $_REQUEST['delete_id'];
    $sql = "select * from playlist where id = $playlist_id";
    $res = mysql_query($sql);
    $res = mysql_fetch_object($res);
    $sids = $res->sid;
    $sids = explode(',',$sids);
    if (($key = array_search($delete_id, $sids)) !== false) {
        unset($sids[$key]);
    }
    $sids = implode(',',$sids);
    $sql2 = "update playlist set sid = '$sids' where id = $playlist_id";
    mysql_query($sql2);
        ?>
		<script>
			alert("Song Removed from Playlist Successfully");
			window.location.href="../index.php?EditPlayList="+<?php echo $playlist_id; ?>	
		</script> 
<?php }?>
<?php 
    if(isset($_REQUEST['PlayListUpdate'])){
    
    $play_id = $_REQUEST['play_id'];
    $pl_name=  $_REQUEST['name'];
    $poster= $_FILES['poster']['name'];
    $mcode=strtoupper(date_default_timezone_set('Asia/Calcutta').date("Ymdhms"));
    if(isset($_FILES['poster']['name']) && $_FILES['poster']['name']!=null){
        $poster=$_FILES['poster']['name'];
        $ext = pathinfo($poster, PATHINFO_EXTENSION);
        $src_path=$_FILES['poster']['tmp_name'];
        $dest_path="../assets/playlist/".$mcode.".".$ext;
        move_uploaded_file($src_path,$dest_path);
        $img=$dest_path;
        $sql = "update playlist set poster = '$img' where id = $play_id";
        $res = mysql_query($sql);
    }
    $sql1 = "select sid from playlist where id = $play_id";
    $res1 = mysql_query($sql1);
    $res1 = mysql_fetch_object($res1);
    $sids = $res1->sid;
    if(isset($_REQUEST['check_list'])&& $_REQUEST['check_list'] != NULL){
        $chk = $_REQUEST['check_list'];
        $song_ids = implode(',',$chk);
        $song_ids= $sids.','.$song_ids;
        $sql = "update playlist set playlist_name = '$pl_name',sid='$song_ids' where id = $play_id";
    }else{
        $sql = "update playlist set playlist_name = '$pl_name',sid='$sids' where id = $play_id";
    }
        mysql_query($sql);
    ?>
		<script>
			 alert("Playlist Updated Successfully");
			 window.location.href="../index.php?EditPlayList="+<?php echo $play_id; ?>	
		</script> 
<?php } ?>