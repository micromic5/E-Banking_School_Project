<div class="nav">
    <?php
    if (login_check($db))
    {
        
    ?>
    <div class="user_data">
            <?php

            //holt den momentan eingelogten user aus der Datenbank
            $loggedUser = new Customer($_SESSION["PK_customerNumber"]);
            ?>
            <span>
            Willkommen <?=$loggedUser->getLastname();?>
            <?=$loggedUser->getFirstname();?>
            <span>
    </div>
    <div class="logout">
            <a href="includes/logout.php">Log out</a>
    </div>
    <?php
    
    }
    else
    {
        
    ?>
    
    <?php
    }
    ?>
</div>