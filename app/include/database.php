<?php

//Подключаемся к базе данных my_first_blog
$link = mysqli_connect('localhost', 'root', '', 'my_first_blog');

// Проверка на подключение к БД
if (mysqli_connect_errno())
{
    echo 'Ошибка в подключении к БД (' . mysqli_connect_errno() . '):' . mysqli_connect_error();
    exit();
}