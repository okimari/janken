-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2019 年 10 月 10 日 16:22
-- サーバのバージョン： 10.4.6-MariaDB
-- PHP のバージョン: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacfd04_db15`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `category` set('MANGA','NOVEL','DESIGN','LIVING') COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `category`, `indate`) VALUES
(1, 'test', 'テキスト', 'テキスト', '', '2019-10-06 15:55:05'),
(2, 'ccc', 'vvv', 'xxx', '', '2019-10-06 16:18:10'),
(3, '大木麻里', 'http://rcd3140.xsrv.jp/okimari/resaga/', 'vvv', '', '2019-10-06 16:18:26'),
(13, 'text', 'テキスト', 'テキスト', 'MANGA', '2019-10-10 09:01:02'),
(14, '大木麻里', 'http://rcd3140.xsrv.jp/okimari/resaga/', 'LIVING', 'DESIGN', '2019-10-10 09:01:14'),
(15, '大木麻里', 'http://rcd3140.xsrv.jp/okimari/resaga/', 'ccc', 'DESIGN', '2019-10-10 22:27:47'),
(16, '大木麻里', 'ccc', 'vvvv', 'DESIGN', '2019-10-10 22:31:24'),
(17, 'www', 'http://www.aic.ne.jp/', 'vvvvv', 'DESIGN', '2019-10-10 22:47:12'),
(18, '大木麻里', 'http://rcd3140.xsrv.jp/okimari/resaga/', 'cccc', 'DESIGN', '2019-10-10 22:56:58'),
(19, '大木麻里', 'http://rcd3140.xsrv.jp/okimari/resaga/', 'vvvv', 'DESIGN', '2019-10-10 23:19:16'),
(20, '大木麻里', 'http://rcd3140.xsrv.jp/okimari/resaga/', 'ccc', 'NOVEL', '2019-10-10 23:20:53'),
(21, '大木麻里', 'http://www.aic.ne.jp/', 'ccc', 'MANGA', '2019-10-10 23:21:08'),
(22, '施設常駐警備員', 'file:///Users/yamamoto/Creative%20Cloud%20Files/_saga/index.html', 'vvvv', 'LIVING', '2019-10-10 23:21:24'),
(23, '施設常駐警備員', 'http://rcd3140.xsrv.jp/okimari/resaga/', 'bbbb', 'LIVING', '2019-10-10 23:21:43');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
