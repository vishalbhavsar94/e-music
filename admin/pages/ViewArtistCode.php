<?php
include("../conn.php");

if(isset($_REQUEST['delete_id'])){
	$delete_id=$_REQUEST['delete_id'];
	$sql = "select count(albid) as albid from album_master where find_in_set($delete_id,artist_name)";
	$res = mysql_query($sql);
	$res = mysql_fetch_object($res);
	if($res->albid > 0){
		?>
		<script type="text/javascript">
			var delete_id = <?php echo $delete_id; ?>;
			alert('Artist In Used You Can Not Delete This Artist');
			window.location.href="../index.php?ViewArtist";
		</script>
		<?php
		exit;
	}else{
	$result = mysql_query("SELECT img from artist  where id = '$delete_id'");
	$Art_img = mysql_fetch_object($result);
	$resdlt = mysql_query("delete from artist where id = $delete_id");
	
	//delete poster and songs fromfile
	if(isset($resdlt)){
		 $root = $_SERVER['DOCUMENT_ROOT']."/e-music/admin/";
		    unlink($root.substr($Art_img->img,3));	
		?>
		
		<script type="text/javascript">
			var delete_id = <?php echo $delete_id; ?>;
			alert('Data deleted ');
			window.location.href="../index.php?ViewArtist";
		</script>
		<?php
		}	
	}
}
?>