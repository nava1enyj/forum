<?php

namespace App\Controllers;
use App\Services\Router;
use App\Services\ValidationCheck;

class Auth
{
public function register($data,$files){
    $errorFields = [];
$login =  ValidationCheck::protectionAgainstXss($data['login']);
$password = ValidationCheck::protectionAgainstXss($data['password']);
$passwordConfirm= ValidationCheck::protectionAgainstXss($data['passwordConfirm']);
$email = ValidationCheck::protectionAgainstXss($data['email']);
$lastname = ValidationCheck::protectionAgainstXss($data['lastName']);
$name= ValidationCheck::protectionAgainstXss($data['name']);
$patronymic = ValidationCheck::protectionAgainstXss($data['patronymic']);

    $fileName = 'noAvatar.jpg';
    $path ='uploads/avatars/avatarsDefault/' . $fileName;

$avatar = $files['avatar'];

    if($avatar){
        if(ValidationCheck::checkImg($avatar['name'])){
            $fileName = time() . '_' . $avatar['name'];
            $path ='uploads/avatars/' . $fileName;
            move_uploaded_file($avatar['tmp_name'],$path);
        }
    }


    if($login === '' || strlen($login) < 4 || strlen($login) > 18 || preg_match('/[А-Яа-яЁё_ -]/iu', $login) ){
        $errorFields[] =  'loginReg';
    }

    if($password === '' || strlen($password) < 8 || strlen($password) > 24  ||  preg_match('/[А-Яа-яЁё_ -]/iu', $password)){
        $errorFields[] =  'passwordReg';
    }

    if($email === '' || strlen($email) < 3 || strlen($email) > 42 || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorFields[] = 'email';
    }

    if($name === '' || strlen($name) < 8 || strlen($name) > 32 ||strlen($name) < 3){
        $errorFields[] =  'name';
    }

    if($lastname === '' || strlen($lastname) < 8 || strlen($lastname) > 32 || strlen($lastname) < 3){
        $errorFields[] =  'lastname';
    }
    if($patronymic === '' || strlen($patronymic) < 8 || strlen($patronymic) > 32 || strlen($patronymic) < 3){
        $errorFields[] =  'patronymic';
    }

    if(!empty($errorFields)){
        $response = [

            'status' => false,
            'type' => 1, //валидация плохая
            'massage' => 'Проверьте правильность полей',
            'fields' => $errorFields

        ];

        echo json_encode($response);


        die();
    }

    $user = \R::findOne('users' , 'login = ?',[$login]);

        if($user){
            $response = [

                'status' => false,
                'type' => 3, //занято логин
                'massage' => 'Логин занят',
            ];

            echo json_encode($response);


            die();
        }

    if($password === $passwordConfirm){
        $user = \R::dispense('users');
        $user->login = $login;
        $user->password = password_hash($password,PASSWORD_DEFAULT);
        $user->email = $email;
        $user->lastname = $lastname;
        $user->name = $name;
        $user->patronymic = $patronymic;
        $user->avatar = $path;
        $user->group = 1; // 1-пользователь , 2 - админ

        \R::store($user);

        session_start();
        $_SESSION['user']=[
            'id' => $user->id,
            'login' => $user->login,
            'email' => $user->email,
            'name' => $user->name,
            'lastname' => $user->lastname,
            'patronymic' => $user->patronymic,
            'avatar' => $user->avatar,
            'group' => $user->group
        ];


        $response = [
            'status' => true
        ];

        echo json_encode($response);

        die();
    }
    else{
        $response = [

            'status' => false,
            'type' => 2, //пароли не совпадают
            'massage' => 'Пароли не совпадают',

        ];

        echo json_encode($response);

        die();
    }




}

public function login($data){
    $login =  ValidationCheck::protectionAgainstXss($data['login']);
    $password = ValidationCheck::protectionAgainstXss($data['password']);


    $user = \R::findOne('users' , 'login = ?' , [$login]);

    if(!$user){
        $response = [
          'status' => false,
            'type' => 1 ,//пользователь не найдет
            'massage' => 'Пользователь не найдет'
        ];
       echo json_encode($response);
       die();
    }

    if(password_verify($password,$user->password)){
        session_start();
        $_SESSION['user']=[
            'id' => $user->id,
            'login' => $user->login,
            'email' => $user->email,
            'name' => $user->name,
            'lastname' => $user->lastname,
            'patronymic' => $user->patronymic,
            'avatar' => $user->avatar,
            'group' => $user->group
        ];

        $response = [
            'status' => true,
        ];
        echo json_encode($response);
        die();

    }
    else{
        $response = [
            'status' => false,
            'type' => 2 ,//Пароль не верен
            'massage' => 'Пароль не верен'
        ];
        echo json_encode($response);
        die();
    }
}

public function logout(){
    unset($_SESSION['user']);
    Router::redirect('/home');
}
}