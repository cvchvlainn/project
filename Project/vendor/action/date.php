<?php
   function pluralForm($number, $one, $two, $five) {
      $number = abs($number) % 100;
      $ten = $number % 10;
      if ($number > 10 && $number < 20) {
         return $five;
      }
      if ($ten === 1) {
         return $one;
      }
      if ($ten >= 2 && $ten <= 4) {
         return $two;
      }
      return $five;
  }

   function formatTime($interval) {
      if ($interval -> y >= 1) {
         echo $interval -> y . ' ' . pluralForm($interval -> y, 'год', 'года', 'лет') . ' назад';
      } elseif ($interval -> m >= 1) {
         echo $interval -> m . ' ' . pluralForm($interval -> m, 'месяц', 'месяца', 'месяцев') . ' назад';
      } elseif ($interval -> days >= 1) {
         echo $interval -> days . ' ' . pluralForm($interval -> days, 'день', 'дня', 'дней') . ' назад';
      } elseif ($interval -> h >= 1) {
         echo $interval -> h . ' ' . pluralForm($interval -> h, 'час', 'часа', 'часов') . ' назад';
      } elseif ($interval -> i >= 1) {
         echo $interval -> i . ' ' . pluralForm($interval -> i, 'минуту', 'минуты', 'минут') . ' назад';
      } else {
         echo 'менее минуты назад';
      }
   }
?>