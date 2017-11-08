<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mc-blog
 */

?>

<div class="container">
    <div class="section row">
        <div class="col-6">
            <div class="header">
                <h1 class="header__title">O blogu</h1>
                <span class="header__strip"></span>
            </div>
            <p>To jest miejsce do mniej formalnej komunikacji, wymiany doświadczeń oraz udostępnienia tych rzeczy, które
                dla Państwa mogą być istotne i ciekawe.</p>
        </div>
        <div class="col-6">
            <div class="header">
                <h1 class="header__title">Znajdź nas</h1>
            </div>
            <p>Adres<br> Królewska 27<br> 00-500 Warszawa<br></p>
            <p>Godziny<br>Poniedziałek—piątek: 8:15–16:15</p>
        </div>
    </div>

    <div class="row section site-footer">
        <div class="col-6">
            <a href="http://mc.bip.gov.pl/">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIIAAACYBAMAAADaYCwzAAAAMFBMVEXRFjLqk6DcS2H54eTzwMjkeIj////WLUftoq387/HhZ3r1zNLaQVjvsLrmg5LfW26G8voPAAAACXBIWXMAAAsTAAALEwEAmpwYAAACUElEQVRo3u2Yvy8EQRTH313I+nHhKolotDqFXIO45JAglGrijDvnklVQqy4SjShWROEqhUriR6JQaCQ6hYhG4i+Qq9Rm3uzc7kUkM/vQeN+Cm5X77Pe9eW9mDADrh/ROFQiqmMCE/0gYz8UG84E7oQSpaDAGbe6EfYDIRB08d8I5wHVz4MdxiQiDAAGNkIceYhSVs2ciIVE9KEL58kmHX34xiay8FhwI8w2ATL8aHJp6mJWzspWzJvhqV/BqcvAGGXw4gRtFjzVBq0sOpBkMwdePHtwIsNgkmGeZwI2QMoSybx6d2hLSeyN1UAWtCavy8+bFgvzZZkuo6dAXQ4JstnZsVMyrDSEV/t4OCVltXwVzbUe4F9p6d0hohP31CNBnR+jDGQToCAk+9OKfltCLDUF3k4pGE0wtbQB8/Alh+GsU4BbF2tdMQrjWWWZyPT6bdfwuRLOZsyAUAd9UxIp602+VbRZgRaWtdhy5umYGbnVV57GQVUdszk3ZVrVKpVYHJgWmRXSUtOosDMN0dxVUNpqAtFV3Y8qVVDOpyeiMCEOWe3dlEFc5rKsD7cEzC4bl7l+Uaeyt6cW67qk8pK7k1NwFDueH0YLZ7FZmdH2vTN4QTiAQPxD8Y0JDdimNcOI985mWCb9H2KWKry5YLBaLxWKxWCwWi8X6VkfuOm4lJPl3/5xMqJAJrSYE2USyi488mVAkE+ImBNmEIJsQZBOCbCIxoUommPt8AqFKJhgTgmyCci24QyaUyARtQpBN0C5Is2TCMpmgTAiyCUE2QSUsfwLRnGLgIT/pkgAAAABJRU5ErkJggg==">
                Przejdź do strony Biuletynu Informacji Publicznej Ministerstwa Cyfryzacji
            </a>
        </div>
        <div class="col-6">
            <p>Artykuły zamieszczone w serwisie GOV.PL, w których nie podajemy żadnych dodatkowych informacji na temat
                praw autorskich, należą do informacji publicznych i udostępniamy je bezpłatnie. Korzystanie z nich,
                niezależnie od celu i sposobu korzystania, nie wymaga zgody Ministerstwa. Dostępne są w ramach licencji
                <a href="https://creativecommons.org/licenses/by/3.0/pl/">Creative Commons Uznanie Autorstwa 3.0
                    Polska</a>.</p>
        </div>
    </div>
    <footer class="authorship site-footer">
        <p><a href="<?php echo esc_url(__('https://wordpress.org/', 'mc_theme')); ?>"><?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf(esc_html__('Proudly powered by %s', 'mc_theme'), 'WordPress');
                ?></a> | <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf(esc_html__('Theme: %1$s by %2$s.', 'mc_theme'), 'mc_theme', '<a href="https://facebook.com/adam.dobrawy">Karol Breguła & Kamil Breguła</a>');
            ?></p>
    </footer>
</div>
<?php wp_footer(); ?>

</body>
</html>
