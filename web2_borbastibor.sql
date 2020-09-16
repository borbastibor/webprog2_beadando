/** 
 * Adatbázis létrehozása
*/
CREATE DATABASE IF NOT EXISTS `web2_yeduco` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `web2_yeduco`;

/**
 * A jogosultsagok tábla létrehozása és feltöltése adatokkal
 */
CREATE TABLE IF NOT EXISTS 'jogosultsagok' (
  'id' int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  'jog_nev' varchar(20) NOT NULL,
  'jog_szint' int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO 'jogosultsagok' ('jog_nev', 'jog_szint') VALUES
  ('Admin', 100),
  ('Regisztrált látogató', 99),
  ('Látogató', 98);

/**
 * A users tábla létrehozása és feltöltése adatokkal
 */
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `utonev` varchar(45) NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) NOT NULL DEFAULT '',
  `jelszo` varchar(40) NOT NULL DEFAULT '',
  `jog_id` int(10) UNSIGNED NOT NULL,
  FOREIGN KEY (jog_id) REFERENCES jogosultsagok(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*INSERT INTO `felhasznalok` (`id`, `csaladi_nev`, `utonev`, `bejelentkezes`, `jelszo`, `jogosultsag`) VALUES
  (1, 'Rendszer', 'Admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '__1'),
  (2, 'Családi_2', 'Utónév_2', 'Login2', '6cf8efacae19431476020c1e2ebd2d8acca8f5c0', '_1_'),
  (3, 'Családi_3', 'Utónév_3', 'Login3', 'df4d8ad070f0d1585e172a2150038df5cc6c891a', '_1_'),
  (4, 'Családi_4', 'Utónév_4', 'Login4', 'b020c308c155d6bbd7eb7d27bd30c0573acbba5b', '_1_'),
  (5, 'Családi_5', 'Utónév_5', 'Login5', '9ab1a4743b30b5e9c037e6a645f0cfee80fb41d4', '_1_'),
  (6, 'Családi_6', 'Utónév_6', 'Login6', '7ca01f28594b1a06239b1d96fc716477d198470b', '_1_'),
  (7, 'Családi_7', 'Utónév_7', 'Login7', '41ad7e5406d8f1af2deef2ade4753009976328f8', '_1_'),
  (8, 'Családi_8', 'Utónév_8', 'Login8', '3a340fe3599746234ef89591e372d4dd8b590053', '_1_'),
  (9, 'Családi_9', 'Utónév_9', 'Login9', 'c0298f7d314ecbc5651da5679a0a240833a88238', '_1_'),
  (10, 'Családi_10', 'Utónév_10', 'Login10', 'a477427c183664b57f977661ac3167b64823f366', '_1_');*/

/**
 * A menu tábla létrehozása és feltöltése adatokkal
 */
CREATE TABLE IF NOT EXISTS `menu` (
  `url` varchar(30) NOT NULL PRIMARY KEY,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `sorrend` tinyint(4) NOT NULL,
  `jog_id` int(10) UNSIGNED NOT NULL,
  FOREIGN KEY (jog_id) REFERENCES jogosultsagok(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
  ('admin', 'Admin', '', '100', 80),
  ('alapinfok', 'Alapinfók', 'elerhetoseg', '111', 40),
  ('belepes', 'Belépés', '', '100', 60),
  ('elerhetoseg', 'Elérhetőség', '', '111', 20),
  ('kiegeszitesek', 'Kiegészítések', 'elerhetoseg', '011', 50),
  ('kilepes', 'Kilépés', '', '011', 70),
  ('linkek', 'Linkek', '', '100', 30),
  ('nyitolap', 'Nyitólap', '', '111', 10);*/

/**
 * A hirek tábla létrehozása
 */
 CREATE TABLE IF NOT EXISTS 'hirek' (
   'id' int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   'hir' text NOT NULL,
   'datum' timestamp NOT NULL,
   'felhasznalo_id' int(10) UNSIGNED NOT NULL,
   FOREIGN KEY (felhasznalo_id) REFERENCES felhasznalok(id)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/**
 * A velemenyek tábla létrehozása
 */
CREATE TABLE IF NOT EXISTS 'velemenyek' (
   'id' int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   'velemeny' text NOT NULL,
   'datum' timestamp NOT NULL,
   'nev' varchar(50) NOT NULL,
   'email' varchar(50) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;