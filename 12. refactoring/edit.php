<?php
require_once ('function.php');
session();

// Получение данных из $_POST и $_FILES
$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['image'];
$id = $_GET['id'];

var_dump($title,$description,$image, $id);
validation();

$task = getTask($_GET['id']);

// Картинка не загружена
if($image['error'] === 4) {
    $errorMessage = 'Загрузите картинку';
    include 'errors.php';
    exit;
}

// Удаляем текушую картинку если существует
if(file_exists('uploads/' . $task['image'])) {
    unlink('uploads/' . $task['image']);
}

move_uploaded_file('uploads/'.$image['tmp_name'], $image['name']);

// Подготовка и выполнение запроса к базе данных
function updateTasks($title,$description,$image,$id){
    $pdo = new PDO("mysql:host=localhost; dbname=task-manager", "root", "");
    $sql = "UPDATE tasks SET title=:title, description=:description, image=:image WHERE id=:id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":title", $title);
    $statement->bindParam(":description", $description);
    $statement->bindParam(":image", $image['tmp_name']);
    $statement->bindParam(":id", $id);
    $statement->execute(
    //$task = $statement->fetch(PDO::FETCH_ASSOC)
    );
}

$r = updateTasks($title,$description,$image,$id);
//var_dump($r);
header('Location: index.php');