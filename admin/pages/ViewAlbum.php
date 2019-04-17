<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">View Albums</h1>
	</div>
</div>

<?php
$qrysearch ="select * From album_master ";
$search=mysql_query($qrysearch) or die ("Query not excutived");
$artist=null;
$prefix=',';
while($row=mysql_fetch_array($search)){
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<?php echo $row['ALBUM_NAME'];?>
		</div>
		<div class="panel-body">
				
			<div class="col-md-3">
				<img src="<?php echo substr($row['POSTER'],3); ?>" alt="nothing" height="150" width="150" />	
			</div>
			<div class="col-md-5">
				<?php $ids = explode(',',$row['artist_name']);
					  
					  $artist = null;
					  foreach($ids as $value){
						  $qry = "select name from artist where id = $value";
						  $res = mysql_query($qry);
						  $result = mysql_fetch_row($res); 
						  $artist.=$result[0].$prefix;
					  }
					  
				?>

				<h3>Artist:<small><?php echo $artist; ?></small></h3>
				<h3>Released By:<small><?php echo $row['released_by'];?></small></h3>
			</div>
			<div class="col-md-4">
				<h3>Month&Year:<small><?php echo $row['MONTH'];?> <?php echo $row['YEAR'];?></small></h3>
				<h3>Upload Date: <small><?php echo $row['DATE'];?></small></h3>
				<a href="pages/ViewAlbumCode.php?delete_id=<?php echo $row['ALBID']; ?>" Onclick="return confirm('Are You Sure Want To Delete This Record?')" class="btn btn-danger" >DELETE</a>
				<a href="index.php?EditAlbum=<?php echo $row['ALBID'];?>"class="btn btn-warning" >EDIT</a>
			</div>
		</div>	
		<div class="panel-footer">
		</div>
	</div>
	<?php
}