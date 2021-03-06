<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mc_theme
 */

if (!function_exists('mc_theme_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function mc_theme_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x('Posted on %s', 'post date', 'mc_theme'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x('by %s', 'post author', 'mc_theme'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

    }
endif;

if (!function_exists('mc_theme_metric')) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function get_posted_on_string()
    {
        if (get_the_time('U') == get_the_modified_time('U')) {
            $time_published_string = '<time class="article__date published" datetime="%1$s">%2$s</time>';
        } else {
            $time_published_string = '<time class="article__date published updated" datetime="%1$s">%2$s</time>';
        }

        $time_published_string = sprintf($time_published_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date())
        );

        return sprintf(
        /* translators: %s: post publish date. */
            esc_html_x('Posted on %s', 'post date', 'mc_theme'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_published_string . '</a>'
        );
    }

    function get_updated_on_string()
    {
        if (get_the_time('U') == get_the_modified_time('U')) {
            return '';
        };
        $time_updated_string = '<time class="article__date updated" datetime="%1$s">%2$s</time>';
        $time_updated_string = sprintf($time_updated_string,
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );
        return sprintf(
        /* translators: %s: post update date. */
            esc_html_x('Updated on %s', 'post date', 'mc_theme'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_updated_string . '</a>'
        );
    }

    function get_byline_string()
    {
        return sprintf(
        /* translators: %s: post author. */
            esc_html_x('Published by %s', 'post author', 'mc_theme'),
            '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
        );
    }

    function mc_theme_metric()
    {
        echo '<h2 class="screen-reader-text">' . __('Metadata of post', 'mc_theme'). '</h2>';

        echo '<span class="posted-on">' . get_posted_on_string() . '</span>'; // WPCS: XSS OK.

        $updated_on = get_updated_on_string();

        if ($updated_on !== '') {
            echo '<span class="updated-on">' . $updated_on . '</span>'; // WPCS: XSS OK.
        }

        echo '<span class="byline"> ' . get_byline_string() . '</span>'; // WPCS: XSS OK.

    }
endif;

if (!function_exists('mc_theme_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function mc_theme_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'mc_theme'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'mc_theme') . '</span>', $categories_list); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'mc_theme'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'mc_theme') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'mc_theme'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'mc_theme'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;


if (!function_exists('mc_theme_get_media_uri')) :
    /**
     * Returns URI to media in template directory
     */
    function mc_theme_get_media_uri($path)
    {
        return esc_url(get_template_directory_uri() . "/" . $path . "?version=" . wp_get_theme()->get('Version'));
    }
endif;

if (!function_exists('mc_theme_echo_media_uri')) :
    /**
     * Echo URI to media in template directory
     */
    function mc_theme_echo_media_uri($path)
    {
        echo mc_theme_get_media_uri($path);
    }
endif;

if (!function_exists('mc_theme_the_post_navigation')):

function mc_theme_the_post_navigation($args = array())
{
    /*
        Retrieves the navigation to next/previous post, when applicable.
    */
    # Customized from wp-includes/link-template.php
    $args = wp_parse_args( $args, array(
        'prev_text'          => '%title',
        'next_text'          => '%title',
        'in_same_term'       => false,
        'excluded_terms'     => '',
        'taxonomy'           => 'category',
        'screen_reader_text' => __( 'Post navigation' ),
    ) );

    $navigation = '';

    $previous = get_previous_post_link(
        __('<div class="nav-previous"><span class="label">Previous post:</span>%link</div>', 'mc_theme'),
        $args['prev_text'],
        $args['in_same_term'],
        $args['excluded_terms'],
        $args['taxonomy']
    );

    $next = get_next_post_link(
        __('<div class="nav-next"><span class="label">Next post:</span>%link</div>', 'mc_theme'),
        $args['next_text'],
        $args['in_same_term'],
        $args['excluded_terms'],
        $args['taxonomy']
    );

    // Only add markup if there's somewhere to navigate to.
    if ( $previous || $next ) {
        $navigation = _navigation_markup( $previous . $next, 'post-navigation', $args['screen_reader_text'] );
    }

    return $navigation;
};
endif;
?>


