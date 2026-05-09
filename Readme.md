Magyarországi Szélerőművek - Web-programozás 1 Gyakorlati Beadandó

Ez a projekt a Neumann János Egyetem Web-programozás 1 tantárgyának gyakorlati beadandó feladata. Az alkalmazás a magyarországi szélerőművek adatait dolgozza fel, bemutatva a technológiát és a hazai telepítéseket, egy modern, reszponzív, PHP-alapú webes környezetben.

Készítők:
Veszelszki Tamás (Neptun: PO4YGX)
Juhász Gábor (Neptun: R1HXNV) 

Az alkalmazás elérhetősége
Éles weboldal:http://magyarszel.nhely.hu/

---

Architektúra és Technológia
Az alkalmazás a Front-Controller tervezési mintára épül. Minden hálózati kérést az `index.php` (és az URL-újraírást végző `.htaccess`) fogad, amely biztonságosan irányítja a forgalmat a megfelelő logikai (`logicals/`) és vizuális (`templates/`) fájlok felé.
A dizájn kialakítása során a reszponzív HTML5/CSS3 (Flexbox) alapokat és vízszintes navigációs menüt használtunk.

---

Megvalósított Feladatrészek (Menüpontok)
A projekt a kiadott követelmények alapján az alábbi funkciókat tartalmazza:

1. Főoldal
    Multimédiás elemek beágyazása: egy helyi, saját tárhelyről betöltött videó (max 5 mp) és egy szolgáltatói (YouTube) videó.
    Google Maps integráció, amely a fiktív irodánk elhelyezkedését mutatja.
2. Képek (Galéria és Feltöltés)
    Szerveroldali fájlkezelés: a mappa tartalmának dinamikus beolvasása és megjelenítése.
    Jogosultságkezelés: új képet csak bejelentkezett felhasználó tölthet fel (PHP szintű ellenőrzéssel).
3. Kapcsolat
    Üzenetküldő űrlap, amelynél a validáció HTML5 attribútumok (`required`) nélkül, tisztán JavaScript (kliensoldal) és PHP (szerveroldal) segítségével történik.
    Az üzeneteket a rendszer adatbázisba menti (bejelentkezett felhasználó esetén névvel, különben "Vendég" megjelöléssel). Sikeres mentés után egy önálló "ötödik oldalon" jelenik meg a visszaigazolás.
4. Üzenetek
    Védett menüpont: kizárólag bejelentkezett felhasználók számára látható.
    Az adatbázisba mentett kapcsolatfelvételi üzeneteket listázza fordított időrendben (legfrissebb elől).
5. CRUD Alkalmazás
    Teljes körű Create, Read, Update, Delete funkció az adatbázis egy kiválasztott tábláján (Megyék).
    A műveletek megvalósítása szigorúan útválasztással (routing, pl. `?crud&action=add`) történik a Front-Controller logikájába ágyazva.
6. Felhasználókezelés (Regisztráció, Belépés, Kilépés)
    Teljes értékű munkamenet (Session) kezelés, jelszó titkosítással (SHA1).
    Dinamikus menü: a "Belépés" csak kijelentkezve, a "Kilépés" csak bejelentkezve látható.

---

 Adatbázis (PHP / MySQL)
A rendszer szerveroldali kommunikációja a `magyarszel` nevű relációs MySQL adatbázisra támaszkodik. A kapcsolat biztonságát a PDO (PHP Data Objects) technológia és az előkészített utasítások (Prepared Statements) garantálják.

Az adatbázis szerkezete:
 `felhasznalok`: A regisztrált felhasználók belépési adatai és titkosított jelszavai.
 `uzenetek`: A Kapcsolat űrlapon beküldött üzenetek és időbélyegek.
 `megye`, `helyszin`, `torony`: A szélerőművek szakmai adatai, egymással idegen kulcsos (Foreign Key) relációban összekötve, referenciális integritás védelemmel.

---

 Verziókövetés és Projektmunka
A fejlesztés a GitHub Forking (Projektmunka) módszerével, elosztott csapatmunkában készült. A módosítások és Pull Request-ek visszakövethetők a tároló Contributors (Közreműködők) és Commit history menüpontjaiban, ahol látható mindkét fejlesztő időben arányosan elosztott munkája.