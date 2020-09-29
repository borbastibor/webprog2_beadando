-- Adatbázis létrehozása
CREATE DATABASE IF NOT EXISTS `web2_yeduco` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `web2_yeduco`;

-- A jogosultsagok tábla létrehozása és feltöltése adatokkal
CREATE TABLE IF NOT EXISTS `jogosultsagok` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `jog_nev` varchar(20) NOT NULL,
  `jog_szint` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `jogosultsagok` (`jog_nev`, `jog_szint`) VALUES
  ('Admin', 100),
  ('Moderátor', 2),
  ('Regisztrált látogató', 1),
  ('Látogató', 0);

-- A users tábla létrehozása és feltöltése adatokkal
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `csaladi_nev` varchar(45) NOT NULL,
  `utonev` varchar(45) NOT NULL,
  `bejelentkezes` varchar(12) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `jog_id` int(10) UNSIGNED NOT NULL,
  FOREIGN KEY (`jog_id`) REFERENCES `jogosultsagok` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `felhasznalok` (`csaladi_nev`, `utonev`, `bejelentkezes`, `jelszo`, `jog_id`) VALUES
  ('Rendszer', 'Admin', 'Admin', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Admin' LIMIT 1)),
  ('Családi_2', 'Utónév_2', 'Login2', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Moderátor' LIMIT 1)),
  ('Családi_3', 'Utónév_3', 'Login3', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Moderátor' LIMIT 1)),
  ('Családi_4', 'Utónév_4', 'Login4', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Moderátor' LIMIT 1)),
  ('Családi_5', 'Utónév_5', 'Login5', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('Családi_6', 'Utónév_6', 'Login6', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('Családi_7', 'Utónév_7', 'Login7', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('Családi_8', 'Utónév_8', 'Login8', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Moderátor' LIMIT 1)),
  ('Családi_9', 'Utónév_9', 'Login9', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('Családi_10', 'Utónév_10', 'Login10', '', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1));

-- A menu tábla létrehozása és feltöltése adatokkal
CREATE TABLE IF NOT EXISTS `menu` (
  `url` varchar(30) NOT NULL PRIMARY KEY,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `sorrend` tinyint(4) NOT NULL,
  `jog_szint` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`url`, `nev`, `szulo`, `sorrend`, `jog_szint`) VALUES
  ('home/index', 'Nyitólap', '', 10, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Látogató' LIMIT 1)),
  ('news/index', 'Hírek', '', 20, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Látogató' LIMIT 1)),
  ('comments/index', 'Vélemények', '', 30, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('admin/index', 'Admin', '', 40, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Admin' LIMIT 1)),
  ('users/index', 'Felhasználók', 'Admin', 10, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Admin' LIMIT 1)),
  ('rights/index', 'Jogosultságok', 'Admin', 20, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Admin' LIMIT 1));

-- A hirek tábla létrehozása
 CREATE TABLE IF NOT EXISTS `hirek` (
   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `cim` text NOT NULL,
   `hir` text NOT NULL,
   `datum` timestamp NOT NULL,
   `felhasznalo_id` int(10) UNSIGNED NOT NULL,
   FOREIGN KEY (felhasznalo_id) REFERENCES felhasznalok(id) ON DELETE CASCADE
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- A velemenyek tábla létrehozása
CREATE TABLE IF NOT EXISTS `velemenyek` (
   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `velemeny` text NOT NULL,
   `datum` timestamp NOT NULL,
   `email` varchar(50) NOT NULL,
   `felhasznalo_id` int(10) UNSIGNED,
   FOREIGN KEY (felhasznalo_id) REFERENCES felhasznalok(id) ON DELETE SET NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;