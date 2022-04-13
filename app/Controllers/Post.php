<?php

namespace App\Controllers;

use App\Services\Router;
use App\Services\ValidationCheck;

class Post
{

    public function addingPost($data){

        $name =  ValidationCheck::protectionAgainstXss($data['name']);
        $description = ValidationCheck::protectionAgainstXss($data['description']);

        $theme = \R::findOne('themes' , 'name = ?' , [$_SESSION['query']]);

        if($theme){
            $post = \R::dispense('posts');
            $post->name = $name;
            $post->description = $description;
            $post->idTheme = $theme['id'];
            $post->idUser = $_SESSION['user']['id'];
            \R::store($post);
            Router::redirect('/post/' . $post->id);
        }else{
            Router::error('500');
        }
    }
}