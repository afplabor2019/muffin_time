Projektterv 2019-20

# 1  Összefoglaló

A csapat feladata egy cukrászda online webáruházának elkészítésére. A megrendelőnek problémát jelent, hogy jelenleg a sok időt elveszít az adatok felvételével, megrendelők kisegítésével és a kiszállítás lebonyolításával. Ezt a problémát kívánja kiváltani az online webáruház, ahol a vásárlók szabadon böngészhetik a választékot és adhatják le rendelésüket.

# 2  A projekt bemutatása

Ez a projektterv az online webáruház projektet mutatja be, amely 2019. 10. 07-től 2019.12.09-ig tart. A projekt célja, hogy egy felhasználó könnyedén le tudja ellenőrizni, hogy milyen megrendeléseket kapott és mikor.

## 2.1       Rendszerspecifikáció

A megrendelő kérései hogy kiszolgálja a felhasználók igényeit, illetve lehetősége legyen a kínálat szerkesztésére egyszerű , letisztult környezetben. A megvalósításhoz két felületet szükséges létrehozni:

\-    Egy adminisztrációs felület, ahol a megrendelő adminként be tudjon jelentkezni. Ezen a felületen az admin átláthatóan tudja a kínálatot szerkeszteni.

\-    Ugyanezen a felületen szükséges, hogy képes legyen, a felhasználók által beküldött megrendelések kezelésére is.

Szükség van még egy felhasználó felületre is, ahol az alábbi igényeket kell kiszolgálni:

\-    Átlátható, letisztult felület

\-    Regisztráció

\-    Panaszbenyújtás lehetősége

 

### 2.1.1   Funkcionális követelmények

A megrendelő részéről:

\-    adminisztrációs felület megvalósítása

\-    megrendelés regisztrációhoz kötése

\-    kínálat kezelhetősége
 
 

A felhasználó részéről:

\-    megrendelés egyszerű leadása

\-    online/utánvételes fizetési módszer

\-    átlátható kínálat

 

### 2.1.2   Nem funkcionális követelmények

Online felületen fusson mind az admin illetve a felhasználói felület is. A megjelenésnek számítógépen és mobil eszközön is lehetőleg olyannak kell lennie, hogy megfelelő legyen a felhasználónak.

# 3  Szervezeti felépítés és felelősségmegosztás

A projekt megrendelője Tilki Csaba gyakorlatvezető. Az online webshop projektet a projektcsapat fogja végrehajtani, amely 3 főből áll: Vereczki Bálint Zoltán, Móni Edina, Rajna Franciska személyéből tevődik össze.

## 3.1       Projektcsapat

A projekt a következő emberekből áll:

|                                             | Név                     | Email cím, IM              |
| ------------------------------------------- | ----------------------- | -------------------------- |
| Megrendelő                                  | Gyakvezető              | afplabor2019@gmail.com     |
| Projekt menedzser                           | Vereczki  Bálint Zoltán | vereczkibalint@gmail.com   |
| Adatbázisért és  adatkapcsolatokért felelős | Vereczki Bálint  Zoltán | vereczkibalint@gmail.com   |
| Felhasználói  felületekért felelős          | Móni Edina              | moni.edina57@gmail.com     |
| A rendszer működési  logikájáért felelős    | Vereczki Bálint  Zoltán | vereczkibalint@gmail.com   |
| Dokumentációért  felelős                    | Rajna Franciska         | rajnafranciska45@gmail.com |
| Prezentációért  felelős                     | Rajna  Franciska        | rajnafranciska45@gmail.com |

# 4  A munka feltételei

## 4.1       Munkakörnyezet

 

A projektet a csapat Java nyelven írja.

## 4.2       Rizikómenedzsment

Betegség (közepes): a projekt elkészülését késleltetheti, ha egy csapattag váratlanul megbetegedik. Ennek következtében nem tudunk rendszeres meetinget tartani. (Valószínűség: közepes/ hatás: közepes)

