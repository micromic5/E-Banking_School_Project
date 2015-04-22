<?php 
require_once '/includes/includeHeader.php';
require_once 'entity/accountPermissionEntity.php';

if(login_check($db) == true) 
{
    ?>
        <h2>Overview</h2>
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