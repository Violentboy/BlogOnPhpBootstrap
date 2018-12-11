<?php
require_once 'app/include/database.php';
require_once 'app/include/functions.php';
//Проверка на существование переменной $_POST['email']
if (isset($_POST['email']))
{
//Создадим переменную которая хранит в себе глобальный массив GET с параметром ['email']
//Теперь мы можем обратится к ней в форме подписки как input type="email"
    $email = trim($_POST['email']); //trim вырезает ненужные пробелы в начале строки
    
    $insert_result = insert_subscriber($email);
    
    $header = 'Location: /?subscribe=';
    $header .= $insert_result;
    header($header);
}
else
{
    header('Location: /'); 
}
