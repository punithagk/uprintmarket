jQuery( function($) {
$(document).ready(function(){ 

  var default_value = $("#search .nice_search").val(); 

  $("#search .nice_search").focus(function() { 
    if($("#search .nice_search").val() == default_value) $("#search .nice_search").attr("value",""); 
  }); 
  $("#search .nice_search").blur(function() { 
    if($("#search .nice_search").val() == "") $("#search .nice_search").attr("value",default_value); 
  }); 
  
  var default_value2 = $("#newsletter-value").val(); 
  
  $("#newsletter-value").focus(function() { 
    if($("#newsletter-value").val() == default_value2) $("#newsletter-value").attr("value",""); 
  }); 
  $("#newsletter-value").blur(function() { 
    if($("#newsletter-value").val() == "") $("#newsletter-value").attr("value",default_value2); 
  }); 
  
  $('.wrap-tabs .tabs a').click(function(){
       $('.wrap-tabs .tabs a').removeClass('active');
       $(this).addClass('active');
       $('.wrap-tabs-content div.wrap-tab-content').css('display','none');
       $('.wrap-tabs-content #'+$(this).attr('id')+'-content').css('display','block');
      return false;
  });

  $('a#tabreviews').click(function(){
       $('.wrap-tabs .tabs a').removeClass('active');
       $('.wrap-tabs .tabs a#tab4').addClass('active');
       $('.wrap-tabs-content div.wrap-tab-content').css('display','none');
       $('.wrap-tabs-content #tab4-content').css('display','block');
      /*return false;*/
  });
  
  	/*PREVIEW FUNCTION ONLY FOR LINKS */
/*
  	$('#block-product-list a, #inline-product-list a').click(function(){
	 	document.location = '4_interior_product_view.html'; 
		return false;
	});
  	$('.add-quantity input, .addcart').click(function(){
	 	document.location = '5_interior_shopping_cart.html'; 
		return false;
	});
  	$('.checkout, .continue, .cart-summarry a').click(function(){
	 	document.location = '7_interior_checkout_step1.html'; 
		return false;
	});
*/
});
});