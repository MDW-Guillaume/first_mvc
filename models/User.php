<?php

class User{
    
    public $id;
    public $username;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;

    public function __construct($id, $username, $email, $password, $created_at, $updated_at) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function create($username, $email, $password){
        require_once('models/db_connect.php');

        try{
            $db = connection();
            // var_dump(connection());
            $stmt = $db->prepare('INSERT INTO users (username, email, password, created_at, updated_at)
                                    VALUES (:username, :email, :password, NOW(), NOW())');

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->execute();
            $user_id = $db->lastInsertId();

            return new User($user_id, $username, $email, $hashedPassword, new DateTime(), new DateTime());
        }catch (PDOException $e){
            die('Erreur de requete : ' . $e->getMessage());
        }
    }


    public static function getByEmail($email){
        require_once('models/db_connect.php');
        try{
            $db = connection();
            $stmt = $db->prepare('SELECT *
                    FROM users
                    WHERE email = :email');

            $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            $stmt->execute();
            $result = $stmt->fetch();

            if($result){
                $user = new User($result['id'], $result['username'], $result['email'], $result['password'], $result['created_at'], $result['updated_at']);
                return $user;
            }else{
                return false;
            }
        }catch (PDOException $e){
            die('Erreur de requete : ' . $e->getMessage());
        }
    }

    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
    return $this->password;
    }
}