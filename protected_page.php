<?php 
include '/includes/includeHeader.php';
include_once 'entity/accountPermissionEntity.php';

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
    include '/includes/includeFooter.php';
?>