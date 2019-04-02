<?php
require_once ('function.php');
session();

// Подготовка и выполнение запроса к базе данных
$task = getTask($_GET['id']);

// удаляем текущую картинку если существует
if(file_exists('uploads/' . $task['image'])) {
    unlink('uploads/' . $task['image']);
}

// подготока и выполнение запроса к БД
delTask($_GET['id']);

header('Location: index.php');
exit;