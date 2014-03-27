// Rellena de imagenes de cada tours
function getTour(token,tour_id){
	var url = 'srcdb/tour/getTour.php';
	$.ajax({
		type: 'POST',
		url: url,
		data: { token:token, tour_id:tour_id },
		dataType: 'json',
		success: function(data) {
			$.each(data, function(index,item){
				$("#breadcrumbs .wrapbreadcrumbs .text").append($('<a></a>')
					.attr('href', 'bookdetail.php')
					.text(item.tour)
				);	
				$(".right .title h2").empty().append(item.tour);

				var pics = item.pics;
				var parts = pics.split(","),i,l;				
				for (i = 0, l = parts.length; i<l; i++) {
					//$("#pic").append("<li><a href='"+parts[i]+"'><img alt='Image "+i+"' src='"+parts[i]+"'></a></li>");
					$("#slider").append("<img src='"+parts[i]+"' data-thumb='"+parts[i]+"' alt='' />");
				}
				parts = undefined;
			});
		},
		error: function(xhr, text){
			console.log("Whoops! The request for new content failed");
		},
		complete: function(XMLHttpRequest, textStatus){
			console.log("Complete Request");
		}
	}).done(function(data){
		//$('head').append('<link rel="stylesheet" type="text/css" href="css/jquery.ad-gallery.css" />');		
		//$('#pic').appendTo('.ad-thumb-list');
	});
}

$(document).ready(function() {
	//getTour(token,tour_id);
});