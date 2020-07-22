-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020 年 07 月 22 日 18:38
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mycomic`
--

-- --------------------------------------------------------

--
-- 表的结构 `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(255) DEFAULT NULL,
  `author_relname` varchar(255) DEFAULT NULL,
  `author_city` varchar(255) DEFAULT NULL,
  `author_guoji` varchar(255) DEFAULT NULL,
  `author_avatar` varchar(255) DEFAULT NULL,
  `author_description` varchar(255) DEFAULT NULL,
  `author_phone` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '2',
  `user_id` int(11) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='作者信息表' AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `author_relname`, `author_city`, `author_guoji`, `author_avatar`, `author_description`, `author_phone`, `status`, `user_id`, `addtime`) VALUES
(1, '风息神泪&CHRY', '风息神泪&CHRY', '深圳', '中国', '/public/images/01.jpg', '星轨的作者', NULL, 1, 1, NULL),
(2, '尾田荣一郎', '尾田荣一郎', '东京', '日本', '/public/images/04.jpg', '海贼王的作者', NULL, 1, 1, NULL),
(3, 'Kyungil Yang', 'Kyungil Yang', '首尔', '韩国', '/public/images/12.jpg', '刀鞘的孩子的作者', NULL, 1, 1, NULL),
(4, '白茶', '白茶', '成都', '中国', '/public/images/10.jpg', '吾皇巴扎黑的作者', NULL, 1, 1, NULL),
(5, '樱桃子', '樱桃子', '东京', '日本', '/public/images/14.jpg', '樱桃小丸子的作者', NULL, 1, 1, NULL),
(6, 'spoon', 'spoon', '首尔', '韩国', '/public/images/06.jpg', '某天成为公主的作者', NULL, 1, 1, NULL),
(7, 'YUMYUM', 'YUMYUM', '首尔', '韩国', '/public/images/08.jpg', '不要小看女配角的作者', NULL, 1, 1, NULL),
(9, 'loli武士', 'milk', '深圳', '中国', '/public/uploads/b1c7f10618447ff8767762964ef1b19b.jpg', '大家好！这是我第一次发布的作品，希望大家可以多多支持哦！爱你们么么哒！', '18677436666', 1, 4, '2020-07-12 10:42:20');

-- --------------------------------------------------------

--
-- 表的结构 `categorys`
--

CREATE TABLE IF NOT EXISTS `categorys` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='漫画分类表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `categorys`
--

