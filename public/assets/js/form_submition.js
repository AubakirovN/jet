$(document).ready(function() {
	
  var spinner = $('#ajax_loader');
  var container = $('#form_block');
   if ($("#post-form").length > 0) {
    $("#post-form").validate({
      
    rules: {
      count_place: {
        required: true,
        maxlength: 50
      },
      name: {
        required: true,
        maxlength: 250
      }
    },
    messages: {
      count_place: {
        required: "Please Enter Count",
        maxlength: "Your last name maxlength should be 50 characters long."
      },
      name: {
        required: "Please Enter Name",
        maxlength: "Your last body maxlength should be 250 characters long."
      },
    },
    submitHandler: function(form) {

	 $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	  container.show();
	  spinner.show();
	   
	  $('#send_form').html('Отправляется..');
	  $.ajax({
	    url: '/flight-book' ,
	    type: "POST",
	    data: $('#post-form').serialize(),
	    success: function( response ) {

	        $('#send_form').html('Сделать запрос');
			$('#post-form').css('display', 'none');
			container.hide();
			spinner.hide();
			$('#if_successful').removeClass('before_submit');
			$('#if_successful').addClass('if_successful');
			$('#if_successful').css('color', '#ffffff');
	        document.getElementById("post-form").reset(); 
	        setTimeout(function(){
	        $('#if_successful').hide();
	        $('#post-form').show();
	        },10000);
	    }
	  });
    }
  })
}



if ($("#request-form").length > 0) {
    $("#request-form").validate({
      
    
    submitHandler: function(form) {

	 $('#send_request').html('Отправляется..');
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	
	  spinner.show();
	  



        $.ajax({
	    url: '/flight-request' ,
	    type: "POST",
	    data: $('#request-form').serialize(),
	    success: function( response ) {
	        $('#send_request').html('Сделать запрос');
			$('#request-form').css('display', 'none');
		
			spinner.hide();
			$('#if_successful').removeClass('before_submit');
			$('#if_successful').addClass('if_successful');
	        document.getElementById("request-form").reset(); 
	        setTimeout(function(){
	        $('#if_successful').hide();
	        $('#request-form').show();
	        },10000);
	    }
	  });
	
	  
    }
  })
}

});