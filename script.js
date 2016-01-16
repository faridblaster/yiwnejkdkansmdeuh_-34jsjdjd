$(function(){

	$(".open_menu").removeClass("close_menu").addClass("open_menu");
	$("div#mobile_nav table tr[menu]").hide();
	$("div#mobile_nav table tr td a[xaction=open_close] span").text("Open Menu");
	
	// Checking for CSS 3D transformation support
	$.support.css3d = supportsCSS3D();
	
	var formContainer = $('#formContainer');
	
	// Listening for clicks on the ribbon links
	$('.flipLink').click(function(e){
		
		// Flipping the forms
		formContainer.toggleClass('flipped');
		
		// If there is no CSS3 3D support, simply
		// hide the login form (exposing the recover one)
		if(!$.support.css3d){
			$('#login').toggle();
		}
		e.preventDefault();
	});
	
	
	
	
	// A helper function that checks for the 
	// support of the 3D CSS3 transformations.
	function supportsCSS3D() {
		var props = [
			'perspectiveProperty', 'WebkitPerspective', 'MozPerspective'
		], testDom = document.createElement('a');
		  
		for(var i=0; i<props.length; i++){
			if(props[i] in testDom.style){
				return true;
			}
		}
		
		return false;
	}

	$("[xaction=open_close]").click(function(e){

		var currentTarget = e.currentTarget.className;
		
		switch(currentTarget){

			case "close_menu":
			$("."+currentTarget.toString()).removeClass("close_menu").addClass("open_menu");
			$("div#mobile_nav table tr[menu]").hide();
			$("div#mobile_nav table tr td a[xaction=open_close] span").text("Open Menu");
			break;

			case "open_menu":
			$("."+currentTarget.toString()).removeClass("open_menu").addClass("close_menu");
			$("div#mobile_nav table tr[menu]").show();
			$("div#mobile_nav table tr td a[xaction=open_close] span").text("Close Menu");
			break;


		}

	});

	$("div#mobile_nav table tr[menu] td a").click(function(e){

		$(".close_menu").removeClass("close_menu").addClass("open_menu");
		$("div#mobile_nav table tr[menu]").hide();
		$("div#mobile_nav table tr td a[xaction=open_close] span").text("Open Menu");

	});


});
