<?php 
    require_once 'connect.php';
    session_start();


    if(!empty($_POST['login']) and !empty($_POST['pass'])){
        $login = trim($_POST['login']);
        $pass = trim($_POST['pass']);

        $getUser = "SELECT * FROM `users` WHERE `login` = '$login'";
        $res = mysqli_query($link, $getUser);

        if($res){
            $row = mysqli_fetch_assoc($res);

            if($pass == $row['password']){
                $_SESSION['isAuth'] = true;
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_login'] = $row['login'];
                $_SESSION['user_role'] = $row['role'];
                $_SESSION['successAuth'] = 'Успешная авторизация';

                unset($_SESSION['saved_login']);
                unset($_SESSION['saved_pass']);

                header('Location: index.php');
                exit();
            } else{
                $_SESSION['errorAuth'] = 'Неверный пароль';
                $_SESSION['saved_login'] = $login;
                header('Location: index.php');
                exit();
            }
        } else{
            $_SESSION['errorAuth'] = 'Такой логин не существует';
            $_SESSION['saved_login'] = $login;
            header('Location: index.php');
            exit();
        }
    }else{
        $_SESSION['emptyFields'] = 'Заполните все поля';
        header('Location: index.php');
        exit();
    };

?>