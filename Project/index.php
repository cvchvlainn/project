<?php
   include './vendor/action/core.php';
   include './vendor/action/date.php';

   if(empty($_GET)) {
      $posts = mysqli_query($link, "SELECT `users`.*, `posts`.*
      FROM `posts` 
         LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
      WHERE `posts`.`status_id` = 2 ORDER BY `posts`.`date` DESC");
   } else if (!empty($_GET['search'])) {
      $posts = mysqli_query($link, "SELECT `users`.*, `posts`.*
      FROM `posts` 
         LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
      WHERE `posts`.`status_id` = 2 AND `title` LIKE '%{$_GET['search']}%' ORDER BY `posts`.`date` DESC");
   }  else if (!empty($_GET['sort'])) {
      if($_GET['sort'] == 'popular') {
         $posts = mysqli_query($link, "SELECT `users`.*, `posts`.*
         FROM `posts` 
            LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
         WHERE `posts`.`status_id` = 2 ORDER BY `posts`.`total_likes` DESC");
      } else if ($_GET['sort'] == 'date') {
         $posts = mysqli_query($link, "SELECT `users`.*, `posts`.*
         FROM `posts` 
            LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
         WHERE `posts`.`status_id` = 2 ORDER BY `posts`.`date` DESC");
      }
   } else {
      $posts = mysqli_query($link, "SELECT `users`.*, `posts`.*
      FROM `posts` 
         LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
      WHERE `posts`.`status_id` = 2 AND `posts`.`topic_id` = '{$_GET['id']}' ORDER BY `date` DESC");
   }

   include './vendor/components/header.php';
?>

   <main>
      <div class="main-alignment">

      <?php include './vendor/components/aside.php'; ?>

         <section class="posts-section">
            <div class="section-header">
               <div class="section-header-buttons">
                  <a href="./create-post.php">Добавить пост</a>
               </div>
               <div class="section-header-select">
                  <div class="section-select">Сортировать по<span></span></div>
                  <div class="section-select-options">
                     <a href="./index.php?sort=popular">Популярное</a>
                     <a href="./index.php?sort=date">Новое</a>
                  </div>
               </div>
            </div>
            <hr>
            <?php 
               if(mysqli_num_rows($posts) > 0) {
                  while ($post = mysqli_fetch_assoc($posts)) {
                     if(isset($_SESSION['user'])) {
                        $post_id = $post['id'];
                        $like = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `likes` WHERE `user_id` = '{$_SESSION['user']['id']}' AND `post_id` = '$post_id'"));
                     };
            ?>
            <a href="./post.php?post=<?php echo $post['id']; ?>" class="post">
               <div class="post-header">
                  <div class="post-community">
                     <img src="./assets/images/<?php if($post['avatar'] == '-') { echo "default-logo-community.jpg"; } else { echo $post['avatar']; } ?>" alt="Логотип сообщества">
                     <div><?php echo $post['login']; ?></div>
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

                  <div class="post-time-block">
                     <?php
                        $dateCreate = date_create($post['date']);
                        $dateNow = date_create(date('Y-m-d H:i:s'));
                        $interval = date_diff($dateCreate, $dateNow);
              
                        formatTime($interval);
                     ?>
                  </div>
               </div>
            </a>     
            <hr>
            <?php }} else { ?>
               <div class="null-posts">Нет постов</div>
            <?php } ?>
         </section>

         <section class="communities-section">
            <div class="fixed-communities">
               <div class="community-block">
                  <div class="popular">ПОПУЛЯРНЫЕ ПОЛЬЗОВАТЕЛИ</div>
                  <div class="communities">
                     <a href="#">
                        <img src="./assets/images/community-logo-1.jpg" alt="Логотип сообщества">
                        <div class="community-description">
                           <div>Пользователь #1</div>
                           <div>10.000.000 подписчиков</div>
                        </div>
                     </a>
                     <a href="#">
                        <img src="./assets/images/community-logo-2.png" alt="Логотип сообщества">
                        <div class="community-description">
                           <div>Пользователь #2</div>
                           <div>4.326.000 подписчиков</div>
                        </div>
                     </a>
                     <a href="#">
                        <img src="./assets/images/community-logo-3.png" alt="Логотип сообщества">
                        <div class="community-description">
                           <div>Пользователь #3</div>
                           <div>2.700.500 подписчиков</div>
                        </div>
                     </a>
                     <a href="#">
                        <img src="./assets/images/community-logo-4.jpg" alt="Логотип сообщества">
                        <div class="community-description">
                           <div>Пользователь #4</div>
                           <div>1.575.000 подписчиков</div>
                        </div>
                     </a>
                     <a href="#">
                        <img src="./assets/images/community-logo-5.png" alt="Логотип сообщества">
                        <div class="community-description">
                           <div>Пользователь #5</div>
                           <div>950.000 подписчиков</div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="social-block">
                  <div class="social">НАШИ СОЦСЕТИ</div>
                  <div class="social-buttons">
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
</html>