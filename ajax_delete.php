<?php
require_once 'connect.php';
session_start();

if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $query = "DELETE FROM `news` WHERE `id` = $id";
    mysqli_query($link, $query);
    echo json_encode(['success' => true]);
}
?>