<?php 
//include_once("srcdb/comprobarToken.php");
include_once "srcdb/storage/conexion/config.inc.php";
include_once "srcdb/storage/tours.class.php";
$category = !isset($_GET['idCat']) || $_GET['idCat'] == "undefined" ? 0 : $_GET['idCat'];
$tours = Tours::singletonTours();
$item = $tours->getCatFriendly($category);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trips Booking - Homepage</title>

<!-- CSS Styles -->
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/pages/pdeals.css'; ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/themes/default/default.css'; ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/themes/minimal/all.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/modalbox.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/select.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/jslider-theme/jslider.css'; ?>" />	
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/jquery.fancybox.css'; ?>" />

<!-- Google Fonts -->
<!--
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800italic,800,700italic,600italic,400italic,300italic' rel='stylesheet' type='text/css' />
-->

</head>

<body class="noJS">
	
<div id="top">
	<div class="wraptop">
		<div class="left">
			<ul>
				<li><a href="#">My Account</a></li>
				<li><a href="#">$US Dollar</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="right">
			<ul>
				<li class="call">Call Us: <span class="callno">548-8725-524</span></li>
				<li><input type="text" name="keyword" class="searchf" value="Search" onfocus="if(this.value == 'Search') {this.value=''}" onblur="if(this.value == ''){this.value ='Search'}" /></li>
			</ul>
		</div>
	<div class="clear"></div>
	</div>
</div><!-- end of #top -->

<div id="subtop">
	<div class="wrapsubtop">
		<div class="logo"><a href="index.html"><img alt="logo" src="images/logo.png" /></a></div>
		<div class="navmenu">
		<nav id="topNav">
			<ul>
				<li><a href="index.html">Home</a>
					<ul class="submenu">
                    	<li><a href="index.html">Main Homepage</a></li>
                        <li><a href="index-2.html">Light Homepage</a></li>
                        <li><a href="index-3.html">Dark Homepage</a></li>
                        <li><a href="index-4.html">Fixed Background Homepage</a></li>
						<li><a href="404.html">404 Error Page</a></li>
                    </ul>
				</li>
				<li><a href="#">Booking</a>
					<ul class="submenu">
						<li><a href="bookdetail.html">Booking Details Page</a></li>
                    	<li><a href="bookinfo.html">Booking Information Page</a></li>
						<li><a href="bookinfo-2.html">Booking Info Optional</a></li>
						<li><a href="bookpay.html">Payment Information Page</a></li>
                        <li><a href="bookconfirm.html">Booking Confirmation Page</a></li>
						<li><a href="bookconfirm-2.html">Booking Confirm Optional</a></li>
                    </ul>
				</li>
				<li><a href="flights.html">Flights</a></li>
				<li><a href="hotels.html">Hotels</a></li>
				<li><a href="deals.html">Deals</a>
					<ul class="submenu">
						<li><a href="popular-deals.html">Popular Deals List</a></li>
                    	<li><a href="deals.html">Exciting Deals</a></li>
                    </ul>
				</li>
				<li class="last"><a class="md-trigger" data-modal="modal-login" id="signin" href="#">Sign in</a></li>
			</ul>
		</nav>
		</div>
		<div class="clear"></div>
	</div>
</div><!-- end of #subtop -->

<div id="breadcrumbs">
	<div class="wrapbreadcrumbs">
		<div class="text">You are on Home:&nbsp;&nbsp;/&nbsp;&nbsp;Deals&nbsp;&nbsp;/&nbsp;&nbsp;Popular&nbsp;&nbsp;/&nbsp;&nbsp;<a href="popular-deals.html">Popular Deals</a></div>
	</div>
</div><!-- end of breadcrumbs -->

