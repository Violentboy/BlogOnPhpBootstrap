<?php

//Подключаемся к базе данных magisters_blog
$link = mysqli_connect('127.0.0.1', 'root', '', 'magisters_blog');

// Проверка на подключение к БД
if (!$link)
{
    echo 'Ошибка в подключении к БД (' . mysqli_connect_errno() . '):' . mysqli_connect_error();
    exit();
}

