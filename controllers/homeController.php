<?php

function index(){
    if(isset($_SESSION['email'])){
        require('models/Movie.php');
        $movies = Movie::getAllMovies();
        $my_movies = Movie::getUserMovies();
        require('views/home.php');
        return;
    }else{
        header('Location: /?action=landing&error=connect');
    }
    // return;
}