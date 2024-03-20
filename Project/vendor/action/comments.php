<?php
   include './core.php';

   if(isset($_POST['add-comment'])) {
      $date = date('Y-m-d');

      mysqli_query($link, "INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `date`) VALUES (NULL, '{$_SESSION['user']['id']}', '{$_GET['post']}', '{$_POST['comment-description']}', '$date')");
      mysqli_query($link, "UPDATE `posts` SET `total_comments` = `total_comments` + 1 WHERE `id` = '{$_GET['post']}'");
      header("Location: ../../post.php?post=" . "{$_GET['post']}");
   }
?>