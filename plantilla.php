<?php 
//include_once("srcdb/comprobarToken.php");
include_once "srcdb/storage/conexion/config.inc.php";
include_once ('srcdb/storage/bookdetail.class.php'); 
$tour_id = !isset($_GET['idTour']) || $_GET['idTour'] == "undefined" ? 0 : $_GET['idTour'];
$singletonBookDetail = BookDetail::singletonBookDetail();
$item = $singletonBookDetail->getTour($tour_id);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trips Booking - Book Details</title>

<!-- CSS Styles -->
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/pages/home.css'; ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/pages/bookdetail.css'; ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/themes/default/default.css'; ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/themes/minimal/all.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/modalbox.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/select.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/jslider-theme/jslider.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/jquery.ad-gallery.css'; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo URL.'css/nivo-slider.css'; ?>" />

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
		<div class="text">You are on Home:&nbsp;&nbsp;/&nbsp;&nbsp;Hotels&nbsp;&nbsp;/&nbsp;&nbsp;Paris&nbsp;&nbsp;/&nbsp;&nbsp;
			<!--<a href="bookdetail.php">Resert Serento Beach</a>-->
		</div>
	</div>
</div><!-- end of breadcrumbs -->

<!-- Sigin modalbox -->
<div class="md-modal md-effect-1" id="modal-login">
	<div class="md-content">
		<h3>Sign in or select an option</h3>
			<div class="box">
				<table class="sbox">
					<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="signintype" value="user" id="user"></div><div class="text">Sign in to my existing account</div></td></tr>
					<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="signintype" value="new" id="new" checked></div><div class="text">Create a new account</div></td></tr>
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
<div class="md-modal md-effect-1" id="modal-viewmap">
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
					<img alt="map" src="images/map.jpg" />
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

<div class="md-overlay"></div>

