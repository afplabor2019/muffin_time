# Követelményspecifikáció

**0. Vezetői összefoglaló**

Világunk annyira felgyorsult, hogy lassan már mi sem tudunk lépést tartani vele. Rengeteg információt adunk-kapunk, közülük számtalan olyan van, amire a későbbiekben is szükségünk lehet, ezeket pedig valahogy tárolnunk kell. A 21. században sajnos még elvétve akad pár hely, ahol papíralapú nyilvántartást, rendszerezést használnak, ami a tömérdek mennyiségű információ és ezek gyors előkeresése mellett nem a leghatékonyabb módszer. Célunk, hogy az adatokkal történő műveletek a lehető leghatékonyabban és legegyszerűbben elvégezhetőek legyenek.

**1. Jelenlegi helyzet leírása**

Jelenleg a környező településeken, és valószínűleg az ország több pontján is léteznek cégek, amelyek akár a raktárkészletet, akár a dolgozók szabadságát papíron vezetik. Ez egyrészről azért is probléma, mert egyáltalán nem hatékony módszer, másrészt ha eltűnik / netán egy tűzesetben elégnek ezek a dokumentumok, akkor a pótlásuk majdhogynem lehetetlenné válik. Ezek az adatok sokkal egyszerűbben és biztonságosabban tárolhatók egy adatbázisban, amelyben szereplő adatokat egy személyre szabott kliens felületén tudjuk manipulálni.

**2. Vágyálom rendszer**

A végcél egy olyan rendszer elkészítése, amely alkalmazkodik az adott cég céljaihoz, és minden szükséges funkciót tartalmaz, ezzel biztonságosabb és hatékonyabb munkavégzést biztosítva az alkalmazottaknak. A végső rendszerben a cég nyilvántartásba veheti raktárkészletét, alkalmazottjait, ezeket pedig módosítani is tudja. Az első változat kizárólag a rendszer működéséhez szükséges alapbeállításokat és funkciókat tartalmazza majd. Ezek a későbbi verziókban bővítésre kerülnek, a frissítések csoportokra lesznek bontva, és minden csoport kizárólag egy-egy terület változtatásaival és fejlesztésével fog foglalkozni.

**3. Jogi háttér**

????

**4. Jelenlegi üzleti folyamatok modellje**

1. Egy cég felkeres bennünket, mely még nem rendelkezik elektronikus rendszerrel / frissebb rendszert szeretne használni.
2. A cég jelenleg minden fontos adatot papíralapon vezet magának, de már átláthatatlanok az adatok.

**5. Igényelt üzleti folyamatok modellje**

1. Egy olyan rendszer fejlesztése, mely segíti a cég alkalmazottainak munkáját, lehetővé teszi fontos adataik biztonságos helyen való tárolását, hozzáférését.
2. A rendszerünket a cég igényeihez mérten tervezzük és valósítjuk meg, hogy számukra a lehető legkényelmesebb megoldást tudjuk nyújtani.
3. A cég egyik alkalmazottja (aki előzetes oktatást kapott) munkába áll, és bemutatja munkatársainak a rendszer működését, használatát, lehetőségeit.

**6. Követelmény lista**

***6.1 Funkcionális követelmények:***

* *K1: Belépés*
  * A weboldalt csak olyan felhasználók vehetik igénybe, akik rendelkeznek hozzáféréssel. Sikeres autentikáció után az összes (jogosultságaiknak megfelelő) funkcióhoz hozzáférnek. Az oldalon regisztrációra **nincs** lehetőség.
* *K2: Elfelejtett jelszó helyreállítása*
  * Amennyiben egy felhasználó elfelejtette jelszavát, úgy kérhet az email címére egy jelszóhelyreállító linket, amin 1 órán keresztül megváltoztathatja a jelszavát.
* *K3: Különböző jogosultságok*
  * Az oldalon szükséges a jogosultságok megkülönböztetése, ugyanis pl. egy irodai alkalmazott nem férhet hozzá az ő felettesének funkciójaihoz. Több jogosultsági szint is bevezetésre kerül (külsős, hr, csoportvezető stb...)
* *K4: Adatbázisban található adatok manipulálása*
  * A rendszer lényege, hogy a cég mindennemű adata egy adatbázisban tárolódjon, amiket egy weboldalon keresztül létrehozni, módosítani, törölni tudnak. 

***6.2 Nemfunkcionális követelmények:***

* *K5: Letisztult design:*
  * A rendszer design legyen letisztult, átlátható, könnyen használható. Törekszünk a lehető legkényelmesebb kinézetre.
* *K6: Biztonság*:
  * Az adatbázisban tárolt adatok a lehető legbiztonságosabb módon kerüljenek eltárolásra, külső behatásra ne történhessen adatlopás.

**7. Irányított és szabad szöveges riportok szövege**

Kivitelező: Legyen szíves írja le nekem, pontosan milyen rendszerre is lenne szükségük!

Megrendelő: Egy olyan programot szeretnénk, amely a cégünk minden adatát nyilvántartásba tudja venni, raktárkészletünket pedig élőben nyomon tudjuk követni.

Kivitelező: Konkrétan mivel foglalkozik a cégük?

Megrendelő: ...

Kivitelező: Van konkrét elképzelésük, hogy milyen funkciókra lenne szükség? Gondolok itt a raktárkészlet nyilvántartásán kívül a dolgozók / alkalmazottak adatainak tárolására és hasonlókra?

Megrendelő: ...

Kivitelező: Rendben! Amennyiben a használt technológiákra és eszközökre nincsen semmilyen megkötésük, akkor felépítjük a specifikációt, amelyet aztán továbbítunk Önöknek. Ezt alaposan olvassák el, hogy minden igényüknek kielégítő-e a rendszer. Ha igen, megkezdjük a munkát, ha nem, akkor további egyeztetésre lesz szükség a pontosítás érdekében.

**8. Fogalomszótár**

- bug: fejlesztési hiba, mely miatt a program nem a várt eredményt hozza
- backend: a rendszer kiszolgálója, ahonnan az alkalmazás elérhető
- frontend: a rendszerből kijutó adatokat prezentálja, illetve a bejövő adatokat ez fogadja és továbbítja a backend számára
- kliens: a felhasználó által használt program, amellyel az adatmanipuláció elvégezhető
