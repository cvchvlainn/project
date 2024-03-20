<?php
    include './core.php';

    if(isset($_POST['post-description'])) {
        $date = date('Y-m-d H:i:s');
        $value = $_POST['value'];
        $description = $_POST['description'];

        if(empty($value)) {
            $value = 13;
        }

        if(!empty($description)) {
            $s = ("|\r\n|");
            $d = ("</p>\n<p>");
            $description = "<p>". preg_replace($s, $d, $description) ."</p>";
            $description = str_replace('<p></p>', '', $description);
        }

        if(empty($description)) {
            $description = '-';
        }

        mysqli_query($link, "INSERT INTO `posts` (`id`, `title`, `description`, `date`, `user_id`, `topic_id`) VALUES (NULL, '{$_POST['title-description']}', '$description', '$date', '{$_SESSION['user']['id']}', '$value')");
        header('Location: ../../create-post.php');
   }
?>