<?php
    require_once 'connect.php';
    session_start();
    
    if(!isset($_SESSION['isAuth']) || $_SESSION['user_role'] != 'admin') {
        header('Location: index.php');
        exit();
    }
    
    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $query = "DELETE FROM `news` WHERE `id` = $id";
        mysqli_query($link, $query);
    }
    
    header('Location: index.php');
    exit();
?>