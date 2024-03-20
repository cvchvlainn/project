<?php
   include './core.php';

   if(isset($_POST['accept'])) {
      $id = $_POST['post-id'];

      mysqli_query($link, "UPDATE `posts` SET `status_id` = 2 WHERE `id` = '$id'");
      header('Location: ../../admin-panel.php');
   }

   if(isset($_POST['reject'])) {
      $id = $_POST['post-id'];

      mysqli_query($link, "UPDATE `posts` SET `status_id` = 3 WHERE `id` = '$id'");
      header('Location: ../../admin-panel.php');
   }
?>