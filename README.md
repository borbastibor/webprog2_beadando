# Webprogramozás 2 beadandó feladat

Készítsen egy weboldalt egy fiktív cég részére, amely a következő követelményeknek tesz eleget: 
1.	A weboldalon legyen bejelentkezési és regisztrációs lehetőség. A regisztrált felhasználók olvashatnak és írhatnak véleményeket, híreket. A vélemények, hírek megjelenítésekor jelenítsük meg a létrehozás időpontját és a létrehozó felhasználó bejelentkezési nevét. (3 pont) 
2.	1. alkalmazza az objektum-orientált PHP elveit
    2. a menüpontok neveit és a menüpontokhoz tartozó oldalak azonosítóját az adatbázisban tárolja,
    3. többszintes menürendszert megvalósít
    4. legalább „látogató”, „regisztrált látogató” és „admin” szerepkör el van különítve. (4 pont)
3.	Alkalmazzon a weboldalon egy jQuery és egy Ajax megvalósítást. (2 pont) 
4.	Készítsen két web-szolgáltatás megvalósítást. Az egyiket SOAP, a másikat RESTful módszerrel. Mind a kettőhöz készítsen egy kliens oldali szkriptet is teszteléshez. (3 pont)
5.	Alkalmazzon az oldalon egy objektum orientált JavaScript megvalósítást is. (2 pont)

6.	Alkalmazását töltse fel és valósítsa meg Internetes tárhelyen is. Bármelyik tárhely-szolgáltatót használhatja.  (2 pont)
7.	Használja a GitHub verziókövető rendszert (github.com). Ne csak a kész alkalmazást töltse fel egy lépésben, hanem a részállapotokat is még legalább 2 lépésben (1 pont)
8.	Készítsen egy dokumentációt, amiben bemutatja alkalmazását és leírja, hogy az előző pontok feladatait hogyan valósította meg. A dokumentációban adja meg a tárhely és a GitHub projektjének URL címét is. (3 pont)

Töltse fel a Neptun „Feladatok”-hoz tömörített (zip) fájlban a weboldal forrásait és a dokumentációt. 
A forrásokat feltöltve a helyi web szerver (XAMPP) munka-könyvtárába az alkalmazás működőképes legyen.

Összesen: 20 pont. 
Minimum 10 pont.

# Alkalmazás előkészítése futtatáshoz

A webprog2_beadando mappát az xampp/htdocs könyvtárába másoljuk. A soap és rest könyvtárakat ugyancsak az xampp/htdocs könyvtárba másoljuk. Ezután a webprog2_beadando könyvtárban a web2_borbastibor.sql fájl be kell importálni a phpMyAdmin segítségével és a szkriptet meg kell futtatni, ezáltal létrejön az alkalmazás futásához szükséges adatbázis a szükséges tesztadatokkal. Miután ezzel végeztünk az apache webszerver elindítása után a localhost/webprog2_beadando címen már meg is tekinthetjük az oldalt.

A weboldalra alapértelmezetten az alábbi felhasználónevekkel és jelszavakkal lehet belépni:

Felhasználónév	Jelszó	Jogosultság
Admin	        1234	Admin
Login2	        1234	Moderátor
Login3	        1234	Moderátor
Login4	        1234	Moderátor
Login5	        1234	Regisztrált látogató
Login6	        1234	Regisztrált látogató
Login7	        1234	Regisztrált látogató
Login8	        1234	Moderátor
Login9	        1234	Regisztrált látogató
Login10	        1234	Regisztrált látogató

Admin jogosultság: Szerkesztheti a jogosultságokat, felhasználókat, véleményeket és híreket.
Moderátor jogosultság: Szerkesztheti a véleményeket és híreket.
Regisztrált látogató: Létrehozhat véleményeket.
Látogató: Olvashatja a híreket.
