$(document).ready(function(){
	$("#reg_reset").click(function(){
		
		$("#reg_form").trigger("reset");
		
	});

	$("#reg_form").validate
	({
		rules:
		{
			name:
			{
				required   : 	true,
				maxlength  : 	20,
				lettersonly: 	true,
						 

			},
			usertype:
			{
				required		: 	true,
				maxlength		: 	1,
				number			: 	true,
				numericpattern	:   true
			},
			email:
			{
				required	: 	true,
				email		: 	true
			},
			password:
			{
				required	: 	true,
				minlength	: 	8,
				pattern		: 	true
			},
			username:
			{
				required	:	true,
				maxlength	: 	20
			}
		},
		messages:
		{
			name:
			{
				
				maxnlength: " This field is not contain the more then 20 charcter"

			},
			usertype:
			{
				
				maxlength: "This field is only contain the 1 or 0"
			},
			password:
			{
				
				minlength: "The password  length must be more then 8 ",
				//pattern: "The password should be one"
			},
			username:
			{
				
				maxlength: " This field is not contain the more then 20 charcter"
			},

		}
	});
	$("#edit_form").validate
	({
		rules:
		{
			name:
			{
				required   : 	true,
				maxlength  : 	20,
				lettersonly: 	true,
						 

			},
			usertype:
			{
				required		: 	true,
				maxlength		: 	1,
				number			: 	true,
				numericpattern	:   true
			},
			email:
			{
				required	: 	true,
				email		: 	true
			},
			password:
			{
				
				minlength	: 	8,
				pattern		: 	true
			},
			username:
			{
				required	:	true,
				maxlength	: 	20
			}
		},
		messages:
		{
			name:
			{
				
				maxnlength: " This field is not contain the more then 20 charcter"

			},
			usertype:
			{
				
				maxlength: "This field is only contain the 1 or 0"
			},
			password:
			{
				
				minlength: "The password  length must be more then 8 ",
				//pattern: "The password should be one"
			},
			username:
			{
				
				maxlength: " This field is not contain the more then 20 charcter"
			},

		}
	});
	$("#admin_loginform").validate
	({ 
		rules:
		{
			username:
			{
				required	:	true
			},
			password:
			{
				required	:	true,
				pattern		:  true
			}
		}
	});

	jQuery.validator.addMethod("numericpattern", function(value, element){
    return this.optional(element) || /^[0-1]+$/.test(value);
    	},
     "UserType only 1 or 0"
    );
	jQuery.validator.addMethod("pattern", function(value, element){
    return this.optional(element) || /^(?=.*[0-9])(?=.*[$_-])(?=.*[A-Z])[a-zA-Z0-9$^_-]{7,15}$/.test(value);
    	},
     "password is a one symbol,numeric and one lettter is capital"
    );
    jQuery.validator.addMethod("lettersonly", function(value, element){
    return this.optional(element) || /^[a-z]+$/i.test(value);
    	},
     "Letters only please"
    );  
    $(".deleteuser").on("click",function(){
    	var id = $(this).attr('id');
    
    	if(confirm("Record Deleted OR Not"))
    	{	
    		
		   $.ajax({
		        type: "POST",
		        url:"delete_user",
		      	dataType: 'json',
		      	data:'id='+id,
		        success: function(response) {
		        	var message = "success";
		        	if (response == message)
		        	{
		        		$('#'+id).hide();
		        	}
		        	else
		        	{
		        		alert("Record Not Deleted");
		        	}
		        }
		    });

		}
		
    });
});