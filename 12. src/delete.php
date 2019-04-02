<?php
session_start();
// Если пользователь не авторизован перекидываем его на login-form.php (авторизацию)
if(!isset($_SESSION['user_id'])) {
    header('Location: login-form.php');
    exit;
}

//получение id записи
$id = $_GET['id'];

// Подготовка и выполнение запроса к базе данных
$pdo = new PDO('mysql:host=localhost; dbname=task-manager', 'root', ''); // подключение к БД
$sql = 'SELECT * FROM tasks WHERE id=:id'; // запрос
$statement = $pdo->prepare($sql);  //подготовка и
$statement->execute([':id' => $id]); // выполнение запроса к БД
$task = $statement->fetch(PDO::FETCH_ASSOC);

// удаляем текущую картинку если существует
if(file_exists('uploads/' . $task['image'])) {
    unlink('uploads/' . $task['image']);
}

// подготока и выполнение запроса к БД
$sql = 'DELETE FROM tasks WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->execute(([':id' => $id]));

header('Location: index.php');
exit;