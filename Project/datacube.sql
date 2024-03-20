-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 22 2024 г., 12:35
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `datacube`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `comment` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `date`) VALUES
(1, 2, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2023-12-08'),
(2, 1, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Egestas quis ipsum suspendisse ultrices gravida dictum. Fames ac turpis egestas integer eget aliquet nibh. Tristique nulla aliquet enim tortor at auctor urna nunc.', '2023-12-08'),
(3, 3, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec et odio pellentesque diam volutpat commodo.', '2023-12-08'),
(4, 3, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas sed tempus urna et pharetra pharetra. Nisl suscipit adipiscing bibendum est ultricies. Pellentesque elit eget gravida cum sociis natoque penatibus et. Ac turpis egestas integer eget aliquet nibh praesent tristique. Sed libero enim sed faucibus turpis in eu mi bibendum.', '2023-12-08'),
(5, 4, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Donec et odio pellentesque diam volutpat commodo.', '2023-12-08');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(4, 2, 2),
(3, 2, 4),
(2, 2, 7),
(1, 2, 8),
(5, 2, 10),
(11, 3, 1),
(10, 3, 2),
(9, 3, 3),
(8, 3, 4),
(7, 3, 6),
(6, 3, 8),
(15, 4, 1),
(14, 4, 7),
(13, 4, 8),
(12, 4, 9),
(17, 5, 3),
(16, 5, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `date` datetime NOT NULL,
  `total_likes` int NOT NULL DEFAULT '0',
  `total_comments` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `status_id` int NOT NULL DEFAULT '1',
  `topic_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `img`, `date`, `total_likes`, `total_comments`, `user_id`, `status_id`, `topic_id`) VALUES
(1, 'Он не умеет шутить...', '-', '6566d6fb2c45e.jpeg', '2023-11-25 17:25:31', 2, 0, 2, 2, 10),
(2, 'Фильмы, которые являются пародией на определенный жанр, но при этом являются отличным произведением этого жанра.', '<p>Есть определённый вид фильмов, который пародирует определённый жанр, но в то же время является просто отличным фильмом в этом жанре. Это сложный баланс, но некоторые фильмы ловко с этим справляются.</p>\n<p>Шрэк и \"Принцесса невеста\" оба пародируют жанр сказки, но сами по себе являются любимыми сказками. \"Принцесса невеста\" до сих пор остаётся в числе любимых у многих, а \"Шрэк\" породил целый ряд продолжений и спин-оффов.</p>\n<p>\"HOT FUZZ\" - ещё один пример в жанре боевиков о дружбе среди копов. Он является явной пародией с множеством метареференций к жанру, но затем превращается в одну из лучших боевиков о дружбе копов в кино.</p>\n<p>Какие из этих фильмов вам нравятся?</p>', '-', '2023-11-25 19:59:16', 2, 1, 2, 2, 9),
(3, '«Большая волна в Канагаве» — гравюра на дереве японского художника Кацусики Хокусая', '-', '6566e68555f35.jpeg', '2023-11-26 09:12:03', 2, 1, 3, 2, 6),
(4, 'Оцените логотип (делал в Adobe Photoshop)', '-', '6566e69e04e2f.jpeg', '2023-11-27 01:25:52', 2, 0, 3, 2, 6),
(5, 'where is heisenberg?', '-', '6566e6f5170e0.jpeg', '2023-11-27 13:44:19', 0, 0, 4, 2, 10),
(6, 'Шторм века в Крыму', '<p>Вчера нас посетил ветрище небывалой силищи, порывы ветра достигали 38 м/с. Рекордная высота волн на Крымском побережье до вчерашнего дня была 7 метров, обещали 8, но думаю, было и больше. Поговаривают, что стихия вышла за установленные ранее рамки шторма в 10 баллов. Короче, такого разгула ещё не бывало.</p>', '-', '2023-11-28 04:23:22', 1, 0, 3, 2, 12),
(7, 'Чота не понял', '-', '65674dbb2c214.jpeg', '2023-11-29 18:50:00', 2, 0, 1, 2, 10),
(8, 'негр её послал и ничего не продал, по этому бабка стала требовать жалобную книггу', '-', '656753c98cf82.jpeg', '2023-11-29 19:58:48', 4, 1, 1, 2, 10),
(9, 'Какие есть хорошие фильмы на вечер?', '-', '-', '2023-11-30 06:19:00', 1, 0, 3, 2, 11),
(10, 'Как связаться с администрацией сайта?', '-', '-', '2023-12-01 19:39:46', 1, 0, 2, 2, 13),
(11, 'Рисовал акварелями. Ангел', '-', '6571a26213679.jpeg', '2023-12-07 13:45:54', 0, 2, 5, 2, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `status`) VALUES
(1, 'Новое'),
(2, 'Подтверждено'),
(3, 'Отклонено');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `topic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `topic`, `img`) VALUES
(1, 'Политика', '65634b2f81d0a.png'),
(2, 'Спорт', '65634b52499b8.png'),
(3, 'Бизнес', '65634b746162a.png'),
(4, 'Игры', '65634b85c4c06.png'),
(5, 'Телевидение', '65634b97cbf67.png'),
(6, 'Искусство', '65634f0e564c7.png'),
(7, 'История', '65634e99bbf67.png'),
(8, 'Музыка', '65634f8e6358f.png'),
(9, 'Фильмы', '65634fde9adcb.png'),
(10, 'Юмор', '6569617d5e5f9.png'),
(11, 'Вопросы', '656961ee4984a.png'),
(12, 'Новости', '656963516442b.png'),
(13, 'Другое', '656a0b4ed34a0.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `login`, `password`, `email`, `avatar`, `registration_date`) VALUES
(1, 1, 'root', '63a9f0ea7bb98050796b649e85481845', 'root@gmail.com', '65702485a874c.jpeg', '2021-04-20'),
(2, 0, 'Gigachad', '0c5656a9cfe3c13524261393d47ce770', 'Gigachad1337@mail.ru', '657024f419b36.png', '2021-08-27'),
(3, 0, 'Kindred', '989fb94adebbcdd87e407aeda2ad3b50', 'Kindred7331@gmail.com', '65702802bf510.png', '2022-05-22'),
(4, 0, 'kachok', '5246c24669fd160f4b32662b69b70b30', 'kach0k@mail.ru', '65702772c6781.png', '2022-12-04'),
(5, 0, 'Valentine', '030d5e6b3172d0b8901d51d3b356058a', 'Valentine9182@rambler.ru', '-', '2023-12-07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `comments_ibfk_1` (`post_id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `likes_ibfk_1` (`post_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `posts_ibfk_2` (`status_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
