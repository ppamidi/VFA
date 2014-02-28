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

function searchMember(){
		      yam.request({
		        url: "https://www.yammer.com/api/v1/users/by_email.json",     //this is one of many REST endpoints that are available
		        method: "GET",
		        data: {
		        	'email':$('#srch-term').val()
		        },
		        success: function (member) { //print message response information to the console         
		        	retrieveMember(member);
		        },
		        error: function (member) {
		          alert("Unable to find member");
		        }
		      });	      
}

function retrieveMember(member){
	var url = BASE_URL + "/member/retrieve-member";
	console.dir(member);
	$.post(url, {'member': JSON.stringify(member)}, 
							function(memberThumbnail) {       	
							 $( "#searchModalBody").append( memberThumbnail );
							 $("#searchModal ").modal(show=true,backdrop=false);
					        });
	
}

function addMember(response){
	var url = BASE_URL + "/member/add-member";
	console.dir(response);
	$.post(url, {'response': JSON.stringify(response)}, 
			function(data) {       	
				var defaultHTML = '<div class="input-group"><input type="text" class="form-control" placeholder="Email Address" name="srch-term" id="srch-term"><div class="input-group-btn"><button onclick="searchUser()"  class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-search"></span></button></div></div>';
				$('#searchModalBody').html(defaultHTML);
				$("#searchModal ").modal(show=true,backdrop=false);
	        });
}

$('#searchModal').on('hidden.bs.modal', function (e) {
	var defaultHTML = '<div class="input-group"><input type="text" class="form-control" placeholder="Email Address" name="srch-term" id="srch-term"><div class="input-group-btn"><button onclick="searchUser()"  class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-search"></span></button></div></div>';
 	$('#searchModalBody').html(defaultHTML);
});

$(document).bind('sampleEvent', function(e, data) {
	alert('Event received');
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

//(function poll(){
//    $.ajax({ url: "server", success: function(data){
//        //Update your dashboard gauge
//        salesGauge.setValue(data.value);
//
//    }, dataType: "json", complete: poll, timeout: 30000 });
//})();
(function (){




});