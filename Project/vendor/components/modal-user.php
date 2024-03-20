<div class="modal-shadow">
      <div class="modal">
         <div class="modal-header">
            <div class="close">
               <div class="close-left"></div>
               <div class="close-right"></div>
            </div>
         </div>
         <div class="modal-content">
            <form action="./vendor/action/log-in.php" method="POST" class="log-in">
               <div class="modal-container">
                  <div class="sub-container">
                     <div class="modal-name">Авторизация</div>
                     <input type="text" name="login" placeholder="Логин" required>
                     <input type="password" name="password" placeholder="Пароль" required>
                     <div class="or">или продолжите с помощью</div>
                     <div class="modal-social ms-vk"><img src="./assets/images/VK-white.png" alt="ВКонтакте"></div>
                     <div class="modal-social ms-email"><img src="./assets/images/google.png" alt="Гугл"></div>
                  </div>
                  <div class="sub-container">
                     <div class="show-sign-up">Впервые на Datacube? <span>Регистрация</span></div>
                     <button name="authorization">Авторизоваться</button>
                  </div>
               </div>
            </form>
            <form action="./vendor/action/sign-up.php" method="POST" class="sign-up">
               <div class="modal-container">
                  <div class="sub-container">
                     <div class="modal-name">Регистрация</div>
                     <input type="text" name="login" placeholder="Логин" required>
                     <input type="password" name="password" placeholder="Пароль" required>
                     <input type="email" name="email" placeholder="E-mail" required>
                     <div class="or">или продолжите с помощью</div>
                     <div class="modal-social ms-vk"><img src="./assets/images/VK-white.png" alt="ВКонтакте"></div>
                     <div class="modal-social ms-email"><img src="./assets/images/google.png" alt="Гугл"></div>
                  </div>
                  <div class="sub-container">
                     <div class="show-log-in">Уже есть аккаунт на Datacube? <span>Авторизация</span></div>
                     <button name="registration">Зарегестрироваться</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>