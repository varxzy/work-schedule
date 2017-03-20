-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017-03-20 07:25:04
-- 服务器版本： 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zmn_sempq_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `sem_user`
--

CREATE TABLE `sem_user` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sem_user`
--

INSERT INTO `sem_user` (`id`, `user_name`, `password`) VALUES
(1, 'zmnsem', 'c5edd473aaedcfaca392c6efcd78340c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sem_user`
--
ALTER TABLE `sem_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sem_user`
--
ALTER TABLE `sem_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
