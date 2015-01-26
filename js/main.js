var root = location.protocol + '//' + location.host + '/links/';

$(document).ready(function(){

	$('#btnSubmitSignup').click(function(){
		
		var email = $('#signupEmail').val();
		var password = $('#signupPassword').val();
		var confirm_password = $('#signupPasswordConfirm').val();
		
		if(email == ''){
			alert('You must fill in your email to continue');
			return;
		}
		
		if(password == ''){
			alert('You must fill in your password to continue');
			return;
		}
		
		if(confirm_password == ''){
			alert('You must confirm your password to continue');
			return;
		}
		
		if(password != confirm_password){
			alert('Your passwords must match for you to continue');
			return;
		}
		
		var addUserUrl = root + 'users/add';
		$.post(addUserUrl,{'email' : email, 'password' : password},function(data){
			
			console.log(data);
			
			if(data.status == 'ok'){ window.location = root + 'browse'; } 
			else { 
			
				alert(data.message); 
				
			}			
			
		},"json");					
		
	});
	
	$('#btnLogin').click(function(event){
			
		var email = $('#loginEmail').val();
		var password = $('#loginPassword').val();
		
		if(email != '' && password != ''){
			
			var loginUrl = root + 'users/login';
			$.post(loginUrl,{'email' : email, 'password' : password},function(data){
				
				console.log(data);
				
				if(data.status == 'ok'){ window.location = root + 'private'; } 
				else { 
				
					alert(data.message); 
					
				}
				
				
			},"json");
			
			
		} else { alert('You must enter an email address and password to continue'); }
		
	});
	
	$('.deleteLink').click(function(event){
		
		event.preventDefault();
		if(confirm('Are you sure you want to delete this link?')){ $(event.target).parent().submit(); } 
		
	});
	
	
});