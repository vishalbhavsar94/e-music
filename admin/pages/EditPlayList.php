<?php 
    include('../conn.php');

    $id =  $_REQUEST['EditPlayList'];
    $sql = "select * from playlist  where id = $id";
    $res = mysql_query($sql);
    $res = mysql_fetch_object($res);
    $sid = explode(',',$res->sid);
    $songs = array();
        foreach ($sid as $key) {
            $sql2 = "select sid,title,file  from  song_master where sid = $key";
            $res2 = mysql_query($sql2);
            array_push($songs,mysql_fetch_assoc($res2));
        }
    $sql3 = "SELECT so.SID,so.title,so.count_play,so.count_download,al.ALBUM_NAME from song_master as so  JOIN album_master as al on so.ALBID = al.ALBID";
    $res3 = mysql_query($sql3);
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit PlayList</h1>
	</div>
</div>
<div class="row">
        <form action="pages/EditPlayListCode.php"  enctype="multipart/form-data" method="POST">
        <div class="form-group col-lg-12">
				<label>PlayList Name</label>
				    <input class="form-control" id="name" value="<?php echo $res->playlist_name; ?>" type="text" WIDTH= "500PX" name="name"REQUIRED autocomplete="off" AUTOFOCUS >
				    <input type="hidden" name="play_id" value="<?php echo $id; ?>">
                    <p class="help-block">Add PlayList Name</p>
	     </div>
         <div class="form-group col-lg-9">
				<label>PlayList Poster</label>
				    <input class="form-control"  type="file" WIDTH= "500PX" name="poster"  accept = "image/*" >
				<p class="help-block">Add PlayList Poster</p>
	     </div>
         <div class="form-group col-lg-3">
				<label>PlayList Current Poster</label>
				    <img src="<?php  echo substr($res->poster,3); ?>" alt="" WIDTH="150px" height="150px">
				
	     </div>
    <div class="table-responsive col-lg-12">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>SongName</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($songs as $key => $value) {?>
					<tr>
						<td><?php echo $key;?></td>
						<td><?php echo $value['title'];?></td>
						<td>
							<a class="btn btn-danger" href="pages/EditPlayListCode.php?delete_id=<?php echo $value['sid']; ?>&playlist_id=<?php echo $id;?>" Onclick="return confirm('Are You Sure Want To Delete This Record?')">Delete</a>
						</td>
					
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- /.table-responsive -->
    <div class="form-group col-lg-12">
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
            <?php while($row = mysql_fetch_assoc($res3)){?> 
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
            <input type="submit" class="btn btn-primary" value = "UpdatePlayList" name="PlayListUpdate">
    </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>