<div class="col-6">
    <div class="post-index">
        <?php
        if (has_post_thumbnail()) {
            ?>
            <div class="post-index__icon"><?php
            the_post_thumbnail("thumbnail", ['class' => "post-index__icon"]);
            ?></div><?php
        };
        ?>
        <div <?php post_class("post-index__content");?>>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title('<div class="post-index__title">', '</div>'); ?>
            </a>
            <div class="post-index__meta">
            <?php echo get_the_date(); ?>
            </div>
        </div>
    </div>
</div>
