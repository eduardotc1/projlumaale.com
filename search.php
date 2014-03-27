<?php 
include_once "srcdb/comprobarToken.php";
include_once 'srcdb/storage/tours.class.php';
$tours = Tours::singletonTours();
$category = !isset($_POST["cat"]) || $_POST["cat"] == "undefined" ? 0 : $_POST["cat"];
$location = !isset($_POST["loc"]) || $_POST["loc"] == "undefined" ? 0 : $_POST["loc"];		
$itemCat = $tours->getCategories($category,$location);
$itemLoc = $tours->getLocations($category,$location);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Trips Booking - Hotels</title>

<!-- CSS Styles -->
<link rel="stylesheet" type="text/css" href="css/pages/hotels.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/themes/default/default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/themes/minimal/all.css" >
<link rel="stylesheet" type="text/css" href="css/modalbox.css" />
<link rel="stylesheet" type="text/css" href="css/select.css" />
<link rel="stylesheet" type="text/css" href="css/jslider-theme/jslider.css" />
<link rel="stylesheet" type="text/css" href="css/jPages.css">

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
						<li><a href="bookdetail.php">Booking Details Page</a></li>
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
		<div class="text">You are on Home:&nbsp;&nbsp;/&nbsp;&nbsp;Hotels&nbsp;&nbsp;/&nbsp;&nbsp;Paris&nbsp;&nbsp;/&nbsp;&nbsp;<a href="hotels.html">Search Result</a></div>
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
					<td colspan="2"><div class="radiobtn"><input class="lightblue" type="radio" name="terms" value="terms" id="terms" checked></div><div class="terms">I have read and agree to the <a href="#">Terms of Use</a> and the <a href="#">Privacy Policy</a>.</div></td>
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

<!-- viewmap6 modalbox -->
<div class="md-modal md-effect-1" id="modal-viewmap6">
	<div class="md-content">
		<h3>View on Map</h3>
			<div class="box">
				<div class="map">
					<div class="infobox">
						<div class="midbox">
							<h2>5 Star South Tyrol</h2>
							<div class="address">Main Street, 658, Name Walnut Park, Paris</div>
							<div class="phone">548-8725-524</div>
							<div class="arrow"></div>
							<div class="clear"></div>
						</div>
					</div>
					<img alt="map6" src="images/map.jpg" />
				</div>
				<div class="zmap">
					<div class="text">Zoom In</div>
					<div class="slide"><div id="map-range6"></div><div class="clear"></div></div>
					<div class="reset"><a onclick="resetmap()" href="#">Reset All</a></div>
					<div class="clear"></div>
				</div>
			</div>
	<button class="md-close closebox"></button>
	</div>
