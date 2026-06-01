<?php 
    require_once 'connect.php';
    session_start();

    if(!empty($_POST['newLogin']) and !empty($_POST['newPass'])){
        $newLogin = trim($_POST['newLogin']);
        $newPass = trim($_POST['newPass']);

        $checkUser = "SELECT * FROM `users` WHERE `login` = '$newLogin'";
        $checkResult = mysqli_query($link, $checkUser);
        
        if(mysqli_num_rows($checkResult) > 0){
            $_SESSION['errorReg'] = 'Пользователь с таким логином уже существует';
            $_SESSION['saved_reg_login'] = $newLogin;
            header('Location: index.php');
            exit();
        }

        $addNewUser = "INSERT INTO `users` SET `login`='$newLogin', `password`='$newPass', `role`='user'";
        $res = mysqli_query($link, $addNewUser);

        if($res){
            unset($_SESSION['saved_reg_login']);
            $_SESSION['successReg'] = 'Успешная регистрация';
            header('Location: index.php');
            exit();
        } else{
            $_SESSION['errorReg'] = 'Ошибка при регистрации';
            $_SESSION['saved_reg_login'] = $newLogin;
            header('Location: index.php');
            exit();
        }

    } else{
        $_SESSION['emptyFieldsReg'] = 'Заполните все поля для регистрации';
        header('Location: index.php');
        exit();
    }
?>