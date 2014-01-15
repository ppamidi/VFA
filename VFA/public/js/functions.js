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
			    if (response.authResponse) {
			    	$().redirect(BASE_URL + "/user",  {'response': JSON.stringify(response)});
			    }
			    else {
			      yam.login(function (response) { //prompt user to login and authorize your app, as necessary
			        if (response.authResponse) {
			        	$().redirect(BASE_URL + "/user",  {'response':response});
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

