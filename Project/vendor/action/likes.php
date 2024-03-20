<?php
include './core.php';

if (isset($_POST) && isset($_SESSION['user'])) {
  $postId = $_POST['hidden-id'];

  try {
    $existingLike = mysqli_query($link, "SELECT * FROM `likes` WHERE `user_id` = '{$_SESSION['user']['id']}' AND `post_id` = '$postId'");

    if (mysqli_num_rows($existingLike) <= 0) {
      mysqli_query($link, "INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES (NULL, '{$_SESSION['user']['id']}', '$postId')");
      mysqli_query($link, "UPDATE `posts` SET `total_likes` = `total_likes` + 1 WHERE `id` = '$postId'");
    } else {
      mysqli_query($link, "DELETE FROM `likes` WHERE `user_id` = '{$_SESSION['user']['id']}' AND `post_id` = '$postId'");
      mysqli_query($link, "UPDATE `posts` SET `total_likes` = `total_likes` - 1 WHERE `id` = '$postId'");
    }

    $updatedLikes = mysqli_query($link, "SELECT `total_likes` FROM `posts` WHERE `id` = '$postId'") -> fetch_assoc()['total_likes'];
    echo $updatedLikes;
  } catch (Exception $e) {
    echo 'При обработке вашего запроса произошла ошибка';
  }
}
?>