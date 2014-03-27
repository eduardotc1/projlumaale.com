<?php
include_once "srcdb/generarToken.php";
include_once "srcdb/storage/tours.class.php";
$tours = Tours::singletonTours();
$itemCat = $tours->indexCategories();
$itemLoc = $tours->indexLocations();
?>
<?php
if(substr_count(@$_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
error_reporting(defined('E_STRICT') ? E_ALL | E_STRICT : E_ALL);// if defined E_STRICT error_reporting = E_ALL | E_STRICT else E_ALL
ini_set('display_errors','0');
ini_set('display_startup_errors','0');

include dirname(__FILE__) . '/configuration.php';
$x = isset($_GET['x'])?$_GET['x']: '';
$y = isset($_GET['y'])?$_GET['y']: '';
$z = isset($_GET['z'])?$_GET['z']: '';



$show = true;
switch($x) {
	
	    case '':
		$x = dirname(__FILE__) . '/1.php';
		$Title = 'Lumaale';
		$Description = 'Tralve agency';
		$Keywords ='tours, travel,';
		$show = true;
		$titulo="";
		
			
		
		break;
		
		case 'travel-agency':
		$x = dirname(__FILE__) . '/2.php';
		$Title = 'Lumaale';
		$Description = 'Tralve agency';
		$Keywords ='tours, travel,';
		$show = false;
		$titulo="";
	;
		
		break;
		
		case 'contact-us':
		$x = dirname(__FILE__) . '/3.php';
		$Title = 'Cancun Tours';
		$Description = 'Tralve agency';
		$Keywords ='tours, travel,';
		$show = false;
		$titulo="";
	
		
		break;
		
		case 'riviera-maya-tours':
		$x = dirname(__FILE__) . '/4.php';
		$Title = 'Cancun Tours';
		$Description = 'Tralve agency';
		$Keywords ='tours, travel,';
		$show = false;
		$titulo="";
	
		
		break;
		
		case 'tour-details':
		$x = dirname(__FILE__) . '/4.php';
		$Title = 'Cancun Tours';
		$Description = 'Tralve agency';
		$Keywords ='tours, travel,';
		$show = false;
		$titulo="";
	
		
		break;
		
	
	default:
		header("HTTP/1.0 404 Not Found");
		$x = dirname(__FILE__) . '/error.php';
		$Title = 'Error - Page Not Found';
		$Description = 'Default error page, use our sitemap in order to find what you are looking for';
		$Keywords ='Error page, Page not found';
		$fondo='img/placeholders/1280x1024/8.jpg';
		$show = false;
	
		
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <base href="<?php echo $Path?>" />
		<title><?php echo $Title;?></title>
		<meta name="description" content="<?php echo $Description?>">
		<meta name="keywords" content="<?php echo $Keywords?>">

<!-- CSS Styles -->
<link rel="stylesheet" type="text/css" href="css/pages/home.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/nivo-slider.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/pages/contact.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/pages/bookdetail.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/themes/default/default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/themes/minimal/all.css" />
<link rel="stylesheet" type="text/css" href="css/modalbox.css" />
<link rel="stylesheet" type="text/css" href="css/select.css" />
<link rel="stylesheet" type="text/css" href="css/datepicker-theme/datepicker.css" />	
<link rel="stylesheet" type="text/css" href="css/jslider-theme/jslider.css" />	
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui.min.css" /> 
<link rel="stylesheet" type="text/css" href="css/jquery.ad-gallery.css" />
<style>
	.ui-autocomplete-loading {
	    background: white url('images/ui-anim_basic_16x16.gif') right center no-repeat;
	}
</style>

</head>

<body class="noJS">

<div id="top">
	<div class="wraptop">
		<div class="left">
			<ul>
				<li><a href="travel-agency/">Travel Agency</a></li>
				<li><a href="contact-us/">Contact  Us</a></li>
				<li><a href="#">Chat Online</a></li>
			</ul>
		</div>
		<div class="right">
			<ul>
				<li class="call">Toll to free:<span class="callno">1 888 644 7803</span></li>
                <li><a href="#"><img src="images/face.png" ></a></li>
                  <li><a href="#"><img src="images/in.png" width="30" height="30" ></a></li>
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
				<li><a href="index.html">Home</a></li>
				<li><a href="#">Booking</a></li>
				<li><a href="flights.html">Flights</a></li>
				<li><a href="hotels.html">Hotels</a></li>
				<li><a href="deals.html">Deals</a></li>
				<li class="last"><a class="md-trigger" data-modal="modal-login" id="signin" href="#">Sign in</a></li>
			</ul>
		</nav>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!-- end of #subtop -->

<?php include $x; ?>	

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
<script type="text/javascript" src="js/jquery.hovers.js"></script>
<script type="text/javascript" src="js/jScrollPane.js"></script>
<script type="text/javascript" src="js/jquery.ad-gallery.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modalEffects.js"></script>
<!-- scripts de lumaale -->
<script type="text/javascript">
$(function(){
    var cache = {};
	function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
	var removeSpinner = function() {
		$("#tour").removeClass('ui-autocomplete-loading');
	}
    $( "#tour" ).autocomplete({
		minLength: 3,
		timeout: 8000,
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache ) {
				response( cache[ term ] );
				return;
			}
			$.getJSON( "srcdb/tour/getTour.php", request, function( data, textStatus, jqXHR ) {
				cache[ term ] = data;
				if(cache[ term ] === null){removeSpinner();}
				response( $.map( data, function( item ) {
					return { label:item.tour, value:item.tour, urlcat:item.urlcat, urltour:item.urltour }
				}));
			})
			.done(function() { removeSpinner(); })
			.fail(function() { removeSpinner(); });
		},
		select: function(event, ui) {
			var addurl = ui.item.urlcat + "/" + ui.item.urltour + "/";
			$("#formTour").attr("action",addurl);
		}
	});
});  
</script>

</body>
</html>