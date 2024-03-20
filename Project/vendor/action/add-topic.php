<?php
   include './core.php';

   if(isset($_POST['addTopic'])) {
      $upload_dir = '../../assets/images/';
      $name_img = uniqid().'.'.substr($_FILES['file']['type'], 6);
      $upload_file = $upload_dir . $name_img;

      if('image' == substr($_FILES['file']['type'], 0, 5)) {
         move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);

         mysqli_query($link, "INSERT INTO `topics` (`id`, `topic`, `img`) VALUES (NULL, '{$_POST['topic']}', '$name_img')");
      }
      header('Location: ../../admin-panel.php');
   }
?>