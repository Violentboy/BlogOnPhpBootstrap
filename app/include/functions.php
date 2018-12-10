<?php

//Создаем функцию получения данных из таблицы categories
function get_categories($link) {
    //Извлекаем все поля из таблицы categories
    $sql = "SELECT * FROM categories";

    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result = mysqli_query($link, $sql);

    //Извлекаем результирующий ряд как ассоциативный массив
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Возвращаем результат
    return $categories;
}
