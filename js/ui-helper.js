 $(document).ready(function(){
	 
	
	 
	 
	  $("body").on("click", ".data-row", function(){
          
		  var currentState = $(this).data('state');

			//alert(currentState);

            if (currentState === '') {
				// this is the behind variable
				$(this).data('state', 'selected');
				// this is the dom variable
                $(this).attr('data-state', 'selected');
                $(this).addClass('highlighted');
            } else {
                // Remove the attribute and remove the styling
                $(this).data('state', '');
				$(this).attr('data-state', '');
                $(this).removeClass('highlighted');
            }
		  
		  
	  });
	  
	  $('#search-box').keyup(function () {
		  var cari  = $('#search-box').val().toLowerCase();
		  var man = $(this).data('management');
		  
		  if(man == "info"){
			  // indexing for 4 columns : 0123
			  table_search(cari,$('.table tbody tr'),'0123');
		  }else if( man == "boxes" ){
			  table_search(cari,$('.table tbody tr'),'0123');
		  }else if( man == "users" ){
			  table_search(cari,$('.table tbody tr'),'012345');
		  }else if( man == "customers" ){
			  table_search(cari,$('.table tbody tr'),'0123');
		  }
		  
		
		});

// ended	 
});