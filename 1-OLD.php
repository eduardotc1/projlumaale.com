<div id="header">

	<div class="slider">
		<div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider"> 
            <img alt="slide3"    src="images/slider/slider3.jpg" data-thumb="images/1920x730.gif" data-transition="fade" />
               <img alt="slide1"  src="images/slider/slider2.jpg" data-thumb="images/1920x730.gif" data-transition="fade" />
                <img alt="slide2"   src="images/slider/slider1.jpg" data-thumb="images/1920x730.gif" data-transition="fade" />
               
			
            </div>
        </div>
	</div><!-- end of slider -->
	
	<div class="subnav">
		<div id="tabs" class="wrapsubnav">
			<ul style="float:left">
				<li><div class="booking"></div><a href="#tabs-1">Tour</a></li>
                <li><div class="hotels"></div><a href="#tabs-3">Hotels</a></li>
				<li><div class="flights"></div><a href="#tabs-2">Transfers</a></li>
				
			</ul>
        
        <div id="tabs-1" class="subsearch" style="float:left">
        <div class="wrapsubsearch">
	
			<form id="sTour"action="hotels.php" method="POST"><!-- ubicacion temporal -->
				
			<div class="selects">
			 
            
            
				<div class="filterBy">
             <div class="texts" style="float:left;">
				<div class="what"><img src="images/magnifier.png" width="13" height="14"><span> Filter By</span></div>
			
                </div>
				<div class="where">
                   <div class="texts">
				<div class="what"><span class="colored">Category</span></div>
                </div>
				<!--
					<select>
						<option value="">Leaving from</option>
						<option value="1">Amsterdam</option>
						<option value="2">Beijing</option>
						<option value="3">Berlin</option>
						<option value="4">Dublin</option>
						<option value="5">Madrid</option>
						<option value="6">Rome</option>
					</select>
				-->
					<select id="cat" name="cat">
						<option value="*">All</option>
					</select>
				</div>
				<div class="when">
                   <div class="texts">
				<div class="what"> <span class="colored">Location</span></div>
			
                </div>
				<!--
					<select>
						<option value="">Leaving from</option>
						<option value="1">Amsterdam</option>
						<option value="2">Beijing</option>
						<option value="3">Berlin</option>
						<option value="4">Dublin</option>
						<option value="5">Madrid</option>
						<option value="6">Rome</option>
					</select>
				-->
					<select id="loc" name="loc">
						<option value="*">All</option>
					</select>					
                    
				</div>
                </div>
                
                <div class="search" style="float:left; margin-left:10px">
					<input type="submit" name="search" class="searchbtn" value="Search Now" />
				</div>
                
                <div class="byTour">
             <div class="texts" style="float:left;">
				<div class="what"><img src="images/magnifier.png" width="13" height="14"><span> By Tour</span></div>
			
                </div>
				
				<div class="when ">
                   <div class="texts">
				<div class="what"><span class="colored">Name of activity</span></div>
			
                </div>
				<input id="tour" class="activity" type="text"  name="date"  value="Type Tour" />
				</div>
                </div>
                
				
				<div class="search">
					<!--
					<form id="sTour"action="hotels.html" method="POST"><input type="submit" name="search" class="searchbtn" value="Search Now" /></form>
					-->
					<input type="submit" name="search" class="searchbtn" value="Search Now" />
				</div>
				<div class="clear"></div>
			</div><!-- end of #selects -->
			
			</form><!-- end form -->
			
		</div>
        </div>
        
            <div id="tabs-2" class="subsearch" style="float:left">
        <div class="wrapsubsearch">
			<div class="texts">
				<div class="what">01 <span class="colored">- WHAT?</span></div>
				<div class="where">02 <span class="colored">- WHERE?</span></div>
				<div class="when">03 <span class="colored">- WHEN?</span></div>
				<div class="who">04 <span class="colored">- WHO?</span></div>
				<div class="advsearch"><a href="#">Advanced Search</a></div>
				<div class="clear"></div>
			</div>
			<div class="selects">
			
				<div class="what">
					<table class="sbox">
						<tr><td><div class="radiobtn"><input class="darkblue" type="radio" name="type" value="flightt" id="flightt"></div><div class="text">Flight</div></td>
						<td><div class="radiobtn"><input class="darkblue" type="radio" name="type" value="hotel" id="hotel" checked="checked" /></div><div class="text">Hotel</div></td>
						<td><div class="radiobtn"><input class="darkblue" type="radio" name="type" value="car" id="car"></div><div class="text">Car</div></td></tr>
					</table>
				</div>
				<div class="where">
					<select class="where1"  id="select1">
						<option value="">Leaving from</option>
						<option value="1">Amsterdam</option>
						<option value="2">Beijing</option>
						<option value="3">Berlin</option>
						<option value="4">Dublin</option>
						<option value="5">Madrid</option>
						<option value="6">Rome</option>
					</select>
				</div>
				<div class="when">
					<input type="text" class="wheninput" name="date" id="date" value="Date" />
				</div>
				<div class="who">
					<select id="select2">
						<option value="">Adults</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
					<select id="select3">
						<option value="">Childs</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option class="last" value="5">5</option>
					</select>
				</div>
				<div class="search">
					<form action="hotels.html" method="POST"><input type="submit" name="search" class="searchbtn" value="Search Now" /></form>
				</div>
				<div class="clear"></div>
			</div><!-- end of #selects -->
		</div>
        </div>
         
          
			<div class="clear"></div>
		</div>
	</div><!-- end of subnav -->
	
	

