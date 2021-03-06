-- CREATE TABLE IF NOT EXISTS `tbl_registration` (
-- `id` int(11) NOT NULL,
--   `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `email_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `contact_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ALTER TABLE `tbl_registration`
--  ADD PRIMARY KEY (`id`);

-- ALTER TABLE `tbl_registration`
-- MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;



-- BUAT DATABASE PAKE QUERY INI GES
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `tbl_users`
ADD PRIMARY KEY (`id_user`);

ALTER TABLE `tbl_users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;