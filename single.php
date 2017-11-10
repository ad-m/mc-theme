<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mc_theme
 */

get_header(); ?>
    <div class="container">
        <div class="section">
            <?php
            while (have_posts()) : the_post();

                get_template_part('template-parts/content', get_post_type());

            endwhile; // End of the loop.
            ?>
        </div>
    </div>
<?php
get_footer();
