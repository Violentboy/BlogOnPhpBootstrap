<?php

//Создаем функцию получения данных из таблицы categories
function get_categories() {
    
    global $link;
    
    //Извлекаем все поля из таблицы categories
    $sql = "SELECT * FROM categories";

    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result = mysqli_query($link, $sql);
    
    //Извлекаем результирующий ряд как ассоциативный массив
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Возвращаем результат
    return $categories;
}

function get_posts() {
    
    global $link;
    
    //Извлекаем все поля из таблицы posts
    $sql = "SELECT * FROM posts";
    
    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result = mysqli_query($link, $sql);
    
    // Выбираем все строки из таблицы posts и помещаем их в ассоциативный массив
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Возвращаем результат
    return $posts;
}

function get_post_by_id($post_id) {
    global $link;
    
    //Извлекаем все поля из таблицы posts
    $sql = "SELECT * FROM posts WHERE id = ". $post_id;
    
    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result = mysqli_query($link, $sql);
    
    //Возвращаем массив строк, соответствующих данным в выбранной строке таблицы posts
    $post = mysqli_fetch_assoc($result);

    //Возвращаем результат
    return $post;
}