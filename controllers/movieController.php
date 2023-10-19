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
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        $movie_id = $id;
        $title =  $_POST['title'];
        $director =  $_POST['director'];
        $synopsis =  $_POST['synopsis'];
        $type =  $_POST['type'];
        $senarist =  $_POST['senarist'];
        $producer =  $_POST['producer'];
        $releasedate =  $_POST['releasedate'];
        $image = $imageData;

        $movie = Movie::update($movie_id, $title, $director, $synopsis, $type, $senarist, $producer, $releasedate, $image);
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

    $movie = Movie::delete($id);
    
    if($movie){
        header('Location: /');
    }
}

function add(){
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require_once('models/Movie.php');
        // var_dump($_POST);
        // die;
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        $user_id = $_SESSION['user_id'];
        $title =  $_POST['title'];
        $director =  $_POST['director'];
        $synopsis =  $_POST['synopsis'];
        $type =  $_POST['type'];
        $senarist =  $_POST['senarist'];
        $producer =  $_POST['producer'];
        $releasedate =  $_POST['releasedate'];
        $image =  $imageData;

        $movie = Movie::create($user_id, $title, $director, $synopsis, $type, $senarist, $producer, $releasedate, $image);

        if($movie){
            header('Location: /?action=movie/show/' . $movie->id);
        }
    }else{ 
        require_once ("views/movie/add.php");
        return;
    }
}