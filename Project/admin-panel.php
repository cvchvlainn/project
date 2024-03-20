<?php
   include './vendor/action/core.php';

   $posts = mysqli_query($link, "SELECT `users`.*, `posts`.*
   FROM `posts` 
      LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` 
   WHERE `status_id` = 1");

   if($_SESSION['user']['isAdmin'] != 1) {
      header('Location: ./index.php');
   }

   include './vendor/components/header.php'; 
?>

   <main>
      <div class="main-alignment" id="admin-pan">

      <?php include './vendor/components/aside.php'; ?>

         <section class="posts-section">
            <div class="section-header">
               <div class="section-header-buttons">
                  <div class="admin-title">Админ-панель</div>
               </div>
            </div>
            <hr>
            <div class="suggested-posts">Предложенные посты</div>

         <?php if(mysqli_num_rows($posts) > 0) { ?>
            <?php while ($post = mysqli_fetch_assoc($posts)) { ?>
            <a href="#" class="post">
               <div class="post-header">
                  <div class="post-community">
                     <img src="./assets/images/<?php if($post['avatar'] == '-') { echo "default-logo-community.jpg"; } else { echo $post['avatar']; } ?>" alt="Логотип сообщества">
                     <div><?php echo $post['login']; ?></div>
                  </div>
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
               <div class="post-buttons-and-time admin-buttons">
                  <form action="./vendor/action/accept-or-reject.php" method="POST">
                     <input type="hidden" name="post-id" value="<?php echo $post['id']; ?>">
                     <div class="accept">
                        <button name="accept">Принять</button>
                     </div>
                     <div class="reject">
                        <button name="reject">Отклонить</button>
                     </div>
                  </form>
               </div>
            </a>
            <hr>
            <?php }} else { ?>
               <div class="null-posts">Нет предложенных постов</div>
            <?php } ?>


         </section>

         <section class="communities-section" id="admin-panel-mobile">
            <div class="fixed-communities">
               <div class="community-block">
                  <div class="popular">ДОБАВЛЕНИЕ ТЕМЫ</div>
                  <div class="communities">
                     <form action="./vendor/action/add-topic.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="topic" class="name-topic" placeholder="Название темы" pattern="^[А-Яа-яЁё\s]+$" required>

	                     <label class="input-file">
	   	                  <span class="input-file-text"></span>
	   	                  <input type="file" name="file" required hidden>        
 	   	                  <span class="input-file-btn">Выберите файл</span>
 	                     </label>

                        <button name="addTopic">Добавить</button>
                     </form>
                  </div>
               </div>

               <div class="community-block">
                  <div class="popular">УДАЛЕНИЕ ТЕМЫ</div>
                  <div class="communities scroll-topics">

                  <?php 
                     $topicsDelete = mysqli_query($link, "SELECT * FROM `topics`");
                     while($topicDelete = mysqli_fetch_assoc($topicsDelete)) {
                  ?>
                     <form action="./vendor/action/del-topic.php" method="POST" class="DT">
                        <input type="hidden" name="delete_id" value="<?php echo $topicDelete['id']; ?>">
                     <div class="topic-delete">
                        <div class="topic-del" id="topic-del-admin">
                           <img src="./assets/images/<?php echo $topicDelete['img']; ?>" alt="<?php echo $topicDelete['topic']; ?>">
                           <span><?php echo $topicDelete['topic']; ?></span>
                        </div>
                        <button name="delTopic" class="del-button" id="del-button-admin">Удалить</button>
                     </div>
                     </form>
                  <?php } ?>

                  </div>
               </div>

            </div>
         </section>

      </div>
   </main>
</body>
<script src="./assets/scripts/jq-script.js"></script>
</html>