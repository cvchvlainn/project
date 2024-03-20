<?php
    include './core.php';

    if(isset($_POST['registration'])) {
        $date = date('Y-m-d');
        $password = md5($_POST['password']);
        
        mysqli_query($link, "INSERT INTO `users` (`id`, `login`, `password`, `email`, `registration_date`) VALUES (NULL, '{$_POST['login']}', '$password', '{$_POST['email']}', '$date')");
        header('Location: ../../index.php');
    }
?>