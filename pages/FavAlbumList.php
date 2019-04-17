<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{    
	include_once('../conn.php');
	session_start();
}
?>
<div class="tittle-head two">
		<h3 class="tittle">Favourite<span class="new">List</span></h3>
		<!--<a href="browse.html"><h4 class="tittle third">See all</h4></a>-->
		<div class="clearfix"> </div>
</div>
<?php 
	$user_id = $_SESSION['user_id'];
	$sql="SELECT f.*,s.title FROM fav_album f inner join song_master s on f.sid = s.sid where f.user_id =$user_id";
	$res = mysql_query($sql);
?>
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
				while($row=mysql_fetch_array($res)){
					?>
					<tr>
						<td><?php echo $row['title'];?></td>
						<td>
							<button class="btn btn-primary" onclick="play(<?php echo $row['sid']; ?>)" style="width: 25%"><i class="fa fa-play-circle-o fa-2x"></i></button>
							<a href="pages/Download.php?Song_id=<?php echo $row['sid']; ?>" class="btn btn-warning" style="width: 25%" target="_blank"><i class="fa fa-download fa-2x"></i></a>	
							<button class="btn btn-danger" style="width: 25%" onclick="UnFav(<?php echo $row['id'];?>)" title="Unfavourite"><i class="fa fa-times fa-2x"></i></button>
						</td>
					</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>