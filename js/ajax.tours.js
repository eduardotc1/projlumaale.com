// Simular "text-overflow:ellipsis" para textos largos ( multilínea )
// http://notasjs.blogspot.mx/2013_05_01_archive.html
function createEllipsis(containerId) {
    $container = $("#" + containerId);
    var containerHeight = $container.height();
    var $text = $container.find("p");
    while ( $text.outerHeight() > containerHeight ) {
        $text.text(function (index, text) {
            return text.replace(/\W*\s(\S)*$/, '...');
		});
	}
}

// Listado de Tours
function getListTours(c,l){
	var selector = '#itemContainer';
	var url = 'srcdb/tour/getListTours.php';
    $.ajaxSetup({ cache: false });
	$.ajax({
		timeout: 3000, // Timeout of 30 seconds
		type: 'POST',
	    url: url,
	    dataType: 'json',
		data: { cat:c, loc:l },
	    beforeSend: function(msg){
			var $loader = $(selector).empty().html('<center><img src="images/bx_loader.gif"/><center>');
        },
	    success: function(data, textStatus) {
			var rdb = '';
			var i=1;
			if(data == null){
				$(selector).empty().html($('<h1></h1>').text("No hay Tours en esta Localidad"));
				$('div.pagination').hide();
			}
			$.each(data, function (index,item) {
				rdb += 	"<div id='box' class='box'>";
				rdb += 		"<div class='left'>";
				rdb +=			"<div class='image'><a href='bookdetail.php'><img alt='tour"+i+"' src='"+item.thumbnail+"'/></a></div>";
				//rdb +=			"<div class='title'><a href='"+item.urlCat+"/"+item.urlTour+"/' target='_blank' >"+item.tour+"</a><span class='time'><!-- 5 Nights --></span></div>";
				rdb +=			"<div class='title'><a href='"+item.urlCat+"/"+item.urlTour+"/' >"+item.tour+"</a><span class='time'><!-- 5 Nights --></span></div>";
				rdb +=			"<div class='ratings'><div class='stars three'></div><div class='address'>"+item.destination+"</div></div>";
				rdb +=			"<div id='desc"+i+"' class='desc' style='height:70px;overflow:hidden;'><p>"+item.description+"</p></div>";
				rdb +=			"<div class='rateinfo'>";
				rdb +=			"<div class='urated'>";
				rdb +=				"<span class='text'>User Rating</span>";
				rdb +=				"<div class='bullets three'></div>";
				rdb +=				"<span class='viewby'>1 Other Person Looking at this Hotel! Last booking Monday</span>";
				rdb +=				"</div>";
				rdb +=			"</div>";
				rdb +=			"<div class='clear'></div>";
				rdb +=		"</div>";
				rdb +=		"<div class='right'>";
				rdb +=			"<div class='price'><span class='price dollar'>$</span>"+item.adultPrice+"</div>";
				rdb +=			"<div class='discount'>Get 10% Discount</div>";
				rdb +=		"</div>";
				rdb +=		"<div class='clear'></div>";
				rdb +=		"<div class='bottom'>";
				rdb +=			"<div class='left'>";
				rdb +=				"<ul>";
				rdb +=					"<li class='rooms'>Standard Room: <span class='color'>2 Rooms Left</span></li>";
				rdb +=					"<li class='peoples'>1 - 2 People: <span class='color'>$"+item.adultPrice+"</span></li>";
				rdb +=					"<li class='viewmap'><a class='md-trigger' data-modal='modal-viewmap1' href='#'>View on Map</a></li>";
				rdb +=				"</ul>";
				rdb +=			"</div>";
				rdb +=			"<div class='right'>";
				rdb +=				"<input type='submit' name='booknow' class='booknow' value='Book Now' />";
				rdb +=			"</div>";
				rdb +=			"<div class='clear'></div>";
				rdb +=		"</div>";
				rdb +=	"</div>";
				createEllipsis("desc"+i);
				i++;				
	    	});          
            $(selector).empty().append(rdb);
			$('div.pagination').show();			
	    },
		error: function(xhr, textStatus){
			$(selector).empty().html($('<h1></h1>').text("Whoops! The request for new content failed"));
			$('div.pagination').hide();
		}, 
		complete: function(XMLHttpRequest, textStatus){
			console.log("complete say: " + textStatus);			
		}
	}).done(function(data){
		var item = 8;
		if(data.length<=item){
		 	/* initiate plugin */
			$("div.toursContainer").jPages({
				containerID	: "itemContainer",
				first       : "",
				previous    : "",
				next        : "",
				last        : "",
			    links       : "blank",
				perPage 	: item,
				delay 		: 20,
				keyBrowse   : true,
				callback    : function( pages, items ){
								$("#legendTop").html("Showing " + items.count);
								$("#legendBotton").html("Showing " + items.count);								
				        	}
			});
		} else if(data.length<=item*5){
			/* initiate plugin */
			$("div.toursContainer").jPages({
				containerID	: "itemContainer",
				first       : "",
				previous    : "previous",
				next        : "next",
				last        : "",
				perPage 	: item,
				delay 		: 20,
				keyBrowse   : true,
				callback    : function( pages, items ){
								$("#legendTop").html("Showing " + items.range.start + " - " + items.range.end + " of " + items.count);
								$("#legendBotton").html("Showing " + items.range.start + " - " + items.range.end + " of " + items.count);								
				        	}
			});
		} else {
			$("div.toursContainer").jPages({
				/* initiate plugin */
				containerID	: "itemContainer",
				first       : "first",
				previous    : "previous",
				next        : "next",
				last        : "last",
				perPage 	: item,
				delay 		: 20,
				keyBrowse   : true,
				callback    : function( pages, items ){
								$("#legendTop").html("Showing " + items.range.start + " - " + items.range.end + " of " + items.count);
								$("#legendBotton").html("Showing " + items.range.start + " - " + items.range.end + " of " + items.count);								
				        	}
			});
		}
	});
};

$(document).ready(function(){
	getListTours(_cat,_loc);
});
