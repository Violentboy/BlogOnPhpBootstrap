<!DOCTYPE html>
<meta charset="utf-8">

<?php
error_reporting(E_ALL);
//$x,$y Глобальный переменные, которые объявляются вне всяких функций
$x = 10;
$y = 15;
function test() {
    global $y, $x;
    echo $y. '<br>';
    echo $x. '<br>';
}
test();

//Ключевое слово static. Она не переопределяется при каждом вызове функции, 
//Она сохраняется в памяти!!
function test1() {
    static $z = 0;
    $z++;
    echo $z. '<br>';
}
test1();
test1();
test1();

//Вызываем переменную $x через глобальный массив $GLOBALS
echo $GLOBALS['x'];
echo '<pre>';
print_r($GLOBALS); //Распечатать массив $GLOBALS
