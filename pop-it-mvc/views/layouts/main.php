<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
    <link rel="stylesheet" href="/pop-it-mvc/public/css/style.css">
</head>
<body>
<header>
    <nav>

        <?php
        if (!app()->auth::check() ):
            ?>



        <?php
        elseif (app()->auth->user()->id_role == '1'):
            ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выйти</a>
        <?php
        elseif (app()->auth->user()->id_role == '0'):
            ?>
            <a href="<?= app()->route->getUrl('/view') ?>">Просмотр</a>
            <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выйти</a>

        <?php
        else:
            ?>
        <a href="<?= app()->route->getUrl('/logout') ?>">Выйти</a>
        <?php
        endif;
        ?>
    </nav>
</header>

<main>
    <?= $content ?? '' ?>
</main>

</body>
</html>