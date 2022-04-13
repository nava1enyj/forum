<?php use App\Services\Page; ?>
<html>
<?php Page::part('head');?>
<body>
<?php Page::part('navbar');?>
<div class="container-xxl">
    <div class="fs-3">Пост</div>
    <hr>
    <?php

    $post = \R::findOne('posts' , 'id = ?',[$_SESSION['query']]);
    if(!$post){
        \App\Services\Router::error(1715);
    }
    $theme = \R::findOne('themes', 'id = ?', [$post->id_theme])
    ?>

    <div class="fs-3 mb-3"><?=$post->name;?></div>
    <div class="fs-5 mb-3">Тема: <?=$theme->name;?></div>
    <div class="fs-6 mb-3 text-break"><?=$post->description;?></div>
    <?php
    if($_SESSION['user']){
        ?>
        <form action="/Comment/addComment/<?=$_SESSION['query'];?>" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Добавить комментарий</label>
                <textarea type="text" name="login" class="form-control" required></textarea>
                <div class="form-text">Впадлу проверку делать(</div>
            </div>
            <button type="submit" class="btn btn-primary">Добавить комментарий</button>
        </form>
        <?php
    }
    ?>


</div>
</body>
