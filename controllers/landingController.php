<?php

function index(){
    if(!isset($_SESSION['email'])){
    session_destroy();
    require ('views/landing.php');

    // Erreur à traiter
    if($_GET['error']){
        switch ($_GET['error']) {
            case 'connect':
                $error = 'Vous devez être connecté pour accéder à cette page.';
                break;
            
            default:
                # code...
                break;
        }
        return $error; 
    }else{
        return; 
    }
}else{
    header('Location: /?action=home');
}
}