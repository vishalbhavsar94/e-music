<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Artist</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-6">
		<form class="form-preset" action ="pages/AddArtistCode.php" method="POST"  required autocomplete="on" enctype="multipart/form-data" role="form">
			<div class="form-group">
				<label>Artist Name</label>
				<input class="form-control" id="name" tabindex="1" maxlength="25" type="text" WIDTH= "500PX" name="name"REQUIRED autocomplete="off" AUTOFOCUS >
				<p class="help-block">Add Artist Name</p>
			</div>
            <div class="form-group">
				<label>Artist Description</label>
				<textarea class="form-control" id="art_desc" tabindex="1" type="text" WIDTH= "500PX" name="art_desc"REQUIRED autocomplete="off" AUTOFOCUS></textarea>
                <p class="help-block">Add Artist Description</p>
			</div>
            <div class="form-group">
				<label>Select ArtistPoster</label>
				<input class="form-control" type="FILE" value="upload" accept = "image/*" NAME="upload"tabindex="6" />
			</div>
            <button type="submit" class="btn btn-primary">Add Artist</button>
        </form>
    </div>
</div>

