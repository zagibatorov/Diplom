<?php 
    require_once 'connect.php';
    session_start();

    if(!empty($_POST['newLogin']) and !empty($_POST['newPass']) and !empty($_POST['confirm'])){
        if($_POST['newPass'] === $_POST['confirm']){
            $newLogin = trim($_POST['newLogin']);
            $newPass = trim($_POST['newPass']);
            $email = trim($_POST['email']);

            $allowedDomains = ['@gmail.com', '@mail.ru'];
            $emailValide = false;

            foreach($allowedDomains as $domain){
                if(substr($email, -strlen($domain)) === $domain){
                    $emailValid = true;
                    break;
                }
            }

            if(!$emailValid){
                $_SESSION['errorReg'] = 'Email должен заканчиваться на @gmail.com или @mail.ru';
                $_SESSION['saved_reg_login'] = $newLogin;
                $_SESSION['saved_reg_email'] = $email;
                header('Location: index.php');
                exit();
            }

            $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

            if(strlen($newLogin) < 3) {
                $_SESSION['errorReg'] = 'Логин должен быть не менее 3 символов';
                header('Location: index.php');
                exit();
            } elseif(strlen($newLogin) > 10){
                $_SESSION['errorReg'] = 'Логин должен быть не более 10 символов';
                header('Location: index.php');
                exit();
            }

            if(strlen($newPass) < 5){
                 $_SESSION['errorReg'] = 'Пароль должен быть не менее 5 символов';
                header('Location: index.php');
                exit();
            } elseif(strlen($newPass) > 12){
                $_SESSION['errorReg'] = 'Пароль должен быть не более 12 символов';
                header('Location: index.php');
                exit();
            }

            $checkUser = "SELECT * FROM `users` WHERE `login` = '$newLogin'";
            $checkResult = mysqli_query($link, $checkUser);
        
            if(mysqli_num_rows($checkResult) > 0){
                $_SESSION['errorReg'] = 'Пользователь с таким логином уже существует';
                $_SESSION['saved_reg_login'] = $newLogin;
                header('Location: index.php');
                exit();
            }

            $checkEmail = "SELECT * FROM `users` WHERE `email` = '$email'";
            $checkEmailResult = mysqli_query($link, $checkEmail);

            if(mysqli_num_rows($checkEmailResult) > 0){
                $_SESSION['errorReg'] = 'Пользователь с таким email уже существует';
                $_SESSION['saved_reg_login'] = $newLogin;
                $_SESSION['saved_reg_email'] = $email;
                header('Location: index.php');
                exit();
            }

            $addNewUser = "INSERT INTO `users` SET `login`='$newLogin', `password`='$hashedPass', `email` = '$email', `role`='user'";
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
            $_SESSION['errorReg'] = 'Пароли не совпадают';
            header('Location: index.php');
            exit();
        }
    } else{
        $_SESSION['emptyFieldsReg'] = 'Заполните все поля для регистрации';
        header('Location: index.php');
        exit();
    }
?>