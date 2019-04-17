<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Top 10 Songs</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<?php 
$sql = "SELECT  a.album_name,s.title,a.poster,s.count_play,s.count_download FROM song_master s inner join album_master a on a.code = s.code 
ORDER BY `count_play`  DESC
limit 10";
$res = mysql_query($sql);
?>
<div class="row">
	<?php while($row = mysql_fetch_array($res)){ ?>
	<div class="col-lg-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<?php echo $row['album_name']; ?>
			</div>
			<div class="panel-body">
				<div class="col-lg-6">
					<img  width="150" src="<?php echo substr($row['poster'],3);?>"/>	
				</div>
				<div class="col-lg-6">
					<h1><i class="fa fa-play-circle-o"></i><span><?php echo $row['count_play']; ?></span></h1>
					<h1><i class="fa fa-download"></i><span><?php echo $row['count_download']; ?></span></h1>
				</div>
			</div>
			<div class="panel-footer">
				<?php echo $row['title']; ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Top 10 Download</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<?php 
$sql1 = "SELECT  a.album_name,s.title,a.poster,s.count_play,s.count_download FROM song_master s inner join album_master a on a.code = s.code 
ORDER BY `count_download`  DESC
limit 10";
$res1 = mysql_query($sql1);
?>
<div class="row">
	<?php while($row1=mysql_fetch_array($res1)){ ?>
	
	<div class="col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<?php echo $row1['title']; ?>
			</div>
			<div class="panel-body">
				<div class="col-lg-6">
					<img  width="150" src="<?php echo substr($row1['poster'],3);?>"/>	
				</div>
				<div class="col-lg-6">
					<h1><i  class="fa fa-download"></i><span><?php echo $row1['count_download']; ?></span></h1>
					<h1><i class="fa fa-play-circle-o"></i><span><?php echo $row1['count_play']; ?></span></h1>
				</div>
			</div>
			<div class="panel-footer">
				<?php echo $row1['title']; ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>