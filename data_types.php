<!DOCTYPE html>
<meta charset="utf-8">

<?php
//Включить показ всех ошибок
error_reporting(E_ALL);
/*
 * строка - string Может хранить в себе любое значение строкового типа
 * целое число - integer Может хранить в себе разные системы исчисления
 * дробное число - float (double) Может хранить числа с остатком, дробные числа
 * булево значение - boolean Может хранить в себе true or false
 * массивы - array Массивы: одномерные, ассоциативные, многомерные
 * объекты - object 
 * нуль - null Может хранить в себе null(0)
 * ресурс - resource Является проходным звеном, например, данные для соединения с БД
 */

$string = 'Hello world!';
$integer = 232;
$float = 2.32;
$boolean = true;
$array = array("Htllo world", $float, $boolean);//

class User {
    public $username = "Максим";
    
    public function GetUsername() {
        return $this->username;
        
    }
}

$user = new User;
$username = $user -> GetUsername();

$null = null;

$resource = mysqli_connect('localhost', 'root', '');
?>

<pre>
<?=var_dump($resource);?>
</pre>