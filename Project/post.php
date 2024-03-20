<?php
   include './vendor/action/core.php';
   include './vendor/action/date.php';

   if(!empty($_GET['post'])) {
      $posts = mysqli_query($link, "SELECT `users`.*, `posts`.*
      FROM `posts` 
         LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
      WHERE `posts`.`status_id` = 2 AND `posts`.`id` = '{$_GET['post']}' ORDER BY `posts`.`date` DESC");
   } else if (!empty($_GET['search'])) {
      $posts = mysqli_query($link, "SELECT `users`.*, `posts`.*
      FROM `posts` 
         LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
      WHERE `posts`.`status_id` = 2 AND `title` LIKE '%{$_GET['search']}%' ORDER BY `posts`.`date` DESC");
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
            </div>
            <hr>
            <?php 
               if(mysqli_num_rows($posts) > 0) {
                  while ($post = mysqli_fetch_assoc($posts)) {
                     $post_id = $post['id'];
                     if(isset($_SESSION['user'])) {
                        $like = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `likes` WHERE `user_id` = '{$_SESSION['user']['id']}' AND `post_id` = '$post_id'"));
                     };
                     $comment = mysqli_query($link, "SELECT `users`.*, `comments`.*
                     FROM `comments` 
                        LEFT JOIN `users` ON `comments`.`user_id` = `users`.`id`
                     WHERE `comments`.`post_id` = '$post_id'");
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

            <!-- comments -->
            <div class="block-comments">
               <?php if(isset($_SESSION['user'])) { ?>
               <form action="./vendor/action/comments.php?post=<?php echo $_GET['post']; ?>" method="POST" class="add-comment">
                  <input type="text" name="comment-description" placeholder="Ваш комментарий" pattern="^[A-Za-zА-Яа-яЁё0-9\s.,@$%!?]+$" required>
                  <button name="add-comment">Отправить</button>
               </form>
               <?php } ?>

               <div class="comments">
                  <?php while ($res = mysqli_fetch_assoc($comment)) { ?>
                  <div class="user-comment">
                     <div class="img-comment"><img src="./assets/images/<?php if($res['avatar'] == '-') { echo "default-logo-community.jpg"; } else { echo $res['avatar']; } ?>" alt="Аватар"></div>
                     <div class="commentaries">
                        <div class="comment-nickname"><?php echo $res['login']; ?></div>
                        <div class="comment-description"><?php echo $res['comment']; ?></div>
                        <div class="comment-date"><?php echo $res['date']; ?></div>
                     </div>
                  </div>
                  <hr>
                  <?php } ?>

               </div>

            </div>
            <!-- comments -->

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