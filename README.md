[![Build Status](https://travis-ci.org/ad-m/mc-theme.svg?branch=master)](https://travis-ci.org/ad-m/mc-theme)

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
gulp css
```