Egy számítógép meghibásodása (nagy): előfordulhat, hogy egy csapattag számítógépe ismeretlen okokból meghibásodhat. Ebből kifolyólag meg kell osztani az erőforrásokat, amely kellemetlen szituációkat eredményezhet. (Valószínűség: kicsi/ hatás: nagy).

Adatveszteség (nagy): adatveszteség esetén, a csapat nagyon nagy problémába kerülhet. Sok minden múlhat, ha elvesztjük az adatainkat, főleg ha nem készítünk biztonsági mentést. (Valószínűség: kicsi / hatás: nagy).

Projekttag (esetleg a csapatot összetartó projectmanager) a kiosztott feladatot nem hajlandó elvégezni (közepes). (Valószínűség: kicsi / hatás: közepes).

# 5  Jelentések

## 5.1       Munka menedzsment

A munkát Vereczki Bálint Zoltán menedzseli. A menedzser feladatai: állandó kapcsolattartás a csapattagok között. Kommunikáció a megrendelő között. A kommunikáció személyesen valamint online (Discord, Facebook) történik. A megrendelővel a kommunikáció e-mail-en keresztül történik. A menedzser további feladatai közé tartozik, hogy biztosítja a kapcsolatot két csapattag között is, valamint folyamatosan tájékozódnia kell, hogy az adott csapattag, hogy áll a számára kiadott feladattal.

## 5.2       Csoportgyűlések

Első csoportgyűlés:

Jelenlévők: Vereczki Bálint Zoltán, Móni Edina, Rajna Franciska
 Megbeszélés helye, ideje: Eger, C épület, 2019. 10. 07 13:40 – 15:20
 Funkcionális és nem funkcionális követelmények megbeszélése, UML és adatbázis tervek kiosztása

Második csoportgyűlés:

Jelenlévők: Vereczki Bálint Zoltán, Móni Edina, Rajna Franciska
 Megbeszélés helye, ideje: Eger, C épület, 2019. 10. 14 13:40 – 15:20
 A dokumentáció véglegesítése.

## 5.3       Minőségbiztosítás

Az elkészült terveket a terveken nem dolgozó csapattársak közül átnézik, hogy megfelel-e a specifikációnak és az egyes diagramtípusok összhangban vannak-e egymással. A meglévő rendszerünk helyes működését a prototípusok bemutatása előtt a tesztelési dokumentumban leírtak végrehajtása alapján ellenőrizzük és összevetjük a specifikációval, hogy az elvárt eredményt kapjuk-e. További tesztelési lehetőségek: unit tesztek írása az egyes modulokhoz vagy a kód közös átnézése (code review) egy, a vizsgált modul programozásában nem résztvevő csapattaggal. Szoftverünk minőségét a végső leadás előtt javítani kell a rendszerünkre lefuttatott kódelemzés során kapott metrikaértékek és szabálysértések figyelembevételével.

Az alábbi lehetőségek vannak a szoftver megfelelő minőségének biztosítására:

●    Specifikáció és tervek átnézése (kötelező)

●    Teszttervek végrehajtása (kötelező)

●    Unit tesztek írása (választható)

●    Kód átnézése (választható)

## 5.4       Átadás, eredmények elfogadása

A projekt eredményeit Tilki Csaba fogja elfogadni. A projektterven változásokat csak Tilki Csaba írásos kérés esetén Tilki Csaba engedélyével lehet tenni. A projekt eredményesnek bizonyul, ha specifikáció helyes és határidőn belül készül el.

## 5.5       Státuszjelentés

Minden leadásnál a projektmenedzser jelentést tesz a projekt haladásáról, és ha szükséges változásokat indítványoz a projektterven. Ezen kívül a megrendelő felszólítására a menedzser 3 munkanapon belül köteles leadni a jelentést. A gyakorlatvezetővel folytatott csapatmegbeszéléseken a megadott sablon alapján emlékeztetőt készít a csapat, amit a következő megbeszélésen áttekintenek és felmérik az eredményeket és teendőket. Továbbá gazdálkodnak az erőforrásokkal és szükség esetén a megrendelővel egyeztetnek a projektterv módosításáról.

# 6  A munka tartalma

