
<?php use App\Services\Page; ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid mx-3 my-2">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="navbar-brand mt-1" href="#">
                    <img src="/assets/images/book.png" alt="" width="30" height="24">
                </a>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/theme">Темы</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php
                if($_SESSION['user']){
                    ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle me-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/<?=$_SESSION['user']['avatar']?>" class="rounded-circle me-3" alt="" width="30" height="24">
                            <?=$_SESSION['user']['login']?>
                        </a>
                        <ul class="dropdown-menu mb-4" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">test</a></li>
                            <li><a class="dropdown-item" href="#">test</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <form action="/auth/logout" method="post">
                                <li><button class="dropdown-item text-danger" href="#">Выход</button></li>
                            </form>

                        </ul>
                    </li>
                </ul>
                    <?php

                }
                else{
                    ?>
                    <a class="link-primary nav-link active" aria-current="page" href="/register">Регистрация</a>
                    <a class="link-primary nav-link active" aria-current="page"  data-bs-toggle="modal" data-bs-target="#exampleModal" href="test/login">Вход</a>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</nav>
<?php Page::part('popupLogin');?>

