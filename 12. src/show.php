<?php
session_start();
// Если пользователь не авторизован перекидываем его на login-form.php (авторизацию)
if(!isset($_SESSION['user_id'])) {
    header('Location: login-form.php');
    exit;
}

$id = $_GET['id'];
//var_dump($_GET);
//подготовка и выполнение запроса к БД
$pdo = new PDO('mysql:host=localhost;dbname=task-manager', 'root', '');
$sql = 'SELECT * from tasks where id=:id';
$statement = $pdo->prepare($sql);
$statement->execute([':id' => $id]);
$task = $statement->fetch(PDO::FETCH_ASSOC);
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
