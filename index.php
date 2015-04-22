<?php
    require_once 'includes/includeHeader.php';

    if (login_check($db) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }
    
    if (isset($_GET['error'])) {
        echo '<p class="error">Error Logging In!</p>';
    }
?> 
<form action="includes/process_login.php" method="post" name="login_form">                      
    User Number: <input type="number" min="1" name="PK_customerNumber" />
    Password: <input type="password" 
                     name="password" 
                     id="password"/>
    <input type="button" 
           value="Login" 
           onclick="formhash(this.form, this.form.password);" /> 
</form>
 
<?php
        if (login_check($db) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['PK_customerNumber']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='registration.php'>register</a></p>";
                }
?>      
<?php 
require_once '/includes/includeFooter.php';
?>