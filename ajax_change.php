<?php
require_once 'connect.php';
session_start();

if(!isset($_SESSION['isAuth']) || $_SESSION['user_role'] != 'admin') {
    echo json_encode(['success' => false]);
    exit();
}

header('Content-Type: application/json');

// Получение данных новости
if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $query = "SELECT * FROM `news` WHERE `id` = $id";
    $result = mysqli_query($link, $query);
    $news = mysqli_fetch_assoc($result);
    echo json_encode($news);
    exit();
}

// Обновление новости
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newsId = (int)$_POST['news_id'];
    $newsHeaderText = trim($_POST['headerText']);
    $newsText = trim($_POST['blockText']);
    
    // Получаем текущий путь к изображению
    $getImage = "SELECT `image_path` FROM `news` WHERE `id` = $newsId";
    $result = mysqli_query($link, $getImage);
    $currentNews = mysqli_fetch_assoc($result);
    $imagePath = $currentNews['image_path'];
    
    // Обработка загрузки нового изображения
    if(isset($_FILES['newsImage']) && $_FILES['newsImage']['error'] === UPLOAD_ERR_OK) {
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
                if($imagePath && file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $imagePath = $uploadFile;
            }
        }
    }
    
    $query = "UPDATE `news` SET `header` = '$newsHeaderText', `content` = '$newsText', `image_path` = '$imagePath' WHERE `id` = $newsId";
    mysqli_query($link, $query);
    
    // Получаем обновлённую новость
    $getNews = "SELECT * FROM `news` WHERE `id` = $newsId";
    $result = mysqli_query($link, $getNews);
    $news = mysqli_fetch_assoc($result);
    echo json_encode($news);
    exit();
}
?>