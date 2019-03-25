<?php
// Получение данных из $_POST
//var_dump($_POST);
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Проверка данных на пустоту
foreach($_POST as $input) { // пербрать массив $_POST, данные зписать в переменную $input
    if(empty($input)) { // если в переменной $input нет данных
        include 'errors.php'; // подключить файл  с выводом ошибки
        exit;
    }
}

// Проверка на существующего пользователя
$pdo = new PDO('mysql:host=localhost;dbname=task-manager', 'root', '');
$sql = 'SELECT id FROM users WHERE email=:email';
$statement = $pdo->prepare($sql);  //подготовка и
$statement->execute([':email' => $email]); // выполнение запроса к БД
$user = $statement->fetchColumn();
if($user) {
    $errorMessage = 'Пользователь с таким email уже существует';
    include 'errors.php';
    exit;
}

// Выполнить запрос на сохранение в БД
$sql = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';
$statement = $pdo->prepare($sql); //подготовка
$_POST['password'] = md5($_POST['password']); //шифруем password 
$result = $statement->execute($_POST); // выполнение
if(!$result) {
    $errorMessage = 'Ошибка регистрации';
    include 'errors.php';
    exit;
}

//переадресация на авторизацию(login-form.php)
header('Location: login-form.php');
exit;