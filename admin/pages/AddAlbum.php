
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Albums</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-6">
		<form class="form-preset" action ="pages/AddAlbumCode.php" method="POST"  required autocomplete="on" enctype="multipart/form-data" role="form">

			<input type="hidden" READONLY ="TRUE" class="form-control" id="" name="mcode" maxlength="25" value= " <?php echo $date=date_default_timezone_set('Asia/Calcutta').date("Ymdhms"); ?>" required ="required" /></BR>
			<div class="form-group">
				<label>Album Title</label>
				<input class="form-control" id="name" tabindex="1" maxlength="25" type="text" WIDTH= "500PX" name="title"REQUIRED autocomplete="off" AUTOFOCUS >
				<p class="help-block">Add movie or Album Name</p>
			</div>
			<div class="form-group">
				<label>Month</label>
				<input class="form-control" type="TEXT" tabindex="2" maxlength="6" title="Enter month like e.g.DEC" name="month" min="6" max="6" required autocomplete="off" required >
				<p class="help-block">Add Month of Album Ex.Jan*.</p>
			</div>
			<div class="form-group">
				<label>Year</label>
				<input class="form-control"type="TEXT" name="year" title="Enter Year e.g. 2015"tabindex="3" min="4" max="4" required autocomplete="off" required>
				<p class="help-block">Add Year Of Album or movie EX.2018*.</p>
			</div>
			<div class="form-group">
				<label>Artist Name</label>
				<select class="js-example-basic-multiple form-control" name="artist[]" multiple="multiple">
					  <?php 
							  $sql = "select id,name from artist"; 
							  $res = mysql_query($sql);
							  while($row = mysql_fetch_assoc($res)){
					  ?>
					  	<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>
				</select>
				<p class="help-block">Add Artist Name  EX.arijit singh,Another Artist*.</p>
			</div>
			
			<div class="form-group">
				<label>Released By</label>
				<input class="form-control"type="TEXT" name="released" title="Enter Music Company e.g. T-series"tabindex="3"  required autocomplete="off" required>
				<p class="help-block">Add Music Company e.g. T-series*.</p>
			</div>
			<div class="row">
				<div class="form-group col-lg-6">
				<label>Select Poster</label>
				<input class="form-control" type="FILE" value="upload" accept = "image/*" NAME="upload"tabindex="6" />
			</div>
			<div class="form-group col-lg-6">
				<label>Upload Songs</label>
				<input class="form-control"type="FILE" value="songs"  NAME="songs[]" accept ="audio/*" tabindex="6"  multiple/>
			</div>
			</div>
			
			<div class="form-group">
				<label for="Select">Select Catagory</label>
				<select id="Select" class="form-control" name="type_id">
					<?php
					
					$q="select * from movietype";
					$r=mysql_query($q);
					while($rr=mysql_fetch_assoc($r)){
						?>
						<option value="<?php echo $rr['type_id']; ?>"> <?php echo $rr['type_name']; ?></option>
						<?php 
					}
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">ADD ALBUM</button>
		</form>
	</div>
</div>
<script>
	$(document).ready(function() {
    	$('.js-example-basic-multiple').select2();
	});
</script>