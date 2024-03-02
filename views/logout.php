<?php
session_start();
if (isset($_SESSION['email']))
{
    session_unset();
    session_destroy();
    header('location: ../Views/index.php');
}else
{
    header('location: ../Views/index.php');
}


