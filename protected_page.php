<?php
include_once 'includes/functions.php';
include_once 'includes/db_connect.php';

// Include database connection and functions here.  See 3.1. 
sec_session_start(); 
if(login_check($db) == true) {
	?>
    <h2>Welcome to the new world</h2>
	<?php
} else { 
    ?>
	<p>You are not authorized to access this page, please login.</p>
	<?php
}
?>