<?php
   include './vendor/action/core.php';

   $posts = mysqli_query($link, "SELECT `likes`.*, `users`.*, `posts`.*
   FROM `posts` 
      LEFT JOIN `likes` ON `likes`.`post_id` = `posts`.`id` 
      LEFT JOIN `users` ON `likes`.`user_id` = `users`.`id`
   WHERE `likes`.`user_id` = '{$_SESSION['user']['id']}' ORDER BY `likes`.`id` DESC");

   $user_info = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '{$_SESSION['user']['id']}'"));

   if(!$_SESSION['user']) {
      header('Location: ./index.php');
   }

   if($_GET['id'] != $_SESSION['user']['id']) {
      header("Location: ./user-profile.php?id=" . "{$_SESSION['user']['id']}");
   }

   include './vendor/components/header.php';
?>

   <main>
      <div class="main-alignment" id="user-profile-div">

      <?php include './vendor/components/aside.php'; ?>

         <section class="posts-section">
         <div class="section-header">
               <div class="section-header-buttons">
                  <div class="admin-title">Лайкнутые посты</div>
               </div>
            </div>
            <hr>
            <?php 
               if(mysqli_num_rows($posts) > 0) {
                  while ($post = mysqli_fetch_assoc($posts)) {
                     if(isset($_SESSION['user'])) {
                        $post_id = $post['id'];
                        $like = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `likes` WHERE `user_id` = '{$_SESSION['user']['id']}' AND `post_id` = '$post_id'"));
                        $post_info = mysqli_fetch_assoc(mysqli_query($link, "SELECT `users`.*, `posts`.*
                        FROM `posts` 
                           LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id`
                        WHERE `posts`.`id` = '$post_id'"));
                     };
            ?>
            <a href="#" class="post">
               <div class="post-header">
                  <div class="post-community">
                     <img src="./assets/images/<?php if($post_info['avatar'] == '-') { echo "default-logo-community.jpg"; } else { echo $post_info['avatar']; } ?>" alt="Логотип сообщества">
                     <div><?php echo $post_info['login']; ?></div>
                  </div>
                  <button>Подписаться</button>
               </div>
               <div class="post-name"><?php echo $post['title']; ?></div>
               <?php if($post['description'] != '-') { ?>
               <div class="post-description">
                  <?php echo $post['description']; ?>
               </div>
               <?php } ?>
               <?php if($post['img'] != '-') { ?>
               <div class="slot">
                  <img src="./assets/images/<?php echo $post['img']; ?>" class="background-slot" alt="Фон поста">
                     <div class="slot-img">
                        <img src="./assets/images/<?php echo $post['img']; ?>" alt="Изображение поста">
                     </div>
               </div>
               <?php } ?>
               <div class="post-buttons-and-time">

               <!--  -->
                  <div class="post-buttons-block">
                     <div class="likes-and-dislikes-block">
                        <form class="async-form">
                           <input type="hidden" name="hidden-id" value="<?php echo $post['id']; ?>">
                           <button class="like" name="like">
                              <img src="./assets/images/<?php if(empty($like)) { echo 'like-dislike.png'; } else { echo 'like-active.png '; } ?>" <?php if(!empty($like)) { echo 'class="active-like"'; } ?> alt="Лайк">
                              <span><?php echo $post['total_likes']; ?></span>
                           </button>
                        </form>
                     </div>
                     <div class="comments-block">
                        <div class="comment"><img src="./assets/images/comment.png" alt="Комментарий"><span><?php echo $post['total_comments']; ?></span></div>
                     </div>
                     <div class="share-block">
                        <div class="share"><img src="./assets/images/share.png" alt="Поделиться"><span>Поделиться</span></div>
                     </div>
                  </div>
               <!--  -->
               </div>
            </a>     
            <hr>
            <?php }} else { ?>
               <div class="null-posts">Нет лайкнутых постов</div>
            <?php } ?>
         </section>

         <section class="communities-section" id="user-profile-main">
            <div class="fixed-communities">
               <div class="community-block" id="profile">

                  <div class="profile-img">
                     <label class="block-profile">
                        <form id="avatar-form" action="./vendor/action/avatar-user.php" method="POST" enctype="multipart/form-data">
                           <img src="./assets/images/<?php if($user_info['avatar'] == '-') { echo "default-logo-community.jpg"; } else { echo $user_info['avatar']; } ?>" alt="Аватар">
                           <input type="file" id="avatar-file" name="avatar-user" class="avatar-user" hidden>
                        </form>
                     </label>
                  </div>

                  <div class="profile-info">
                     <div class="nickname"><?php echo $user_info['login']; ?></div>
                     <div class="registration-date">Дата регистрации: <?php echo $user_info['registration_date']; ?></div>
                     <a href="./create-post.php">Добавить пост</a>
                  </div>

               </div>

               <div class="social-block">
                  <div class="social">НАШИ СОЦСЕТИ</div>
                  <div class="social-buttons" id="profile-social">
                     <a href="#" class="vk"><img src="./assets/images/VK-white.png" alt="ВКонтакте"></a>
                     <a href="#" class="tg"><img src="./assets/images/TG-white.png" alt="Телеграм"></a>
                     <a href="#" class="yt"><img src="./assets/images/YT-white.png" alt="Ютуб"></a>
                  </div>
               </div>
            </div>
         </section>

      </div>
   </main>
</body>
<script src="./assets/scripts/jq-script.js"></script>
</html>