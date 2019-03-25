<?php
session_start();
// если пользователь не авторизован перекидываем его на login-form.php (авторизацию)
if(!isset($_SESSION['user_id'])) {
    header('Location: login-form.php');
    exit;
}


// Получение данных из $_POST и $_FILES
$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['image'];
//var_dump($_POST);
//var_dump($_FILES);

// Проверка данных
foreach($_POST as $input) { // перебераем $_POST и записываем в переменную $input
    if(empty($input)) { // если переменная $input пуста
        include 'errors.php'; // подключаем файл ошибки
        exit;
    }
}
// Картинка не загружена
if($image['error'] === 4) {
    $errorMessage = 'Загрузите картинку';
    include 'errors.php';
    exit;
}

// Загрузка картинки в папку uploads
move_uploaded_file($image['tmp_name'], 'uploads/' . $image['name']);

//подготовка и выполнение запроса к БД
$pdo = new PDO('mysql:host=localhost;dbname=task-manager', 'root', '');
$sql = "INSERT INTO tasks (title, description, image, user_id) VALUES (:title, :description, :image, :user_id)";
$statement = $pdo->prepare($sql);
$r = $statement->execute([
    ":title" => $title,
    ":description" => $description,
    ":image" => $image['name'],
    ":user_id" => $_SESSION['user_id']
]);

header('Location: index.php');


