//$( document ).ready(function() {
//	console.log('reached here');
//	if(CURRENT_PAGE != 'user'){
//		console.log('reached here');
//		logInUser();
//	}	
//});

function logInUser(){
	yam.getLoginStatus(
	  function(response) {
		  console.dir(response);
	    if (response.authResponse) {	    	
	    	$().redirect(BASE_URL + "/user",  {'response': JSON.stringify(response)});
	    }
	    else {
	      yam.login(function (response) {
	    	console.dir(response);
	        if (response.authResponse) {
	        	$().redirect(BASE_URL + "/user",  {'response': JSON.stringify(response)});
	        }
	      });
	    }
	  }
	);
}

function logOutUser(){
	yam.getLoginStatus(
			  function(response) {
				  if(response.authResponse){
					  yam.logout(function (response) {
						  $().redirect(BASE_URL + "/");
				        });
				  }
				  
			  }
	);
}
//$(function() {
//    $('form[data-async]').on('submit', function(event) {
//        var $form = $(this);
//        var $target = $($form.attr('data-target'));
//        console.prompt($form.serialize());
//        $.ajax({
//            type: $form.attr('method'),
//            url: BASE_URL + $form.attr('action'),
//            data: $form.serialize(),
// 
//            success: function(data, status) {
//                $target.html(data);
//            }
//        });
// 
//        event.preventDefault();
//    });
//});
