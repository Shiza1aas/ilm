
$().ready(function(){
	var counter;
	var answer;
	var score = 0;
	var question = 0;

	$('#login_button').hide();
	$('#score').hide();
	$('#start_quiz,#next_question').click(function()
	{
		get_question();
	}
	);

	$('div.option').click(function() {
		var id = this.id;
		var click_id = '#' + id;
		var correct_option = String.fromCharCode(97 + parseInt(answer));
		correct_option = "option_" + correct_option;


	// alert("answer is :" + answer + "correct option is: " + correct_option);

	if ( correct_option == id )
	{
		// alert("correct answer");
		score++;
		$(click_id).addClass("alert alert-success");
	}
	else
	{
		// alert("incorrect answer");
		var correct_id = '#' + correct_option;
		$(click_id).addClass("alert alert-danger");
		$(correct_id).addClass("alert alert-success");
	}
	get_question();

});

	function get_question()
	{

		if ( question > 4 )
		{
			$('#myModal').modal('hide');
			$('#score').text("You scored " + score + " out of " + question);
			$('#start_quiz').hide();

			$('#login_button').show();
			$('#score').show();
			clearInterval(counter);
			return true;
		}
		else
		{
			question++;
			$('#option_a').removeClass("alert alert-success alert-danger");
			$('#option_b').removeClass("alert alert-success alert-danger");
			$('#option_c').removeClass("alert alert-success alert-danger");
			$('#option_d').removeClass("alert alert-success alert-danger");

			$.ajax(
			{
				url:'select_question',
				dataType: 'json',
				type:'post',

				success:function(data)
				{
					$.each(data.question, function(i, object)
					{
				// alert(object['question']);
				$('#question').text(object['question']);
				$('#option_a').text(object['option_a']);
				$('#option_b').text(object['option_b']);
				$('#option_c').text(object['option_c']);
				$('#option_d').text(object['option_d']);

				answer = object['answer'];
				clearInterval(counter);
				timer_call(30);
			});
				},
			}
			);
		}
	}

	function timer_call(count)
	{


	counter=setInterval(timer, 1000); //1000 will  run it every 1 second

	function timer()
	{
		count=count-1;
		if (count <= 0)
		{
			get_question();
			// alert("No answer"); //counter ended, do something here
			// return;
		}
		document.getElementById("timer").innerHTML="00 : " + (count > 9 ? count : "0" + count);
	  //Do code for showing the number of seconds here
	}
}

// function which calls carousel on the home page
$(function () {
	$('#homeCarousel').carousel({
		interval:30000,
		pause: "false"
	});
});

// Login and signup form validation and submition
var login_form = $( "#login_form" );
var signup_form = $( "#signup_form" );
login_form.validate(
{
	submitHandler: function(form)
	{
		var login_username = $("#login_username").val();
		var login_password = $("#login_password").val();
		alert(login_username + login_password);

		$.ajax(
		{
			url:'login',
			dataType: 'json',
			type:'post',
			data: { 
				login_username: login_username,
				login_password: login_password,
			},
			success:function(data)
			{
				if(data.login)
				{
					alert("congrats, your account has been created.");
				}
				else
				{
					alert("Please check username/password");
				}
			},
		}
		);
		
	}
});


signup_form.validate({
	rules:
	{
		signup_repeat_password:
		{
			equalTo:"#signup_password"
		}
	},
	messages:
	{
		signup_repeat_password:
		{
			equalTo:"Please repeat the password"
		}
	},
	submitHandler: function(form)
	{
		var signup_username = $("#signup_username").val();
		var signup_password = $("#signup_password").val();
		var signup_repeat_password = $("#signup_repeat_password").val();
		// alert(signup_username + signup_password + signup_repeat_password);

		$.ajax(
		{
			url:'signup',
			dataType: 'json',
			type:'post',
			data: { 
				signup_username: signup_username,
				signup_password: signup_password,
				signup_repeat_password: signup_repeat_password,
			},
			success:function(data)
			{
				if(data.signup)
				{
					alert("congrats, your account has been created.");
				}
				else
				{
					alert("Looks like your account exists already.");
				}
			},
		}
		);

	}
});


});