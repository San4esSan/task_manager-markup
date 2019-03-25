
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Errors</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="container text-center mt-5">
      <?php if(isset($errorMessage)):?> <!-- если переменная $errorMessage существует то вывести ее-->
        <p><?php echo $errorMessage;?></p>
      <?php else: ?>   <!--иначе вывести сообщение-->
        <p>Заполните все поля.</p>
      <?php endif;?>

      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Назад</a>  <!--вернуться на страницу с которой пришли-->
    </div>
  </body>
</html>
