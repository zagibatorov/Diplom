-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Июн 24 2026 г., 13:58
-- Версия сервера: 8.0.35
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplomBD`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `header` varchar(64) NOT NULL,
  `content` varchar(9999) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `header`, `content`, `image_path`, `created_at`) VALUES
(69, 'Заголовок новости', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit asperiores, architecto voluptatem omnis, eaque illum provident eligendi sit eum quos, nam doloribus beatae! Qui in odio, est quis fugit iusto ut cupiditate voluptatibus dignissimos laudantium aliquid. A velit hic neque at commodi corporis saepe iusto optio, sapiente earum?', 'uploads/news/1779048653_6a0a20cd9930b.jpg', '2026-05-17 20:10:53'),
(91, 'Заголовок новости', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit asperiores, architecto voluptatem omnis, eaque illum provident eligendi sit eum quos, nam doloribus beatae! Qui in odio, est quis fugit iusto ut cupiditate voluptatibus dignissimos laudantium aliquid. A velit hic neque at commodi corporis saepe iusto optio, sapiente earum?', 'uploads/news/1782121635_6a3904a323dec.png', '2026-06-22 09:47:15'),
(92, 'Заголовок новости', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit asperiores, architecto voluptatem omnis, eaque illum provident eligendi sit eum quos, nam doloribus beatae! Qui in odio, est quis fugit iusto ut cupiditate voluptatibus dignissimos laudantium aliquid. A velit hic neque at commodi corporis saepe iusto optio, sapiente earum?', 'uploads/news/1782121658_6a3904ba5470d.webp', '2026-06-22 09:47:38');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(64) NOT NULL,
  `role` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `role`) VALUES
(20, 'admin', '$2y$10$4sGVlWN01CBIAuS90NL8mutvZOqmijNM4um3o80CO7tVrlHB6E8xG', 'admin@gmail.com', 'admin'),
(21, 'Test', '$2y$10$kt7ZkcDrGCa7B3prUhXBrOtM5eN/YL5og5kqav2dHvNHR.gYpUbye', 'test@mail.ru', 'user'),
(22, 'Test123', '$2y$10$eI7L7hgePSaol7t.g4Mske84Hg55uU0f8S0WzXYGmz0fSUysvUxfy', 'Test123@gmail.com', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
