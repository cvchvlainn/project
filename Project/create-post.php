<?php
   include './vendor/action/core.php';

   $topicsOne = mysqli_query($link, "SELECT * FROM `topics`");
   $topicsTwo = mysqli_query($link, "SELECT * FROM `topics`");

   if(!$_SESSION['user']) {
      header('Location: ./index.php');
   }

   include './vendor/components/header.php';
?>

   <main>
      <div class="main-alignment">

      <?php include './vendor/components/aside.php'; ?>

         <section class="posts-section">
         <form action="./vendor/action/add-post-description.php" method="POST" id="post-1">
            <div class="section-header">
               <div class="section-header-buttons">
                  <div class="admin-title">Добавление поста</div>
               </div>
            </div>
            <hr>
      <div class="select-and-note">
         <div class="custom-select">
            <div class="community-choice" data-select="1">
               <div class="img-and-name-community">
                  <div class="name-placeholder" data-select="1">Выберите тему</div>
               </div>
               <span class="arrow-community"></span>
            </div>
            <div class="topics-select" data-select="1">
               <input type="hidden" class="selected-value" data-select="1" name="value">
               <?php while ($topic = mysqli_fetch_assoc($topicsOne)) { ?>
                  <div class="topics-option" data-value="<?php echo $topic['id']; ?>"><?php echo $topic['topic']; ?></div>
               <?php } ?>
            </div>
         </div>
         <div class="note">
            <img src="./assets/images/note.png" alt="Примечание" class="note-img" data-select="1">
            <div class="note-div">
               Если вы не выбрали тему, то ваш пост автоматически попадает в категорию <span>"Другое"</span>
            </div>
         </div>
      </div>
            <div class="block-create-post">
               <div class="header-create-post">
                  <div class="standart-post post-btn-active">
                     <img src="./assets/images/post.png" alt="Стандартный пост">
                     Пост
                  </div>
                  <div class="image-post">
                     <img src="./assets/images/image.png" alt="Пост с изображением">
                     Изображение
                  </div>
               </div>
               <div class="main-create-post">
                     <input type="text" name="title-description" placeholder="Заголовок поста" pattern="^[A-Za-zА-Яа-яЁё0-9\s.,@$%!?]+$" required>
                     <textarea name="description" cols="30" rows="10" placeholder="Ваш текст (необязательно)"></textarea>
                     <div class="main-create-post-buttons">
                        <a href="./index.php">Отмена</a> 
                        <button name="post-description">Создать</button>
                     </div>
               </div>
            </div>
            </form>

            <form action="./vendor/action/add-post-img.php" method="POST" id="post-2" enctype="multipart/form-data">
            <div class="section-header">
               <div class="section-header-buttons">
                  <div class="admin-title">Добавление поста</div>
               </div>
            </div>
            <hr>
      <div class="select-and-note">
         <div class="custom-select">
            <div class="community-choice" data-select="2">
               <div class="img-and-name-community">
                  <div class="name-placeholder" data-select="2">Выберите тему</div>
               </div>
               <span class="arrow-community"></span>
            </div>
            <div class="topics-select" data-select="2">
               <input type="hidden" class="selected-value" data-select="2" name="value">
               <?php while ($topic = mysqli_fetch_assoc($topicsTwo)) { ?>
                  <div class="topics-option" data-value="<?php echo $topic['id']; ?>"><?php echo $topic['topic']; ?></div>
               <?php } ?>
            </div>
         </div>
         <div class="note">
            <img src="./assets/images/note.png" alt="Примечание" class="note-img" data-select="2">
            <div class="note-div">
               Если вы не выбрали тему, то ваш пост автоматически попадает в категорию <span>"Другое"</span>
            </div>
         </div>
      </div>
            <div class="block-create-post">
               <div class="header-create-post">
                  <div class="standart-post">
                     <img src="./assets/images/post.png" alt="Стандартный пост">
                     Пост
                  </div>
                  <div class="image-post post-btn-active">
                     <img src="./assets/images/image.png" alt="Пост с изображением">
                     Изображение
                  </div>
               </div>
               <div class="main-create-post">
                     <input type="text" name="title-img" placeholder="Заголовок поста" pattern="^[A-Za-zА-Яа-яЁё0-9\s.,@$%!?]+$" required>
                        <label class="input-file file-margin">
	   	                  <span class="input-file-text"></span>
	   	                  <input type="file" name="file" id="main-input-file" required hidden>        
 	   	                  <span class="input-file-btn">Выберите файл</span>
 	                     </label>
                        <div class="preview">
                           <span>Загрузите изображение для предпросмотра</span>
                           <img id="conclusion">
                        </div>
                     <div class="main-create-post-buttons">
                        <a href="./index.php">Отмена</a> 
                        <button name="post-img">Создать</button>
                     </div>
               </div>
            </div>
            </form>
         </section>

         <section class="communities-section">
            <div class="fixed-communities">
               <div class="community-block">
                  <div class="popular publication"><img src="./assets/images/dangerous.png" class="danger" alt="Восклицательный знак">ПУБЛИКАЦИЯ НА DATACUBE</div>
                  <div class="communities">
                     <ol class="rules">
                        <li>Помните о человеке</li>
                        <li>Веди себя так, как вел(-а) бы себя в реальной жизни</li>
                        <li>Ищите первоисточник контента</li>
                        <li>Ищите дубликаты перед публикацией</li>
                        <li>Читайте правила сообщества</li>
                     </ol>
                  </div>
               </div>
            </div>
         </section>

      </div>
   </main>
</body>
<script src="./assets/scripts/jq-script.js"></script>
</html>