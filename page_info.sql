-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017-03-20 07:22:53
-- 服务器版本： 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zmn_sempq_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `page_info`
--

CREATE TABLE `page_info` (
  `id` int(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(300) NOT NULL,
  `directory` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `proto_url` varchar(150) NOT NULL,
  `page_url` varchar(150) NOT NULL,
  `sponsor` varchar(50) NOT NULL,
  `designer` varchar(50) NOT NULL,
  `coder` varchar(50) NOT NULL,
  `time_submit` varchar(20) NOT NULL,
  `time_start` varchar(20) NOT NULL,
  `time_end` varchar(20) NOT NULL,
  `time_finish` varchar(20) NOT NULL,
  `progress` varchar(20) NOT NULL,
  `year` int(10) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `page_info`
--

INSERT INTO `page_info` (`id`, `category`, `title`, `directory`, `type`, `proto_url`, `page_url`, `sponsor`, `designer`, `coder`, `time_submit`, `time_start`, `time_end`, `time_finish`, `progress`, `year`, `state`) VALUES
(3, '', '美国留学申请', 'mglxsq', '', '', 'http://varyu.com', '宋凯悦', '李亚男', '徐振瑜', '1234', '2017-03-17', '2017-03-18', '2017-03-18', '', 2017, ''),
(4, '改版专题', '撒地方', '', '移动端', '', '', '-', '-', '-', '1234', '', '', '', '前端', 2017, '延后'),
(5, '改版专题', '美国留学申请指南', 'mglxsqzn', '移动端', '', '', '卢婷婷', '李亚男', '徐振瑜', '1234', '', '', '', '上线', 2017, '延后'),
(6, '修改专题', '托福培训', 'tfpx', '移动端', '', '', '宋凯悦', '王文静', '冯月钗', '1234', '2017-03-21', '2017-03-23', '2017-03-22', '设计', 2017, '紧急'),
(7, '新增专题', '封闭保分班', 'fbbf', 'PC 端', 'http://sem.test.zmnedu.com/proto/fbbf', '', '卢婷婷', '王文静', '周飞', '2017-03-20', '2017-03-22', '2017-03-21', '2017-03-30', '前端', 2017, '延后'),
(8, '新增专题', '托福提分', 'tftf', '移动端', 'http://sem.test.zmnedu.com/proto/tftf', '', '-', '王文静', '冯月钗', '2017-03-20', '2017-03-21', '2017-03-22', '2017-03-21', '前端', 2017, '紧急');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page_info`
--
ALTER TABLE `page_info`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `page_info`
--
ALTER TABLE `page_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
