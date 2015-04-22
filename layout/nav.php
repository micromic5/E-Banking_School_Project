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
            </span>
    </div>
    <div class="menu">
        <ul>
            <li class="menu-item">
                <span><a href="protected_page.php">Home</a></span>
            </li>
            <li class="menu-item">
                <span><a href="accounts.php">Konti Übersicht</a></span>
            </li>
            <li class="menu-item">
                <span><a href="bookings.php">Buchungs Übersicht</a></span>
            </li>
            <li class="menu-item">
                <span><a href="newBooking.php">Neue Buchung</a></span>
            </li>
        </ul>
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