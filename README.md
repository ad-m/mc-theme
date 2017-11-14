[![Build Status](https://travis-ci.org/ad-m/mc-theme.svg?branch=master)](https://travis-ci.org/ad-m/mc-theme)

[![Crowdin](https://d322cqt584bo4o.cloudfront.net/mc-theme/localized.svg)](https://crowdin.com/project/mc-theme)

mc_theme
===

Szablon strony zapewniający wygląd strony internetowej bloga Ministerstwa Cyfryzacji zgodny z schematem wizualnym Portalu RP.

Instalacja
---

```
wp core install 
wp config create --dbname=mc_blog_test --dbuser=root --dbpass=root
wp core install --url="http://localhost:8080/" --title="Blog Ministerstwa Cyfryzacji" --admin_user="user" --admin_email=user@example.com --admin_password="pass"
wp theme install https://github.com/ad-m/mc-theme/archive/master.zip
```

Konfiguracja
---

Domyślnie powinna zostać załatowana statyczna strona główna. W razie problemów zobacz wywołanie ``starter-content`` w ``wp-content/themes/mc_theme/index.php``.

Budowanie
---

W katalogu z wtyczką wykonaj:
```
npm install
gulp build
```

Tłumaczenie
---

Edycja plików tłumaczeń jest realizowana ze wsparciem [projektu Crowdin.com](https://crowdin.com/project/mc-theme). 
Zmiany wprowadzone w serwisie są synchronizowane z wydzielonym branchem ``l10n_master``. 
W celu edycji plików tłumaczeń wprowadź zmiany na Crowdin.com. Następnie wykonaj poniższe, aby włączyć je do projektu:
```
wp-makepot wp-theme /home/adas/Devel/mc-blog/wp-content/themes/mc_theme /home/adas/Devel/mc-blog/wp-content/themes/mc_theme/languages/mc_theme.pot
for file in `find . -name "*.po"` ; do msgfmt -o ${file/.po/.mo} $file ; done
git commit -a -m "Update translation" -a;
git push origin;
```

Uwagi na temat finansowania i autorstwa
---

Oprogramowanie stworzone przez Karola Bregułę na rzecz Ministerstwa Cyfryzacji w ramach projektu "Staż - najlepszy start!"
realizowanym przez Uniwersytet Przyrodniczo – Humanistyczny w Siedlcach
w ramach Programu Operacyjnego Wiedza Edukacja Rozwój,
oś Priorytetowa III Szkolnictwo wyższe dla gospodarki i rozwoju,
działanie 3.1 Kompetencje w szkolnictwie wyższym,
nr projektu: POWR.03.01.00-00-S227/15
