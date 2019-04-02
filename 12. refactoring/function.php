<?php
function session()
{
    session_start();
    // Если пользователь не авторизован перекидываем его на login-form.php (авторизацию)
    if(!isset($_SESSION['user_id'])) {
        header('Location: login-form.php');
    }
}

function validation ()
{
// Проверка данных на пустоту
    foreach ($_POST as $input) { // перебераем $_POST и записываем в переменную $input
        if (empty($input)) { // если переменная $input пуста
            include 'errors.php'; // подключаем файл ошибки
            exit;
        }
    }
}

function connection ()
{
    // Подключение к базе данных
   $pdo = new PDO('mysql:host=localhost;dbname=task-manager', 'root', '');
   return $pdo;

}

function getTask($id)
{
    $pdo = connection ();
    //$pdo = new PDO("mysql:host=localhost; dbname=task-manager", "root", "");
    $statement = $pdo->prepare("SELECT * FROM tasks WHERE  id=:id");
    $statement->bindParam(":id", $id);
    $statement->execute();
    $task = $statement->fetch(PDO::FETCH_ASSOC);

    return $task;
}

function delTask($id)
{
    $pdo = connection ();
    //$pdo = new PDO("mysql:host=localhost; dbname=task-manager", "root", "");
    $sql = 'DELETE FROM tasks WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id",$id);
    $statement->execute();
}