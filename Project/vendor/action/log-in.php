<?php
    include './core.php';

    if(isset($_POST['authorization'])) {
        $password = md5($_POST['password']);
        $result = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '{$_POST['login']}' AND `password` = '$password'");

        if(mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'isAdmin' => $user['isAdmin'],
                'login' => $user['login'],
            ];
        }
        header('Location: ../../index.php');
    }
?>