</div><!-- end of #header -->

<form action="bookdetail.html" method="POST">
<div id="content">
	<div class="wrapcontent">
	
			<div class="special">
				<h2>BUY THESE TOURS AT PROMOTIONAL PRICES, OR GET THEM FOR FREE!</h2>
					<div class="box" id="specialbox1">
						<div class="image"><img alt="special1" src="images/tours/catamaran.jpg"/></div>
						<a href="bookdetail.html"><div class="title">Catamaran <span class="colored">%25</span> Off</div></a>
					</div>
					
					<div class="box" id="specialbox2">
						<div class="image"><img alt="special2"  src="images/tours/xcaretFullDay.jpg" /></div>
						<a href="bookdetail.html"><div class="title">Xcaret Full Day <span class="colored">$1220</span></div></a>
					</div>
					
                    <div class="box last" id="specialbox3">
						<div class="image">
                       <img alt="special3"  src="images/tours/jungle-tour.jpg" />
                        </div>
						<a href="bookdetail.html"><div class="title">Weekly <span class="colored">Top</span> Offers</div></a>
					</div>
                    
					<!--<div class="box last" id="specialbox3">
						<div class="image">
                        <a class="fancybox" href="images/800x600.gif" data-fancybox-group="gallery"><div class="specialhover"><img alt="specialhover" src="images/specialh.png" /></div><img alt="special3" src="images/306x192.gif" /></a>
                        </div>
						<a href="bookdetail.html"><div class="title">Weekly <span class="colored">Top</span> Offers</div></a>
					</div> -->
				<div class="clear"></div>
			</div><!-- end of .special -->
			
			<div class="top">
				<h2>Top Travel Places</h2>
				
					<div class="box" id="topbox1">
						<div class="image"><div class="travelhover"><img alt="travelhover" src="images/travelh.png" /></div><img alt="top1" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.html">Arnus Hotel</a><span class="count">2 Nights</span></div>
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
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap1" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>132,00</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="box" id="topbox2">
						<div class="special"></div>
						<div class="image"><div class="travelhover"><img alt="travelhover" src="images/travelh.png" /></div><img alt="top2" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.html">Resert Serrento Beach</a><span class="count">3 Nights</span></div>
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
						<div class="rooms">Standard Room<span class="left"><a href="#">5 Rooms Left</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap2" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>255,00</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="box last" id="topbox3">
						<div class="image"><div class="travelhover"><img alt="travelhover" src="images/travelh.png" /></div><img alt="top3" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.html">Resert Serrento Beach</a><span class="count">3 Nights</span></div>
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
						<div class="rooms">Standard Room<span class="left"><a href="#">5 Rooms Left</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap3" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>582,00</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="box" id="topbox4">
						<div class="deals"></div>
						<div class="image"><div class="travelhover"><img alt="travelhover" src="images/travelh.png" /></div><img alt="top4" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.html">Paris</a><span class="count">289 Hotels</span></div>
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
						<div class="rooms">Timing<span class="left"><a href="#">1 Flight Daily</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap4" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>389,00</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="box" id="topbox5">
						<div class="image"><div class="travelhover"><img alt="travelhover" src="images/travelh.png" /></div><img alt="top5" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.html">Weekend in Aples</a><span class="count">28 Hotels</span></div>
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
						<div class="rooms">Timing<span class="left"><a href="#">1 Flight Daily</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap5" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>132,00</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="box last" id="topbox6">
						<div class="image"><div class="travelhover"><img alt="travelhover" src="images/travelh.png" /></div><img alt="top6" src="images/284x131.gif" /></div>
						<div class="title"><a href="bookdetail.html">Paris Tour</a><span class="count">3 Nights</span></div>
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
						<div class="rooms">Standard Room<span class="left"><a href="#">5 Rooms Left</a></span></div>
						<div class="viewmap"><a class="md-trigger" data-modal="modal-viewmap6" href="#content">View on Map</a></div>
						<div class="booknow">
							<div class="price"><span class="dollar">$</span>982,00</div>
							<div class="book"><input class="bookbtn" type="submit" name="booknow" value="Book Now" /></div>
							<div class="clear"></div>
						</div>
					</div>

					
					<div class="clear"></div>
			</div><!-- end of .top -->
			
	</div>
</div><!-- end of #content -->
</form>