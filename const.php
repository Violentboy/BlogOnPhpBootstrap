<?php

$br = '<br>';

//Создание первой константы
define('MY_FIRST_CONSTANT', '1.0');

//Выводим константу на экран
echo '<b>Моя константа:</b> '. MY_FIRST_CONSTANT. $br;

//Волшебные константы
echo '<b>Директория файла:</b> '.__DIR__. $br;
echo '<b>Текущий номер строки в файле:</b> '.__LINE__. $br;
echo '<b>Полный путь и имя текущего файла:</b> '.__FILE__. $br;