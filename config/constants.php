<?php   

    //Start session
    session_start();


    //Create constants to Store Non repeating values.
    define('SITEURL', 'http://localhost/cropcity/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD','');
    define('DB_NAME', 'food_order');


    //Execute query and Save data in database
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn,'food_order') or die(mysqli_error());  //Selecting Database


?>

