<?php
require_once ('function.php');

//var_dump($_POST);
$email = $_POST['email'];
$password = $_POST['password'];

validation();

// Подготовка и выполнение запроса к базе данных
$pdo = new PDO("mysql:host=localhost; dbname=task-manager", "root", "");// подключение к БД
$sql = 'SELECT id,username,email,password FROM users WHERE email=:email AND password=:password'; // запрос
$statement = $pdo->prepare($sql);  //подготовка
$statement->execute([':email' => $email, ':password' => md5($password)]); // выполнение запроса к БД
$user = $statement->fetch(PDO::FETCH_ASSOC);

// Пользователь не найден
if(!$user) {
    $errorMessage = 'Неверный логин или пароль';
    include 'errors.php';
    exit;
}

// Пользователь найден - запускаем сессию
session_start();
$_SESSION['user_id'] = $user['id'];
$_SESSION['email'] = $user['email'];

// Переадресация на главную
header('Location: index.php');
exit;