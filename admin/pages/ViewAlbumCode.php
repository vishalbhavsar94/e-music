<?php
include("../conn.php");

if(isset($_REQUEST['delete_id'])){
	
	$delete_id=$_REQUEST['delete_id'];
	$result = mysql_query("SELECT a.code,a.poster,s.file from album_master a inner join song_master s on a.code = s.code where a.albid = '$delete_id'");
	$songCode = mysql_fetch_object($result);
	mysql_query("delete from song_master where code ='$songCode->code'");
	$resdlt=mysql_query("delete from album_master where ALBID='$delete_id'");
	
	//delete poster and songs fromfile
	if(isset($resdlt)){
		 $root = $_SERVER['DOCUMENT_ROOT']."/e-music/admin/";
		unlink($root.substr($songCode->poster,3));
		
		while($row = mysql_fetch_array($result)){
			
			//$add = "../addmovie/".$row['poster'];
			
			unlink($root.substr($row['file'],3));
		}
		
		?>
		
		<script type="text/javascript">
			var delete_id = <?php echo $delete_id; ?>;
			alert('Data deleted ');
			window.location.href="../index.php?ViewAlbum";
		</script>
		<?php
	}
	
}
?>