</div>
<!-- end of viewmap6 modalbox -->

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
					<h3>Categories</h3>
					<table class='sbox'>
					<!-- Categories -->
					<?php
					if (is_array($itemCat)) {
						$countRows = count($itemCat);
						if($countRows > 1){
							echo "<tr><td>";
							echo 	"<div class='radiobtn'>";
							echo 		"<input class='lightblue' type='radio' name='cat' value='*' id='ac0' checked='checked' /></div>";
							echo 	"<div class='text'><span id='sendtotitle'>All</span><span class='no'></span></div>";
							echo "</td></tr>";
						}
						$i=1;
					    foreach($itemCat as $row){
							if ($countRows == 1){
								echo "<tr><td>";
								echo 	"<div class='radiobtn'>";
								echo 		"<input class='lightblue' type='radio' name='cat' value='".$row['id']." id='ac".$i."' checked='checked' /></div>";
								echo 		"<div class='text'><span id='sendtotitle'>".$row['category']."</span><span class='no'>(".$row['totalTours'].")</span></div>";
								echo "</td></tr>";
							} else {
								echo "<tr><td>";
								echo 	"<div class='radiobtn'>";
								echo 		"<input class='lightblue' type='radio' name='cat' value='".$row['id']." id='ac".$i."' /></div>";
								echo 		"<div class='text'><span id='sendtotitle'>".$row['category']."</span><span class='no'>(".$row['totalTours'].")</span></div>";
								echo "</td></tr>";
							}
							$i++;
						}
					}
					?>
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
		
		<div class="right">
			<div class="top">
				<div class="title">
					<h2>Tours</h2>					
				</div>
				<div class="sortby">
					<div class="text">Location</div>
					<!-- Location -->
					<select id="sortby" name="sortby">
					<?php
					if (is_array($itemLoc)) {
						$countRows = count($itemLoc);
						if($countRows>1){
							echo "<option value='*'>All</option>";
						}
					    foreach($itemLoc as $row){		
							echo "<option value='".$row['id']."'>".$row['destination']."</option>";
						}
					}
					?>
					</select>
				</div>
								
				<div class="list-type">
					<ul>
						<li><a id="changelist" class="list" href="#"></a></li>
						<li><a id="changegrid" class="grid" href="#"></a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			
			<!-- Pagination -->
			<div id="pagination" class="pagination">
				<div class="left">Showing 6 Hotels Per Page...</div>
				<div class="right">
					<ul>
						<li><a href="#">&lt; Previous</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li class="active"><a href="#">3</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">...</a></li>
						<li><a href="#">10</a></li>
						<li class="last"><a href="#">Next &gt;</a></li>
					</ul>
				</div>
				<br />
				<div class="holder">
					<div id="legendTop" class="left"></div>				
					<div class="toursContainer"></div>
				</div>
		
				<div class="clear"></div>
			</div><!-- end of .pagination -->
			
		<div id="list-style">
			
			<!-- List Tours -->
			<form action="plantilla.php" method="POST">			
				<div id="itemContainer"></div>
			</form><!-- end List Tours -->
			
		</div>
		<div id="grid-style">
			<form action="bookdetail.php" method="POST">
				
				<div class="box" id="topbox1">
						<div class="image"><img alt="top1" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.php">Cotswolds Hotels</a><span class="count">5 Nights</span></div>
						<div class="ratings">
							<ul class="star-rating">
							  <li><a href="#" class="one-star">1</a></li>
							  <li><a href="#" class="two-stars">2</a></li>
							  <li><a href="#" class="three-stars">3</a></li>
							  <li><a href="#" class="four-stars">4</a></li>
							  <li><a href="#" class="five-stars">5</a></li>
							</ul>
							<span class="address">70 Pier Street, Perth</span>
						</div>
						<div class="desc">Lorem Ipsum is simply dummy text of the printing industry took a galley ...  <span class="more"><a href="#">More</a></span></div>
						<div class="rooms">Standard Room<span class="left"><a href="#">2 Rooms Left</a></span></div>
						<div class="peoples">1 - 2 People<span class="left"><a href="#">$44,00</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap1" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>44,00</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
				</div>
				
				<div class="box last" id="topbox2">
						<div class="image"><img alt="top1" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.php">Hotel Hayman, Australia</a><span class="count">3 Nights</span></div>
						<div class="ratings">
							<ul class="star-rating">
							  <li><a href="#" class="one-star">1</a></li>
							  <li><a href="#" class="two-stars">2</a></li>
							  <li><a href="#" class="three-stars">3</a></li>
							  <li><a href="#" class="four-stars">4</a></li>
							  <li><a href="#" class="five-stars">5</a></li>
							</ul>
							<span class="address">70 Pier Street, Perth</span>
						</div>
						<div class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard printer ...  <span class="more"><a href="#">More</a></span></div>
						<div class="rooms">Business Class<span class="left"><a href="#">8 Rooms Left</a></span></div>
						<div class="peoples">3 - 5 People<span class="left"><a href="#">$83,99</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap2" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>83,99</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
				</div>
				
				<div class="box" id="topbox3">
						<div class="image"><img alt="top1" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.php">Chanai Hotel</a><span class="count">5 Nights</span></div>
						<div class="ratings">
							<ul class="star-rating">
							  <li><a href="#" class="one-star">1</a></li>
							  <li><a href="#" class="two-stars">2</a></li>
							  <li><a href="#" class="three-stars">3</a></li>
							  <li><a href="#" class="four-stars">4</a></li>
							  <li><a href="#" class="five-stars">5</a></li>
							</ul>
							<span class="address">70 Pier Street, Perth</span>
						</div>
						<div class="desc">Lorem Ipsum is simply dummy text of the printing industry took a galley ...  <span class="more"><a href="#">More</a></span></div>
						<div class="rooms">Standard Room<span class="left"><a href="#">2 Rooms Left</a></span></div>
						<div class="peoples">1 - 2 People<span class="left"><a href="#">$44,00</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap3" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>44,00</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
				</div>
				
				<div class="box last" id="topbox4">
						<div class="image"><img alt="top1" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.php">Las Vegas Hotel</a><span class="count">3 Nights + All Facilities</span></div>
						<div class="ratings">
							<ul class="star-rating">
							  <li><a href="#" class="one-star">1</a></li>
							  <li><a href="#" class="two-stars">2</a></li>
							  <li><a href="#" class="three-stars">3</a></li>
							  <li><a href="#" class="four-stars">4</a></li>
							  <li><a href="#" class="five-stars">5</a></li>
							</ul>
							<span class="address">70 Pier Street, Perth</span>
						</div>
						<div class="desc">Lorem Ipsum is simply dummy text of the printing industry took a galley ...  <span class="more"><a href="#">More</a></span></div>
						<div class="rooms">Business Class<span class="left"><a href="#">8 Rooms Left</a></span></div>
						<div class="peoples">3 - 5 People<span class="left"><a href="#">$83,99</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap4" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>83,99</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
				</div>
				
				<div class="box" id="topbox5">
						<div class="image"><img alt="top1" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.php">Mallorca Luxury Hotel</a><span class="count">1 Week</span></div>
						<div class="ratings">
							<ul class="star-rating">
							  <li><a href="#" class="one-star">1</a></li>
							  <li><a href="#" class="two-stars">2</a></li>
							  <li><a href="#" class="three-stars">3</a></li>
							  <li><a href="#" class="four-stars">4</a></li>
							  <li><a href="#" class="five-stars">5</a></li>
							</ul>
							<span class="address">70 Pier Street, Perth</span>
						</div>
						<div class="desc">Lorem Ipsum is simply dummy text of the printing industry took a galley ...  <span class="more"><a href="#">More</a></span></div>
						<div class="rooms">Luxury Room<span class="left"><a href="#">4 Rooms Left</a></span></div>
						<div class="peoples">1 - 2 People<span class="left"><a href="#">$98,63</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap5" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>98,63</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
				</div>
				
				<div class="box last" id="topbox6">
						<div class="image"><img alt="top1" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.php">5 Star South Tyrol</a><span class="count">2 Nights</span></div>
						<div class="ratings">
							<ul class="star-rating">
							  <li><a href="#" class="one-star">1</a></li>
							  <li><a href="#" class="two-stars">2</a></li>
							  <li><a href="#" class="three-stars">3</a></li>
							  <li><a href="#" class="four-stars">4</a></li>
							  <li><a href="#" class="five-stars">5</a></li>
							</ul>
							<span class="address">70 Pier Street, Perth</span>
						</div>
						<div class="desc">Lorem Ipsum is simply dummy text of the printing industry took a galley ...  <span class="more"><a href="#">More</a></span></div>
						<div class="rooms">Business Class<span class="left"><a href="#">8 Rooms Left</a></span></div>
						<div class="peoples">1 - 2 People<span class="left"><a href="#">$33,99</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap6" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>33,99</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
				</div>

			</form>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<!-- Pagination -->
		<div id="pagination" class="pagination">
			<!--
			<div class="left">Showing 6 Hotels Per Page...</div>
			<div class="right">
				<ul>
					<li><a href="#">&lt; Previous</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li class="active"><a href="#">3</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">...</a></li>
					<li><a href="#">10</a></li>
					<li class="last"><a href="#">Next &gt;</a></li>
				</ul>
			</div>
			<br />
			-->
			<div class="holder">
				<div id="legendBotton" class="left"></div>				
				<div class="toursContainer"></div>
			</div>
			
			<div class="clear"></div>
		</div><!-- end of .pagination -->
		</div> <!-- end class right -->
		<div class="clear"></div>
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
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.icheck.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.select.js"></script>
<script type="text/javascript" src="js/jScrollPane.js"></script>
<script type="text/javascript" src="js/jquery.ad-gallery.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modalEffects.js"></script>
<script type="text/javascript" src="js/jPages.min.js"></script>

<!-- scripts de lumaale -->
<script type="text/javascript" src="js/ajax.tours.js"></script>
<script type="text/javascript">
var token = '<?php echo $_SESSION['token'];?>';
var _cat = '<?php echo $category;?>';
var _loc = '<?php echo $location;?>';
$(document).ready(function(event){
	var valCat = undefined;
	var valLoc = undefined;
	var linksCat = $(".iCheck-helper");
	var linksLoc = $("div.sortby").find("li");
	$(linksCat).on('click',function(event){
		$('div.sortby').find('.stylesortby').text('All');
		valCat = $('input:radio[name=cat]:checked').val();
		getListTours(valCat,_loc);
    });
	$(linksLoc).on('click',function(){
	    valCat = getRadioValue();
		valLoc = $(this).attr('rel')
		getListTours(valCat,valLoc);
	});
	function getRadioValue() {
	    if($('input:radio[name=cat]:radio:checked').length>0) {
	        return $('input:radio[name=cat]:radio:checked').val();
	    } else {
	        return 0;
	    }
	}
});
</script>

</body>
</html>