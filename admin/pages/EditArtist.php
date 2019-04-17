<?php
include("../conn.php");
$artist_id = $_REQUEST['EditArtist'];
$sql = "select * from artist where id = $artist_id";
$res = mysql_query($sql);
$res = mysql_fetch_object($res);
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Edit Artist</h1>
	</div>
</div>
<div class="row">
    <div class="col-md-2">
        <img src="<?php echo substr($res->img,3);?>" alt="Artist Image" width="180px" height="180px">
    </div>
</div>
<div class="row">
	<div class="col-lg-6">
		<form class="form-preset" action ="pages/EditArtistCode.php" method="POST"  required autocomplete="on" enctype="multipart/form-data" role="form">
			<div class="form-group">
				<label>Artist Name</label>
				<input class="form-control" value="<?php echo $res->id;?>" id="id" tabindex="1" maxlength="25" type="hidden" WIDTH= "500PX" name="id"REQUIRED autocomplete="off" AUTOFOCUS >
				<input class="form-control" value="<?php echo $res->name;?>" id="name" tabindex="1" maxlength="25" type="text" WIDTH= "500PX" name="name"REQUIRED autocomplete="off" AUTOFOCUS >
				<p class="help-block">Update Artist Name</p>
			</div>
            <div class="form-group">
				<label>Artist Description</label>
				<textarea class="form-control" id="art_desc" tabindex="1" type="text" WIDTH= "500PX" name="art_desc"REQUIRED autocomplete="off" AUTOFOCUS><?php echo $res->art_desc;?></textarea>
                <p class="help-block">Update Artist Description</p>
			</div>
            <div class="form-group">
				<label>Select ArtistPoster</label>
				<input class="form-control" type="FILE" value="upload" accept = "image/*" NAME="upload"tabindex="6" />
			</div>
            <button type="submit" class="btn btn-primary">Update Artist</button>
        </form>
    </div>
</div>