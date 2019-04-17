<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">View Artist</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<?php
$qrysearch ="select * From artist ";
$search=mysql_query($qrysearch) or die ("Query not excutived");
					
while($row=mysql_fetch_array($search)){
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<?php echo $row['name'];?>
		</div>
		<div class="panel-body">
				
			<div class="col-md-6">
				<img src="<?php echo substr($row['img'],3); ?>" alt="nothing" height="150" width="150" />
			</div>
			<div class="col-md-6">
				<h3>Artist:<small><?php echo $row['name'];?></small></h3>
				<h3>Biblography:<small><?php echo $row['art_desc'];?></small></h3>
				<a href="pages/ViewArtistCode.php?delete_id=<?php echo $row['id']; ?>" Onclick="return confirm('Are You Sure Want To Delete This Record?')" class="btn btn-danger" >DELETE</a>
				<a href="index.php?EditArtist=<?php echo $row['id'];?>"class="btn btn-warning" >EDIT</a>
			</div>
		</div>	
		<div class="panel-footer">
		</div>
	</div>
	<?php
}