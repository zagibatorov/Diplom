<?php 
    require_once 'connect.php';
    session_start();


    if(!empty($_POST['login']) and !empty($_POST['pass'])){
        $login = trim($_POST['login']);
        $pass = trim($_POST['pass']);

        $getUser = "SELECT * FROM `users` WHERE `login` = '$login'";
        $res = mysqli_query($link, $getUser);
        $user = mysqli_fetch_assoc($res);

        if(!empty($user)){
            $hash = $user['password'];

            if(password_verify($pass, $hash)){
                $_SESSION['isAuth'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_login'] = $user['login'];
                $_SESSION['user_role'] = $user['role'];
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