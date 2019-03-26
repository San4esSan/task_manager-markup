<?php
session_start();
// Если пользователь не авторизован перекидываем его на login-form.php (авторизацию)
if(!isset($_SESSION['user_id'])) {
    header('Location: login-form.php');
    exit;
}
// Получение id записи
$id = $_GET['id'];

// Подготовка и выполнение запроса к базе данных
$pdo = new PDO('mysql:host=localhost;dbname=task-manager', 'root', '');
$sql = 'SELECT * FROM tasks WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->execute([':id' => $id]);
$task = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Task</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

  </head>
  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" method="post" enctype="multipart/form-data" action="edit.php?id=<?php echo $task['id'];?>">
        <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
        <label for="inputEmail" class="sr-only">Название</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Название" value="<?php echo $task['title'];?>">
        <label for="inputEmail" class="sr-only">Описание</label>
        <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Описание"><?php echo $task['description'];?></textarea>
        <input type="file">
        <img src="uploads/<?php echo $task['image'];?>" alt="" width="300" class="mb-3">
        <button class="btn btn-lg btn-success btn-block" type="submit">Редактировать</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>