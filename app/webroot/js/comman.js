$(document).ready(function(){
    //member login box for add function

	$(".member-login .btn").click(function(){	

		$(".pop-up-box").slideToggle('slow');

	});



	//Post login user box for add function

	$(".post-login-popupbox .link").click(function(){	

		$(".post-login-popupbox .dropdown-menu").slideToggle('slow');

	});

/*$(function(){

	    $('body .wrapper').css({'height':$(window).height()});



	    $(window).resize(function(){

	    $('body .wrapper').css({'height':$(window).height()});

	    });

	});*/
});