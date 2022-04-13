<?php use App\Services\Page; ?>
<html>
<?php Page::part('head');?>
<body>
<?php Page::part('navbar');?>
<div class="container-xxl">
    <div class="fs-3">Темы</div>
    <hr>

        <?php
        if($_SESSION['user']){
            ?>
            <?php Page::part('proposeTopic');?>
            <div class="col-6 col-sm-2 mb-4">
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        Предложить тему
                    </button>
            </div>
            <?php
        }
        ?>



    <?php

    $themes = \R::find('themes' , 'checkimoder = ?', [1]);
    foreach ($themes as $theme) {
    ?>
    <a class="me-3" href="posts/<?=$theme->name;?>">
      <?= $theme->name; ?>
    </a>
    <?php
    }
?>
</div>
</body>
</html>