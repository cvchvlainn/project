<?php
   include './core.php';

   if(isset($_POST['delTopic'])) {
      $delete_id = $_POST['delete_id'];
      mysqli_query($link, "DELETE FROM `topics` WHERE `id` = '$delete_id'");
      header('Location: ../../admin-panel.php');
   }
?>