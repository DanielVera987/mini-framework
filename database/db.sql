CREATE DATABASE `miniframework`;

USE miniframework;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `nombre`, `email`, `password`, `salt`, `created_at`) VALUES
(8, 'Daniel', 'test@test.com', '$2y$10$MwG0fxpF2X3F1TdOSyBDvOABlp8uA7ZflbKpsgByMiYXvbYXat7J.', 'D2N2CQaM4Ys=', '2020-11-15');
COMMIT;