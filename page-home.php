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
            <h1 class="header__title">Wpisy</h1>
            <span class="header__strip"></span>
            <div class="header__subtitle">Dostępne jest <a href="<?php echo get_post_type_archive_link('post'); ?>">archiwum wpisów</a>.</div>
        </div>
        <div class="row">

            <?php
            // the query
            $the_query = new WP_Query(  array( 'post_type' => 'post', 'posts_per_page'         => '6' ) ); ?>

            <?php if ( $the_query->have_posts() ) : ?>


                <!-- the loop -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                    get_template_part( 'template-parts/home', get_post_format() );

                endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

        </div>
    </div>


<?php
get_footer();