<div id="content">
	<div class="wrapcontent">
		<div class="left">
			<div class="box">
				<div class="topbox">
					<div class="title"><h2>SEARCH FILTER</h2></div>
					<div class="reset"><a onclick="resetall()" href="#">Reset All</a></div>
					<div class="clear"></div>
				</div>
				<div class="midbox">
				
					<h3>Price Range</h3>
					<div id="price-range"></div>
					<div class="slide-result">
						<input disabled class="amount1" type="text" id="pr1" />
						<input disabled class="amount2" type="text" id="pr2" value="$ 1500" />
						<div class="clear"></div>
					</div>
					
					<h3>Star Rating</h3>
					<div id="star-range"></div>
					<div class="slide-result">
						<div class="rated"><div class="stars three"></div></div>
						<input disabled class="amount2" type="text" id="sr" value="15 Ratings" />
						<div class="clear"></div>
					</div>
					
					<h3>User Rating</h3>
					<div id="user-range"></div>
					<div class="slide-result">
						<div class="urated"><div class="bullets three"></div></div>
						<input disabled class="amount2" type="text" id="ur" value="30 Users" />
						<div class="clear"></div>
					</div>
					
					<h3>Accommodation Type</h3>
					<table class="sbox">
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="accommodation" value="1" id="ac1" checked="checked" /></div><div class="text">Apartments<span class="no">(39)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="accommodation" value="2" id="ac2" /></div><div class="text">Hotel<span class="no">(20)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="accommodation" value="3" id="ac3" /></div><div class="text">Guest House<span class="no">(56)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="accommodation" value="4" id="ac4" /></div><div class="text">Village Points<span class="no">(13)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="accommodation" value="5" id="ac5" /></div><div class="text">House<span class="no">(27)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="accommodation" value="6" id="ac6" /></div><div class="text">Motels<span class="no">(09)</span></div></td></tr>
					</table>
					
					<h3 id="loct">Location</h3>
					<table class="sbox">
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="1" id="lc1" checked="checked" /></div><div class="text">Thailand<span class="no">(15)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="2" id="lc2" /></div><div class="text">Middle East<span class="no">(20)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="3" id="lc3" /></div><div class="text">Hong Kong<span class="no">(32)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="4" id="lc4" /></div><div class="text">Chicago<span class="no">(13)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="5" id="lc5" /></div><div class="text">Las Vegas<span class="no">(05)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="6" id="lc6" /></div><div class="text">Washington<span class="no">(14)</span></div></td></tr>
					</table>
					<a class="moreopt" id="morelc" href="#loct">+ 5 More Options</a>
					<div id="locmore" class="locmore">
					<table class="sbox">
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="7" id="lc7" /></div><div class="text">Wolfsburg<span class="no">(07)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="8" id="lc8" /></div><div class="text">Dubai<span class="no">(21)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="9" id="lc9" /></div><div class="text">Barcelona<span class="no">(19)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="10" id="lc10" /></div><div class="text">London<span class="no">(08)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="location" value="11" id="lc11" /></div><div class="text">San Juan<span class="no">(03)</span></div></td></tr>
					</table>
					</div>
					<a class="moreopt" id="lesslc" href="#loct">- 5 More Options</a>
					
					<h3>Facilities</h3>
					<table class="sbox">
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="facilities" value="1" id="fc1" checked="checked" /></div><div class="text">Full Cooking<span class="no">(39)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="facilities" value="2" id="fc2" /></div><div class="text">Some Cooking<span class="no">(20)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="facilities" value="4" id="fc4" /></div><div class="text">Dance Club<span class="no">(13)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="facilities" value="5" id="fc5" /></div><div class="text">Swimming Pool<span class="no">(100)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="facilities" value="6" id="fc6" /></div><div class="text">Playing Areas<span class="no">(28)</span></div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="facilities" value="7" id="fc7" /></div><div class="text">Cafes<span class="no">(45)</span></div></td></tr>
					</table>
					
					<h3>View Hotels on a Map</h3>
					<table class="sbox">
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="onmap" value="1" id="mp1" checked="checked" /></div><div class="text">Show Selected Hotel</div></td></tr>
						<tr><td><div class="radiobtn"><input class="lightblue" type="radio" name="onmap" value="2" id="mp2" /></div><div class="text">Show All Hotels</div></td></tr>
					</table>
					
					<h3>Additional Search Options</h3>
					<table class="sbox">
						<tr><td><div class="text opt">Flight Type</div></td></tr>
						<tr><td>
							<select id="flight" name="flight">
								<option value="">No Preference</option>
								<option value="1">Belle Air</option>
								<option value="2">B&amp;H Airlines</option>
								<option value="3">Smart Wings</option>
								<option value="4">Avies</option>
								<option value="4">Travel Air</option>
								<option value="5">Phoenix Air</option>
							</select></td>
						</tr>
					</table>
					
					<table class="sbox">
						<tr><td><div class="text opt">Preferred Airline</div></td></tr>
						<tr><td>
							<select id="airline" name="airline">
								<option value="">No Preference</option>
								<option value="1">Belle Air</option>
								<option value="2">B&amp;H Airlines</option>
								<option value="3">Smart Wings</option>
								<option value="4">Avies</option>
								<option value="4">Travel Air</option>
								<option value="5">Phoenix Air</option>
							</select></td>
						</tr>
					</table>
					
					<div class="search"><input type="submit" name="searchnow" class="searchnow" value="Search Now" /></div>
					
				<div class="clear"></div>
				</div>
			</div>
		</div>
		
		<!-- Inicia tour detalles -->
		<div class="right">
			<?php echo $item; ?>
		</div> <!-- Termina tour -->
		
		<div class="clear"></div>
	</div>
</div><!-- end of #content -->
<div class="clear"></div>
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
<script type="text/javascript" src="<?php echo URL.'js/jScrollPane.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery.ad-gallery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/jquery.nivo.slider.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/main.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/classie.js'; ?>"></script>
<script type="text/javascript" src="<?php echo URL.'js/modalEffects.js'; ?>"></script>

</body>
</html>