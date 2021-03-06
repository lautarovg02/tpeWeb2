<?php
class userModel{

    private $db;

    function __construct(){        
       $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_equipos;charset=utf8', 'root', '');
    }
    
    function getUser($email){
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    function registerUser($userEmail,$userPassword){

        $rol='user';

        $query=$this->db->prepare('INSERT INTO users (email,password,rol) VALUES (?,?,?)');
        $query->execute([$userEmail,$userPassword,$rol]);

        return $this->db->lastInsertId();
    }

}