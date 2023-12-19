 $(document).ready(function(){
	
	$(".upper-section").slideDown(3000, function(){
		$(".card-3d-wrap").show(2000);
	});
	
	$('#reg-log').on('click', function() {
      $('.card-3d-wrapper .card-front').toggleClass('card-hide');
	  $('.card-3d-wrapper .card-back').toggleClass('card-shown');
    });
	
 });