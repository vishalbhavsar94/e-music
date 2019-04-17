<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">View PlayList</h1>
	</div>
</div>
<?php
$qrysearch ="select * From playlist ";
$search=mysql_query($qrysearch) or die ("Query not excutived");
					
while($row=mysql_fetch_array($search)){
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<?php echo $row['playlist_name'];?>
		</div>
		<div class="panel-body">
				
			<div class="col-md-6">
				<img src="<?php echo substr($row['poster'],3); ?>" alt="nothing" height="150" width="150" />
			</div>
			<div class="col-md-6">
				
				<a href="pages/ViewPlayListCode.php?delete_id=<?php echo $row['id']; ?>" Onclick="return confirm('Are You Sure Want To Delete This Record?')" class="btn btn-danger" >DELETE</a>
				<a href="index.php?EditPlayList=<?php echo $row['id'];?>"class="btn btn-warning" >EDIT</a>
			</div>
		</div>	
		<div class="panel-footer">
		</div>
	</div>
	<?php
}
