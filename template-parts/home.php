<div class="col-lg-6">
    <div class="post-index">
        <?php if (has_post_thumbnail()): ?>
            <div class="post-index__icon">
                <?php
                the_post_thumbnail('post-thumbnail', ['class' => "post-index__thumbnail"]);
                ?>
            </div>
        <?php endif; ?>
        <div <?php post_class("post-index__content"); ?>>
            <?php
            the_title('<h2 class="post-index__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            ?>
            <div class="post-index__meta">
                <?php echo get_the_date(); ?>
                |
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>'"><?php esc_html_e(get_the_author()) ?></a>
            </div>
        </div>
    </div>
</div>
