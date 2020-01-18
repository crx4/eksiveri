-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 25 Nis 2016, 01:19:02
-- Sunucu sürümü: 5.6.27-log
-- PHP Sürümü: 5.6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ci_eksi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chosen_words`
--

CREATE TABLE `chosen_words` (
  `id` int(11) NOT NULL,
  `word` varchar(50) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `count_n` int(11) NOT NULL DEFAULT '0',
  `count_h` int(11) NOT NULL DEFAULT '0',
  `count_u` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `chosen_words`
--

INSERT INTO `chosen_words` (`id`, `word`, `count`, `count_n`, `count_h`, `count_u`) VALUES
(23, 'cay', 46, 10, 24, 12),
(36, 'kisi', 337, 159, 71, 107),
(39, 'fazla', 376, 194, 79, 103),
(49, 'olsa', 387, 197, 81, 109),
(136, 'polis', 120, 37, 23, 60),
(146, 'polise', 27, 9, 3, 15),
(153, 'calisan', 167, 74, 37, 56),
(159, 'yaptigi', 237, 119, 49, 69),
(173, 'yazik', 125, 51, 28, 46),
(175, 'guzel', 537, 264, 166, 107),
(193, 'artik', 535, 244, 123, 168),
(234, 'eksi', 113, 57, 33, 23),
(236, 'iyi', 689, 342, 178, 169),
(239, 'kotu', 260, 125, 59, 76),
(244, 'milli', 128, 74, 31, 23),
(257, 'takim', 195, 134, 37, 24),
(259, 'takimi', 109, 82, 12, 15),
(267, 'futbol', 135, 94, 21, 20),
(299, 'hicbir', 337, 143, 78, 116),
(308, 'irkcilik', 12, 4, 0, 8),
(314, 'eden', 303, 141, 62, 100),
(315, 'futbolcu', 66, 47, 14, 5),
(322, 'arasinda', 187, 90, 57, 40),
(329, 'gelecek', 140, 67, 43, 30),
(344, 'maci', 152, 117, 24, 11),
(350, 'SADEMOTICON', 51, 26, 12, 13),
(366, 'adamlarin', 98, 49, 16, 33),
(378, 'oyle', 488, 245, 106, 137),
(382, 'euro', 48, 34, 6, 8),
(385, 'cikip', 138, 64, 29, 45),
(388, 'aciklama', 96, 47, 15, 34),
(403, 'zaten', 669, 346, 141, 182),
(432, 'beni', 342, 155, 112, 75),
(456, 'bile', 1005, 478, 231, 296),
(469, 'sampiyon', 57, 47, 3, 7),
(474, 'turkiyede', 185, 90, 39, 56),
(484, 'insanlar', 359, 158, 82, 119),
(490, 'ulkede', 253, 103, 49, 101),
(515, 'yoktur', 152, 76, 31, 45),
(518, 'para', 332, 162, 64, 106),
(527, 'cevap', 162, 78, 50, 34),
(541, 'adamlar', 249, 121, 43, 85),
(587, 'hak', 145, 75, 24, 46),
(600, 'tecavuz', 74, 24, 9, 41),
(620, 'insan', 555, 252, 131, 172),
(623, 'ulan', 336, 150, 79, 107),
(631, 'olabilir', 238, 133, 62, 43),
(634, 'neden', 412, 194, 91, 127),
(636, 'baslik', 127, 51, 45, 31),
(654, 'kiz', 205, 67, 74, 64),
(672, 'tarafindan', 271, 128, 51, 92),
(676, 'ciddi', 124, 63, 19, 42),
(738, 'burada', 325, 146, 76, 103),
(762, 'ya', 907, 441, 213, 253),
(763, 'sabah', 141, 56, 51, 34),
(811, 'ilan', 103, 46, 17, 40),
(839, 'an', 302, 149, 84, 69),
(842, 'a', 129, 59, 44, 26),
(965, 'kendimi', 127, 56, 40, 31),
(968, 'kadinin', 107, 27, 30, 50),
(975, 'kendisine', 146, 67, 46, 33),
(982, 'kardesim', 134, 74, 36, 24),
(985, 'yahu', 116, 64, 17, 35),
(988, 'tecavuze', 33, 6, 9, 18),
(1013, 'sacma', 127, 68, 37, 22),
(1038, 'takip', 105, 57, 32, 16),
(1043, 'entry', 140, 66, 44, 30),
(1108, 'dedim', 188, 82, 67, 39),
(1136, 'insanlari', 132, 54, 29, 49),
(1181, 'bunun', 402, 210, 80, 112),
(1220, 'vicdan', 30, 9, 5, 16),
(1244, 'sabir', 17, 5, 2, 10),
(1292, 'evde', 123, 54, 40, 29),
(1313, 'sanirim', 196, 98, 59, 39),
(1314, 'hirsiz', 36, 6, 16, 14),
(1341, 'lan', 662, 300, 209, 153),
(1345, 'ilk', 526, 295, 135, 96),
(1396, 'tabi', 244, 122, 71, 51),
(1400, 'yalniz', 128, 64, 36, 28),
(1436, 'bence', 234, 128, 62, 44),
(1467, 'saygi', 97, 41, 35, 21),
(1524, 'kendine', 136, 60, 47, 29),
(1545, 'diyor', 230, 106, 43, 81),
(1551, 'sert', 45, 24, 14, 7),
(1552, 'tatli', 41, 14, 19, 8),
(1556, 'gordum', 110, 46, 40, 24),
(1649, 'katil', 45, 15, 6, 24),
(1656, 'gerek', 250, 128, 67, 55),
(1657, 'devletin', 107, 48, 15, 44),
(1664, 'allah', 254, 101, 53, 100),
(1674, 'orospu', 141, 43, 23, 75),
(1722, 'lanet', 43, 10, 7, 26),
(1776, 'onemli', 237, 126, 66, 45),
(1801, 'birinci', 44, 29, 11, 4),
(1824, 'cocuk', 235, 90, 60, 85),
(1834, 'cocugu', 145, 52, 35, 58),
(1896, 'anasini', 78, 25, 18, 35),
(1897, 'sikeyim', 79, 28, 15, 36),
(1901, 'adalet', 79, 31, 15, 33),
(1902, 'amina', 174, 75, 38, 61),
(1931, 'aci', 75, 31, 9, 35),
(2032, 'olmayan', 302, 143, 64, 95),
(2056, 'yeni', 340, 169, 94, 77),
(2201, 'islami', 23, 6, 2, 15),
(2221, 'muslumanlar', 21, 5, 4, 12),
(2234, 'islam', 78, 24, 22, 32),
(2238, 'ulke', 194, 70, 36, 88),
(2241, 'mal', 116, 47, 28, 41),
(2323, 'iftira', 7, 0, 0, 7),
(2423, 'bok', 160, 65, 34, 61),
(2476, 'genis', 45, 18, 19, 8),
(2498, 'hemen', 229, 104, 71, 54),
(2533, 'sicak', 62, 21, 30, 11),
(2537, 'soguk', 64, 30, 27, 7),
(2726, 'ulkenin', 210, 81, 31, 98),
(2788, 'teror', 94, 34, 9, 51),
(2807, 'parti', 132, 65, 24, 43),
(2808, 'devlet', 196, 87, 32, 77),
(2821, 'bomba', 64, 24, 6, 34),
(2832, 'bombayi', 15, 2, 1, 12),
(2859, 'akp', 234, 109, 31, 94),
(2861, 'mesela', 214, 105, 60, 49),
(2863, 'polisten', 10, 2, 0, 8),
(2902, 'oy', 247, 123, 43, 81),
(2950, 'isid', 63, 30, 10, 23),
(2952, 'pkk', 73, 24, 9, 40),
(3059, 'hdp', 110, 57, 12, 41),
(3080, 'kan', 99, 40, 22, 37),
(3125, 'SMILEEMOTICON', 175, 71, 83, 21),
(3369, 'el', 160, 78, 31, 51),
(3373, 'oglum', 108, 51, 37, 20),
(3414, 'insanlarin', 209, 82, 54, 73),
(3441, 'kuran', 33, 10, 7, 16),
(3514, 'bunlarin', 134, 63, 27, 44),
(3653, 'chp', 106, 63, 14, 29),
(3680, 'pislik', 24, 7, 2, 15),
(3779, 'hava', 99, 47, 34, 18),
(3816, 'icmeye', 11, 3, 7, 1),
(3821, 'irkci', 20, 6, 3, 11),
(4195, 'film', 73, 36, 28, 9),
(4220, 'bizi', 172, 81, 28, 63),
(4247, 'mutlu', 119, 60, 37, 22),
(4283, 'nefret', 99, 50, 14, 35),
(4315, 'sizin', 289, 136, 57, 96),
(4448, 'sozluk', 160, 76, 51, 33),
(4627, 'efendim', 74, 40, 21, 13),
(4680, 'jest', 11, 5, 6, 0),
(4735, 'kizla', 18, 7, 9, 2),
(4824, 'arkadasim', 101, 42, 33, 26),
(4971, 'saldiri', 44, 17, 5, 22),
(5108, 'besiktas', 95, 66, 18, 11),
(5235, 'fenerbahce', 107, 85, 11, 11),
(5246, 'gol', 168, 130, 25, 13),
(5341, 'galatasaray', 96, 76, 13, 7),
(5694, 'yasta', 20, 4, 12, 4),
(5770, 'sozlukte', 77, 42, 22, 13),
(6003, 'muhalefet', 29, 11, 4, 14),
(6152, 'ataturk', 36, 17, 14, 5),
(6230, 'sehit', 67, 22, 14, 31),
(6319, 'aksine', 36, 24, 10, 2),
(6545, 'ev', 110, 44, 38, 28),
(6583, 'bozuk', 24, 9, 11, 4),
(6598, 'suriyeli', 24, 7, 4, 13),
(7579, 'dibine', 36, 10, 8, 18),
(7968, 'evin', 37, 16, 15, 6),
(8379, 'serefsiz', 38, 14, 5, 19),
(8470, 'canim', 77, 28, 31, 18),
(8774, 'karanlik', 17, 2, 12, 3),
(8872, 'pezevenk', 18, 3, 10, 5),
(9261, 'polisler', 18, 3, 3, 12),
(9791, 'yaratiklar', 9, 1, 0, 8),
(9942, 'gencecik', 24, 7, 4, 13),
(10250, 'dizi', 61, 26, 25, 10),
(10262, 'siddetli', 13, 5, 0, 8),
(10593, 'terorist', 76, 24, 13, 39),
(11038, 'kahkaha', 17, 7, 9, 1),
(11255, 'cocukluk', 14, 4, 9, 1),
(11793, 'bal', 18, 5, 10, 3),
(12022, 'vur', 18, 4, 10, 4),
(12994, 'sikik', 16, 4, 2, 10),
(13736, 'orgut', 34, 8, 3, 23),
(13859, 'gotunuze', 16, 7, 0, 9),
(14119, 'osmanli', 24, 8, 11, 5),
(14214, 'patlama', 25, 10, 3, 12),
(16083, 'mina', 8, 1, 7, 0),
(16258, 'siddet', 39, 15, 5, 19),
(16346, 'fiziksel', 28, 7, 15, 6),
(16509, 'mutsuz', 27, 7, 5, 15),
(20897, 'multeci', 14, 1, 1, 12),
(25817, 'hmm', 14, 2, 10, 2),
(28548, 'saniyorsunuz', 16, 6, 0, 10),
(30778, 'nobel', 21, 8, 10, 3),
(32718, 'dondurma', 14, 7, 7, 0),
(37693, 'dumur', 7, 2, 5, 0),
(39512, 'yerim', 10, 1, 8, 1),
(43728, 'cocugunun', 14, 2, 1, 11),
(43989, 'burs', 15, 5, 0, 10),
(63741, 'hastane', 11, 2, 0, 9);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `chosen_words`
--
ALTER TABLE `chosen_words`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `chosen_words`
--
ALTER TABLE `chosen_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100109;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
