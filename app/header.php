<?php
require_once 'include/database.php';
require_once 'include/functions.php';
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Template</title>

        <!-- Bootstrap -->
        <link href="public/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                        <span class="sr-only">Открыть навигацию</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Мой первый блог</a>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <ul class="nav navbar-nav">
                        <?php
                        // Передаем в переменную вызов функции get_categories
                        // В которой прописаны пути к БД для наших категорий
                        $categories = get_categories();
                        ?>
                        <?php
                        //Проверяем не пустой ли массив
                        if (count($categories) === 0):
                            ?>
                            <li><a href="#"><i class="glyphicon glyphicon-plus-sign"></i>Добавить категорию</a></li>
                            <?php else: ?>
                                <?php
                                //Выводим категории меню с помощью цыкла для массивов foreach
                                foreach ($categories as $category):
                                    ?>
                                <li><a href="category.php?id=<?= $category["id"] ?>"><?= $category["title"] ?> </a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>