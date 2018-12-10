<?php
// Установка значения настройки конфигурации. Включаем вывод всех ошибок
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//Подключаем файлы проекта
require_once 'app/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1> Все записи: </h1>
            </div>
            <?php
            $posts = get_posts();
            ?>
            <?php foreach ($posts as $post): ?>
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="thumbnail">
                            <img src="<?= $post['image'] ?>" alt="">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h4><a href="/post.php?post_id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h4>
                        <p><?= mb_substr ($post['content'], 0, 100, 'UTF-8'). '...' ?></p>
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

        </div>
    </div>

</div>



<?php
require_once 'app/footer.php';
