<script type="text/javascript">

function initHeader(){
	$(".language").click(function(){

		lang = jQuery(this).attr("lang");

		$.post("actions/lang_change.php", { lang: lang }, function(data){
			if (data != ""){

     			data = jQuery.parseJSON(data);

     			if (data.status == 200){
	     			
	     			//for debug purposes only
	     			error(data.lang)

	     			//language has changed, reload page
	     			//location.reload();

	     		}else if (data.status == 201){

	     			//if the language is the same as the current language
	     			return false;

		     	}else{
	     			error(data.error);	
	     		}
	     	}else{
	     		error("<?php echo _("Could not change language.") ?>")
	     	}
		});

	});

	$("#logout").click(function(){

		$.post("inc/logout.php", { }, function(data){
			
			if (data != ""){

     			data = jQuery.parseJSON(data);

     			if (data.status == 200){
	     			
	     			//User is no longer logged in, reload page to go to login screen
	     			location.reload();

	     		}else{
	     			error(data.error);	
	     		}
	     	}else{
	     		error("<?php echo _("Could not log out.") ?>")
	     	}
		});

	});
}
</script>

<div id="header">
	<div id="logo">
		<div id="logo_text">
	        <span class="data">Data</span><span class="story">Story</span>
	    </div>
	</div>

	<div id="navbar">

		<div id="languages">
			<div class="language" lang="en_US">english</div>
			<div class="language" lang="de_DE">deutsch</div>
		</div>

		<?php 
		if (isset($user)):
		?>

		<div id="loggedin">
			<div id="logout">
				<?php echo _("Log out"); ?>
			</div>

			<div id="loggedas">
				<?php echo sprintf(_("Welcome, %s!"), $user_email);  ?>
			</div>
		</div>
	
		<?php endif; ?>
	</div>
</div>