## 6.1       Tervezett szoftverfolyamat modell és architektúra

A projectben részvevők az strukturális modellt választva valósítják meg a kívánt programot. 

A csapat PHP nyelven valósítja meg a megrendelő által kérvényezett programot, amelyben fontos szerepet játszanak:

\-    adatbázistáblák

\-    grafikus felület

\-    logikai kapcsolat

## 6.2       Átadandók és határidők

A főbb átadandók és határidők a projekt időtartama alatt a következők:

| Neve                                 | Határideje |
| ------------------------------------ | ---------- |
| Projektterv és útmutató              | 2019-10-21 |
| UML és adatbázis tervek és  bemutató | 2019-11-14 |
| Prototípus I. és bemutató            | 2019-11-25 |
| Kész projekt és bemutató             | 2019-12-09 |

 

# 7  Feladatlista

Az online webáruház project 2019. október 7-én indult. A következőkben a tervezett feladatok részletes összefoglalása található:

## 7.1       Projektterv

Ennek a feladatnak az a célja, hogy készítsünk egy olyan dokumentációt ahol részletesen le van jegyzetelve, hogy például milyen nyelven írjuk a projectet, mik a rizikótényezők, illetve, hogy ki milyen feladatban fog részt venni.

\-    Felelős: Rajna Franciska

\-    Tartam: 1 hét

## 7.2       UML és adatbázis tervek

A feladat célja, hogy elkészüljenek az adatbázistervek illetve az adatbázist könnyen átlátható modellje.

Részfeladatai a következők:

 

### 7.2.1   Adatbázis struktúra

\-    Felelősök: Vereczki Bálint Zoltán

\-    Tartam: 2 nap

![img](file:///C:/Users/Franci/AppData/Local/Temp/msohtmlclip1/01/clip_image002.gif)

 

### 7.2.2   Képernyőtervek

\-    Felelősök: Móni Edina, Rajna Franciska

\-    Tartam: 2 nap

 

### 7.2.3   Tesztesetek, teszttervek

\-    Felelősök: Móni Edina

\-    Tartam: 2 nap

### 7.2.4   Bemutató elkészítése és bemutatása

\-    Felelősök: Vereczki Bálint Zoltán, Móni Edina, Rajna Franciska

\-    Tartam: 3 nap

## 7.3       Prototípus I. (modellfüggő)

Ennek a feladatnak az a célja, hogy egy bemutatásra alkalmas, működő oldal el legyen készítve.

Részfeladatai a következők:

### 7.3.1   Prototípus

\-    Felelősök: Vereczki Bálint Zoltán, Móni Edina, Rajna Franciska

\-    Tartam: 3 nap

### 7.3.2   Tesztelési dokumentum

\-    Felelősök:

\-    Tartam: 4 nap

### 7.3.3   Bemutató elkészítése és bemutatása

\-    Felelősök: Vereczki Bálint Zoltán, Móni Edina, Rajna Franciska

\-    Tartam: 4 nap


 

# 8  Részletes időbeosztás![img](file:///C:/Users/Franci/AppData/Local/Temp/msohtmlclip1/01/clip_image004.jpg) ![img](file:///C:/Users/Franci/AppData/Local/Temp/msohtmlclip1/01/clip_image006.jpg)

 


 

 

# 9  Projekt költségvetés

## 9.1       Átvétel

A projektet a megrendelő a következő eredménnyel vette át:

 

| Név                    | 1. leadás   | 2. leadás        | 3. leadás     | Össz. |
| ---------------------- | ----------- | ---------------- | ------------- | ----- |
|                        | Projektterv | UML és adatbázis | Prototípus I. |       |
| Vereczki Bálint Zoltán | 14          | 24               | 22            | 60    |
| Móni Edina             | 14          | 24               | 22            | 60    |
| Rajna Franciska        | 14          | 24               | 22            | 60    |

 

Eger, 2019. 12. 09.

​         		  ____________________________               												________________________

​          		 ____________________________         												      ____________________________

​                   Az átadó részéről                                	     Az átvevő részéről

