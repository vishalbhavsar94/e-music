<?php session_start(); ?>
<!DOCTYPE HTML>
<?php include('conn.php')?>
<html>
	<head>

		<title>Mosaic a Entertainment Category Flat Bootstrap Responsive Website Template | Browse :: w3layouts</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="css/font-awesome.css" rel="stylesheet"> 
		<!-- jQuery -->
		<!-- lined-icons -->
		<link rel="stylesheet" href="css/icon-font.css" type='text/css' />
		<!-- //lined-icons -->
		<!-- Meters graphs -->
		<script src="js/jquery-2.1.4.js"></script>


	</head> 
	<!-- /w3layouts-agile -->
	<body class="sticky-header left-side-collapsed">
		<section>
			<!-- left side start-->
			<div class="left-side sticky-left-side">

				<!--logo and iconic logo start-->
				<div class="logo">
					<h1><a href="index.php">E<span>-Music</span></a></h1>
				</div>
				<div class="logo-icon text-center">
					<a href="index.php">E</a>
				</div>
				<!-- /w3layouts-agile -->
				<!--logo and iconic logo end-->
				<div class="left-side-inner">

					<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li class="active"><a onclick="AjaxPages('pages/Album.php')"><i class="lnr lnr-home"></i><span>Home</span></a></li>
						
						<li class="menu-list"><a><i class="lnr lnr-indent-increase"></i> <span>Category</span></a>  
							<ul class="sub-menu-list">
								<?php $sql = "select * from movietype"; $res = mysql_query($sql);
								while($r=mysql_fetch_assoc($res)){
									?>
									<!--<li><a href="index.php?Cat_id=<?php // echo $r['type_id']?>"><?php // echo $r['type_name']?></a> </li>-->
									<!-- Includepages By Ajax -->
									<li><a onclick="AjaxPages('pages/Album.php?Cat_id=<?php echo $r['type_id']?>')"><?php  echo $r['type_name']?></a> </li>
									<?php }
								?>
							</ul>
						</li>
						<?php if(isset($_SESSION['user'])){?>
							<li class="menu-list"><a href="#"><i class="lnr lnr-heart"></i>  <span>My Favourities</span></a> 
								<ul class="sub-menu-list">
									<!--<li><a href="index.php?FavAlbumList">Favourite List</a></li>-->
									<!-- IncludeBy Ajax -->
									<li><a onclick="AjaxPages('pages/FavAlbumList.php?FavAlbumList')">Favourite List</a></li>
								</ul>
							</li>
							<?php }?>
						<li><a onclick="AjaxPages('pages/Artist.php')"><i class="lnr lnr-users"></i> <span>Artists</span></a></li>     
					</ul>
					<!--sidebar nav end-->
				</div>
			</div>
			<!-- left side end-->
			<!-- app-->
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog facebook" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
							<div class="app-grids">
								<div class="app">
									<div class="col-md-5 app-left mpl">
										<h3>Mosaic mobile app on your smartphone!</h3>
										<p>Download and Avail Special Songs Videos and Audios.</p>
										<div class="app-devices">
											<h5>Gets the app from</h5>
											<a href="#"><img src="images/1.png" alt=""></a>
											<a href="#"><img src="images/2.png" alt=""></a>
											<div class="clearfix"> </div>
										</div>
									</div>
									<div class="col-md-7 app-image">
										<img src="images/apps.png" alt="">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //app-->
			<!-- /w3l-agile -->
			<!-- signup -->
			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="sign-grids">
								<div class="sign">
									<div class="sign-left">
										<ul>
											<li><a class="fb" href="#"><i></i>Sign in with Facebook</a></li>
											<li><a class="goog" href="#"><i></i>Sign in with Google</a></li>
											<li><a class="linkin" href="#"><i></i>Sign in with Linkedin</a></li>
										</ul>
									</div>
									<div class="sign-right">
										<form action="pages/SignUp.php" method="post" id="SignUp">
											<h3>Create your account </h3>
											<input type="text"  name="name" placeholder="NAME" id="name" required=""  onkeypress="return lettersOnly(event)">
											<input type="text"  name="phone"placeholder="MOBAIL NUMBER" id="mnum"  onkeypress="return isNumber(event)"required="" maxlength="10" minlength="10" />
											<input type="email" name="email"placeholder="EMAIL" id="email" required="">	
											<input type="password" name="pass"placeholder="PASSWORD" id="pass" required="">	
											<input type="submit" value="CREATE ACCOUNT" >
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
								<p>By logging in you agree to our <span>Terms and Conditions</span> and <span>Privacy Policy</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //signup -->
			<!--forgate password-->
			<div class="modal fade" id="ForgateModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
							<h4>ForgatePassword</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-md-offset-3">
									<form role="form" action="pages/ForgatePassword.php" method="post">
										<div class="form-group">
											<label>Email</label>
											<input class="form-control" type="email" required="" name="email">
											<p class="help-block">Reset Link Will Send To Authorized mail-id</p>
										</div>
										<div class="form-group">
											<input class="form-control btn btn-success" type="submit" value="SEND">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--forgate password-->
			<!-- /agileits -->
			<!-- main content start-->
			<div class="main-content">
				<!-- header-starts -->
				<div class="header-section">
					<!--toggle button start-->
					<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
					<!--toggle button end-->
					<!--notification menu start -->
					<div class="menu-right">
						<div class="profile_details">		
							<div class="col-md-4 serch-part">
								<div id="sb-search" class="sb-search">
									<form id="search">
										<input class="sb-search-input" placeholder="Search" type="search" name="Search" id="searchstring">
										<input class="sb-search-submit" type="submit">
										<span class="sb-icon-search"> </span>
									</form>
								</div>
							</div>
							<!-- search-scripts -->
							<script src="js/classie.js"></script>
							<script src="js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
							</script>
							<!-- //search-scripts -->
							<!---->
							<div class="col-md-4 player">
								<div class="audio-player">
									<audio id="audio-player"  controls="controls">
										<source id="mp3" type="audio/ogg"></source>
									</audio>
								</div>
								<!---->
								<script type="text/javascript">
									$(function(){
											$('#audio-player').mediaelementplayer({
													alwaysShowControls: true,
													features: ['playpause','progress','volume'],
													audioVolume: 'horizontal',
													iPadUseNativeControls: true,
													iPhoneUseNativeControls: true,
													AndroidUseNativeControls: true
												});
										});
								</script>
								<!--audio-->
								<link rel="stylesheet" type="text/css" media="all" href="css/audio.css">
								<script type="text/javascript" src="js/mediaelement-and-player.min.js"></script>
								<!---->
								<!-- /agileits -->

								<!--//-->
								<ul class="next-top">
									<li><a class="ar" href="#"> <img src="images/arrow.png" alt=""/></a></li>
									<li><a class="ar2" href="#"><img src="images/arrow2.png" alt=""/></i></a></li>
														
								</ul>	
							</div>
							<div class="col-md-4 login-pop">
								<div id="loginpop">
									<?php  if(!isset($_SESSION['user'])){?>
										<a href="#" id="loginButton"><span>Login <i class="arrow glyphicon glyphicon-chevron-right"></i></span></a>
										<a class="top-sign" href="#" data-toggle="modal" data-target="#myModal5"><i class="fa fa-sign-in" style="color: #EA57A3"></i></a>
										<?php }else{?>
										<!--<a href="#" id="SettingButton"><span><?php echo $_SESSION['login_user']?><i class="arrow glyphicon glyphicon-chevron-right"></i></span></a>									-->
										<a href="pages/Logout.php" id="Logout"><span>Logout<i class="arrow glyphicon glyphicon-chevron-right"></i></span></a>
										<?php }?>
									<div id="loginBox">                
										<form action="pages/Login.php" method="post" id="loginForm">
											<fieldset id="body">
												<input type="hidden" name="login"/>
												<fieldset>
													<label for="email">Email</label>
													<input type="email" name="email" id="email">
												</fieldset>
												<fieldset>
													<label for="password">Password</label>
													<input type="password" name="password" id="password">
												</fieldset>
												<input type="submit" id="login" value="Sign in">
												<!--<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>-->
												<span><a href="#" data-toggle="modal" data-target="#ForgateModel" >Forgot Password?</a></span>
											</fieldset>
											
										</form>
									</div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<!-------->
					</div>
					<div class="clearfix"></div>
				</div>
				<!--notification menu end -->
				<!-- //header-ends -->
				<!-- /agileinfo -->
				<!-- //header-ends -->
				<div id="page-wrapper">
					<div class="inner-content">
						<div class="music-browse">
							<!--albums-->
							<!-- pop-up-box --> 
							<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
							<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
							<script>
								$(document).ready(function() {
										$('.popup-with-zoom-anim').magnificPopup({
												type: 'inline',
												fixedContentPos: false,
												fixedBgPos: true,
												overflowY: 'auto',
												closeBtnInside: true,
												preloader: false,
												midClick: true,
												removalDelay: 300,
												mainClass: 'my-mfp-zoom-in'
											});
									});
							</script>		
							<!--//pop-up-box -->
									<div class="mainpage" id="mainpage">
										<?php require($content);?> 		
									</div>
							<script type="text/javascript">
								$(window).load(function() {
							
										$("#flexiselDemo1").flexisel({
												visibleItems: 5,
												animationSpeed: 1000,
												autoPlay: true,
												autoPlaySpeed: 3000,    		
												pauseOnHover: false,
												enableResponsiveBreakpoints: true,
												responsiveBreakpoints: { 
													portrait: { 
														changePoint:480,
														visibleItems: 2
													}, 
													landscape: { 
														changePoint:640,
														visibleItems: 3
													},
													tablet: { 
														changePoint:800,
														visibleItems: 4
													}
												}
											});
									});
									$("#search").submit(function(){
										var chr = $('#searchstring').val();
											searching(chr);
										return false;
	  								});
							</script>
							<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
						</div>
					</div>
					<div class="clearfix"></div>
					<!--body wrapper end-->
					<!-- /w3l-agile-info -->
				</div>
				<!--body wrapper end-->
			</div>
			<!--footer section start-->
			<footer>
				<p>Emusic</p>
			</footer>
			<!--footer section end-->
			<!-- /wthree-agile -->
			<!-- main content end-->
		</section>
		<!-- /wthree-agile -->
		<script src="js/play.js"></script>
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.js"></script>
	</body>
</html>
