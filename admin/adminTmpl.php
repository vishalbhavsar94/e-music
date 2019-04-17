<!DOCTYPE html>
<html lang="en">
	<?php 
	include("conn.php");

	?>
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>E-music AdminPanal</title>

		<!-- Bootstrap Core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="dist/css/sb-admin-2.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Morris Charts CSS -->
		<link href="vendor/morrisjs/morris.css" rel="stylesheet">
		<!-- Select2 CSS -->
		<link href="dist/css/select2.min.css" rel="stylesheet">
		<!-- Datatable CSS -->
		<link href="dist/css/datatables.min.css" rel="stylesheet">
		<!-- jQuery -->
		<script src="vendor/jquery/jquery.min.js"></script>

	
	</head>

	<body>

		<div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><h1 style="font-size: 210%;font-family: 'Brush Script MT',cursive; margin:0">E-Music </h1></a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					<!-- /.dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i><?php echo $_SESSION['login_user']; ?> <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							
							<li class="divider"></li>
							<li><a href="pages/Logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<li class="sidebar-search">
								<!--<div class="input-group custom-search-form">
									<input type="text" class="form-control" placeholder="Search...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">
											<i class="fa fa-search"></i>
										</button>
									</span>
								</div>-->
								<!-- /input-group -->
							</li>
							<li>
								<a href="index.php?Dashbord"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
							</li>
							<li>
								<a href="index.php?AddAlbum"><i class="fa fa-edit fa-fw"></i> Add Albums</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-list fa-fw"></i>PlayList<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
										<a href="index.php?PlayList"><i class="fa fa-list fa-fw"></i> Create PlayList</a>
										</li>
										<li>
											<a href="index.php?ViewPlayList"><i class="fa fa-list fa-fw"></i> View PlayList</a>
										</li>
									</ul>
								</li>
							<li>
							<li>
								<a href="index.php?AddCatagory"><i class="fa fa-table fa-fw"></i> Category</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-users fa-fw"></i>Artist<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="index.php?AddArtist"><i class="fa fa-user fa-fw"></i> Add Artist</a>
										</li>
										<li>
											<a href="index.php?ViewArtist"><i class="fa fa-users fa-fw"></i> View Artist</a>
										</li>
									</ul>
								</li>
							<li>
								<a href="index.php?ViewAlbum"><i class="fa fa-folder-open fa-fw"></i>View Albums</a>
							</li>
							<?php if($_SESSION['user_type']=="1"){?>
								<li>
									<a href="index.php?AddUser"><i class="fa fa-user fa-fw"></i>Add User</a>
								</li>
								<?php }?>
							
							
							<?php if($_SESSION['user_type']=="1"){?>
								<li>
									<a href="#"><i class="fa fa-edit fa-fw"></i>Users<span class="fa arrow"></span></a>
									
									<ul class="nav nav-second-level">
										<li>
											<a href="index.php?FrontUsers">FrontUsers</a>
										</li>
										<li>
											<a href="index.php?Users">BackUsers</a>
										</li>
									</ul>
								</li>
								<?php }?>
						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>

			<!-- Page Content -->
			<div id="page-wrapper">
				<div class="container-fluid">
					<div class="section" id="section">
						<?php require($content)?>
					</div>
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->

		<!-- Bootstrap Core JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="vendor/metisMenu/metisMenu.min.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="dist/js/sb-admin-2.js"></script>
		<script src="js/admin.js"></script>
		<script src="vendor/raphael/raphael.min.js"></script>
		<script src="vendor/morrisjs/morris.min.js"></script>
		<!-- Select2 JavaScript -->
		<script src="dist/js/select2.min.js"></script>
		<!-- DataTable JavaScript -->
		<script src="dist/js/datatables.min.js"></script>
	</body>

</html>
