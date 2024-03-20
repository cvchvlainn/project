<?php
   include './core.php';

   if(isset($_GET['search'])){
      $data = $_GET['search'];
      header("Location: ../../index.php?search=" . $data);
   }
?>