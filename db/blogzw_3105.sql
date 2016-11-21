-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Dim 31 Mai 2015 à 11:17
-- Version du serveur: 5.1.41
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blogzw`
--

-- --------------------------------------------------------

--
-- Structure de la table `bai_viet`
--

CREATE TABLE IF NOT EXISTS `bai_viet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nguoi_tao` int(11) NOT NULL,
  `id_loai` int(11) NOT NULL,
  `tieu_de` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh_dai_dien` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngay_tao` int(11) NOT NULL,
  `ngay_sua` int(11) NOT NULL DEFAULT '0',
  `trang_thai` int(11) NOT NULL DEFAULT '0',
  `xoa` int(11) NOT NULL DEFAULT '0',
  `luot_xem` int(11) NOT NULL DEFAULT '0',
  `id_binh_luan` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `bai_viet`
--

INSERT INTO `bai_viet` (`id`, `id_nguoi_tao`, `id_loai`, `tieu_de`, `page_url`, `noi_dung`, `hinh_dai_dien`, `ngay_tao`, `ngay_sua`, `trang_thai`, `xoa`, `luot_xem`, `id_binh_luan`) VALUES
(1, 1, 9, 'Cảm Hứng Từng Ngày', 'cam-hung-tung-ngay-1', 'Cuộc sống cho ta bao nhiêu niềm vui, tình yêu, ngày tươi sáng thì cũng đem đến ngần ấy đau khổ, buồn bã, chịu đựng. Thay vì đóng chặt cánh cửa trái tim, bạn hãy cương quyết mở rộng lòng mình để những cảm xúc tuôn trào. Hãy khai thác nguồn năng lượng thiêng liêng của tình yêu cuộc sống ẩn chứa trong bạn.\r\n\r\n“Tất cả chúng ta đều trải nghiệm niềm vui, nỗi đau, cảm xúc yêu thương và sầu khổ. Điều này không loại trừ một ai và tôi cũng vậy. Tôi đã đi con đường các bạn từng qua, đã chiêm nghiệm sâu sắc cuộc đời mình và có những thay đổi khi cảm thấy cần thiết. Tôi chân thành mong bạn sẽ tìm thấy sự đồng cảm trong những thông điệp này; có thể chúng sẽ nhóm lên tia hy vọng trong bạn, gợi lên ước muốn chia sẻ, đem đến những đổi thay hoặc giúp bạn nhận ra nhiều điều mới mẻ.”\r\n\r\nMadisyn Taylor', 'a.jpg', 1432062348, 1432154690, 1, 0, 0, 0),
(2, 1, 9, 'Cảm Hứng Từng Ngày', 'trung-tam-ket-noi-2', 'Mỗi ngày, mỗi chúng ta đều trải qua khoảnh khắc giao hòa kỳ diệu giữa trạng thái mơ và tỉnh. Trong khoảnh khắc ngắn ngủi ấy, tâm trí chúng ta vẫn còn ghi nhận rằng mọi điều tốt lành sẽ có thể đến. Khi đó, ta có thể nhẹ nhàng bước vào thế giới thực tại mà lòng vẫn vẹn nguyên cảm giác hy vọng nếu khi thức dậy, ta hòa điệu với tiếng nói của trái tim mình.\r\n\r\nTrái tim là cầu nối giữa cơ thể và tinh thần, giữa bản năng và niềm cảm hứng. Hãy dành chút thời gian để nghĩ về, để biết ơn trái tim – người bạn đang thực hiện những nhịp đập bền bỉ trong cơ thể ta và khi đó, ta cũng có thể ôn lại những mơ ước muốn thực hiện trong khoảnh khắc chan hòa ánh sáng yêu thương ấy. Một khi có thói quen khởi đầu ngày mới bằng những cảm xúc từ trái tim, mọi hoạt động của bạn sẽ đều bừng lên thiện chí tốt lành và mọi giao tiếp trong ngày của bạn đều diễn ra trong yêu thương.', 'a.jpg', 1432062348, 1432154709, 1, 0, 0, 0),
(3, 1, 11, 'Cảm Hứng Từng Ngày', 'song-khoe-moi-ngay-3', 'Mỗi ngày, mỗi chúng ta đều trải qua khoảnh khắc giao hòa kỳ diệu giữa trạng thái mơ và tỉnh. Trong khoảnh khắc ngắn ngủi ấy, tâm trí chúng ta vẫn còn ghi nhận rằng mọi điều tốt lành sẽ có thể đến. Khi đó, ta có thể nhẹ nhàng bước vào thế giới thực tại mà lòng vẫn vẹn nguyên cảm giác hy vọng nếu khi thức dậy, ta hòa điệu với tiếng nói của trái tim mình.\r\n\r\nTrái tim là cầu nối giữa cơ thể và tinh thần, giữa bản năng và niềm cảm hứng. Hãy dành chút thời gian để nghĩ về, để biết ơn trái tim – người bạn đang thực hiện những nhịp đập bền bỉ trong cơ thể ta và khi đó, ta cũng có thể ôn lại những mơ ước muốn thực hiện trong khoảnh khắc chan hòa ánh sáng yêu thương ấy. Một khi có thói quen khởi đầu ngày mới bằng những cảm xúc từ trái tim, mọi hoạt động của bạn sẽ đều bừng lên thiện chí tốt lành và mọi giao tiếp trong ngày của bạn đều diễn ra trong yêu thương.', 'a.jpg', 1432062348, 1432154832, 1, 0, 10, 0),
(4, 1, 9, 'Cảm Hứng Từng Ngày', 'khoanh-khac-dang-nho-4', 'Mỗi ngày, mỗi chúng ta đều trải qua khoảnh khắc giao hòa kỳ diệu giữa trạng thái mơ và tỉnh. Trong khoảnh khắc ngắn ngủi ấy, tâm trí chúng ta vẫn còn ghi nhận rằng mọi điều tốt lành sẽ có thể đến. Khi đó, ta có thể nhẹ nhàng bước vào thế giới thực tại mà lòng vẫn vẹn nguyên cảm giác hy vọng nếu khi thức dậy, ta hòa điệu với tiếng nói của trái tim mình.\r\n\r\nTrái tim là cầu nối giữa cơ thể và tinh thần, giữa bản năng và niềm cảm hứng. Hãy dành chút thời gian để nghĩ về, để biết ơn trái tim – người bạn đang thực hiện những nhịp đập bền bỉ trong cơ thể ta và khi đó, ta cũng có thể ôn lại những mơ ước muốn thực hiện trong khoảnh khắc chan hòa ánh sáng yêu thương ấy. Một khi có thói quen khởi đầu ngày mới bằng những cảm xúc từ trái tim, mọi hoạt động của bạn sẽ đều bừng lên thiện chí tốt lành và mọi giao tiếp trong ngày của bạn đều diễn ra trong yêu thương.', 'a.jpg', 1432062348, 1432154729, 1, 0, 0, 0),
(5, 1, 9, 'Cảm Hứng Từng Ngày', 'chinh-phuc-thu-thach-5', 'Mỗi ngày, mỗi chúng ta đều trải qua khoảnh khắc giao hòa kỳ diệu giữa trạng thái mơ và tỉnh. Trong khoảnh khắc ngắn ngủi ấy, tâm trí chúng ta vẫn còn ghi nhận rằng mọi điều tốt lành sẽ có thể đến. Khi đó, ta có thể nhẹ nhàng bước vào thế giới thực tại mà lòng vẫn vẹn nguyên cảm giác hy vọng nếu khi thức dậy, ta hòa điệu với tiếng nói của trái tim mình.\r\n\r\nTrái tim là cầu nối giữa cơ thể và tinh thần, giữa bản năng và niềm cảm hứng. Hãy dành chút thời gian để nghĩ về, để biết ơn trái tim – người bạn đang thực hiện những nhịp đập bền bỉ trong cơ thể ta và khi đó, ta cũng có thể ôn lại những mơ ước muốn thực hiện trong khoảnh khắc chan hòa ánh sáng yêu thương ấy. Một khi có thói quen khởi đầu ngày mới bằng những cảm xúc từ trái tim, mọi hoạt động của bạn sẽ đều bừng lên thiện chí tốt lành và mọi giao tiếp trong ngày của bạn đều diễn ra trong yêu thương.', 'a.jpg', 1432062348, 1432154735, 1, 0, 0, 0),
(6, 1, 9, 'Cảm Hứng Từng Ngày', 'hanh-phuc-la-su-chia-se-6', 'Mỗi ngày, mỗi chúng ta đều trải qua khoảnh khắc giao hòa kỳ diệu giữa trạng thái mơ và tỉnh. Trong khoảnh khắc ngắn ngủi ấy, tâm trí chúng ta vẫn còn ghi nhận rằng mọi điều tốt lành sẽ có thể đến. Khi đó, ta có thể nhẹ nhàng bước vào thế giới thực tại mà lòng vẫn vẹn nguyên cảm giác hy vọng nếu khi thức dậy, ta hòa điệu với tiếng nói của trái tim mình.\r\n\r\nTrái tim là cầu nối giữa cơ thể và tinh thần, giữa bản năng và niềm cảm hứng. Hãy dành chút thời gian để nghĩ về, để biết ơn trái tim – người bạn đang thực hiện những nhịp đập bền bỉ trong cơ thể ta và khi đó, ta cũng có thể ôn lại những mơ ước muốn thực hiện trong khoảnh khắc chan hòa ánh sáng yêu thương ấy. Một khi có thói quen khởi đầu ngày mới bằng những cảm xúc từ trái tim, mọi hoạt động của bạn sẽ đều bừng lên thiện chí tốt lành và mọi giao tiếp trong ngày của bạn đều diễn ra trong yêu thương.', 'a.jpg', 1432062348, 1432154760, 1, 0, 0, 0),
(7, 1, 9, 'Cảm Hứng Từng Ngày', 'danh-thuc-hanh-phuc-7', 'Cuộc sống cho ta bao nhiêu niềm vui, tình yêu, ngày tươi sáng thì cũng đem đến ngần ấy đau khổ, buồn bã, chịu đựng. Thay vì đóng chặt cánh cửa trái tim, bạn hãy cương quyết mở rộng lòng mình để những cảm xúc tuôn trào. Hãy khai thác nguồn năng lượng thiêng liêng của tình yêu cuộc sống ẩn chứa trong bạn.\r\n\r\n“Tất cả chúng ta đều trải nghiệm niềm vui, nỗi đau, cảm xúc yêu thương và sầu khổ. Điều này không loại trừ một ai và tôi cũng vậy. Tôi đã đi con đường các bạn từng qua, đã chiêm nghiệm sâu sắc cuộc đời mình và có những thay đổi khi cảm thấy cần thiết. Tôi chân thành mong bạn sẽ tìm thấy sự đồng cảm trong những thông điệp này; có thể chúng sẽ nhóm lên tia hy vọng trong bạn, gợi lên ước muốn chia sẻ, đem đến những đổi thay hoặc giúp bạn nhận ra nhiều điều mới mẻ.”\r\n\r\nMadisyn Taylor', 'a.jpg', 1432062348, 1432154771, 1, 0, 0, 0),
(8, 1, 9, 'Cảm Hứng Từng Ngày', 'quan-ly-thoi-gian-8', 'Cuộc sống cho ta bao nhiêu niềm vui, tình yêu, ngày tươi sáng thì cũng đem đến ngần ấy đau khổ, buồn bã, chịu đựng. Thay vì đóng chặt cánh cửa trái tim, bạn hãy cương quyết mở rộng lòng mình để những cảm xúc tuôn trào. Hãy khai thác nguồn năng lượng thiêng liêng của tình yêu cuộc sống ẩn chứa trong bạn.\r\n\r\n“Tất cả chúng ta đều trải nghiệm niềm vui, nỗi đau, cảm xúc yêu thương và sầu khổ. Điều này không loại trừ một ai và tôi cũng vậy. Tôi đã đi con đường các bạn từng qua, đã chiêm nghiệm sâu sắc cuộc đời mình và có những thay đổi khi cảm thấy cần thiết. Tôi chân thành mong bạn sẽ tìm thấy sự đồng cảm trong những thông điệp này; có thể chúng sẽ nhóm lên tia hy vọng trong bạn, gợi lên ước muốn chia sẻ, đem đến những đổi thay hoặc giúp bạn nhận ra nhiều điều mới mẻ.”\r\n\r\nMadisyn Taylor', 'a.jpg', 1432062348, 1432154781, 1, 0, 0, 0),
(9, 2, 13, 'Kết Nối Với Thiên Nhiên', 'ket-noi-voi-thien-nhien-9', 'Càng hòa vào thiên nhiên, ta càng ngạc nhiên, ngưỡng mộ sự sáng tạo của tạo hóa. Đứng trước ngọn núi sừng sững, ta thấm thía bài học về tính khiêm nhường. Ngắm cầu vồng rực rỡ, ta thấy lòng hân hoan. Trong khoảnh khắc hòa mình vào thiên nhiên ấy, ta sẽ cảm nhận nhiều hơn, trân trọng hơn cuộc sống. Thiên nhiên cũng thôi thúc ta đừng bỏ qua giây phút chiêm ngưỡng chiếc mạng nhện tinh xảo giăng trong làn sương hay chú chim ruồi vút qua.     \r\n\r\nCàng hòa vào thiên nhiên, ta càng nhận được nhiều điều tốt đẹp. Tan vào những không gian hoang dã, ta như vượt qua ranh giới thời gian, không gian và nhanh chóng phục hồi sinh lực. Những chuyến đi dạo trong rừng, lướt sóng, tản bộ quanh nhà… có thể xem là thiền định di động, giúp ta rèn luyện trực giác tinh nhạy hơn.\r\n\r\nHãy tìm kiếm những khung cảnh, những thông điệp của thiên nhiên tươi đẹp. Hãy đừng quên suy ngẫm ý nghĩa từ hình ảnh chiếc lá rơi trên đường hay đội hình bầy chim di trú băng ngang nền trời…', 'a.jpg', 1432062348, 1432154792, 1, 0, 0, 0),
(11, 2, 9, 'Góc Tâm Hồn', 'goc-tam-hon-11', 'Càng hòa vào thiên nhiên, ta càng ngạc nhiên, ngưỡng mộ sự sáng tạo của tạo hóa. Đứng trước ngọn núi sừng sững, ta thấm thía bài học về tính khiêm nhường. Ngắm cầu vồng rực rỡ, ta thấy lòng hân hoan. Trong khoảnh khắc hòa mình vào thiên nhiên ấy, ta sẽ cảm nhận nhiều hơn, trân trọng hơn cuộc sống. Thiên nhiên cũng thôi thúc ta đừng bỏ qua giây phút chiêm ngưỡng chiếc mạng nhện tinh xảo giăng trong làn sương hay chú chim ruồi vút qua.     \r\n\r\nCàng hòa vào thiên nhiên, ta càng nhận được nhiều điều tốt đẹp. Tan vào những không gian hoang dã, ta như vượt qua ranh giới thời gian, không gian và nhanh chóng phục hồi sinh lực. Những chuyến đi dạo trong rừng, lướt sóng, tản bộ quanh nhà… có thể xem là thiền định di động, giúp ta rèn luyện trực giác tinh nhạy hơn.\r\n\r\nHãy tìm kiếm những khung cảnh, những thông điệp của thiên nhiên tươi đẹp. Hãy đừng quên suy ngẫm ý nghĩa từ hình ảnh chiếc lá rơi trên đường hay đội hình bầy chim di trú băng ngang nền trời…', 'a.jpg', 1432062348, 1432154816, 1, 0, 0, 0),
(12, 2, 9, 'Thế Giới Kỳ Diệu', 'the-gioi-ky-dieu-12', 'Càng hòa vào thiên nhiên, ta càng ngạc nhiên, ngưỡng mộ sự sáng tạo của tạo hóa. Đứng trước ngọn núi sừng sững, ta thấm thía bài học về tính khiêm nhường. Ngắm cầu vồng rực rỡ, ta thấy lòng hân hoan. Trong khoảnh khắc hòa mình vào thiên nhiên ấy, ta sẽ cảm nhận nhiều hơn, trân trọng hơn cuộc sống. Thiên nhiên cũng thôi thúc ta đừng bỏ qua giây phút chiêm ngưỡng chiếc mạng nhện tinh xảo giăng trong làn sương hay chú chim ruồi vút qua.     \r\n\r\nCàng hòa vào thiên nhiên, ta càng nhận được nhiều điều tốt đẹp. Tan vào những không gian hoang dã, ta như vượt qua ranh giới thời gian, không gian và nhanh chóng phục hồi sinh lực. Những chuyến đi dạo trong rừng, lướt sóng, tản bộ quanh nhà… có thể xem là thiền định di động, giúp ta rèn luyện trực giác tinh nhạy hơn.\r\n\r\nHãy tìm kiếm những khung cảnh, những thông điệp của thiên nhiên tươi đẹp. Hãy đừng quên suy ngẫm ý nghĩa từ hình ảnh chiếc lá rơi trên đường hay đội hình bầy chim di trú băng ngang nền trời…', 'a.jpg', 1432062348, 1432154825, 1, 0, 0, 0),
(13, 2, 10, 'Những Con Người Phi Thường', 'nhung-con-nguoi-phi-thuong-13', 'Càng hòa vào thiên nhiên, ta càng ngạc nhiên, ngưỡng mộ sự sáng tạo của tạo hóa. Đứng trước ngọn núi sừng sững, ta thấm thía bài học về tính khiêm nhường. Ngắm cầu vồng rực rỡ, ta thấy lòng hân hoan. Trong khoảnh khắc hòa mình vào thiên nhiên ấy, ta sẽ cảm nhận nhiều hơn, trân trọng hơn cuộc sống. Thiên nhiên cũng thôi thúc ta đừng bỏ qua giây phút chiêm ngưỡng chiếc mạng nhện tinh xảo giăng trong làn sương hay chú chim ruồi vút qua.     \r\n\r\nCàng hòa vào thiên nhiên, ta càng nhận được nhiều điều tốt đẹp. Tan vào những không gian hoang dã, ta như vượt qua ranh giới thời gian, không gian và nhanh chóng phục hồi sinh lực. Những chuyến đi dạo trong rừng, lướt sóng, tản bộ quanh nhà… có thể xem là thiền định di động, giúp ta rèn luyện trực giác tinh nhạy hơn.\r\n\r\nHãy tìm kiếm những khung cảnh, những thông điệp của thiên nhiên tươi đẹp. Hãy đừng quên suy ngẫm ý nghĩa từ hình ảnh chiếc lá rơi trên đường hay đội hình bầy chim di trú băng ngang nền trời…', 'a.jpg', 1432062348, 1432154864, 1, 0, 0, 0),
(14, 9, 13, 'Điểm Đến Cuối Cùng', 'diem-den-cuoi-cung-14', '<p>Càng hòa vào thiên nhiên, ta càng ngạc nhiên, ngưỡng mộ sự sáng tạo của tạo hóa. Đứng trước ngọn núi sừng sững, ta thấm thía bài học về tính khiêm nhường. Ngắm cầu vồng rực rỡ, ta thấy lòng hân hoan. Trong khoảnh khắc hòa mình vào thiên nhiên ấy, ta sẽ cảm nhận nhiều hơn, trân trọng hơn cuộc sống. Thiên nhiên cũng thôi thúc ta đừng bỏ qua giây phút chiêm ngưỡng chiếc mạng nhện tinh xảo giăng trong làn sương hay chú chim ruồi vút qua.     \r\n\r\nCàng hòa vào thiên nhiên, ta càng nhận được nhiều điều tốt đẹp. Tan vào những không gian hoang dã, ta như vượt qua ranh giới thời gian, không gian và nhanh chóng phục hồi sinh lực. Những chuyến đi dạo trong rừng, lướt sóng, tản bộ quanh nhà… có thể xem là thiền định di động, giúp ta rèn luyện trực giác tinh nhạy hơn.\r\n\r\nHãy tìm kiếm những khung cảnh, những thông điệp của thiên nhiên tươi đẹp. Hãy đừng quên suy ngẫm ý nghĩa từ hình ảnh chiếc lá rơi trên đường hay đội hình bầy chim di trú băng ngang nền trời…</p>', 'a.jpg', 1432062348, 1432154873, 1, 0, 0, 0),
(15, 2, 12, 'Thiên Nhiên Và Con Người', 'thien-nhien-va-con-nguoi-15', 'Càng hòa vào thiên nhiên, ta càng ngạc nhiên, ngưỡng mộ sự sáng tạo của tạo hóa. Đứng trước ngọn núi sừng sững, ta thấm thía bài học về tính khiêm nhường. Ngắm cầu vồng rực rỡ, ta thấy lòng hân hoan. Trong khoảnh khắc hòa mình vào thiên nhiên ấy, ta sẽ cảm nhận nhiều hơn, trân trọng hơn cuộc sống. Thiên nhiên cũng thôi thúc ta đừng bỏ qua giây phút chiêm ngưỡng chiếc mạng nhện tinh xảo giăng trong làn sương hay chú chim ruồi vút qua.     \r\n\r\nCàng hòa vào thiên nhiên, ta càng nhận được nhiều điều tốt đẹp. Tan vào những không gian hoang dã, ta như vượt qua ranh giới thời gian, không gian và nhanh chóng phục hồi sinh lực. Những chuyến đi dạo trong rừng, lướt sóng, tản bộ quanh nhà… có thể xem là thiền định di động, giúp ta rèn luyện trực giác tinh nhạy hơn.\r\n\r\nHãy tìm kiếm những khung cảnh, những thông điệp của thiên nhiên tươi đẹp. Hãy đừng quên suy ngẫm ý nghĩa từ hình ảnh chiếc lá rơi trên đường hay đội hình bầy chim di trú băng ngang nền trời…', 'a.jpg', 1432062348, 1432154884, 1, 0, 0, 0),
(20, 1, 8, 'Bí Quyết Nấu Món Thịt Kho Nước Dừa Ngon', 'bi-quyet-nau-mon-thit-kho-nuoc-dua-ngon-20', '<p>Thịt kho nước dừa ngon bổ cho gia đ&igrave;nh bạn.<br />\r\n+ 500Gram thịt.</p>\r\n\r\n<p>+ 4Gr h&agrave;nh t&iacute;m.</p>\r\n\r\n<p>+ 10gr đường.<br />\r\n&nbsp;</p>\r\n', '14330408021.jpg', 1432062348, 1433040802, 1, 0, 100, 0);

-- --------------------------------------------------------

--
-- Structure de la table `binh_luan`
--

CREATE TABLE IF NOT EXISTS `binh_luan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_bai_viet` int(11) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Contenu de la table `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `ten`, `email`, `website`, `id_bai_viet`, `noi_dung`, `title`, `ngay_tao`, `trang_thai`) VALUES
(24, 'Thai', 'daongocthai93@gmail.com', '', 20, 'Nguyen', 'Thien', 1433039621, 1),
(23, 'Hoa', 'honghoapn@gmail.com', '', 20, 'Bài viết rất hay, cám ơn bạn nhiều', 'Bài viết rất hay', 1433039357, 1),
(19, 'thien', 'huongthien1993@gmail.com', 'nhomsinvhien.com', 5, 'xin chao, bai viet rat bo ich', 'xin chào', 1432991561, 1),
(22, 'Thien', 'huongthien1993@gmail.com', '', 20, 'Cảm ơn bạn. Bài viết rất hay và bổ ích', 'Bài viết rất hay', 1433038502, 1),
(21, 'thien', 'huongthien_93@yahoo.com', 'nhomsinvhien.com', 5, 'thien nguyen', 'thien', 1432992515, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cau_hinh`
--

CREATE TABLE IF NOT EXISTS `cau_hinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adsence` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `google_anlytics` text COLLATE utf8_unicode_ci NOT NULL,
  `favicon` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `appid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `cau_hinh`
--

INSERT INTO `cau_hinh` (`id`, `adsence`, `title`, `description`, `keywords`, `google_anlytics`, `favicon`, `banner`, `appid`) VALUES
(1, '<script>/*cod adsence*/</script>', 'Title', 'Description', 'Keywords', '123456789', 'favicon.jpg', '1432584954.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `loai`
--

CREATE TABLE IF NOT EXISTS `loai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `xoa` int(11) NOT NULL,
  `ma_loai_cha` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `loai`
--

INSERT INTO `loai` (`id`, `ten_loai`, `page_url`, `ngay_tao`, `trang_thai`, `xoa`, `ma_loai_cha`) VALUES
(1, 'Tâm lý', 'tam-ly-1', 0, 1, 0, 0),
(2, 'Tâm lý', 'meo-vat-2', 0, 1, 0, 0),
(3, 'Tâm lý', 'nau-an-3', 5, 0, 0, 0),
(12, 'Tâm lý', 'bep-xinh-12', 1431975604, 1, 0, 2),
(6, 'Tâm lý', 'suc-khoe-6', 5, 1, 1, 0),
(8, 'Tâm lý', 'nau-an-co-ban-8', 5, 1, 0, 3),
(9, 'Tâm lý', 'hoat-dong-tam-ly-9', 5, 1, 0, 1),
(10, 'Tâm lý', 'the-duc-hang-ngay-10', 1431975161, 1, 0, 6),
(11, 'Chế Độ Ăn Uống', 'che-do-an-uong-11', 1431975190, 1, 0, 6),
(13, 'Tiết Kiệm Không Gian', 'tiet-kiem-khong-gian-13', 1431975641, 1, 0, 2),
(14, 'Cuộc sống', 'cuoc-song-14', 1432432702, 0, 0, 0),
(15, '123', '-15', 1432560100, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `quan_tri`
--

CREATE TABLE IF NOT EXISTS `quan_tri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` int(11) NOT NULL,
  `lan_dang_nhap_cuoi` int(11) NOT NULL DEFAULT '0',
  `trang_thai` int(11) NOT NULL DEFAULT '0',
  `hinh_dai_dien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_thieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Contenu de la table `quan_tri`
--

INSERT INTO `quan_tri` (`id`, `ten`, `username`, `password`, `ngay_tao`, `lan_dang_nhap_cuoi`, `trang_thai`, `hinh_dai_dien`, `gioi_thieu`) VALUES
(1, 'Johnathan Smith', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1432161886, 0, 1, '1433040666.jpg', '<p>Pro ne facilisis voluptaria, mei dicit conclusionemque ad, minim aeque philosophia ex pro. Vide semper dolorem nam an, quot iusto iuvaret no pri. Pri postea insolens accusamus te. Thien Nguyen Hoang</p>\r\n'),
(7, 'Nguyễn Thanh Trọng', 'thanhtrong', '827ccb0eea8a706c4c34a16891f84e7b', 1432161886, 0, 1, 'user.jpg', ''),
(14, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Th&aacute;i</p>\r\n'),
(15, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(13, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Th&aacute;i</p>\r\n'),
(16, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(17, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(18, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(19, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(20, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(21, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(22, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(23, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(24, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(25, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n'),
(26, 'Ngọc Thái', 'ngocthai', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '1432447545.jpg', '<p>Ngọc Thái</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT '0',
  `mo_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `slider`
--

INSERT INTO `slider` (`id`, `image_name`, `ngay_tao`, `trang_thai`, `mo_ta`) VALUES
(2, 'slide_1.jpg', 1432579634, 1, ''),
(3, 'slide_1.jpg', 1432579634, 1, ''),
(4, '1432560124.png', 1432560124, 1, ''),
(5, '1432581210.jpg', 1432581210, 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
