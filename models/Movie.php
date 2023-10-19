<?php

class Movie
{

    public $id;
    public $user_id;
    public $title;
    public $director;
    public $synopsis;
    public $type;
    public $senarist;
    public $producers;
    public $releasedate;
    public $created_at;
    public $updated_at;

    public function __construct($id, $user_id, $title, $director, $synopsis, $type, $senarist, $producers, $releasedate, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->director = $director;
        $this->synopsis = $synopsis;
        $this->type = $type;
        $this->senarist = $senarist;
        $this->producers = $producers;
        $this->releasedate = $releasedate;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    function getUserId()
    {
        return $this->user_id;
    }
    function getTitle()
    {
        return $this->title;
    }
    function getDirector()
    {
        return $this->director;
    }
    function getSynopsis()
    {
        return $this->synopsis;
    }
    function getType()
    {
        return $this->type;
    }
    function getSenarist()
    {
        return $this->senarist;
    }
    function getProducers()
    {
        return $this->producers;
    }
    function getreleasedate()
    {
        return $this->releasedate;
    }

    static function create($user_id, $title, $director, $synopsis, $type, $senarist, $producer, $releasedate)
    {
        require_once('models/db_connect.php');

        try {
            $db = connection();

            $stmt = $db->prepare('INSERT INTO movies (user_id, title, director, synopsis, type, senarist, producer, releasedate, created_at, updated_at)
                                    VALUES (:user_id, :title, :director, :synopsis, :type, :senarist, :producer, :releasedate, NOW(), NOW())');
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':director', $director, PDO::PARAM_STR);
            $stmt->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
            $stmt->bindValue(':type', $type, PDO::PARAM_STR);
            $stmt->bindValue(':senarist', $senarist, PDO::PARAM_STR);
            $stmt->bindValue(':producer', $producer, PDO::PARAM_STR);
            $stmt->bindValue(':releasedate', $releasedate, PDO::PARAM_INT);
            $stmt->execute();
            $movie = $db->lastInsertId();

            return new Movie($movie, $user_id, $title, $director, $synopsis, $type, $senarist, $producer, $releasedate, new DateTime(), new DateTime());
        } catch (PDOException $e) {
            die('Erreur de requete : ' . $e->getMessage());
        }
    }

    static function update($movie_id, $title, $director, $synopsis, $type, $senarist, $producer, $releasedate)
    {
        require_once('models/db_connect.php');
        
        try {
            $db = connection();

            $stmt = $db->prepare('UPDATE movies 
                      SET 
                        title = :title,
                        director = :director,
                        synopsis = :synopsis,
                        type = :type,
                        senarist = :senarist,
                        producer = :producer,
                        releasedate = :releasedate,
                        updated_at = NOW()
                      WHERE id = :movie_id');
            
            $stmt->bindValue(':movie_id', $movie_id, PDO::PARAM_STR);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':director', $director, PDO::PARAM_STR);
            $stmt->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
            $stmt->bindValue(':type', $type, PDO::PARAM_STR);
            $stmt->bindValue(':senarist', $senarist, PDO::PARAM_STR);
            $stmt->bindValue(':producer', $producer, PDO::PARAM_STR);
            $stmt->bindValue(':releasedate', $releasedate, PDO::PARAM_INT);
            $stmt->execute();
            $movie = $db->lastInsertId();

            return new Movie($movie, $user_id, $title, $director, $synopsis, $type, $senarist, $producer, $releasedate, new DateTime(), new DateTime());
        } catch (PDOException $e) {
            die('Erreur de requete : ' . $e->getMessage());
        }
    }

    static function getAllMovies()
    {
        require_once('models/db_connect.php');

        try {
            $db = connection();
            $stmt = $db->prepare('SELECT * FROM movies');

            $stmt->execute();
            $result = $stmt->fetchAll();
            
            return $result;
        } catch (PDOException $e) {
            die('Erreur de requete : ' . $e->getMessage());
        }
    }

    static function getUserMovies()
    {
        $user_id = $_SESSION['user_id'];

        require_once('models/db_connect.php');
        try {
            $db = connection();
            $stmt = $db->prepare('SELECT *
                    FROM movies
                    WHERE user_id = :id');

            $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);

            $stmt->execute();
            $result = $stmt->fetchAll();

            return $result;
        } catch (PDOException $e) {
            die('Erreur de requete : ' . $e->getMessage());
        }
    }

    static function getMovie($id)
    {
        require_once('models/db_connect.php');
        try {
            $db = connection();
            $stmt = $db->prepare('SELECT *
                    FROM movies
                    WHERE id = :id');

            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            $result = $stmt->fetch();

            return $result;
            // var_dump($result);
            // die;
        } catch (PDOException $e) {
            die('Erreur de requete : ' . $e->getMessage());
        }
    }
}
