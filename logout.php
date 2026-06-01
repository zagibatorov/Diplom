<?php 
    session_start();
    $_SESSION['isAuth'] = null;
    $_SESSION['user_id'] = null;
    $_SESSION['user_login'] = null;
    $_SESSION['user_role'] = null;
    $_SESSION['logout'] = 'Успешный выход'; 
    header('Location: index.php');
    exit();
?>