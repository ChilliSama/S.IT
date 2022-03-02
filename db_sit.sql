SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: sit_db
--

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE `user` (
  `id_user` INT(4) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `position` TINYINT UNSIGNED NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `pswd` char(64) DEFAULT NULL,
  `organisation` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table user
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `position`, `email`, `pswd`, `organisation`) VALUES
(1, 'admin', 'admin', 'admin', 'dufrane.terence@gmail.com', SHA2('admin', 256), 'MonacoDigital');
-- --------------------------------------------------------

--
-- Table structure for table seat | free = 1 - not free = 0
--

CREATE TABLE `seat` (
  `id_seat` INT(4) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `pos_restrict` TINYINT UNSIGNED NOT NULL,
  `free` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table seat
--

INSERT INTO `seat` (`id_seat`, `pos_restrict`) VALUES (1, 1);

-- --------------------------------------------------------

--
-- Table structure for table day association of user and seat
--

CREATE TABLE `day_seat_user` (
  `day_date` date PRIMARY KEY NOT NULL,
  `day_id_user` integer DEFAULT NULL,
  `day_id_seat` integer DEFAULT NULL,
  INDEX(`day_id_user`),
  INDEX(`day_id_seat`),
  FOREIGN KEY(`day_id_user`) REFERENCES `user`(`id_user`),
  FOREIGN KEY(`day_id_seat`) REFERENCES `seat`(`id_seat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for authentification token
--

CREATE TABLE `auth_tokens` (
    `id` integer(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `selector` char(12),
    `token` char(64),
    `userid` integer(11) UNSIGNED not null,
    `expires` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

