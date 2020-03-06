$(document).ready(function() {

	// table seasrch / pagination
    var table = $('#listtable').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
		"lengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]]
    } );
	
	// input validation
	jQuery.validator.setDefaults({
	  debug: false,
	  success: "valid"
	});

	$( "#updateform" ).validate({
	  rules: {
		name: {
		  required: true,
		  maxlength: 100
		},
		username: {
		  required: true,
		  maxlength: 50,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		email: {
		  required: true,
		  maxlength: 50
		},
		password: {
		  required: true,
		  maxlength: 16,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		intro: {
		  required: true,
		  maxlength: 500
		}
		
	  }
	});

	$( "#dateform" ).validate({
	  rules: {
		title: {
		  required: true
		},
		description: {
		  required: true
		},
		start_date: {
		  required: true
		},
		end_date: {
		  required: true
		},
		activity: {
		  required: true
		}
	  }
	});


	$( "#createform" ).validate({
	  rules: {
// This is commented out, to test backend validation
/*
		name: {
		  required: true,
		  maxlength: 100
		},
*/
		username: {
		  required: true,
		  maxlength: 50,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		email: {
		  required: true,
		  maxlength: 50
		},
		password: {
		  required: true,
		  maxlength: 16,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		intro: {
		  required: true,
		  maxlength: 500
		}
		
	  }
	});

	$( "#createformwithajax" ).submit(function( event ) {
		event.preventDefault();
	});

	$( "#createformwithajax" ).validate({
	  rules: {

		username: {
		  required: true,
		  maxlength: 50,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		email: {
		  required: true,
		  maxlength: 50
		},
		password: {
		  required: true,
		  maxlength: 16,
		  pattern: /^[A-Za-z0-9]{0,}$/
		},
		intro: {
		  required: true,
		  maxlength: 500
		}
		
	  },
	  submitHandler: function(form) {
		
			$.ajax({
			  type: "POST",
			  url: "users/createuserwithajax",
			  dataType: 'json',
			  data: $("#createformwithajax").serialize(),
			  success: function(data){
					console.log(data);
					console.log("success");

					$("#create_ajax_response").removeClass("fail invisible");
					$("#create_ajax_response").addClass("success");
					$("#create_ajax_response").html(data.response);
			  },
			  error: function(data){
					console.log(data);
					console.log("error");

					$("#create_ajax_response").removeClass("success invisible");
					$("#create_ajax_response").addClass("fail");
					$("#create_ajax_response").html(data.responseJSON.response);
			  },
              failure: function(data){
					console.log(data);
					console.log("failure");

              }

			});

			return false;
		}
	});

	$('#submit_create').on('click', function() {
		$("#createform").valid();
	});
	

});