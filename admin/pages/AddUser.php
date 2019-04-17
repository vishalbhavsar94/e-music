<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Users</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-lg-6">
		<form action="pages/AddUserCode.php" onsubmit="return validateForm()" method="post">
		<div class="form-group">
			<label>UserName</label>
			<input class="form-control"  tabindex="1"  id="UName" type="text"  name="UserName"REQUIRED autocomplete="off" AUTOFOCUS >
			<p class="help-block">Enter UserName</p>
		</div>
		<div class="form-group">
			<label>Password</label>
			<input class="form-control"  tabindex="1"  id="psw" type="password"  name="psw"REQUIRED autocomplete="off" AUTOFOCUS >
			<p class="help-block">Enter Password</p>
		</div>
		<div class="form-group">
			<label>ConfermPassword</label>
			<input class="form-control"  tabindex="1"  id="cpsw" type="password"  name="cpsw"REQUIRED autocomplete="off" AUTOFOCUS >
			<p class="help-block">Again Enter Password</p>
		</div>
		<div class="form-group">
		<input type="submit" class="btn btn-primary form-group" value="Submit"> 
		</div>
		</form>
	</div>
</div>