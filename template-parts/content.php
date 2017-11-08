<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mc-blog
 */

?>
<div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class("row"); ?>>
        <?php
        if (is_singular() && has_post_thumbnail()) :
            the_post_thumbnail('large', ['class' => 'article__cover']);
        endif;
        ?>
        <div class="col-9">
            <header class="article__header">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="article__title">', '</h1>');
                else :
                    the_title('<h2 class="article__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;
                ?>
            </header><!-- .article__header -->

            <div class="article__excerpt">
                <?php the_excerpt(); ?>
            </div><!-- .article__excerpt -->

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
                ));

                ?>
            </div><!-- .article__content -->

            <div class="article__navigation">
                <?php
                the_post_navigation();
                ?>
            </div><!-- .article__navigation -->
        </div>
        <div class="col-3">
            <div class="article__metrics">
                <?php mc_theme_metric(); ?>
            </div>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
    <div class="row">
        <div class="col-9">
            <?php

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

            ?>
        </div>
    </div>
</div>
