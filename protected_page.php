<?php 
include("/layout/header.html");
include("/layout/nav.html");
include_once 'includes/functions.php';
include_once 'entity/accountPermissionEntity.php';

if(login_check($db) == true) {
	?>
	<div class="content">
		<h2>Overview</h2>
	</div>

	<?php
} else { 
    ?>
	<p>You are not authorized to access this page, please login.</p>
	<?php
}
?>
<?php include("/layout/footer.html");?>