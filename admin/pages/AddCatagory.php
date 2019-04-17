<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Catagorys</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="panel-body">
	<form class="form-preset"  method="POST" action="pages/AddCatagoryCode.php"  autocomplete="on" enctype="multipart/form-data">
		<div class="form-group input-group">
		
			<input type="text" class="form-control" name="cat" required>
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><i class="fa fa-plus"></i>
				</button>
			</span>
		</div>
	</form>	
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Catagory</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$qrysearch ="select * From movietype";
				$search=mysql_query($qrysearch) or die ("Query not excutived");
					
				while($row=mysql_fetch_array($search)){
				
					?>

					<tr>
						<td><?php echo $row['type_id'];?></td>
						<td><?php echo $row['type_name'];?></td>
						<td>
							<button class="btn btn-warning" onclick="CatEdit(<?php echo $row['type_id']; ?>)">Edit</button> 
							<a class="btn btn-danger" href="pages/addCatagoryCode.php?delete_id=<?php echo $row['type_id']; ?>" Onclick="return confirm('Are You Sure Want To Delete This Record?')">Delete</a>
						</td>
					
					</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- /.table-responsive -->
	<!-- Modal -->
	<div class="modal fade" id="CatModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Edit Catagory</h4>
				</div>
				<form action="pages/AddCatagoryCode.php">
				<div class="modal-body">
					<div class="form-group">
						<label>Catagory</label>
						<input class="form-control" id="EditCat"type="TEXT"  name="EdtCat" required />
						<p class="help-block">Change Catagory.</p>
					</div>
					<input type="hidden" id="EditId" name="EditId"/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
</div>
<!-- /.panel-body -->