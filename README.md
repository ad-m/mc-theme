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

W przyszłości aktualizacja może być realizowaną z pomocą wtyczki [GitHub Updater](https://github.com/afragen/github-updater).

Konfiguracja
---

Domyślnie powinna zostać załatowana statyczna strona główna. W razie problemów zobacz wywołanie ``starter-content`` w ``wp-content/themes/mc_theme/index.php``.

Budowanie
---

W katalogu z wtyczką wykonaj:
```
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
apt-get install nodejs gettext -y;
npm install
./node_modules/.bin/gulp build
```

Alternatywnie:
```
vagrant up
```

Możliwe jest automatyczne budowanie wraz z wprowadzonymi zmianami poprzez wykonanie:

```
gulp
```

Tłumaczenie
---

Pliki tłumaczeń składają się z plików *.pot zawierających szablon plików tłumaczeń. Możliwe jest ich 
wygenerowanie z wykorzystaniem:
```
wp-makepot wp-theme /home/adas/Devel/mc-blog/wp-content/themes/mc_theme /home/adas/Devel/mc-blog/wp-content/themes/mc_theme/languages/mc_theme.pot
```
Polecenie wymaga narzędzi z pakietu [i18n-tools](https://codex.wordpress.org/I18n_for_WordPress_Developers#Using_the_i18n_tools).

Następnie konieczne jest wygenerowanie plików *.po dla danego języka. Zalecam wykorzystanie w tym celu oprogramowania 
Poedit. Edycja plików tłumaczeń jest możliwa także ze wsparciem [projektu Crowdin.com](https://crowdin.com/project/mc-theme). 
Zmiany wprowadzone w serwisie są synchronizowane z wydzieloną gałęzią ``l10n_master`` i systematycznie włączane. 

Podgląd wprowadzonych zmian jest możliwy po przebudowaniu plików *.mo poprzez polecenie:

```
gulp gettex
```

Nowe wydanie
---

Projekt został skonfigurowany do automatycznego wydania nowych wersji za pośrednictwem TravisCI. Wydanie nowej wersji
odbywa się wraz z odpowiednią zmianą jej numeru:

* ``npm version major`` - dla wydań major
* ``npm version minor`` - dla wydań minor
* ``npm version patch`` - dla wydań patch

Uwagi na temat finansowania i autorstwa
---

Oprogramowanie stworzone przez Karola Bregułę na rzecz Ministerstwa Cyfryzacji w ramach projektu "Staż - najlepszy start!"
realizowanym przez Uniwersytet Przyrodniczo – Humanistyczny w Siedlcach
w ramach Programu Operacyjnego Wiedza Edukacja Rozwój,
oś Priorytetowa III Szkolnictwo wyższe dla gospodarki i rozwoju,
działanie 3.1 Kompetencje w szkolnictwie wyższym,
nr projektu: POWR.03.01.00-00-S227/15
