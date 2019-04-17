<?php 
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{    
	include_once('../conn.php');
}


$sql1 = "SELECT a.albid,a.poster,a.album_name FROM album_master a inner join song_master s on a.code = s.code order by count_play DESC limit 10";
$res1 = mysql_query($sql1);

$sql2 = "select * from playlist";
$res2 = mysql_query($sql2);

if(isset($_GET['Cat_id'])){
	 $Cat_id = $_GET['Cat_id'];	
	 $sql = "select * from album_Master where type_id = $Cat_id";
}else{
	$sql = "select * from album_master";	
}
 $res = mysql_query($sql);
?>
<?php include_once('Char.php');?>
<div class="browse col-lg-12">
	<!-- New song -->
	<div class="tittle-head two">
		<h3 class="tittle">New Releses <span class="new">New</span></h3>
		<!--<a href="browse.html"><h4 class="tittle third">See all</h4></a>-->
		<div class="clearfix"> </div>
	</div>
	<?php	
	while($rr=mysql_fetch_assoc($res)){
		?>
		<div class="col-md-3 browse-grid">

			<!-- Load by Ajax -->
			<a  onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $rr['ALBID']; ?>')"><img src="<?php echo 'admin/'.substr($rr['POSTER'],3);?>" title="allbum-name" width="150" height="150" /></a>
			<a  onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $rr['ALBID']; ?>')"><i class="glyphicon glyphicon-play-circle"></i></a>
			<a class="sing" href=""><?php echo $rr['ALBUM_NAME'] ?></a>
		</div>
		<?php
	}	
	?>
	<!--end of new song-->
	<div class="browse col-lg-12">
	<!-- New Playlist -->
	<div class="tittle-head two">
		<h3 class="tittle">PlayList <span class="new">New</span></h3>
		<!--<a href="browse.html"><h4 class="tittle third">See all</h4></a>-->
		<div class="clearfix"> </div>
	</div>
	<?php	
	while($playlist=mysql_fetch_assoc($res2)){
		?>
		<div class="col-md-3 browse-grid">
			<!--<a  href="index.php?AlbumDetail=<?php //echo $rr['ALBID']; ?>"><img src="<?php //echo 'admin/'.substr($rr['POSTER'],3);?>" title="allbum-name" /></a>
			<a href="index.php?AlbumDetail=<?php //echo $rr['ALBID']; ?>"><i class="glyphicon glyphicon-play-circle"></i></a>	-->
			<!-- Load by Ajax -->
			<a  onclick="AjaxPages('pages/PlayListDetail.php?PlayListDetail=<?php echo $playlist['id']; ?>')"><img src="<?php echo 'admin/'.substr($playlist['poster'],3);?>" title="allbum-name" width="150" height="150" /></a>
			<a  onclick="AjaxPages('pages/PlayListDetail.php?PlayListDetail=<?php echo $playlist['id']; ?>')"><i class="glyphicon glyphicon-play-circle"></i></a>
			<a class="sing" href=""><?php echo $playlist['playlist_name']; ?></a>
		</div>
		<?php
	}	
	?>
	</div>
	<!--end of new Playlist-->
	<!--Top Tranding-->
</div>
<div class="review-slider col-lg-12">
	<div class="tittle-head">
		<h3 class="tittle">Top Trending AlbumSongs <span class="new"> New</span></h3>
		<div class="clearfix"> </div>
	</div>
	<ul id="flexiselDemo1">
		<?php while($row = mysql_fetch_array($res1)) {?>
		<li>
			<a onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $row['albid']; ?>"><img src="<?php echo "admin/".substr($row['poster'],3);?>" alt="nothing" width="150" height="150"/></a>
			<a onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $row['albid']; ?>"><i class="glyphicon glyphicon-play-circle"></i></a>	
			<div class="slide-title"><h4><?php echo $row['album_name']; ?></div>				
		</li>
		<?php } ?>
	</ul>
</div>