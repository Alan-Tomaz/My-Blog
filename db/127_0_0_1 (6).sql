-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2023 às 04:46
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `my_blog`
--
CREATE DATABASE IF NOT EXISTS `my_blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `my_blog`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(1, 'Uncategorized', 'Uncategorized Description'),
(12, 'Movie', 'Movie');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) UNSIGNED NOT NULL,
  `author_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `body`, `date_time`, `post_id`, `author_id`) VALUES
(1, 'Teste', '2023-04-05 19:37:00', 45, 10),
(2, 'Teste', '2023-04-05 19:46:28', 45, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(45, 'Post 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita exercitationem modi sit provident ea, facere consequuntur maiores eligendi veritatis neque! Perspiciatis aliquid quam odio? Laudantium, mollitia obcaecati. Dolores, ratione dolorum.\r\n', '&lt;div style=&quot;font-size: 14.4px; text-align: center;&quot;&gt;&lt;b style=&quot;font-size: x-large;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px; text-align: center;&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta omnis, esse tempore autem&nbsp;&lt;i&gt;saepe quaerat optio quisquam pariatur dolores corporis delectus harum&lt;/i&gt;, tempora, deleniti iste eius non quos laboriosam mollitia voluptatem temporibus! Nihil minus ducimus impedit recusandae, illo repellendus sit odio!&nbsp;&lt;b&gt;&lt;u&gt;Dignissimos assumenda dolore numquam culpa tempora error blanditiis temporibus.&lt;/u&gt;&lt;/b&gt;&lt;br&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;&lt;b&gt;&lt;u&gt;&lt;br&gt;&lt;/u&gt;&lt;/b&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;&lt;img src=&quot;https://i.imgur.com/L5ZXCe3.png&quot; style=&quot;width: 455.594px;&quot;&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;&lt;b&gt;&lt;u&gt;&lt;br&gt;&lt;/u&gt;&lt;/b&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;&lt;ul&gt;&lt;li&gt;Lorem&lt;/li&gt;&lt;li&gt;Ipsum&lt;br&gt;&lt;/li&gt;&lt;li&gt;Dolor&lt;/li&gt;&lt;/ul&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta omnis, esse tempore autem saepe quaerat optio quisquam pariatur dolores corporis delectus harum, tempora, deleniti iste eius non quos laboriosam mollitia voluptatem temporibus! Nihil minus ducimus impedit recusandae, illo repellendus sit odio! Dignissimos assumenda dolore numquam culpa tempora error blanditiis temporibus.&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;a href=&quot;https://www.youtube.com/watch?v=I010T-UvmRM&amp;t=26993s&quot; style=&quot;transition: var(--transition);&quot;&gt;https://www.youtube.com/watch?v=I010T-UvmRM&amp;t=26993s&lt;/a&gt;&lt;/div&gt;&lt;/div&gt;\r\n                                            ', '1680411597pexels-tom-fisk-4557917.jpg', '2023-04-02 04:59:57', 1, 10, 2),
(55, 'Teste', 'Teste', '&lt;div style=&quot;font-size: 14.4px; text-align: center;&quot;&gt;&lt;b style=&quot;font-size: x-large;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px; text-align: center;&quot;&gt;&lt;br&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta omnis, esse tempore autem&nbsp;&lt;i&gt;saepe quaerat optio quisquam pariatur dolores corporis delectus harum&lt;/i&gt;, tempora, deleniti iste eius non quos laboriosam mollitia voluptatem temporibus! Nihil minus ducimus impedit recusandae, illo repellendus sit odio!&nbsp;&lt;b&gt;&lt;u&gt;Dignissimos assumenda dolore numquam culpa tempora error blanditiis temporibus.&lt;/u&gt;&lt;/b&gt;&lt;br&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;&lt;b&gt;&lt;u&gt;&lt;br&gt;&lt;/u&gt;&lt;/b&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;&lt;img src=&quot;https://i.imgur.com/L5ZXCe3.png&quot; style=&quot;width: 455.594px;&quot;&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;&lt;b&gt;&lt;u&gt;&lt;br&gt;&lt;/u&gt;&lt;/b&gt;&lt;/div&gt;&lt;div style=&quot;font-size: 14.4px;&quot;&gt;&lt;ul&gt;&lt;li&gt;Lorem&lt;/li&gt;&lt;li&gt;Ipsum&lt;br&gt;&lt;/li&gt;&lt;li&gt;Dolor&lt;/li&gt;&lt;/ul&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta omnis, esse tempore autem saepe quaerat optio quisquam pariatur dolores corporis delectus harum, tempora, deleniti iste eius non quos laboriosam mollitia voluptatem temporibus! Nihil minus ducimus impedit recusandae, illo repellendus sit odio! Dignissimos assumenda dolore numquam culpa tempora error blanditiis temporibus.&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;&lt;a href=&quot;https://www.youtube.com/watch?v=I010T-UvmRM&amp;t=26993s&quot; style=&quot;transition: var(--transition);&quot;&gt;https://www.youtube.com/watch?v=I010T-UvmRM&amp;t=26993s&lt;/a&gt;&lt;/div&gt;&lt;/div&gt;\r\n                                            ', '1680749116pexels-nicholas-shirazawa-13139149.jpg', '2023-04-06 02:45:16', 12, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `biography` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `location`, `biography`, `password`, `avatar`, `is_admin`) VALUES
(10, 'Alan', 'Tomaz', 'admin', 'alan4tomaz8@gmail.com', 'Minas Gerais, Brasil', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita exercitationem modi sit provident ea, facere consequuntur maiores eligendi veritatis neque! Perspiciatis aliquid quam odio? Laudantium, mollitia obcaecati. Dolores, ratione dolorum.\r\n', '$2y$10$Mzj.tCkM2/FUCev1cnEG.eg4jVYZkbJJINXeW3JhtUsNFy5UpgtMe', '1680303137-1678643270-avatar3.jpg', 1),
(16, 'edrftuu', 'tyuyttu', 'ytyuty', 'iyuiyui@gmail.com', 'uyiyuiyu', 'edrftuu', '$2y$10$1SfORddBNNO2jSLGgmFZm.XmmSlNHRpmDy0aHjq5QMc13urbWxapu', '1680487348-photo-1590099914662-a76f2f83b802.jpeg', 0),
(19, 'okabe', 'rintarou', 'okabe', 'okabe@gmail.com', 'Tokyo, Japan', 'okabe', '$2y$10$kv2Kgb4xS8fvOw1O9GCboufQJ1RqcDcMJ.W/..zjoGKnlupRzYlTe', '1680734499-EwyndDeXIAglqVq.jpg', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_author` (`author_id`),
  ADD KEY `FK_comment_post` (`post_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_my_blog_category` (`category_id`),
  ADD KEY `FK_my_blog_author` (`author_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comment_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_my_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_my_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
