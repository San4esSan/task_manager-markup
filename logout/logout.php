<?php
//Удаляем данные из сессии
unset($_SESSION['user_id']);
unset($_SESSION['email']);

header('Location: login-form.php');
exit;