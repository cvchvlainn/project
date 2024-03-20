<?php
    include './core.php';

    if(isset($_POST['post-img'])) {
        $date = date('Y-m-d H:i:s');
        $value = $_POST['value'];
        $upload_dir = '../../assets/images/';
        $name_img = uniqid().'.'.substr($_FILES['file']['type'], 6);
        $upload_file = $upload_dir . $name_img;

        if(empty($value)) {
            $value = 13;
        }

        if('image' == substr($_FILES['file']['type'], 0, 5)) {
            move_uploaded_file($_FILES['file']['tmp_name'], $upload_file);

            mysqli_query($link, "INSERT INTO `posts` (`id`, `title`, `img`, `date`, `user_id`, `topic_id`) VALUES (NULL, '{$_POST['title-img']}', '$name_img', '$date', '{$_SESSION['user']['id']}', '$value')");
        }
        header('Location: ../../create-post.php');
    }
?>