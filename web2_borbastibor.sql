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
  ('Családi_2', 'Utónév_2', 'Login2', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Moderátor' LIMIT 1)),
  ('Családi_3', 'Utónév_3', 'Login3', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Moderátor' LIMIT 1)),
  ('Családi_4', 'Utónév_4', 'Login4', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Moderátor' LIMIT 1)),
  ('Családi_5', 'Utónév_5', 'Login5', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('Családi_6', 'Utónév_6', 'Login6', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('Családi_7', 'Utónév_7', 'Login7', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('Családi_8', 'Utónév_8', 'Login8', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Moderátor' LIMIT 1)),
  ('Családi_9', 'Utónév_9', 'Login9', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1)),
  ('Családi_10', 'Utónév_10', 'Login10', '$2y$10$ax9eS2.YVOO.bZRykgRg1.uvrfRZnVRXkDZJTZi4og.stshfWlD96', (SELECT `id` FROM `jogosultsagok` WHERE `jog_nev` = 'Regisztrált látogató' LIMIT 1));

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
  ('rights/index', 'Jogosultságok', 'Admin', 20, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Admin' LIMIT 1)),
  ('game/index', 'Játék', '', 50, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Látogató' LIMIT 1)),
  ('wsclients/index', 'SOAP/REST kliensek', '', 60, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Látogató' LIMIT 1)),
  ('wsclients/soap', 'SOAP kliens', 'SOAP/REST kliensek', 10, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Látogató' LIMIT 1)),
  ('wsclients/rest', 'REST kliens', 'SOAP/REST kliensek', 20, (SELECT `jog_szint` FROM `jogosultsagok` WHERE `jog_nev` = 'Látogató' LIMIT 1));

-- A hirek tábla létrehozása
 CREATE TABLE IF NOT EXISTS `hirek` (
   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `cim` text NOT NULL,
   `hir` text NOT NULL,
   `datum` timestamp NOT NULL,
   `felhasznalo_id` int(10) UNSIGNED NOT NULL,
   FOREIGN KEY (felhasznalo_id) REFERENCES felhasznalok(id) ON DELETE CASCADE
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 INSERT INTO `hirek` (`cim`, `hir`, `datum`, `felhasznalo_id`) VALUES
  ('Személyi', 'A rendőr megállítja a szőke nőt: - Jogosítványt, forgalmit, személyit kérek!
  - Mi az a személyi? - kérdezi a szőke nő.
  - Az egy olyan kis tárgy, hogyha kinyitja, akkor ott látja benne a saját képét.
  Keresgél a szőke nő a retiküljében, talál egy tükröt, belenéz, és látja benne magát, odaadja a rendőrnek. Nézi a rendőr, és megszólal:
  - Jaj, hát miért nem azzal kezdte, hogy kolléga?', '2020-10-10 21:32:48', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Admin')),
  ('Rajzóra', 'Rajzóra van az iskolában, kérdi a tanár:
  - Móricka te mit rajzoltál?
  - Egy tehenet ami a mezőn legel.
  - Na de Móricka, teljesen üres a papírod, hol van itt a tehén?
  - Az előbb mondtam: elment a mezőre legelni!', '2020-09-10 11:32:48', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Login2')),
  ('Házsártos feleség', 'Házsártos feleség mondja a férjének:
  - Mennyivel jobban tettem volna, ha magához az ördöghöz mentem volna feleségül!
  - Erre ne is gondolj! Közeli rokonok nem házasodhatnak!', '2020-09-15 11:28:48', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Login3')),
  ('Suzuki kereskedés', 'Bemegy a szőke nő egy Suzuki kereskedésbe.
  Megnéz egy kis Suzukit, látja hogy az elején egy S betű van.
  Megnéz egy nagyobbat, még nagyobbat, azokon is látja az S betűt. Végül megnézi a legnagyobb Suzukit, azon is rajta van az elején az S betű.
  Odamegy a Suzuki kereskedőhöz és megkérdezi tőle:
  - Ez a sok kocsi itt mind szép és jó, de nincs valamelyik M-es méretben?', '2020-09-16 11:28:48', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Login4')),
  ('Etióp bújócska', 'Az etiópok bújócskáznak. Bemegy a házba a hunyó és nem lát senkit.
  Egyszer csak egy hatalmas csörömpölésre lesz figyelmes és nézi ahogy a játszótársa kiesik a seprű mögűl.
  - Megvagy! Te vagy a húnyó!
  Erre a másik gyerek szinte síró hangon:
  - Nem ér, a dagi kilökött!', '2020-09-16 11:18:48', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Login5'));

-- A velemenyek tábla létrehozása
CREATE TABLE IF NOT EXISTS `velemenyek` (
   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `velemeny` text NOT NULL,
   `datum` timestamp NOT NULL,
   `email` varchar(50) NOT NULL,
   `felhasznalo_id` int(10) UNSIGNED,
   FOREIGN KEY (felhasznalo_id) REFERENCES felhasznalok(id) ON DELETE SET NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

 INSERT INTO `velemenyek` (`velemeny`, `datum`, `email`, `felhasznalo_id`) VALUES
  ('Lehetne jobb is az oldal!!!!', '2020-09-12 14:56:12', 'gyurika@dzsemail.com', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Admin')),
  ('Nagyon jó, csak egy kicsit fapados...', '2020-10-12 09:56:12', 'cook@dzsemail.com', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Login2')),
  ('Ez itt az én véleményem', '2020-09-17 15:56:12', 'qwertz@dzsemail.com', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Login3')),
  ('Ez még egy vélemény, hogy legyen mit nézni!', '2020-10-01 08:36:12', 'valaki@dzsemail.com', (SELECT `id` FROM `felhasznalok` WHERE `bejelentkezes` = 'Login4'));