<!-- Sigin modalbox -->
<div class="md-modal md-effect-1" id="modal-login">
	<div class="md-content">
		<h3>Sign in or select an option</h3>
			<div class="box">
				<table class="sbox">
					<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="signintype" value="user" id="user"></div><div class="text">Sign in to my existing account</div></td></tr>
					<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="signintype" value="new" id="new" checked="checked" /></div><div class="text">Create a new account</div></td></tr>
					<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="signintype" value="guest" id="guest"></div><div class="text">Continue as a guest</div></td></tr>
				</table>
				<h2>Create a New Account</h2>
				<table class="sbox">
				<tr>
					<td><span class="textd">Personal Title</span></td>
					<td><span class="textd">First Name</span></td>
				</tr>
				<tr>
					<td><select id="select4" name="pname">
							<option value="">Select Title</option>
							<option value="1">Ms.</option>
							<option value="2">Mrs.</option>
							<option value="3">Miss</option>
							<option value="4">Ma'am</option>
						</select>
					</td>
					<td><input type="text" name="fname" class="fieldt" value="John" /></td>
				</tr>
				<tr>
					<td><span class="textd">Last Name</span></td>
					<td><span class="textd">Email Address</span></td>
				</tr>
				<tr>
					<td><input type="text" name="lname" class="fieldt" value="Smith" /></td>
					<td><input type="text" name="eaddr" class="fieldt" value="johnsmith@hotmail.com" /></td>
				</tr>
				<tr>
					<td><span class="textd">Password</span></td>
					<td><span class="textd">Confirm Password</span></td>
				</tr>
				<tr>
					<td><input type="password" name="pass" class="fieldt" value="********" /></td>
					<td><input type="password" name="rpass" class="fieldt" value="********" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="radiobtn"><input class="lightblue" type="radio" name="terms" value="terms" id="terms" checked="checked" /></div><div class="terms">I have read and agree to the <a href="#">Terms of Use</a> and the <a href="#">Privacy Policy</a>.</div></td>
				</tr>
				</table>
				<div class="createacc"><input class="createbtn" type="submit" name="createacc" value="Create Account" /></div>
			<div class="clear"></div>
			</div>	
	<button class="md-close closebox"></button>
	</div>
</div><!-- end of signin modalbox -->

<!-- viewmap1 modalbox -->
<div class="md-modal md-effect-1" id="modal-viewmap1">
	<div class="md-content">
		<h3>View on Map</h3>
			<div class="box">
				<div class="map">
					<div class="infobox">
						<div class="midbox">
							<h2>Cotswolds Hotels</h2>
							<div class="address">Main Street, 658, Name Walnut Park, Paris</div>
							<div class="phone">548-8725-524</div>
							<div class="arrow"></div>
							<div class="clear"></div>
						</div>
					</div>
					<img alt="map1" src="images/map.jpg" />
				</div>
				<div class="zmap">
					<div class="text">Zoom In</div>
					<div class="slide"><div id="map-range1"></div><div class="clear"></div></div>
					<div class="reset"><a onclick="resetmap()" href="#">Reset All</a></div>
					<div class="clear"></div>
				</div>
			</div>
	<button class="md-close closebox"></button>
	</div>
</div>
<!-- end of viewmap1 modalbox -->

<!-- viewmap2 modalbox -->
<div class="md-modal md-effect-1" id="modal-viewmap2">
	<div class="md-content">
		<h3>View on Map</h3>
			<div class="box">
				<div class="map">
					<div class="infobox">
						<div class="midbox">
							<h2>Hotel Hayman, Australia</h2>
							<div class="address">Main Street, 658, Name Walnut Park, Paris</div>
							<div class="phone">548-8725-524</div>
							<div class="arrow"></div>
							<div class="clear"></div>
						</div>
					</div>
					<img alt="map2" src="images/map.jpg" />
				</div>
				<div class="zmap">
					<div class="text">Zoom In</div>
					<div class="slide"><div id="map-range2"></div><div class="clear"></div></div>
					<div class="reset"><a onclick="resetmap()" href="#">Reset All</a></div>
					<div class="clear"></div>
				</div>
			</div>
	<button class="md-close closebox"></button>
	</div>
</div>
<!-- end of viewmap1 modalbox -->

<!-- viewmap3 modalbox -->
<div class="md-modal md-effect-1" id="modal-viewmap3">
	<div class="md-content">
		<h3>View on Map</h3>
			<div class="box">
				<div class="map">
					<div class="infobox">
						<div class="midbox">
							<h2>Chanai Hotel</h2>
							<div class="address">Main Street, 658, Name Walnut Park, Paris</div>
							<div class="phone">548-8725-524</div>
							<div class="arrow"></div>
							<div class="clear"></div>
						</div>
					</div>
					<img alt="map3" src="images/map.jpg" />
				</div>
				<div class="zmap">
					<div class="text">Zoom In</div>
					<div class="slide"><div id="map-range3"></div><div class="clear"></div></div>
					<div class="reset"><a onclick="resetmap()" href="#">Reset All</a></div>
					<div class="clear"></div>
				</div>
			</div>
	<button class="md-close closebox"></button>
	</div>
