<?php use App\Services\Page; ?>
    <html>
<?php Page::part('head');?>
<body>
<?php Page::part('navbar');?>

<?php if(!$_SESSION['user']){
    \App\Services\Router::redirect('/home');
}?>


<div class="container-xxl">
    <div class="fs-3">Создание поста</div>
    <hr>
    <p class="text fs-5">Тема: <a href="/posts/<?= $_SESSION['query'];?>"><?= $_SESSION['query'];?></a></p>
    <form action="/Post/addingPost/<?=$_SESSION['query'];?>" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Название</label>
            <input type="text" name="name" class="form-control" id="loginReg" required>
            <div id="emailHelp" class="form-text mb-4">(какие то условия но мне впадлу думать поэтому проверки нэ будет , срите что хотите , но от xxs и sql инъекций защита все таки есть)</div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Текст поста</label>
                <textarea type="textarea" class="form-control h-25" name="description" required></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" id="">Создать пость</button>
    </form>
</div>

