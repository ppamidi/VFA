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
	    	$().redirect(BASE_URL + "/user/validate",  {'response': JSON.stringify(response)});
	    }
	    else {
	      yam.login(function (response) {
	    	console.dir(response);
	        if (response.authResponse) {
	        	$().redirect(BASE_URL + "/user/validate",  {'response': JSON.stringify(response)});
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

function searchUser(){
		      yam.request({
		        url: "https://www.yammer.com/api/v1/users/by_email.json",     //this is one of many REST endpoints that are available
		        method: "GET",
		        data: {
		        	'email':$('#srch-term').val()
		        },
		        success: function (user) { //print message response information to the console
		          retrieveUser(user);
		        },
		        error: function (user) {
		          alert("Unable to find user");
		        }
		      });	      
}

function retrieveUser(user){
	var url = BASE_URL + "/user/retrieve-user";
	$.post(url, {'user': JSON.stringify(user)}, 
							function(data) {       	
							 $( "#searchModalBody").append( data );
							 $("#searchModal ").modal(show=true,backdrop=false);
					        });
	
}

$('#searchModal').on('hidden.bs.modal', function (e) {
	var defaultHTML = '<div class="input-group"><input type="text" class="form-control" placeholder="Email Address" name="srch-term" id="srch-term"><div class="input-group-btn"><button onclick="searchUser()"  class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-search"></span></button></div></div>';
 	$('#searchModalBody').html(defaultHTML);
});
	
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
