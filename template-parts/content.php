<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mc_theme
 */

?>
    <article id="post-<?php the_ID(); ?>" class="article">
        <?php
        if (is_singular() && has_post_thumbnail()) :
            the_post_thumbnail('large', ['class' => 'article__cover']);
        endif;
        ?>
        <div class="row">
            <div class="col-9">
                <header class="article__header">
                    <?php
                    if (is_singular()) :
                        the_title('<h1 class="article__title">', '</h1>');
                        ?>
                        <div class="header__strip"></div><?php
                    else :
                        the_title('<h2 class="article__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif;
                    ?>
                </header><!-- .article__header -->

                <div class="article__content">
                    <?php
                    the_content(sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'mc_theme'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        get_the_title()
                    ), !is_singular());

                    ?>
                </div><!-- .article__content -->
                <?php if (is_singular()) : ?>
                    <div class="article__navigation">
                        <?php
                        echo mc_theme_the_post_navigation();
                        ?>
                    </div><!-- .article__navigation -->
                <?php endif; ?>
            </div>
            <div class="col-3">
                <div class="article__metrics">
                    <?php mc_theme_metric(); ?>
                </div>
                <?php if (has_post_thumbnail() and !is_singular()): ?>
                    <div class="article__icon">
                        <?php
                        the_post_thumbnail("thumbnail", ['class' => "post-index__thumbnail"]);
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
<?php if (comments_open() || get_comments_number()) : ?>
    <div class="row">
        <div class="col-9">
            <?php
            comments_template();
            ?>
        </div>
    </div>
<?php endif; ?>