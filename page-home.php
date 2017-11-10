<?php
/**
 *
 * Template Name: Home page
 *
 * @package mc_theme
 */

get_header();

?>

    <div class="section container">
    <div class="header">
        <h1 class="header__title"><?php _e("Posts", 'mc_theme'); ?></h1>
        <span class="header__strip"></span>
        <div class="header__subtitle">
            <?php
            printf(
                wp_kses(
                    /* translators: 1: link to public index of posts. */
                    __('There is an <a href="%1$s">archive of posts</a>.', 'mc_theme'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ),
                esc_url(get_permalink(get_option('page_for_posts')))
            );
            ?>
        </div>
        <div class="row">

            <?php
            // the query
            $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '6')); ?>

            <?php if ($the_query->have_posts()) : ?>


                <!-- the loop -->
                <?php while ($the_query->have_posts()) : $the_query->the_post();
                    get_template_part('template-parts/home', get_post_format());

                endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e('Sorry, no posts matched your criteria.','mc_theme'); ?></p>
            <?php endif; ?>

        </div>
    </div>


<?php
get_footer();
