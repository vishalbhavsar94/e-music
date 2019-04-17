<?php
    $sql = "SELECT so.SID,so.title,so.count_play,so.count_download,al.ALBUM_NAME from song_master as so  JOIN album_master as al on so.ALBID = al.ALBID";
    $result = mysql_query($sql);
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Create PlayList</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div>
    <form action="pages/PlayListCode.php" enctype="multipart/form-data" role="form" method="POST">
         <div class="form-group">
				<label>PlayList Name</label>
				    <input class="form-control" id="name"  type="text" WIDTH= "500PX" name="name"REQUIRED autocomplete="off" AUTOFOCUS >
				    <p class="help-block">Add PlayList Name</p>
	     </div>
         <div class="form-group">
				<label>PlayList Poster</label>
				    <input class="form-control" id="poster"  type="File" WIDTH= "500PX" name="poster"  accept = "image/*"  REQUIRED >
				<p class="help-block">Add PlayList Poster</p>
	     </div>
         <div class="form-group">
         <label>Select Songs</label>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>play</th>
                <th>Download</th>
                <th>AlbumName</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysql_fetch_assoc($result)){?> 
            <tr>
                <td><input type="checkbox" name="check_list[]" value="<?php echo $row['SID'];?>"></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['count_play'];?></td>
                <td><?php echo $row['count_download'];?></td>
                <td><?php echo $row['ALBUM_NAME'];?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>play</th>
                <th>Download</th>
                <th>AlbumName</th>
            </tr>
        </tfoot>
    </table>
    </div>
    <div class="form-group">
                <input type="submit" class="btn btn-primary" value = "Create PlayList">
    </div>
    </form>
</div>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>