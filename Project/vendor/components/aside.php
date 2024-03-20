<?php
   // LAPTOP
   $topicsOneLaptop = mysqli_query($link, "SELECT * FROM `topics` WHERE `id` < 6");
   $topicsTwoLaptop = mysqli_query($link, "SELECT * FROM `topics` WHERE `id` > 5");

   // MOBILE
   $topicsOneMobile = mysqli_query($link, "SELECT * FROM `topics` WHERE `id` < 6");
   $topicsTwoMobile = mysqli_query($link, "SELECT * FROM `topics` WHERE `id` > 5");
?>
         
         <aside>
            <div>
               <div class="aside-block">
                  <a href="#" class="active"><img src="./assets/images/home-white.png" alt="Главная">Главная</a>
                  <a href="#"><img src="./assets/images/popular-white.png" alt="Популярное">Популярное</a>
               </div>
               <hr>
               <div class="aside-block">
                  <div class="open-main-list" data-id="1">ПОСЛЕДНЕЕ<span data-id="1"></span></div>
                  <div class="main-list-block" data-id="1">
                     <div class="main-list-height" data-id="1">
                        <a href="#"><img src="" alt="">ТЕСТ</a>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="aside-block">
                  <div class="open-main-list" data-id="2">ТЕМЫ<span data-id="2"></span></div>
                  <div class="main-list-block" data-id="2">
                     <div class="main-list-height" data-id="2">
                     <?php while($topicOneLaptop = mysqli_fetch_assoc($topicsOneLaptop)) { ?>
                        <a href="./index.php?id=<?php echo $topicOneLaptop['id']; ?>"><img src="./assets/images/<?php echo $topicOneLaptop['img']; ?>" alt="<?php echo $topicOneLaptop['topic']; ?>"><?php echo $topicOneLaptop['topic']; ?></a>
                     <?php } ?>
                        <span><a href="#" class="more-button" data-id="2">Показать больше</a></span>
                     </div>
                     <div class="hidden-list-block" data-id="2">
                        <div class="hidden-list-height" data-id="2">
                        <?php while($topicTwoLaptop = mysqli_fetch_assoc($topicsTwoLaptop)) { ?>
                           <a href="./index.php?id=<?php echo $topicTwoLaptop['id']; ?>"><img src="./assets/images/<?php echo $topicTwoLaptop['img']; ?>" alt="<?php echo $topicTwoLaptop['topic']; ?>"><?php echo $topicTwoLaptop['topic']; ?></a>
                        <?php } ?>
                           <span><a href="#" class="smaller-button" data-id="2">Показать меньше</a></span>
                        </div>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="aside-block">
                  <div class="open-main-list" data-id="3">ПРОЧЕЕ<span data-id="3"></span></div>
                  <div class="main-list-block" data-id="3">
                     <div class="main-list-height" data-id="3">
                        <a href="#"><img src="./assets/images/about-white.png" alt="О нас">О нас</a>
                        <a href="#"><img src="./assets/images/advertise-white.png" alt="Реклама">Реклама</a>
                        <a href="#"><img src="./assets/images/help-white.png" alt="Помощь">Помощь</a>
                        <a href="#"><img src="./assets/images/community-white.png" alt="Сообщества">Сообщества</a>
                        <a href="#"><img src="./assets/images/article-white.png" alt="Статьи">Статьи</a>
                        <span><a href="#" class="more-button" data-id="3">Показать больше</a></span>
                     </div>
                     <div class="hidden-list-block" data-id="3">
                        <div class="hidden-list-height" data-id="3">
                           <a href="#"><img src="./assets/images/career.png" alt="Карьера">Карьера</a>
                           <a href="#"><img src="./assets/images/blog.png" alt="Блог">Блог</a>
                           <span><a href="#" class="smaller-button" data-id="3">Показать меньше</a></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer">
               <span>Forum created by Gascoighne.</span>
               <span>&#169; 2023. All rights reserved.</span>
            </div>
         </aside>

         <aside class="aside-hidden">
            <div>
               <div class="aside-block">
                  <a href="#" class="active"><img src="./assets/images/home-white.png" alt="Главная">Главная</a>
                  <a href="#"><img src="./assets/images/popular-white.png" alt="Популярное">Популярное</a>
               </div>
               <hr>
               <div class="aside-block">
                  <div class="open-main-list" data-id="4">ПОСЛЕДНЕЕ<span data-id="4"></span></div>
                  <div class="main-list-block" data-id="4">
                     <div class="main-list-height" data-id="4">
                        <a href="#"><img src="" alt="">ТЕСТ</a>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="aside-block">
                  <div class="open-main-list" data-id="5">ТЕМЫ<span data-id="5"></span></div>
                  <div class="main-list-block" data-id="5">
                     <div class="main-list-height" data-id="5">
                        <?php while($topicOneMobile = mysqli_fetch_assoc($topicsOneMobile)) { ?>
                           <a href="./index.php?id=<?php echo $topicOneMobile['id']; ?>"><img src="./assets/images/<?php echo $topicOneMobile['img']; ?>" alt="<?php echo $topicOneMobile['topic']; ?>"><?php echo $topicOneMobile['topic']; ?></a>
                        <?php } ?>
                        <span><a href="#" class="more-button" data-id="5">Показать больше</a></span>
                     </div>
                     <div class="hidden-list-block" data-id="5">
                        <div class="hidden-list-height" data-id="5">
                           <?php while($topicTwoMobile = mysqli_fetch_assoc($topicsTwoMobile)) { ?>
                              <a href="./index.php?id=<?php echo $topicTwoMobile['id']; ?>"><img src="./assets/images/<?php echo $topicTwoMobile['img']; ?>" alt="<?php echo $topicTwoMobile['topic']; ?>"><?php echo $topicTwoMobile['topic']; ?></a>
                           <?php } ?>
                           <span><a href="#" class="smaller-button" data-id="5">Показать меньше</a></span>
                        </div>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="aside-block">
                  <div class="open-main-list" data-id="6">ПРОЧЕЕ<span data-id="6"></span></div>
                  <div class="main-list-block" data-id="6">
                     <div class="main-list-height" data-id="6">
                        <a href="#"><img src="./assets/images/about-white.png" alt="О нас">О нас</a>
                        <a href="#"><img src="./assets/images/advertise-white.png" alt="Реклама">Реклама</a>
                        <a href="#"><img src="./assets/images/help-white.png" alt="Помощь">Помощь</a>
                        <a href="#"><img src="./assets/images/community-white.png" alt="Сообщества">Сообщества</a>
                        <a href="#"><img src="./assets/images/article-white.png" alt="Статьи">Статьи</a>
                        <span><a href="#" class="more-button" data-id="6">Показать больше</a></span>
                     </div>
                     <div class="hidden-list-block" data-id="6">
                        <div class="hidden-list-height" data-id="6">
                           <a href="#"><img src="./assets/images/career.png" alt="Карьера">Карьера</a>
                           <a href="#"><img src="./assets/images/blog.png" alt="Блог">Блог</a>
                           <span><a href="#" class="smaller-button" data-id="6">Показать меньше</a></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer">
               <span>Forum created by Gascoighne.</span>
               <span>&#169; 2023. All rights reserved.</span>
            </div>
         </aside>