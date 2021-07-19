# Adresář - Ukázkový projekt

Aplikace adresář umožňuje základní správu kontaktů a je i základem pro kompletní administraci.

## Struktura aplikace Adresář
bootstrap/
├── dist/
│   ├── css/
│   └── js/
├── site/
│   └──content/
│      └── docs/
│          └── 5.0/
│              └── examples/
├── js/
└── scss/

The scss/ and js/ are the source code for our CSS and JavaScript. The dist/ folder includes everything listed in the precompiled download section above. The site/docs/ folder includes the source code for our documentation, and examples/ of Bootstrap usage. Beyond that, any other included file provides support for packages, license information, and development.

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
Vytvořte soubor config.php pomocí vzorového souboru config_example.php, případně spusťte instalaci načtením aplikace v prohlížeči (beta).
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