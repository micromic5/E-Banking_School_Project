<?php
include '/includes/includeHeader.php';

sec_session_start();

if (isset($_POST['PK_customerNumber'], $_POST['password'])) 
{
    $PK_customerNumber = $_POST['PK_customerNumber'];
    $password = $_POST['password']; // The hashed password.
 
    if (login($PK_customerNumber, $password, $db) == true) {
        // Login success 
        header('Location: ../protected_page.php');
    } else {
        // Login failed 
        header('Location: ../login.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

include '/includes/includeFooter.php';
?>