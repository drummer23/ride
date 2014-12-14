<?php
/**
 * Created by PhpStorm.
 * User: Puncher
 * Date: 10/09/14
 * Time: 00:01
 */



// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];




if($myusername == 'lego' && $mypassword == 'master')
{
    echo "Welcome Back";
}
else {
    echo "Wrong Username or Password";
}