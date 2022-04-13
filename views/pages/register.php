

<?php use App\Services\Page; ?>
<html>
<?php Page::part('head');?>
<body>
<?php Page::part('navbar');?>

<?php
if($_SESSION['user']){
    \App\Services\Router::redirect('/home');
}?>

<div class="container-xxl">
    <form>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Логин</label>
            <input type="text" name="login" class="form-control" id="loginReg">
            <div id="emailHelp" class="form-text">Логин должен быть не меньше 4 символов. Не допускаются русские буквы.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="passwordReg">
            <div id="emailHelp" class="form-text">Пароль должен быть не меньше 8 символов. Не допускаются русские буквы.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" id="passwordConfirm">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Аватар</label>
            <input type="file" class="form-control" id="avatar">
            <div id="emailHelp" class="form-text">Необязательное поле</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Отчество</label>
            <input type="text" class="form-control" id="patronymic">
        </div>

        <p for="" class="mb-3 text-danger" id="msgReg"></p>

        <button type="submit" class="btn btn-primary" id="reg-btn">Создать аккаунт</button>
    </form>

</div>
</body>
</html>
