<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{    
	include_once('../conn.php');
}
if(isset($_REQUEST['Search']))
{
	$char= $_REQUEST['Search'];
	 $qrysearch ="select * From album_master WHERE ALBUM_NAME  LIKE
                        '". mysql_real_escape_string($char) ."%' ";
						
	$len=strlen($char);
if($len>1&&$len!=0){
	//if()					
	$qrysearch ="select * From album_master WHERE ALBUM_NAME  LIKE
                        '%". mysql_real_escape_string($char) ."%' "; 
						}
	$search=mysql_query($qrysearch) or die ("Query not excutived");
}
else
{
		$D= DATE("Y");
		$qrysearch ="select * From album_master WHERE YEAR ='$D' ";
		$search=mysql_query($qrysearch) or die ("Query not excutived");
	
}
?>
<?php include_once('Char.php');?>
<div class="browse">
	<div class="tittle-head two">
		<h3 class="tittle">SarchResult<span class="new">New</span></h3>
		<!--<a href="browse.html"><h4 class="tittle third">See all</h4></a>-->
		<div class="clearfix"> </div>
	</div>
	<?php	
	while($rr=mysql_fetch_assoc($search)){
	?>
	<div class="col-md-3 browse-grid">
	<a  onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $rr['ALBID']; ?>')"><img src="<?php echo 'admin/'.substr($rr['POSTER'],3);?>" title="allbum-name" /></a>
	<a  onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $rr['ALBID']; ?>')"><i class="glyphicon glyphicon-play-circle"></i></a>	
	<a class="sing" href=""><?php echo $rr['ALBUM_NAME'] ?></a>
	</div>
	<?php
	}	
	?>
</div>
<?php 
$sql1 = "SELECT a.albid,a.poster,a.album_name FROM album_master a inner join song_master s on a.code = s.code order by count_play DESC limit 10";
$res1 = mysql_query($sql1);
?>
<div class="review-slider col-lg-12">
	<div class="tittle-head">
		<h3 class="tittle">Top Trending AlbumSongs <span class="new"> New</span></h3>
		<div class="clearfix"> </div>
	</div>
	<ul id="flexiselDemo1">
		<?php while($row = mysql_fetch_array($res1)) {?>
		<li>
			<a onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $row['albid']; ?>"><img src="<?php echo "admin/".substr($row['poster'],3);?>" alt=""/></a>
			<a onclick="AjaxPages('pages/AlbumDetail.php?AlbumDetail=<?php echo $row['albid']; ?>"><i class="glyphicon glyphicon-play-circle"></i></a>	
			<div class="slide-title"><h4><?php echo $row['album_name']; ?></div>				
		</li>
		<?php } ?>
	</ul>
</div>