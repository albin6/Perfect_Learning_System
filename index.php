<?php
include 'connection.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['master'])){
    header('location:master/home.php');
    exit();
}
else if(isset($_SESSION['teacher'])){
    header('location:teacher/home.php');
    exit();
}
else if (isset($_SESSION['student'])){
    header('location:student/home.php');
    exit();
}
else{
    header('location:home.php');
    exit();
}
?>