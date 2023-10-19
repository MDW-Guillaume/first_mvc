<?php

function index(){
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('models/Movie.php');

        $search =  $_POST['search'];
    
        $searchedMovies = Movie::getSearchMovie($search);
        require('views/search.php');
        return;

    }else{
        header('Location: /');
    }
}