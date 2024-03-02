<?php


       session_start();
        include "../database/User.php";
        if(isset($_POST['submit']))
        {
            $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
            $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            if(empty($name) or empty($email) or empty($password))
            {
                $_SESSION['errors']='Please fill all fields';
            }else
            {
                if(filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                    if(strlen($password) >8)
                    {
//                        $password=sha1($password);
                        $data=[
                            'name'=>$name,
                            'email'=>$email,
                            'password'=>$password
                        ];
                        //Instantiate DB and connect
                        $database=new Database();
                        $db= $database->connect();

                        //Instantiate user
                        $user=new User($db);
                        $user->register($data);
                        $_SESSION['success']='User Register successfully';

                    }else
                    {
                        $_SESSION['errors']='password must be more than 8 chars';
                    }

                }else
                {
                    $_SESSION['errors']='please enter valid email';
                }
            }
            header('refresh:1; ../views/register.php');

        }






