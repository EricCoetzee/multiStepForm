<?php

 /*     function die_r($value){
        echo '<pre>';
        print_r($value);
        echo '<pre>';
    }  */
    require_once('database.php');

    $db = new Database();
 
    /* $getRow = $db->getRow("SELECT * FROM users WHERE user_id = ?", ["16"]); */


   $getRows = $db->getRows("SELECT comment_count FROM forms where username = 'admin' and comment_count > 0");
   print_r($getRows);
   // $updateRow = $db->updateRow("UPDATE users SET username = ?, password = ?, email = ? WHERE user_id = ?", ["Arthermannnymen", "just secrets", "arman@arther.com", "7"]);
    //$deleteRow = $db->deleteRow("DELETE FROM users WHERE user_id = ? ", ["8"]);
   // $insertRow = $db->insertRow("INSERT INTO users(username, password, email) VALUES(?, ?, ?)", ["Arther", "ALWAYS SECRET", "ar@arther.com"]);
    /* die_r($getRows);  */
    
?>