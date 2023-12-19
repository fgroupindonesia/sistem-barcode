 $(document).ready(function(){
        // Event handler for the button click
        $("#btn-delete").click(function(){
            // Data to be sent in the POST request
			var selectedIds = $('tr[data-state="selected"]').map(function() {
            return $(this).data('id');
			}).get();
		   
		    var man = $(this).data('management');
			if(man == 'users'){
				man = 'user';
			}else if(man == 'customers'){
				man = 'customer';
			}else if(man == 'boxes'){
				man = 'box';
			}
		   
			if(selectedIds.length>0){
				selectedIds.forEach(function(el) {
					deleteData(el, man);
				});
			}
			console.log('we have ' + JSON.stringify(selectedIds));
			$.when.apply($, deletedRequest).then(function() {
			console.log('we have ' + deletedRequest.length + ' data in total!');
			var totalData = deletedRequest.length;
			
			// reset back for later usage
			deletedRequest = [];
			
			var url = "http://sistem-barcode.com/update-counter-" + man + "?data=" + totalData + "&ops=delete";
			window.location.href = url;
			});
		   
        }); // btn-delete done
		
		 $("#btn-refresh").click(function(){
           
		   location.reload(true);
		   
        }); // btn-refresh done
		
		 $("#btn-add").click(function(){
           
		   var man = $(this).data('management');
		   var url = "";
		   
		   if(man == 'users'){
			   url = "http://sistem-barcode.com/add-new-user";
		   } else if(man == 'boxes') {
			   url = "http://sistem-barcode.com/add-new-box";
		   } else if(man == 'customers') {
				url = "http://sistem-barcode.com/add-new-customer";
		   } else if(man == 'info') {
				url = "http://sistem-barcode.com/add-new-info";
		   }
		   
		   window.location.href = url;
		   
        }); // btn-add done
		
		 $("#btn-cancel").click(function(e){
           
		  
		   var man = $(this).data('management');
		   var url = "";
		   
		   if(man == 'users'){
			   url = "http://sistem-barcode.com/management-users";
		   } else if(man == 'boxes') {
			   url = "http://sistem-barcode.com/management-box";
		   } else if(man == 'customers') {
				url = "http://sistem-barcode.com/management-customers";
		   }
		   
		   window.location.href = url;
		   
		  
        }); // btn-cancel done
		
		 $("#btn-edit").click(function(){
            // Data to be sent in the POST request
			var selectedIds = $('tr[data-state="selected"]').map(function() {
            return $(this).data('id');
			}).get();
		   
		    var man = $(this).data('management');
			if(man == 'users'){
				man = 'user';
			}else if(man == 'customers'){
				man = 'customer';
			}else if(man == 'boxes'){
				man = 'box';
			}
		   
			if(selectedIds.length>0){
				var singleID = selectedIds[0];  
				viewData(singleID, man);
			}
			console.log('we have ' + JSON.stringify(selectedIds));
		   
        }); // btn-edit done
		
		
		
    });

function viewData(nomerID, man){
	
	
	window.location.href = "http://sistem-barcode.com/" + man + "/edit?id=" + nomerID;
	console.log('we just got ' + nomerID);
}	
	
var deletedRequest = [];
// array for storing global ajax usage	
function deleteData(nomerID, man){

		var postData = {
                id: nomerID
            };

            // AJAX POST request
          var req =  $.ajax({
                type: "POST",
                url: "http://sistem-barcode.com/" + man + "/delete", // Replace with your actual URL
                data: postData,
                success: function(response){
                    //alert("POST request successful:", response);
                    //location.reload(true);
                },
                error: function(error){
                    alert("POST request failed:", error);
                    // Handle the error as needed
                }
            });

		deletedRequest.push(req);
		

}	