<?php 
require_once '/includes/includeHeader.php';
if(login_check($db) == true) 
{
    ?>
        <h2>Home</h2>
    <?php
} 
else 
{ 
    ?>
        <p>You are not authorized to access this page, please login.</p>
    <?php
}
?>
<?php
    require_once '/includes/includeFooter.php';
?>