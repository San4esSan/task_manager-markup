<?php
session_start();
// Если пользователь не авторизован перекидываем его на login-form.php (авторизацию)
if(!isset($_SESSION['user_id'])) {
    header('Location: login-form.php');
    exit;
}
//Удаляем данные из сессии
unset($_SESSION['user_id']);
unset($_SESSION['email']);

header('Location: login-form.php');
exit;