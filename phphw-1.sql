-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2017-06-05 08:59:07
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `phphw`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `act_code` int(10) NOT NULL,
  `act_name` varchar(100) NOT NULL,
  `act_desc` varchar(300) NOT NULL,
  `act_price` int(5) NOT NULL,
  `act_area` enum('臺北市','新北市','桃園市','臺中市','臺南市','高雄市','基隆市','桃園縣','新竹市','新竹縣','苗栗縣','彰化市','彰化縣','南投縣','雲林縣','嘉義市','嘉義縣','屏東市','屏東縣','台東縣','花蓮市','花蓮縣','宜蘭縣','澎湖縣','金門縣','連江縣','香港','海外','其他') NOT NULL,
  `act_stage1` varchar(5) NOT NULL,
  `act_stage2` varchar(5) NOT NULL,
  `act_stage3` varchar(5) NOT NULL,
  `act_stage4` varchar(5) NOT NULL,
  `act_stage5` varchar(5) NOT NULL,
  `act_stage6` varchar(5) NOT NULL,
  `act_stage7` varchar(5) NOT NULL,
  `act_stage8` varchar(5) NOT NULL,
  `act_field` enum('法政','財經','外語','數理化學','地球與環境','資訊','生物資源','建築','設計','藝術','社會與心理','大眾傳播','文史哲','教育','管理','運動遊憩','工程','機器人','生命科學','醫藥衛生','其他') NOT NULL,
  `act_poster` longblob,
  `act_url` varchar(100) NOT NULL,
  `act_signup_starttime` date NOT NULL,
  `act_signup_endtime` date NOT NULL,
  `act_starttime` date NOT NULL,
  `act_endtime` date NOT NULL,
  `act_PICname` varchar(10) NOT NULL,
  `act_PICphone` int(10) NOT NULL,
  `act_ORG` varchar(40) NOT NULL,
  `u_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `activity`
--

INSERT INTO `activity` (`act_code`, `act_name`, `act_desc`, `act_price`, `act_area`, `act_stage1`, `act_stage2`, `act_stage3`, `act_stage4`, `act_stage5`, `act_stage6`, `act_stage7`, `act_stage8`, `act_field`, `act_poster`, `act_url`, `act_signup_starttime`, `act_signup_endtime`, `act_starttime`, `act_endtime`, `act_PICname`, `act_PICphone`, `act_ORG`, `u_code`) VALUES
(1, '國立嘉義大學2017行銷營', '兩人以上團報4000/人 早鳥前報名再折300', 4200, '嘉義市', '', '', '', '高中 ', '高職 ', '', '', '', '教育', '', 'http://ncyumtm.wixsite.com/ncyumltc', '2017-05-07', '2017-05-24', '2017-07-05', '2017-07-08', '洪佳雯', 910340128, '嘉義大學·行銷與觀光管理學系', 1),
(2, '勤益科技大學格鬥擂台機器人研習營', '106年6月底前報名，享早鳥價4,500元 三人團報，每人可享300元。', 5000, '臺北市', '', '國小 ', '', '高中 ', '高職 ', '', '', '', '機器人', '', 'http://realgood520.pixnet.net/blog/post/222571443', '2017-06-05', '2017-08-19', '2017-08-26', '2017-08-27', '大碩青年關懷基金會', 4, '大碩青年關懷基金會', 1),
(3, '2017第六屆國立高雄大學資管營-資速列車', '無', 4200, '高雄市', '', '', '', '高中 ', '高職 ', '', '', '', '資訊', '', 'https://noobtw.github.io/imcamp2017/index.html', '2017-05-01', '2017-05-28', '2017-07-10', '2017-07-14', '林宜瑩', 988275715, '國立高雄大學資訊管理系', 1),
(4, '【口語表達溝通營】2017高中夏令營', '以繳費先後錄取學員，優惠價:(即日起至2017年07月10日止)', 4500, '臺北市', '', '', '', '高中 ', '高職 ', '', '', '', '其他', '', 'http://www.17learn.com.tw/curriculum/detail/149180778028746', '2017-06-05', '2017-08-18', '2017-08-18', '2017-08-20', '林小姐', 2, '實踐大學·推廣教育中心', 2),
(5, '2017暑假LED科學探索高中營', '3人(含)以上團報價5,500元/人 或 5/31前報名享早鳥價5,500', 5800, '新竹市', '', '', '', '高中 ', '', '', '', '', '數理化學', '', 'http://cnmm.web.nthu.edu.tw/files/14-1012-116088,r632-1.php?Lang=zh-tw', '2017-06-06', '2017-06-29', '2017-06-29', '2017-06-30', '劉小姐', 3, '國立清華大學·奈微與材料科技中心', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `collect`
--

CREATE TABLE `collect` (
  `col_code` int(10) NOT NULL,
  `u_code` int(10) NOT NULL,
  `act_code` int(10) NOT NULL,
  `col_record` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `collect`
--

INSERT INTO `collect` (`col_code`, `u_code`, `act_code`, `col_record`) VALUES
(3, 3, 2, '收藏'),
(4, 3, 4, '收藏'),
(5, 4, 5, '收藏'),
(6, 4, 4, '收藏'),
(7, 5, 5, '收藏'),
(8, 3, 5, '收藏'),
(13, 3, 1, '收藏');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `c_code` int(11) NOT NULL,
  `act_code` int(10) NOT NULL,
  `u_code` int(10) NOT NULL,
  `c_content` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `comment`
--

INSERT INTO `comment` (`c_code`, `act_code`, `u_code`, `c_content`) VALUES
(1, 1, 3, '我是33，我覺得很棒'),
(2, 1, 3, '我是33，我想留第二次言'),
(3, 1, 3, '我是33，我想留第三次言'),
(4, 2, 3, '我是33，我喜歡一一的營隊，我想留第四次言'),
(5, 3, 3, '我是33，我喜歡一一的營隊，我想留第五次言'),
(6, 5, 3, '我是33，我不喜歡二二的營隊'),
(8, 1, 4, '我是44，我不喜歡一一的營隊\r\n'),
(9, 5, 4, '就是要收藏'),
(10, 4, 4, '我是44，收藏'),
(21, 1, 3, 'hihi');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `mes_code` int(10) NOT NULL,
  `mes_content` varchar(500) NOT NULL,
  `usu_code` int(10) NOT NULL,
  `adu_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `n_code` int(10) NOT NULL,
  `n_content` varchar(500) NOT NULL,
  `n_time` varchar(30) NOT NULL,
  `u_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `news`
--

INSERT INTO `news` (`n_code`, `n_content`, `n_time`, `u_code`) VALUES
(1, '國立嘉義大學2017行銷營 愛麗絲銷遊夢境報名要截止囉!!!', '2017年6月5日12時12分44秒 ', 1),
(4, '新活動上線!!', '2017年6月5日13時32分00秒 ', 2),
(6, '下雨停班!!', '2017年6月5日13時32分50秒 ', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `perdata`
--

CREATE TABLE `perdata` (
  `no` int(30) NOT NULL,
  `tel` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `u_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `perdata`
