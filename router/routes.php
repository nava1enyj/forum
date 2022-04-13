<?php
use App\Services\Router;
use App\Controllers\Auth;
use App\Controllers\Theme;
use App\Controllers\Post;
use App\Controllers\Comment;



Router::page('/register','register');
Router::page('/home','home');
Router::page('/theme','theme');



Router::post('/auth/register', Auth::class, 'register',true,true);
Router::post('/auth/login', Auth::class, 'login',true);
Router::post('/auth/logout', Auth::class, 'logout');

Router::post('/Theme/addingTheme', Theme::class, 'addingTheme',true);
Router::post('/Post/addingPost/' . $_SESSION['query'], Post::class, 'addingPost',true);
Router::post('/Comment/addComment/' . $_SESSION['query'], Comment::class, 'addComment',true);

Router::get('/posts','posts');
Router::get('/addpost','addpost');
Router::get('/post','post');

Router::enable();