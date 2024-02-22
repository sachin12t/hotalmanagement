<?php 

session_start();
if(!isset($_SESSION['id'])){
    header('Location:userlogin.php');
}
else{
    session_destroy();
    header('Location:userlogin.php');
}
//print_r($_SESSION);
?>