<?php
/**
 * Created by PhpStorm.
 * User: Puncher
 * Date: 10/09/14
 * Time: 00:03
 */

// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.

session_start();
if(!isset($_SESSION["myusername"])){
    header("location:index.html");
}
?>

<html>
<body>
Login Successful
</body>
</html>