<?php
// Установка значения настройки конфигурации. Включаем вывод всех ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//Подключаем файл шапки
require_once 'app/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php
            // Передаем в переменную глобальный массив _GET с параметром id
            $category_id = filter_input(INPUT_GET, 'id');
            // Передаем в переменную вызов функции get_posts_by_category
            $posts = get_posts_by_category($category_id);
            // Передаем в переменную вызов функции get_category_title
            $category_title = get_category_title($category_id);
            ?>
            <div class="page-header">
                <h1> <?= $category_title; ?>: </h1>
            </div>
            <?php foreach ($posts as $post): ?>
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="thumbnail">
                            <img src="/public/img/<?= $post['image'] ?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h4><a href="/post.php?post_id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h4>
                        <p><?=//Обрезаем вывод контента до 100 символов
                         mb_substr($post['content'], 0, 100, 'UTF-8') . '...' ?></p>
                        <p><a class="btn btn-info btn-sm" href="/post.php?post_id=<?= $post['id'] ?>">Читать полностью</a></p>
                        <br/>
                        <ul class="list-inline">
                            <li><i class="glyphicon glyphicon-list"></i> <a href=""><?= $category_title; ?></a> | </li>
                            <li><i class="glyphicon glyphicon-calendar"></i> <?= $post['creation_time']; ?> </li>
                        </ul>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
        <div class="col-md-3">
            <?php 
            //Подключаем файл подписки
            include_once 'app/sidebar.php'; ?>
        </div>
    </div>
</div>
<?php
//Подключаем файл подвала
require_once 'app/footer.php';
