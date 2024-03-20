<?php include './vendor/action/core.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./assets/styles/style.css">
   <script src="./assets/scripts/jquery-3.7.1.min.js"></script>
   <script src="./assets/scripts/script.js" defer></script>
   <title>Datacube</title>
</head>
<body>
   <header>
      <div class="header-alignment">
         <div class="header-left-block">
            <a href="#" class="open-aside-menu">
               <span></span>
               <span></span>
               <span></span>
            </a>
            <a href="./index.php" >
               <img src="./assets/images/logo.png" alt="Логотип">
               <div>datacube</div>
            </a>
         </div>
         <div class="header-center-block">
            <div class="search">
               <form action="./vendor/action/search.php"><input type="text" name="search" placeholder="Поиск" required></form>
               <img src="./assets/images/search.png" alt="Поиск">
            </div>
         </div>
         <div class="header-right-block">
            <?php if(isset($_SESSION['user'])) { ?>
               <a href="./user-profile.php?id=<?php echo $_SESSION['user']['id']; ?>" class="user-login"><?php echo $_SESSION['user']['login']; ?></a>
            <?php } else { ?>
               <a href="#" class="login auth-and-reg">Войти</a>
            <?php } ?>
            <a href="#" class="burger-menu-button">
               <div>
                  <span></span>
                  <span></span>
               </div>
               <div>
                  <span></span>
                  <span></span>
               </div>
            </a>
            <div class="burger-menu">
               <?php if(isset($_SESSION['user'])) { ?>
                  <form action="./vendor/action/log-out.php" method="POST" class="user-log-out">
                     <button name="log-out">Выход</button>
                  </form>
                  <?php if($_SESSION['user']['isAdmin'] == 1) { ?>
                     <a href="./admin-panel.php">Админ-панель</a>
                  <?php } ?>
               <?php } else { ?>
                  <a href="#" class="auth-and-reg">Авторизация / Регистрация</a>
               <?php } ?>
               <a href="#">Реклама</a>
            </div>
         </div>
      </div>
   </header>

   <?php include './vendor/components/modal-user.php'; ?>