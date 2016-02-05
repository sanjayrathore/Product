$(document).ready(function(){

		//show_User_Table();
$("a").find(".enab_dis").hide();
	function show_User_Table()
	{	//alert("asd");
		var j;
		var url1 = [];
		var url = window.location.href.split('/');
		//var url1 = url.split('/');
		for (var i = 0; i < url.length; i++) {
			  url1[i] = url[i];
			  j= url1[i];
		};
		if (j == 't') 
		{
			j=0;
		};
		//alert(j);
		$.ajax({
		        type: "POST",
		        url: usertableurl,
		      	dataType: 'html',
		      	data : 'page='+j,
		        success: function(response) {

		        	
		        	$("div").find("#usertable-div").html(response);
		        	$("a").find(".enab_dis").hide();
		        	//$(".enab_dis").hide();

				}        	
		});
	}
	//==========================================================
	show_Pro_Cat_Table();

	function show_Pro_Cat_Table()
	{
		//alert(pro_cat_tableurl);
		$.ajax({
		        type: "POST",
		        url: pro_cat_tableurl,
		      
		        success: function(response) {

		        	$("div").find("#product-categories-table-div").html(response);
		        	$("a").find(".enab_dise").hide();

				}        	
		});
	}

	//==========================================================
	
	show_Pro_Table();

	function show_Pro_Table()
	{
		//alert(pro_cat_tableurl);
		$.ajax({
		        type: "POST",
		        url: pro_tableurl,
		      
		        success: function(response) {

		        	$("div").find("#product-table-div").html(response);
		        	$("a").find(".enab_dise").hide();

				}        	
		});
	}

	//==========================================================
	
	$("#reg_reset").click(function(){
		
		$("#reg_form").trigger("reset");
		$("#pro_categories_form").trigger("reset");
		$("#product_form").trigger("reset");
		
	});


	//==========================================================

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

	//==========================================================

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
				
			},
			username:
			{
				
				maxlength: " This field is not contain the more then 20 charcter"
			},

		}
	});

	//==========================================================

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
	
	//==========================================================

	$("#pro_categories_form").validate
	({
		rules:
		{
			title:
			{
				required : true
			},
			description:
			{
				required : true
			},
			imagefile:
			{
				required : true
			}
		}
	});

	//==========================================================

	$("#product_form").validate
	({
		rules:
		{
			title:
			{
				required : true
			},
			price:
			{
				required : true
			},
			description:
			{
				required : true
			},
			imagefile:
			{
				required : true
			},
			pro_categoriesid:
			{
				required : true
			}

		}
	});

	//==========================================================

	$("#pro_categories_editform").validate
	({
		rules:
		{
			title:
			{
				required : true

			},
			
			description:
			{
				required : true
			}
		}
	});

	//==========================================================

	$("#pro_editform").validate
	({
		rules:
		{
			title:
			{
				required : true

			},
			price:
			{
				required : true
			},
			description:
			{
				required : true
			}
		}
	});
	//==========================================================

	$("#forget_password").validate
	({
		rules:
		{
			email:
			{
				required : true,
				email	 : 	true
			}
		}
		
	});

	//==========================================================

	$("#unique_code").validate
	({
		rules:
		{
			uniquecode:
			{
				required : true
				
			}
		}
	});

	//==========================================================

	$("#change_password").validate
	({
		rules:
		{
			newpassword:
			{
				required : true,
				pattern		: 	true,
				minlength	: 	8,
				confirmpassword:{
    							equalTo: "#newpassword"
      							}
			},
			confirmpassword:
			{
				required:true,
				
			}
		},
			
		message:
		{
			newpassword:
			{
				
				minlength: "The password  length must be more then 8 ",
				
			}
		}
	});

	//==========================================================

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

    //==========================================================

    //$(".deleteuser").on("click",function(){

	$(document).on("click", ".deleteuser", function(){

    	//alert("gsdhgj");
    	
    	var id = $(this).data('id');
    	var url = $(this).data('url');
    	//alert(url);
    
    	if( confirm("Record Deleted OR Not") )
    	{	
    		
		   $.ajax({
		        type: "POST",
		        url: url,
		      	dataType: 'json',
		      	data:'id='+id,

		        success: function(response) {
		        	var message = "success";
		        	if (response == message)
		        	{
		        		$('#tr_'+id).hide();
		        	}
		        	else
		        	{
		        		alert("Record Not Deleted");
		        	}
		        }
		    });

		}
		
    });

    //==========================================================

   	var a;
   	//var b;
	var sortby;

    $(document).on("click", "#nameId", function(){
    	//alert("dgha");
    	if (a == 1) {
			a = 0;
			sortby = "nameDESC";	
		}
		else
		{
			a = 1;
			sortby = "nameASC";
		}
		$.ajax({
			type: "POST",
			url : "user_list_sorting",
			dataType: 'html',
			data: 'sortby='+sortby,
			success:function(response){
				//alert(response);

				$("#userlisttable ").html(response);
				$("[name='enab_dis']").hide();
			}
		});
	});

	//==========================================================

	$(document).on("click", "#emailId", function(){
    	
    	//alert("dgha");
    	
    	if (a == 1) {
			a = 0;
			sortby = "emailDESC";	
		}
		else
		{
			a = 1;
			sortby = "emailASC";
		}
		$.ajax({
			type: "POST",
			url : "user_list_sorting",
			dataType: 'html',
			data: 'sortby='+sortby,
			success:function(response){
				//alert(response);

				$("#userlisttable").html(response);
				$("[name='enab_dis']").hide();
			}
		});

    });

    //==========================================================

   // $(".enab_dis").hide();

    $(document).on("click", ".disable_button", function(){
   			
    	
    	var id = $(this).data('id');
    	var url = $(this).data('url');
    	//alert(url);
		$.ajax({
		        type: "POST",
		        url: url,
		      	dataType: 'json',
		      	data:'id='+id,
		        success: function(response) {
		        	var message = "false";
		        		//alert(response);
		        	if (response == 1) 
		        	{
		        		$("#tr_"+id).removeClass("disable-color");
		        		$("#dis_"+id).hide();
		        		$("#en_"+id).show();
		        	}
		        	if (response == 0) 
		        	{
		        		$("#tr_"+id).addClass("disable-color");
		        		$("#en_"+id).hide();
		        		$("#dis_"+id).show();
		        	}
		        	if (response == "false") 
		        	{
		        		alert("Record not disabled");
		        	}
		        }
		    });
    });

    //==========================================================

    $(document).on("change", "#search", function(){	
    	
    	var searchby = $("#search").val();
    	var len = searchby.length;
    	
     	if ( 3 <= len )
     	{
     		
	    	var url = $(this).data('url');
				//alert(url);
			$.ajax({
					type:'POST',
					url: url,
					dataType: 'html',
					data: 'searchby='+searchby,
					success:function(response){
					
						//alert(searchby);
						$("#userlisttable").html(response);
						$("[name='enab_dis']").hide();
					}
			});
     	}
   		else
   		{
    		alert("please enter more then three charcter");
    	}
	});

});
