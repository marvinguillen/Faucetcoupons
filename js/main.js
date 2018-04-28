
function verifyUser(){
        var name   = $('#user_name').val();
		var email  = $('#user_email').val();
		var pw     = $('#user_pw').val(); 
		var cpass  = $('#cpass').val();
		var wallet = $('#user_address').val();
		var msg    = $('#msg');
		var result = validate();

		alert(wallet);
		alert(pw);

		if (name == '') 
		{
			msg.text("Your Name is Requiered! Please enter your Name or Username");
			$('#user_name').focus();
		}
		else if(email == '')
		{
			msg.text("Your Email is Requiered! Please enter a valid Email");
			$('#user_email').focus();
		}
		else if(!result)
		{
			msg.text("Enter a valid email!");
        	$("#user_email").focus();	
		}
		else if(pw == '')
		{
			msg.text("Password is Requiered! Please enter your Password this will be encrypted");
			$('#user_pw').focus();
		}
		else if(cpass == '' || pw != cpass)
		{
			msg.text("Please enter the same Password");
			$('#cpass').focus();
		}
		else if(wallet == '')
		{
			msg.text("Please a Wallet Address is Requiered");
			$('#user_address').focus();
		}
		else if(wallet.length != 95)
		{
			msg.text("Please enter a Valid Wallet Address");
			$('#user_address').focus();
		}
		else
		{
			$.post('./newUser.php',
			{
				user_name    : name,
				user_email   : email,
				user_pw      : pw,
				user_address : wallet
			}).done(function(data)
			{    
  				if(data.user_email == email)
				{
					$("#msg").text("There is an account registered whith this email");
                    $("#user_email").focus();
				}
				else if(data.user_address == wallet)
				{
					$("#msg").text("There is an account registered with this wallet address");
                    $("#user_address").focus();
				}         
				else if(data.status == 404)
                {
                    $("#msg").text(data.message);  
                }
				else
				{	
					alert("succes");
					$("#msg").text("");
					$("#user_address").val(wallet);
                    $("#user_name").val("");
                    $("#user_email").val("");
                    $("#user_pw").val("");
                    $("#cpass").val("");
                    $("#user_address").val("");
             
                    //open modal alert
                    $("#succes_signup_modal").modal("show");
				}
			});
		}
}

function validateEmail(email) {

    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validate(){
    var email = $("#user_email").val();
    if (validateEmail(email))
        return true;
	else
      	return false;
}  


$(document).ready(function(){
    
    $("#submit").click(function(){
        verifyUser();
    })
});