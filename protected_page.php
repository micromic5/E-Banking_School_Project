<?php
include_once 'includes/functions.php';
include_once 'includes/db_connect.php';
include_once 'entity/userEntity.php';

// Include database connection and functions here.  See 3.1. 
sec_session_start(); 
if(login_check($db) == true) {
	?>
	<div class="top">
	<?php
	//holt den momentan eingelogten user aus der Datenbank
	$loggedUser = new User($_SESSION["PK_customerNumber"]);
	?> 	<span>Willkommen <?=$loggedUser->getLastname();?>
		<?=$loggedUser->getFirstname();?><span>
		<span></span>
		<span></span>
	</div>
	<div class="content">
		<h2>Welcome to the new world</h2>
	</div>
	<?php
} else { 
    ?>
	<p>You are not authorized to access this page, please login.</p>
	<?php
}
?>