INSERT INTO `categorys` (`id`, `category_name`, `addtime`) VALUES
(1, '奇幻', NULL),
(2, '热血', NULL),
(3, '搞笑', NULL),
(4, '日常', NULL),
(5, '推理', NULL),
(6, '恋爱', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `collects`
--

CREATE TABLE IF NOT EXISTS `collects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zuopin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ctegory_id` int(11) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='信息收集（存储编号信息）' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `collects`
--

INSERT INTO `collects` (`id`, `zuopin_id`, `user_id`, `ctegory_id`, `addtime`) VALUES
(1, 1, 1, 1, '2020-06-06 08:31:12'),
(3, 8, 4, 1, '2020-07-12 11:17:47');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zuopin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_content` text,
  `status` int(1) DEFAULT '1',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='留言评论表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `zuopin_id`, `user_id`, `comment_content`, `status`, `addtime`) VALUES
(8, 8, 4, '超级好看的', 1, '2020-07-12 12:42:46');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT '/public/images/default.jpg',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `info` text,
  `email` varchar(255) DEFAULT NULL,
  `is_admin` int(1) DEFAULT '0',
  `role` int(1) DEFAULT '1',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户信息表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `avatar`, `phone`, `address`, `info`, `email`, `is_admin`, `role`, `addtime`) VALUES
(1, 'admin', '654321', '/public/images/default.jpg', '18677418923', '南宁', '啦啦啦啦', '394717060@qq.com', 1, 2, NULL),
(4, 'milk', '456789', '/public/uploads/6b0f4fd33467853d994f9c17bd207d7b.jpg', '', '', '                                ', '394766666@qq.com', 0, 1, '2020-07-12 10:32:26');

-- --------------------------------------------------------

--
-- 表的结构 `zhangjies`
--

CREATE TABLE IF NOT EXISTS `zhangjies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zuopin_id` int(11) DEFAULT NULL,
  `zhangjie_num` varchar(255) DEFAULT NULL,
  `zhangjie_title` varchar(255) DEFAULT NULL,
  `zhangjie_content` text,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='漫画章节表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `zhangjies`
--

INSERT INTO `zhangjies` (`id`, `zuopin_id`, `zhangjie_num`, `zhangjie_title`, `zhangjie_content`, `addtime`) VALUES
(4, 8, '第一章', '初遇', ' <p><img src="\r\n\r\n\r\n/mycomic/public/uploads/05239a11d0b32eb619e2dce17a554913.jpg" alt="b764b5c9b9ed533a805f46d87b37b9d0"><img src="\r\n\r\n\r\n/mycomic/public/uploads/27d8dda7fc97ae07e12c5fcb11344f89.jpg" alt="0e1e8bfba567602f2c0d0e7e513c92f2"><br></p><p><br></p>', '2020-07-12 11:12:33');

-- --------------------------------------------------------

--
-- 表的结构 `zuopins`
--

CREATE TABLE IF NOT EXISTS `zuopins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `zuopin_name` varchar(255) DEFAULT NULL,
  `zuopin_img` varchar(255) DEFAULT NULL,
  `zuopin_description` varchar(255) DEFAULT NULL,
  `view` int(255) DEFAULT '0',
  `status` int(1) DEFAULT '2',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='漫画作品表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `zuopins`
--

INSERT INTO `zuopins` (`id`, `category_id`, `author_id`, `zuopin_name`, `zuopin_img`, `zuopin_description`, `view`, `status`, `addtime`) VALUES
(1, 1, 1, '星轨是天空的道路', '/public/images/01.jpg', '由风息神泪脚本，CHRY绘画的少女漫画作品。讲述了伦萨国埃里德家千金小姐莱菲西亚（后改名为行歌）与“万物公约"成员聆空、伊洛珈、那非等人之间发生的冒险故事。', 2, 1, NULL),
(2, 2, 2, '海贼王', '/public/images/03.jpg', '拥有财富、名声、权力，这世界上的一切的男人 “海贼王”哥尔·D·罗杰，在被行刑受死之前说了一句话，让全世界的人都涌向了大海。“想要我的宝藏吗？如果想要的话，那就到海上去找吧，我全部都放在那里！”，世界开始迎接“大海贼时代”的来临！', 1, 1, NULL),
(3, 2, 3, '刀鞘的孩子', '/public/images/11.jpg', '九年前，为祸人间的大魔头被消灭，九年后身世成谜的少年走出深山。 他看见了杀戮，也看见了阴谋，背负命运枷锁的他拨动风起云涌。 一切由他而起，也将由他终结。', 2, 1, NULL),
(4, 3, 4, '吾皇巴扎黑', '/public/images/09.jpg', '傲娇吾皇、呆萌巴扎黑与少年的爆笑日常，就喜欢你看不惯我又干不掉我的样子！', 2, 1, NULL),
(5, 4, 5, '樱桃小丸子', '/public/images/13.jpg', '讲述了小丸子上幼稚园和小学低年级的故事，故事自然还是围绕着她在生活和学习中与家人、朋友、老师、同学之间发生的一桩桩有趣的情景展开，有关于亲情、爱心以及同学之间的友情。', 2, 1, NULL),
(6, 1, 6, '某天成为公主', '/public/images/05.jpg', '某天醒来,我竟然变成了公主! 而且还是死在自己亲生父亲手里的悲催公主! 铁石心肠的冷血皇帝，如果不想死的话， 就不要在他面前晃悠！ 但是，"我的王城里什么时候有虫子了?" 最终还是被他注意到了，我能活下来吗? 我该怎么办？！', 3, 1, NULL),
(7, 6, 7, '不要小看女配角', '/public/images/07.jpg', '一睁开眼…竟然穿越到了我最近在追的小说里？可是为啥不按套路出牌，没有女主命的我竟然穿越到一个没有一丁点戏份的悲催小配角身上？事已至此我还是努力给自己加戏吧！抢在女主出场前跟三个男主来一场完美的邂逅，实现穿越人生的逆袭之路！', 3, 1, NULL),
(8, 1, 9, '朝华纪事', '/public/uploads/1f255e0d72bba22835d1552b85672a4a.jpg', '姜昭来自记史一族，他找到即将成为朝华国王后的楚暮醒，为的是向她预言朝华国灭亡的命运。但是暮醒并不打算屈从似乎无法改变的命运，她想了一切能想的办法想要拯救自己的国家。姜昭在一旁静静观看着朝华的最后一缕光芒，他会出手相救吗？朝华的命运又将如何？', 15, 1, '2020-07-12 11:03:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
