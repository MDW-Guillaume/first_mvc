<?php
function connection(){
    $serveur = "localhost"; 
    $utilisateur = "guillaume020"; 
    $mot_de_passe = "root";
    $base_de_donnees = "mvc";
    
    try {
        $connexion = new PDO( "mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
        $connexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $e) {
        die("Echec de la connexion : " . $e->getMessage());
    }
}