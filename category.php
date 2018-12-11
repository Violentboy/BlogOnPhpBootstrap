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
            
            $category_id = $_GET['id'];
            // Передаем в переменную вызов функции get_posts
            $posts = get_posts_by_category($category_id);
            $category_title = get_category_title($category_id);
            
            ?>
            <div class="page-header">
                <h1> <?= $category_title; ?>: </h1>
            </div>
            <?php
            // Вывод постов на главной странице(в укороченном варианте вывода)
            foreach ($posts as $post):
                ?>
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="thumbnail">
                            <img src="<?= $post['image'] ?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h4><a href="/post.php?post_id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h4>
                        <p><?=//Обрезаем вывод контента до 100 символов
                         mb_substr($post['content'], 0, 100, 'UTF-8') . '...' ?></p>
                        <p><a class="btn btn-info btn-sm" href="/post.php?post_id=<?= $post['id'] ?>">Читать полностью</a></p>
                        <br/>
                        <ul class="list-inline">
                            <li><i class="glyphicon glyphicon-list"></i> <a href="#">Название категории</a> | </li>
                            <li><i class="glyphicon glyphicon-calendar"></i>10 декабря 2018 15:30 </li>
                        </ul>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
        <div class="col-md-3">
            <?php include_once 'app/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php
//Подключаем файл подвала
require_once 'app/footer.php';
