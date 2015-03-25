<?php
include_once 'db_connect.php';
 
$error_msg = "";
 
if (isset($_POST['firstname'], $_POST['lastname'], $_POST['passwordHash'], $_POST['age'])) 
{
    // Sanitize and validate the data passed in
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    /*$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }*/
 
    $password = filter_input(INPUT_POST, 'passwordHash', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    // firstname & lastname validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    /*$prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $db->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }*/
 
    // check existing Username
    /*$prep_stmt = "SELECT id FROM member WHERE id = ? LIMIT 1";
    $stmt = $db->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $pk_customerNumber);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this pk_customerNumber already exists
                        $error_msg .= '<p class="error">A user with this username already exists</p>';
                        $stmt->close();
                }
                $stmt->close();
        } else {
                $error_msg .= '<p class="error">Database error line 55</p>';
                $stmt->close();
        }*/
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
        // Insert the new user into the database 
        if ($insert_stmt = $db->prepare("INSERT INTO tbl_customer (firstname, lastname, password, salt, age) VALUES (?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssi', $firstname, $lastname, $password, $random_salt, $age);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../registration.php?err=Registration failure: INSERT');
            }
        }
        header('Location: register_success.php');
    }
}
?>