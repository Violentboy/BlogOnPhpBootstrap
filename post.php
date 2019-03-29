<?php
// Установка значения настройки конфигурации. Включаем вывод всех ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//Создадим переменную которая хранит в себе глобальный массив GET с параметром ['post_id']
//Теперь мы можем обратится к ней простым способом a href="/post.php?post_id=
$post_id = $_GET['post_id'];
//Проверка строки на число, если не число остановим скрипт
if (!is_numeric($post_id))
    exit();
//Подключаем файл шапки
require_once 'app/header.php';
//Получаем массив постов
$post = get_post_by_id($post_id);
$category_id = $post['category_id'];
$category_title = get_category_title($category_id);
?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1><?= $post['title'] ?></h1>
            </div>
            <ul class="list-inline">
                <li><i class="glyphicon glyphicon-list"></i> <a href="category.php?id=<?= $post['category_id']; ?>"><?= $category_title; ?></a> | </li>
                <li><i class="glyphicon glyphicon-calendar"></i><?= $post['creation_time']; ?></li>
            </ul>
            <hr>
            <div class="post-content">
                <img src="<?= $post['image'] ?>" align="left" style="padding: 0 10px 10px 0;">
                <?= $post['content'] ?>
            </div>
        </div>
        <div class="col-md-3">
            <?php
            //Подключаем файл подписки
            include_once 'app/sidebar.php';
            ?>
        </div>
    </div>
</div>
<?php
//Подключаем файл подвала
include_once 'app/footer.php';
?>