--

INSERT INTO `perdata` (`no`, `tel`, `name`, `u_code`) VALUES
(1, 931111111, '一一', 1),
(2, 937222222, '二二', 0),
(3, 937333333, '三三', 0),
(4, 937333333, '三三', 0),
(5, 0, '', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `try`
--

CREATE TABLE `try` (
  `id` int(10) NOT NULL,
  `nn` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `try`
--

INSERT INTO `try` (`id`, `nn`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `u_code` int(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `u_pwd` varchar(15) NOT NULL,
  `u_name` varchar(10) NOT NULL,
  `u_phone` int(10) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_auth` enum('user','admin','su') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`u_code`, `u_id`, `u_pwd`, `u_name`, `u_phone`, `u_email`, `u_auth`) VALUES
(1, '11', '99', '一一', 911111, '111@11', 'admin'),
(2, '22', '88', '二二', 92222, '22@2', 'admin'),
(3, '33', '77', '三三', 9333, '33@33', 'user'),
(4, '44', '66', '四四', 9444, '44@4', 'user'),
(5, '55', '55', '五五', 95555, '555@4354', 'user');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_code`),
  ADD KEY `u_code` (`u_code`);

--
-- 資料表索引 `collect`
--
ALTER TABLE `collect`
  ADD PRIMARY KEY (`col_code`),
  ADD KEY `u_code` (`u_code`),
  ADD KEY `act_code` (`act_code`);

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_code`),
  ADD KEY `act_code` (`act_code`),
  ADD KEY `u_code` (`u_code`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mes_code`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_code`),
  ADD KEY `u_code` (`u_code`);

--
-- 資料表索引 `perdata`
--
ALTER TABLE `perdata`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `try`
--
ALTER TABLE `try`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_code`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `activity`
--
ALTER TABLE `activity`
  MODIFY `act_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `collect`
--
ALTER TABLE `collect`
  MODIFY `col_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用資料表 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `c_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用資料表 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `mes_code` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `n_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `perdata`
--
ALTER TABLE `perdata`
  MODIFY `no` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `try`
--
ALTER TABLE `try`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `u_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`u_code`) REFERENCES `user` (`u_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `collect`
--
ALTER TABLE `collect`
  ADD CONSTRAINT `collect_ibfk_1` FOREIGN KEY (`u_code`) REFERENCES `user` (`u_code`),
  ADD CONSTRAINT `collect_ibfk_2` FOREIGN KEY (`act_code`) REFERENCES `activity` (`act_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 資料表的 Constraints `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`u_code`) REFERENCES `user` (`u_code`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`act_code`) REFERENCES `activity` (`act_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 資料表的 Constraints `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`u_code`) REFERENCES `user` (`u_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
