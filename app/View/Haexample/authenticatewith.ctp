<h3>Errors</h3>
<?php
	if( isset( $error ) ){
		debug( $error );
	}
	else{
		echo "none";
	}
?>
<h3>User profile</h3>
<?php
	if( isset( $user_profile ) ){
		debug( $user_profile );
	}
	else{
		echo "none";
	}
?>
	