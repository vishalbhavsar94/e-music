<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">EditAlbum</h1>
	</div>
</div>
<?php 
	
	
$EditAlbum  = $_REQUEST['EditAlbum'];
$qry="SELECT a.poster,s.* from album_master a inner join song_master s on a.code = s.code where a.albid = '$EditAlbum'";
$result1=mysql_query($qry) or die ("Query not excutived");
$result2=mysql_query($qry) or die ("Query not excutived");
$poster = mysql_fetch_object($result1);

?>
<div>
	<img width="300px" height="300px" src="<?php echo "addmovie/".$poster->poster ?>" />
</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>SongTitle</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($row=mysql_fetch_array($result2)){
				?>
				<tr>
					<td><?php echo $row['TITLE'];?></td>
					<td><a class="btn btn-danger" href="pages/EditAlbumCode.php?delete_id=<?php echo $row['SID']; ?>&Album_id=<?php echo $EditAlbum ?>" Onclick="return confirm('Are You Sure Want To Delete This Record?')" >DELETE</a></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<form action="pages/EditAlbumCode.php" method="post" enctype="multipart/form-data">
					 <input type="hidden" name="update" value="<?php echo $EditAlbum ?>"/>
					 <td><input type="FILE" value="songs"  NAME="songs[]" accept ="audio/*" tabindex="6"  multiple/></td>
					 <td><button class="btn btn-primary" type="submit">Update</button></td>
					</form>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- /.table-responsive -->
</div>
<!-- /.panel-body -->