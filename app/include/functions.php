<?php

function get_categories() {
    global $link;
    //Извлекаем все поля из таблицы categories
    $sql        = "SELECT * FROM categories";
    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result     = mysqli_query($link, $sql);
    //Извлекаем результирующий ряд как ассоциативный массив
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //Возвращаем результат
    return $categories;
}

function get_posts() {
    global $link;
    //Извлекаем все поля из таблицы posts
    $sql    = "SELECT * FROM posts";
    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result = mysqli_query($link, $sql);
    // Выбираем все строки из таблицы posts и помещаем их в ассоциативный массив
    $posts  = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //Возвращаем результат
    return $posts;
}

function get_post_by_id($post_id) {
    global $link;
    //Извлекаем все поля из таблицы posts
    $sql    = "SELECT * FROM posts WHERE id = " . $post_id;
    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result = mysqli_query($link, $sql);
    //Возвращаем массив строк, соответствующих данным в выбранной строке таблицы posts
    $post   = mysqli_fetch_assoc($result);
    //Возвращаем результат
    return $post;
}

function generate_code($length = 8) {
    $string    = '';
    $chars     = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
    $num_chars = strlen($chars);
    for ($i = 0; $i < $length; $i++)
    {
        $string .= substr($chars, rand(1, $num_chars) - 1, 1);
    }
    return $string;
}

function insert_subscriber($email) {
    global $link;
    $email  = mysqli_real_escape_string($link, $email);
    // 1. Проверить есть ли подписчик в таблице subscribers
    //Извлекаем все поля из таблицы subcribers
    $query  = "SELECT * FROM subcribers WHERE email = '$email'";
    //Результат выполнения функции ($link- ссылка на подключение к БД, $query- запрос который мы отправляем)
    $result = mysqli_query($link, $query);
    if (!mysqli_num_rows($result))
    {
        // 2. Если его нет, то создаем подписчика с уникальным кодом (неактивного)
        $subscriber_code = generate_code();
        //Заносим нового подписчика с уникальным кодом в таблицу subcribers
        $insert_query    = "INSERT INTO subcribers (email, code) VALUES ('$email', '$subscriber_code')";
        //Результат выполнения функции ($link- ссылка на подключение к БД, $insert_query- запрос который мы отправляем)
        $result          = mysqli_query($link, $insert_query);
        // Если результат успешен тогда первое условие если нет второе, а если он уже есть в базе возвращаем результат
        if ($result)
        {
            return 'created';
        }
        else
        {
            return 'fail';
        }
    }
    else
    {
        return 'exist'; //Значит что пользователь есть в базе
    }
}

function get_posts_by_category($category_id) {
    global $link;
    //экранирует специальные символы в строке, используемой в SQL-запросе,
    //принмимая во внимание кодировку соединения, таким образом,
    //что результат можно безопасно использовать в SQL-запросе в функци mysqli_query()
    $category_id = mysqli_real_escape_string($link, $category_id);
    //Извлекаем все поля из таблицы posts
    $sql         = 'SELECT * FROM posts WHERE id = ' . "'$category_id'";
    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result      = mysqli_query($link, $sql);
    // Выбираем все строки из таблицы posts и помещаем их в ассоциативный массив
    $posts       = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //Возвращаем результат
    return $posts;
}

function get_category_title($category_id) {
    global $link;
    //экранирует специальные символы в строке, используемой в SQL-запросе,
    //принмимая во внимание кодировку соединения, таким образом,
    //что результат можно безопасно использовать в SQL-запросе в функци mysqli_query()
    $category_id = mysqli_real_escape_string($link, $category_id);
    //Извлекаем title из таблицы posts
    $sql         = 'SELECT title FROM categories WHERE id = ' . "'$category_id'";
    //Результат выполнения функции ($link- ссылка на подключение к БД, $sql- запрос который мы отправляем)
    $result      = mysqli_query($link, $sql);
    //Возвращаем массив строк, соответствующих данным в выбранной строке таблицы posts
    $category    = mysqli_fetch_assoc($result);
    //Возвращаем результат
    return $category['title'];
}
