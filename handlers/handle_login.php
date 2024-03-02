<?php

session_start();
include "../database/User.php";

if(isset($_POST['submit']))
{
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);

    if(empty($email) or empty($password))
    {
        $_SESSION['errors']='Please fill all fields';
    }else
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $data=[
                'email'=>$email,
                'password'=>$password,
            ];
            //Instantiate DB and connect
            $database=new Database();
            $db= $database->connect();

            //Instantiate user
            $user=new User($db);
            if($row=$user->login($email,$password))
            {
                $_SESSION['email']=$row['email'];
                header('location:../views/home.php');
            }else{
                $_SESSION['errors']='Email or Password not valid';
            }

        }else{
            $_SESSION['errors']='Please enter valid email';
        }

    }
    header('refresh:1; ../views/login.php');
}
