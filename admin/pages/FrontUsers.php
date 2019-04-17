<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">View FrontUsers</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Password</th>
					<th>Phone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$qrysearch ="select * From users";
				$search=mysql_query($qrysearch) or die ("Query not excutived");
				while($row=mysql_fetch_array($search)){
					?>
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['email_id'];?></td>
						<td><?php echo $row['pass'];?></td>
						<td><?php echo $row['phone'];?></td>
						<td><button class="btn btn-warning" onclick="FrontUserEdit(<?php echo $row['id'];?>)">Edit</button> 
						<a class="btn btn-danger" href="pages/FrontUsersCode.php?delete_id=<?php echo $row['id']; ?>" Onclick="return confirm('Are You Sure Want To Delete This Record?')" >DELETE</a></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="FrontUserModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Update User</h4>
				</div>
				<form action="pages/FrontUsersCode.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>UserName</label>
						<input class="form-control" id="EditUser"type="TEXT"  name="EdtUser" required />
						<p class="help-block">Enter UserName</p>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" id="EditEmail"type="email"  name="EdtEmail" required />
						<p class="help-block">EnterEmailID</p>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" id="EditPass"type="password"  name="EdtPass" required />
						<p class="help-block">EnterPassword</p>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input class="form-control" id="EditPhone"type="text"  name="EdtPhone" required />
						<p class="help-block">EnterPhoneNumber</p>
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
</div>