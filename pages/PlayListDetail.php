<?php 
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{    
	include_once('../conn.php');
}
$PlayListDetail = $_REQUEST['PlayListDetail'];
$sql = "select * from playlist  where id = $PlayListDetail";
$res = mysql_query($sql);
$res = mysql_fetch_object($res);
$sid = explode(',',$res->sid);
$songs = array();
foreach ($sid as $key) {
    $sql2 = "select sid,title,file  from  song_master where sid = $key";
    $res2 = mysql_query($sql2);
    array_push($songs,mysql_fetch_assoc($res2));
}
?>
<div class="browse">
	<div class="tittle-head two">
		<h3 class="tittle"><?php echo $res->playlist_name;?><span class="new">New</span></h3>
		<!--<a href="browse.html"><h4 class="tittle third">See all</h4></a>-->
		<div class="clearfix"> </div>
	</div>
	<div class="col-md-3">
		<div class="browse-grid" style="width: 250px">
			<img  src="<?php echo 'admin/'.substr($res->poster,3);?>" />
			<!--<a href="index.php?AlbumDetail=<?php //echo $row['albid']; ?>">--><!--<i class="glyphicon glyphicon-heart"></i>--></a>	
		</div>
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
				foreach ($songs as $key => $value){
					?>
					<tr>
						<td><?php echo $value['title'];?></td>
						<td>
							<button class="btn btn-primary" onclick="play(<?php echo $value['sid']; ?>)" style="width: 25%"><i class="fa fa-play-circle-o fa-2x"></i></button>
							<a href="pages/Download.php?Song_id=<?php echo $value['sid']; ?>" class="btn btn-warning" style="width: 25%" target="_blank"><i class="fa fa-download fa-2x"></i></a>						
							<?php if(isset($_SESSION['user'])){?>
							<button class="btn btn-danger" style="width: 25%" onclick="Fav(<?php echo $value['sid'];?>,<?php echo $_SESSION['user_id'];?>)"><i class="fa fa-heart fa-2x"></i></button>
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>

</div>