<?php get_header(); ?>

<div class="col-lg-6 col-12">
    <div class="content-list">
        <div class="top-info-bar">
            <h1>
                Reading Quotes
            </h1>
        </div>
        <?php wp_reset_query(); ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>
                <?php
                $the_cat = get_the_category();
                $category_name = $the_cat[0]->cat_name;
                $category_link = get_category_link($the_cat[0]->cat_ID);
                ?>
                <div class="content-item hover">
                    <div class="content-text">
                        <div class="cat-user">
                        <?php the_excerpt();  ?>
                            <div class="content-date">
                                <?php the_time('d.m.y ') ?>
                            </div>
                            <div class="content-cat">
                                <?php the_category(', ') ?>
                            </div>
                        </div>

                        <a href="<?php the_permalink(); ?>">
                            <h2 class="content-quotes">
                                <?php the_content(); ?>
                            </h2>
                            <span class="quators"></span>
                            <?php
                            if (has_post_thumbnail()) {
                                echo '<div class="content-img">';
                                the_post_thumbnail('full', array('alt' => get_the_title()));
                                echo '</div>';
                            } else {
                            }
                            ?>
                        </a>

                        <div class="content-tags">
                            <?php
                            $before = '';
                            $seperator = '';
                            $after = '';
                            the_tags($before, $seperator, $after);
                            ?>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wpex_pagination(); ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>
<?php get_footer(); ?>