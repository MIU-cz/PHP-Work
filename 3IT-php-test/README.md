# 3IT PHP - test

<img src="./docs/Screenshot 2023-08-30 221511.png" width=650>

## Links

- Popis práce na projektu: <https://miu-cz.github.io/PHP-Work/3IT-php-test/>
- GitHub: <https://github.com/MIU-cz/PHP-Work/tree/main/3IT-php-test>
- Deploy: <http://miu.jecool.net/new_sites/3IT-php-test/index.php/>

## Aplikace vyvinutá v čistém php + mySql + scss

Na hlavní stránce aplikace je "administrátorský koutek", který implementuje následující funkce:

- přidat databázi

> aplikace vytvoří databázi a vytvoří v ní tabulku, do které budou přidána data z nahraného souboru

- seznam ke stažení

> soubor seznamu ve formátu *.csv, data oddělená ","

Po načtení souboru jsou data zapsána do databázové tabulky a vytvořena v tabulkové formě na domovské stránce.

Tabulka se automaticky třídí podle pole "id".

Pole řazení můžete změnit kliknutím na odpovídající záhlaví tabulky.
Tabulka má funkci výběru řádku.

## struktura projektu

```
3IT-php-test\index.php
- hlavní stránka aplikace
3IT-php-test\engine
3IT-php-test\engine\linkdb.php
- obsahuje údaje o připojení v databázi
3IT-php-test\engine\generatedb.php
- automatické vytváření databáze a tabulek
3IT-php-test\engine\addfile.php
- nahrání souboru do složky na serveru a převod dat do tabulky
3IT-php-test\js
- základna js
3IT-php-test\src
3IT-php-test\src\css
- soubory stylu projektu
3IT-php-test\src\db
- složka pro uložení staženého souboru (cesta je uvedena v addfile.php)
3IT-php-test\src\img
- grafika
```
