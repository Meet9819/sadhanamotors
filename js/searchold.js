$(document).ready(function(){
    filterSearch();	
    $('.productDetail').click(function(){
        filterSearch();
    });	
	$('#priceSlider').slider({		
	}).on('change', priceRange); 	
});
function priceRange(e){
	$('.priceRange').html($(this).val() + " - 65000");
	$('#minPrice').val($(this).val());
	filterSearch();	
}
function filterSearch() {
	$('.searchResult').html('<div id="loading">Loading .....</div>');
	var action = 'fetch_data';
	var minPrice = $('#minPrice').val();
	var maxPrice = $('#maxPrice').val();
	var brand = getFilterData('brand');
		

		var newold = getFilterData('newold');


	$.ajax({
		url:"action.php",
		method:"POST",
		dataType: "json",		
		data:{action:action, minPrice:	minPrice, maxPrice:maxPrice, brand:brand, newold:newold},
		success:function(data){
			$('.searchResult').html(data.html);
		}
	});
}
function getFilterData(className) {
	var filter = [];
	$('.'+className+':checked').each(function(){
		filter.push($(this).val());
	});
	return filter;
}