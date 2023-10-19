<?php

function index(){
    // Liste de mes films
}

function show($id){
    require_once('models/Movie.php');

    $movie = Movie::getMovie($id);

    require('views/movie/show.php');
}

function edit($id){
    require_once('models/Movie.php');

    $movie = Movie::getMovie($id);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $movie_id = $id;
        $title =  $_POST['title'];
        $director =  $_POST['director'];
        $synopsis =  $_POST['synopsis'];
        $type =  $_POST['type'];
        $senarist =  $_POST['senarist'];
        $producer =  $_POST['producer'];
        $releasedate =  $_POST['releasedate'];

        $movie = Movie::update($movie_id, $title, $director, $synopsis, $type, $senarist, $producer, $releasedate);
        if($movie){
            header('Location: /?action=movie/show/' . $movie_id);
        }
    }else{
        require('views/movie/edit.php');
        return;
    }
}

function delete($id){
    require_once('models/Movie.php');

    $movie = Movie::getMovie($id);

    if($movie){
        var_dump($id, $movie);
        die;
    }
}

function add(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('models/Movie.php');
        // var_dump($_POST);
        // die;
        $user_id = $_SESSION['user_id'];
        $title =  $_POST['title'];
        $director =  $_POST['director'];
        $synopsis =  $_POST['synopsis'];
        $type =  $_POST['type'];
        $senarist =  $_POST['senarist'];
        $producer =  $_POST['producer'];
        $releasedate =  $_POST['releasedate'];

        $movie = Movie::create($user_id, $title, $director, $synopsis, $type, $senarist, $producer, $releasedate);

        if($movie){
            header('Location: /?action=movie/show/' . $movie->id);
        }
    }else{ 
        require_once ("views/movie/add.php");
        return;
    }
}