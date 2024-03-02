<?php
include "../database/Database.php";
class User
{
    protected $conn;
    private $table='users';

    public function __construct($db)
    {
        $this->conn=$db;
    }
    public function register($data)
    {
        //Create query
        $query='INSERT INTO '.$this->table.' (name , email , password) VALUES (:name,:email,:password)';
        try {
            //Statement prepare
            $statement=$this->conn->prepare($query);

            //Execute query
            if($statement->execute($data))
            {
                return true;
            }else{
                return false;
            }

        }catch (PDOException $e)
        {
            die('error in register '.$e->getMessage());
        }
    }
    public function login($email,$password)
    {
        //Create query
        $query=$query = "SELECT * FROM users WHERE email = :email AND password = :password";
        try {
            //statement prepare
            $statement=$this->conn->prepare($query);

            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);

            $statement->execute();
            $row=$statement->fetch(PDO::FETCH_ASSOC);
            if($row)
            {
                return $row;
            }else
            {
                return false;
            }

        }catch (PDOException $e)
        {
            die('error in login '.$e->getMessage());
        }
    }


}