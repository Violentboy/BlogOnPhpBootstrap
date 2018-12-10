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
                        
                        $categories = array(
                            array(
                                'category_id'    => '1',
                                'category_title' => 'Путешествия',
                                'category_slug'  => 'travel',
                            ),
                            array(
                                'category_id'    => '2',
                                'category_title' => 'Жизнь',
                                'category_slug'  => 'life',
                            ),
                            array(
                                'category_id'    => '3',
                                'category_title' => 'Авто',
                                'category_slug'  => 'car',
                            ),
                        );
                        ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="alert alert-danger">
                <pre>   <?= $categories[0]['category_title']; ?> </pre>
            </div>
        </div>