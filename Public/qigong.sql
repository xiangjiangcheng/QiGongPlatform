-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2017-08-14 10:15:28
-- 服务器版本： 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.0.18-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qigong`
--

-- --------------------------------------------------------

--
-- 表的结构 `attention`
--

CREATE TABLE `attention` (
  `id` int(11) NOT NULL COMMENT '参赛须知表主键',
  `title` varchar(45) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createby` int(11) DEFAULT NULL,
  `updateby` int(11) DEFAULT NULL,
  `dlt` int(1) DEFAULT '0' COMMENT '删除标志',
  `remark` varchar(45) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `attention`
--

INSERT INTO `attention` (`id`, `title`, `content`, `createtime`, `updatetime`, `createby`, `updateby`, `dlt`, `remark`) VALUES
(1, '2017比赛规则', '2222222q232', '2017-07-27 02:56:19', '2017-08-04 07:08:47', NULL, NULL, 0, NULL),
(2, '13', 'erqrrrrrrrrrr', '2017-07-27 03:36:26', '2017-07-27 03:38:13', NULL, NULL, 1, NULL),
(3, '1111111', '1111111111', '2017-07-27 03:41:07', '2017-07-27 03:41:07', NULL, NULL, 0, NULL),
(4, '22222222222', '22', '2017-07-27 03:41:31', '2017-07-27 03:41:31', NULL, NULL, 0, NULL),
(5, '143', 'vvv', '2017-08-02 06:54:43', '2017-08-02 06:54:43', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL COMMENT '资讯表主键',
  `title` varchar(45) DEFAULT NULL COMMENT '资讯标题',
  `intro` varchar(255) DEFAULT NULL,
  `content` text COMMENT '资讯内容',
  `picture_cover` varchar(45) DEFAULT NULL COMMENT '封面图片',
  `video` varchar(45) DEFAULT NULL COMMENT '小视频',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createby` int(11) DEFAULT NULL,
  `updateby` int(11) DEFAULT NULL,
  `dlt` int(1) DEFAULT '0' COMMENT '删除标志',
  `remark` varchar(45) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `intro`, `content`, `picture_cover`, `video`, `createtime`, `updatetime`, `createby`, `updateby`, `dlt`, `remark`) VALUES
(1, '修改', '热哈哈哈', '布里斯班的十个月大的萌宝Egypt拥有一双修长的睫毛、清澈的眼眸，可爱的模样让她在社交网站上爆红。', '20170804171459430.jpg', '', '2017-07-24 07:54:44', '2017-08-04 09:14:59', NULL, NULL, 0, NULL),
(2, 'sds', '', 'sdasdasdddddddddddddd哈哈', '20170804105506419.jpg', '', '2017-07-26 06:22:58', '2017-08-04 03:04:15', NULL, NULL, 1, NULL),
(3, '国外一网友', '', '国外网友waxiestapple在论坛Reddit贴出爱犬照片，指出“我的狗狗好像瘦了点”“因为我刚刚把最后一口汉堡吃掉”，只见这只哈士奇一脸惨遭背叛的样子，对主人露出相当不可思议的表情。', '20170804105506419.jpg', '', '2017-07-26 09:08:39', '2017-08-04 03:04:15', NULL, NULL, 0, NULL),
(4, '31', '123', '12321', '20170804105303309.jpg', NULL, '2017-08-03 15:39:02', '2017-08-04 03:03:48', NULL, NULL, 0, NULL),
(5, 'sdf', 'asdf', 'asdf', '20170804120353658.jpg', NULL, '2017-08-04 02:53:03', '2017-08-04 04:03:53', NULL, NULL, 0, NULL),
(6, '测试', 'asdf', 'asdf方法飞蛾', '20170804105506419.jpg', NULL, '2017-08-04 02:55:06', '2017-08-04 02:55:06', NULL, NULL, 0, NULL),
(7, '士大夫', '阿斯顿非', '阿斯顿非法', '20170804113126131.jpg', NULL, '2017-08-04 03:31:26', '2017-08-04 03:31:26', NULL, NULL, 0, NULL),
(8, '测试1', '的发达', '布里斯班的十个月大的萌宝Egypt拥有一双修长的睫毛、清澈的眼眸，可爱的模样让她在社交网站上爆红。', '20170804114917600.jpg', NULL, '2017-08-04 03:49:17', '2017-08-04 03:49:17', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL COMMENT '公告表主键',
  `title` varchar(45) CHARACTER SET utf8 DEFAULT NULL COMMENT '公告标题',
  `content` text CHARACTER SET utf8,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createby` int(11) DEFAULT NULL,
  `updateby` int(11) DEFAULT NULL,
  `dlt` int(1) DEFAULT '0' COMMENT '删除标志',
  `remark` varchar(45) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `notice`
--

INSERT INTO `notice` (`id`, `title`, `content`, `createtime`, `updatetime`, `createby`, `updateby`, `dlt`, `remark`) VALUES
(1, '明天下雨1方法反反复复', '明天正午会下大雨 haha.dfddd让人d21122111212明天正午会下大雨 haha.dfddd让人d21122111212明天正午会下大雨 haha.dfddd让人d21122111212', '2017-07-24 07:14:32', '2017-07-27 03:00:58', NULL, NULL, 0, NULL),
(2, '成都很忙', '。。。。。。。。。哈哈123方法', '2017-07-24 07:16:00', '2017-07-26 10:09:18', NULL, NULL, 0, NULL),
(3, '暴雨即将来袭', '请大家一定做好防范措施.。。', '2017-07-24 07:17:35', '2017-07-25 08:34:06', NULL, NULL, 0, NULL),
(6, 'df', 'afdsf', '2017-07-25 08:19:12', '2017-07-27 02:45:56', NULL, NULL, 0, NULL),
(7, '高温高温！！！！！！', '放假一周！', '2017-07-25 09:06:22', '2017-07-25 09:06:22', NULL, NULL, 0, NULL),
(8, '大甩卖哦', '样样五元', '2017-07-25 09:07:52', '2017-07-25 09:07:52', NULL, NULL, 0, NULL),
(9, 'ches', 'sdfasdf', '2017-07-26 06:21:53', '2017-07-27 02:45:56', NULL, NULL, 0, NULL),
(10, '我是大帅比', '234123', '2017-07-26 10:14:49', '2017-07-27 02:45:56', NULL, NULL, 0, NULL),
(11, '地方的负担', '123', '2017-07-26 10:15:43', '2017-07-27 02:45:56', NULL, NULL, 0, NULL),
(12, '123', '戊二醛', '2017-07-26 10:15:50', '2017-07-27 02:45:56', NULL, NULL, 0, NULL),
(13, '213', '123', '2017-07-27 03:39:23', '2017-07-27 03:39:23', NULL, NULL, 0, NULL),
(14, '213', '123', '2017-07-27 03:41:44', '2017-07-27 03:41:44', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_win`
--

CREATE TABLE `user_win` (
  `id` int(11) NOT NULL COMMENT '中奖主键',
  `weixin_id` varchar(11) DEFAULT NULL,
  `prize_name` varchar(45) DEFAULT NULL COMMENT '奖品内容',
  `tell` varchar(11) DEFAULT NULL COMMENT '联系方式',
  `issent` int(1) DEFAULT '0' COMMENT '是否发奖',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createby` int(11) DEFAULT NULL,
  `updateby` int(11) DEFAULT NULL,
  `dlt` int(1) DEFAULT '0',
  `remark` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_win`
--

INSERT INTO `user_win` (`id`, `weixin_id`, `prize_name`, `tell`, `issent`, `createtime`, `updatetime`, `createby`, `updateby`, `dlt`, `remark`) VALUES
(1, 'ererq234', '公仔', '18878357735', 0, '2017-08-02 09:20:42', '2017-08-02 09:20:42', NULL, NULL, 0, ''),
(2, '12341234', '一个拥抱+一瓶矿泉水', '18593544385', 1, '2017-08-02 09:20:42', '2017-08-02 09:20:42', NULL, NULL, 0, 'by xjc'),
(3, '2134235', '1234', '2123', 1, '2017-08-02 09:25:22', '2017-08-02 09:25:22', NULL, NULL, 1, '哈哈 修改');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attention`
--
ALTER TABLE `attention`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_win`
--
ALTER TABLE `user_win`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `attention`
--
ALTER TABLE `attention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '参赛须知表主键', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '资讯表主键', AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公告表主键', AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `user_win`
--
ALTER TABLE `user_win`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '中奖主键', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
