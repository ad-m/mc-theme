<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mc_theme
 */

?>
    <div class="container">
        <div class="article">
            <?php
            if (has_post_thumbnail() and is_singular()):
            the_post_thumbnail("thumbnail", ['class' => "article__cover"]);
            endif;
            ?>
            <div class="article__body">
                <article class="article__content">
                    <div class="article__header">
                        <?php
                        if (is_singular()) :
                            the_title('<h2 class="article__title">', '</h2>');
                            ?>
                            <div class="header__strip"></div><?php
                        else :
                            the_title('<h2 class="article__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                        endif;
                        ?>
                    </div>
                    <div class="article__text">
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
                    </div>
                </article>
                <aside class="article__aside">
                    <div class="article__image">
                        <?php
                        if (has_post_thumbnail() and !is_singular()):
                            the_post_thumbnail("thumbnail");
                        endif; ?>
                    </div>
                    <div class="article__meta">
                        <?php mc_theme_metric(); ?>
                    </div>
                </aside>
            </div>
            <?php if(is_singular()): ?>
            <div class="article__navigation">
                <?php echo mc_theme_the_post_navigation();?>
            </div>
            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
        <?php if (comments_open() || get_comments_number()) :
            comments_template();
        endif; ?>
    </div>