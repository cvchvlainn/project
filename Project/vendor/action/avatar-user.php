<?php
   include './core.php';

   if(isset($_FILES['avatar-user'])) {
      $upload_dir = '../../assets/images/';
      $name_img = uniqid().'.'.substr($_FILES['avatar-user']['type'], 6);
      $upload_file = $upload_dir . $name_img;

      if('image' == substr($_FILES['avatar-user']['type'], 0, 5)) {
         move_uploaded_file($_FILES['avatar-user']['tmp_name'], $upload_file);

         mysqli_query($link, "UPDATE `users` SET `avatar` = '$name_img' WHERE `id` = '{$_SESSION['user']['id']}'");
      }
     header("Location: ../../user-profile.php?id=" . "{$_SESSION['user']['id']}");
   }
?>