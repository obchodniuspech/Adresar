# Adresář - Ukázkový projekt

Aplikace adresář umožňuje základní správu kontaktů a je i základem pro jednoduchou administraci (šablonovací systém a menu).

## Uživatelské funkce Adresáře
- zobrazení seznamu kontaktů
- zobrazení detailu kontaktů v přehledu s možností prokliku na psaní e-mailu / vytáčení telefonu
- úprava kontaktu

## Technické funkce Adresáře
- jednoduché API
- šablonovací systém Twig - příprava menu + switcher na přidávání funkcí

## Použité externí balíčky
- Composer
	- Twig

- Bootstrap CSS & Bootstrap JS
- jQuery

## Instalace 
	
```
git clone https://github.com/obchodniuspech/Adresar.git
```


```
Vytvořte příslušnou databázi a importujte soubor /app/install.sql pro vytvoření databáze
```

```
Nastavte souboru /app/config.php oprávnění chmod 777
```
```
Nastavte složce /assets/cache/ oprávnění chmod 777
```


Nyní spusťte instalátor na webové adrese aplikace. Vyplňte údaje k databázi, mělo by dojít k automatickému vytvoření souboru config.php, pokud nastane chyba, postupujte prosím manuální instalací - viz níže.

## Instalace v případě selhání instalátoru (oprávnění)
```
Vytvořte soubor /app/config.php pomocí vzorového souboru /app/config_example.php
```

```
Instalace SQL - /app/install.sql
```
## Todos 

###### HTML / CSS
- menu - informace o uživateli vlevo dole 

###### PHP
- duplicitni kontakty - zabranit tomu
- vyhledávání v kontaktech (Elastic Search)
- vložení nového kontaktu (včetně napojení na registr firem Ares v případě firemních kontaktů)
- funkce štítků


###### Ostatni
- dokumentace (pokyny k instalaci)


## Licence

GNU General Public License
- Prosim uveďte zdroj