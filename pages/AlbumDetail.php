<?php 
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{    
	include_once('../conn.php');
	session_start();
}

$AlbumDetail = $_REQUEST['AlbumDetail'];

$qrysearch ="SELECT sid,title from song_master where albid = $AlbumDetail";
$sqlPoster ="select * from album_master where albid = $AlbumDetail";

$res=mysql_query($sqlPoster) or die ("Query not excutived");
$search=mysql_query($qrysearch) or die ("Query not excutived");

$poster=mysql_fetch_object($res);
$artist=null;
$prefix=',';
?>

<div class="browse">
	<div class="tittle-head two">
		<h3 class="tittle"><?php echo $poster->ALBUM_NAME;?><span class="new">New</span></h3>
		<!--<a href="browse.html"><h4 class="tittle third">See all</h4></a>-->
		<div class="clearfix"> </div>
	</div>
	<div class="col-md-3">
		<div class="browse-grid" style="width: 250px">
			<img  src="<?php echo 'admin/'.substr($poster->POSTER,3) ?>" />
			<a href="index.php?AlbumDetail=<?php //echo $row['albid']; ?>"><!--<i class="glyphicon glyphicon-heart"></i>--></a>	
		</div>
	</div>
	<div class="col-md-6">
	<?php $ids = explode(',',$poster->artist_name);
					  
					  $artist = null;
					  foreach($ids as $value){
						  $qry = "select name from artist where id = $value";
						  $res = mysql_query($qry);
						  $result = mysql_fetch_row($res); 
						  $artist.=$result[0].$prefix;
					  }
					  
				?>
				<h3>Artist:<small><?php echo $artist;?></small></h3>
				<h3>Released By:<small><?php echo $poster->released_by;?></small></h3>
				<h3>Month&Year:<small><?php echo $poster->MONTH;?> <?php echo $poster->YEAR;?></small></h3>
				<h3>Released Date: <small><?php echo $poster->DATE;?></small></h3>
	</div>
	<div class="table-responsive col-md-12">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php	
				while($row=mysql_fetch_array($search)){
					?>
					<tr>
						<td><?php echo $row['title'];?></td>
						<td>
							<button class="btn btn-primary" onclick="play(<?php echo $row['sid']; ?>)" style="width: 25%"><i class="fa fa-play-circle-o fa-2x"></i></button>
							<a href="pages/Download.php?Song_id=<?php echo $row['sid']; ?>" class="btn btn-warning" style="width: 25%" target="_blank"><i class="fa fa-download fa-2x"></i></a>						
							<?php if(isset($_SESSION['user'])){?>
							<button class="btn btn-danger" style="width: 25%" onclick="Fav(<?php echo $row['sid'];?>,<?php echo $_SESSION['user_id'];?>)"><i class="fa fa-heart fa-2x"></i></button>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>

</div>
