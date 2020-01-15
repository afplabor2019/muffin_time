# **Követelmény-specifikáció**

### A jelenlegi helyzet

A cukrászdában, ahonnan  a felkérést kaptuk jelenleg nem működik semmilyen online rendszer, internetes adatbázis. Ennek hiánya nagymértékben megnehezíti az üzemeltető és a vásárlók dolgát is. A cukrászda vezetője ezért kereste fel cégünket.

### A kívánt rendszer

Felkérést kaptunk egy cukrászda webáruházának fejlesztésére, hogy megkönnyítsük a megrendeléseket és az árukból történő választást. A rendszert PHP programozási nyelven írják, weblapként. A webáruházban való böngészés regisztráció nélkül is elérhető, de megrendeléshez be kell jelentkeznie a felhasználónak.

### Elvárt működés 

Aki az oldalt megnyitja , az szabadon böngészhet a kínálatok között, különféle menüpontok alapján.  Komolyon érdeklődők(vásárlók) regisztrálni is tudnak az oldalon, megadva ezzel  különféle adatokat , ami a vásárláshoz és a kiszállításhoz szükségesek lesznek.  A vásárló ezután a kiválasztott termékeket a kosárba helyezheti és egy gombnyomással megrendelheti az adott termékeket a kiválasztott dátumra.

### Szükséges funkciók listája

| Modul    | ID   |         Név          | Leírás                                                       |
| -------- | ---- | :------------------: | ------------------------------------------------------------ |
| Backend  | F1   |       Adatbázis       | Az Adatbázis tárolja az alkalmazás által használt összes adatot. Kellékek, megrendelések, felhasználók. |
| Frontend | F2   | Bejelentkezési oldal | Egy oldal, amely kitölthető űrlapot tartalmaz a bejelentkezéshez. |
| Frontend | F2   | Regisztrációs oldal  | Egy oldal, amely kitölthető űrlapot tartalmaz a regisztráció elvégzéséhez. |
| Frontend | F3   |       Főoldal        | Alapértelmezés szerint felsorolja az adatbázisból rendelkezésre álló összes terméket. |
| Frontend | F4   |     Kosár oldal      | Ezen az oldalon a felhasználók kezelhetik tételeiket a kosárban (törlés, mennyiség). Innentől kezdve folytathatják megrendelésüket. |

### Jogszabályok

- Számlakibocsátási kötelezettség

  **159.** **§** (1) Az adóalany köteles - ha e törvény másként nem rendelkezik - a 2. § *a)* pontja szerinti termékértékesítéséről, szolgáltatásnyújtásáról a termék beszerzője, szolgáltatás igénybevevője részére, ha az az adóalanytól eltérő más személy vagy szervezet, számla kibocsátásáról gondoskodni.

- „4/A. Számlázó programok adatszolgáltatása

  **13/A.** **§** (1) A számlázó programnak a gép-gép interfész használatához szükséges azonosító adatok megküldése mellett a kiállított számla, számlával egy tekintet alá eső okirat legalább Áfa tv. szerinti kötelező adattartalmát a számla, számlával egy tekintet alá eső okirat kiállításakor azonnal, XML-formátumban, az állami adó- és vámhatóság közleményében meghatározott módon és adatszerkezetben, elektronikus úton továbbítania kell az állami adó- és vámhatóság részére.

-  **13/B. § (**1) Ha a számlázó program által kiállított számla, számlával egy tekintet alá eső okirat adatait fogadó elektronikus rendszerben üzemzavar történik, az állami adó- és vámhatóság az üzemzavarról és az üzemzavar elhárítását követően annak kezdő és megszűnési időpontjáról haladéktalanul közleményt tesz közzé honlapján. 
- Hatályba lép **45/2014. (II. 26.) Korm. rendelet**, mely a távollevők között kötött szerződésekkel kapcsolatos törvényi szabályozást tartalmazza. A törvény hatályba lépésével üzleten kívül a fogyasztóval kötött szerződésekről szóló 213/2008. (VIII. 29.) Korm. rendelet, és a távollévők között kötött szerződésekről szóló **17/1999. (II. 5.) Korm. rendelet hatályát veszti.** Legfontosabb változások.
- Az indoklás nélküli elállási jog 8 munkanapról 14 napra változik.
- A fogyasztó az elállási jogot a fogyasztó vagy az általa megjelölt, a fuvarozótól eltérő harmadik személy általi átvételének napjától kezdve gyakorolhatja;.Amennyiben a vállalkozás nem tesz eleget az elállási jogra vonatkozó tájékoztatási kötelezettségének úgy az elállási határidő tizenkét hónappal meghosszabbodik.
- A vállalkozás haladéktalanul, de legkésőbb az elállásról való tudomásszerzésétől számított tizennégy napon belül köteles visszatéríteni a fogyasztó által ellenszolgáltatásként megfizetett összeget.
- Amennyiben a fogyasztó kifejezetten a legkevésbé költséges szokásos fuvarozási módtól eltérő fuvarozási módot választ, a vállalkozás nem köteles visszatéríteni az ebből eredő többletköltségeket.
-  A vállalkozás az általa kínált fizetési mód igénybevétele után fizetendő díjat meghaladó további díjat nem terheljenek a fogyasztókra.
-  A webáruház üzemeltetője köteles gondoskodni arról, hogy a fogyasztó a szerződési nyilatkozatának megtételekor kifejezetten tudomásul vegye, hogy nyilatkozata fizetési kötelezettséget von maga után. 

### Szótár

- **hiba:** a szoftver hibája miatt nem megfelelő vagy váratlan eredményt eredményez
- **backend:** adat-hozzáférési réteg a szoftverben
- **frontend:** felület a felhasználó és a backend között
- **kliens:** szoftver, amely hozzáfér a szolgáltatáshoz
