<?php
require_once ('function.php');
session();

// Подготовка и выполнение запроса к БД
$task = getTask($_GET['id']);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Show Task</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="form-wrapper text-center">
      <h3><?php echo $task['title'];?></h3>
      <p><?php echo $task['description'];?></p>
      <img src="uploads/<?php echo $task['image'];?>" width="100">
      <br>
      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Назад</a>
    </div>
  </body>
</html>
