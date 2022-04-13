<?php use App\Services\Page; ?>
    <html>
<?php Page::part('head');?>
<body>
<?php Page::part('navbar');?>

<div class="container-xxl">
    <div class="fs-3">Посты</div>
    <hr>
    <div class="row mb-4">
        <div class="col-9 col-sm-10">
            <form class="d-flex" method="post">
                <input class="form-control me-2 w-50" type="search" name="searchText" placeholder="Поиск поста" aria-label="Search">
                <button class="btn btn-outline-success" name="search" type="submit">Поиск</button>
            </form>
        </div>
        <?php
        if($_SESSION['user']){
            ?>
            <div class="col-6 col-sm-2">
                <div class="d-flex">
                    <a href="/addpost/<?= $_SESSION['query'];?>" class="btn btn-primary" type="button">
                        Создать пост
                    </a>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
    <?php
    //УЛЬТРАМЕГАСУПЕРНАСРАЛ
    $theme = \R::findOne('themes' , 'name = ?' , [$_SESSION['query']]);
    $theme = $theme->id;
    $posts = \R::findAll('posts', "id_theme = ? ORDER BY `post_time` DESC" , [$theme]);
        if(isset($_POST['search'])){
        $posts  = R::find( 'posts', 'name LIKE ? AND id_theme = ? ORDER BY `post_time` DESC' , ['%' . $_POST['searchText'] . '%' , $theme]);
        }
        foreach ($posts as $post){
            ?>
            <div class="fs-5 mt-3 mb-1"><?= $post->name;?></div>
            <div class="fs-6 mb-3 text-break"><?= $post->description;?></div>
            <a href="/post/<?=$post->id;?>" class="link mb-3">Подробнее</a>
            <?php
        }

    ?>

</div>