<?php 
    require_once 'connect.php';
    session_start();

    if(!empty($_POST['blockText']) && !empty($_POST['headerText'])){
        $newsHeaderText = $_POST['headerText'];
        $newsText = $_POST['blockText'];

        $imagePath = null;
        if(isset($_FILES['newsImage']) && $_FILES['newsImage']['error'] === UPLOAD_ERR_OK){
            $uploadDir = 'uploads/news/';

            if(!file_exists($uploadDir)){
                mkdir($uploadDir, 0777, true);
            }

            $fileExtension = pathinfo($_FILES['newsImage']['name'], PATHINFO_EXTENSION);
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;
            $uploadFile = $uploadDir . $fileName;

            $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];

            if(in_array($_FILES['newsImage']['type'], $allowedTypes)){
                if(move_uploaded_file($_FILES['newsImage']['tmp_name'], $uploadFile)){
                    $imagePath = $uploadFile;
                }
            }
        }

        $query = "INSERT INTO `news`(`header`, `content`, `image_path`, `created_at`) VALUES ('$newsHeaderText', '$newsText', '$imagePath', NOW())";
        $createNew = mysqli_query($link, $query);

        header('Location: index.php');
        exit();
    }

?>