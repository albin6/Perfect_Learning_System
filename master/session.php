<?php 
session_start();
if( !isset($_SESSION["master"]) ){
    header("location:../login.php");
}
?>