</div>
<!-- end of viewmap3 modalbox -->

<!-- viewmap4 modalbox -->
<div class="md-modal md-effect-1" id="modal-viewmap4">
	<div class="md-content">
		<h3>View on Map</h3>
			<div class="box">
				<div class="map">
					<div class="infobox">
						<div class="midbox">
							<h2>Las Vegas Hotel</h2>
							<div class="address">Main Street, 658, Name Walnut Park, Paris</div>
							<div class="phone">548-8725-524</div>
							<div class="arrow"></div>
							<div class="clear"></div>
						</div>
					</div>
					<img alt="map4" src="images/map.jpg" />
				</div>
				<div class="zmap">
					<div class="text">Zoom In</div>
					<div class="slide"><div id="map-range4"></div><div class="clear"></div></div>
					<div class="reset"><a onclick="resetmap()" href="#">Reset All</a></div>
					<div class="clear"></div>
				</div>
			</div>
	<button class="md-close closebox"></button>
	</div>
</div>
<!-- end of viewmap4 modalbox -->

<!-- viewmap5 modalbox -->
<div class="md-modal md-effect-1" id="modal-viewmap5">
	<div class="md-content">
		<h3>View on Map</h3>
			<div class="box">
				<div class="map">
					<div class="infobox">
						<div class="midbox">
							<h2>Mallorca Luxury Hotel</h2>
							<div class="address">Main Street, 658, Name Walnut Park, Paris</div>
							<div class="phone">548-8725-524</div>
							<div class="arrow"></div>
							<div class="clear"></div>
						</div>
					</div>
					<img alt="map5" src="images/map.jpg" />
				</div>
				<div class="zmap">
					<div class="text">Zoom In</div>
					<div class="slide"><div id="map-range5"></div><div class="clear"></div></div>
					<div class="reset"><a onclick="resetmap()" href="#">Reset All</a></div>
					<div class="clear"></div>
				</div>
			</div>
	<button class="md-close closebox"></button>
	</div>
</div>
<!-- end of viewmap5 modalbox -->

<div class="md-overlay"></div>

<div id="content">
	<div class="wrapcontent">
	<!--
	<form action="hotels.php" method="POST">
	-->
		<div class="top">
			<!-- Aqui -->
			<h2>Tours</h2>
				<?php
				if (is_array($item)) {	
					$i = 1;
					foreach($item as $row){
						if($i == 3){
							echo "<div class='box last'>";
							$i = 0;
						} else {
							echo "<div class='box'>";								
						}
						echo 	"<div class='image'><img alt='top3' src='".URL.$row['pic']."'  width='284px' heigth='131px' /></div>";
						echo 	"<div class='title'><a>".$row['tour']."</a></div>";	
						echo 	"<div class='desc'></div><br />";
						echo 	"<div class='booknow'>";
						//echo 		"<div>";
						//echo 			"<input type='hidden' name='token' value='".$_SESSION['token']."' />";
						//echo 			"<input id='urltour' type='hidden' name='idTour' value='".$row['url']."' />";
						//echo		"</div>";	
						echo 		"<div>";
						echo 			"<form action='".$row['url']."/ ' method='POST'>";						
						echo 				"<div class='book center'><input class='bookbtn' type='submit' name='booknow' value='Book Now' /></div>";
						echo 				"<div class='clear'></div>";
						echo 			"</form>";						
						echo 		"</div>";
						echo 	"</div>";
						echo "</div>";
						$i++;
					}
				}
				?>
				<div class="clear"></div>
			</div><!-- end of .top -->
		<!--
		</form>
		-->			
	</div>
</div><!-- end of #content -->

<div id="footer">
	<div class="wrapfooter">
		<div class="links">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="404.html">About</a></li>
				<li><a href="hotels.html">Destination</a></li>
				<li><a href="404.html">Packages</a></li>
				<li><a href="deals.html">Deals</a></li>
				<li><a href="404.html">Reviews</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="copyright">
			<p>Copyright @ 2013 Tripsbranding.com LLC.</p>
		</div>
		<div class="clear"></div>
	</div>
</div><!-- end of #footer -->

<!-- Javascripts -->
<script type="text/javascript" src="<?php echo URL.'js/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery-ui.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery.icheck.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery.fancybox.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery.mousewheel.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery.select.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery.hovers.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jScrollPane.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery.nivo.slider.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/main.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/classie.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/modalEffects.js'; ?>"></script> 

</body>
</html>