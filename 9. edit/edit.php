<?php
session_start();
// Если пользователь не авторизован перекидываем его на login-form.php (авторизацию)
if(!isset($_SESSION['user_id'])) {
    header('Location: login-form.php');
    exit;
}

// Получение данных из $_POST и $_FILES
$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['image'];
$id = $_GET['id'];

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

// Подготовка и выполнение запроса к базе данных
$pdo = new PDO('mysql:host=localhost;dbname=task-manager', 'root', '');
$sql = 'SELECT * from tasks where id=:id';
$statement = $pdo->prepare($sql);
$statement->execute([':id' => $id]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

// Удаляем текушую картинку если существует
if(file_exists('uploads/' . $task['image'])) {
    unlink('uploads/' . $task['image']);
}

// Загрузка картинки в папку uploads
move_uploaded_file($image['tmp_name'], 'uploads/' . $image['name']);

// Подготовка и выполнение запроса к базе данных
$sql = "UPDATE tasks SET title=:title, description=:description, image=:image WHERE id=:id";
$statement = $pdo->prepare($sql);
$r = $statement->execute([
    ":title" =>	$title,
    ":description" => $description,
    ":image" => $image['name'],
    ":id" => $id
]);

header('Location: index.php');