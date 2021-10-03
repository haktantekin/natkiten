<?php get_header(); ?>

<div class="col-lg-6 col-12">
    <div class="content-list">
        <div class="top-info-bar">
            <div class="go-back" onclick="history.back()">
                <i class="fas fa-arrow-circle-left"></i> Go Back
            </div>
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
                <div class="content-item">
                    <div class="content-text">
                        <div class="cat-user">
                        <?php the_excerpt();  ?> <span>@readingquotes</span>
                            <div class="content-date">
                                <?php the_time('d.m.y ') ?>
                            </div>
                            <div class="content-cat">
                                <?php the_category(', ') ?>
                            </div>
                        </div>
                        <h1 class="content-quotes">
                            <?php the_content(); ?>
                        </h1>
                    

                        <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full');
                        $nowebp = str_replace(".webp", "", $url);
                        $nowebp = $nowebp;
                        ?>
                        <?php
                        if (has_post_thumbnail()) {
                            echo '<div class="content-img">';
                            the_post_thumbnail('full', array('alt' => get_the_title()));
                            echo '</div>';
                        } else {
                        }
                        ?>
                        <div class="content-tags">
                            <?php
                            $before = '';
                            $seperator = '';
                            $after = '';
                            the_tags($before, $seperator, $after);
                            ?>
                        </div>
                    </div>
                    <?php comments_template() ?>
                </div>

            <?php endwhile; ?>
            <?php wpex_pagination(); ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

        <?php if (have_posts()) : ?>
            <?php
            $cat = get_the_category();
            $catOK = $cat[0]->cat_ID; //if multiple categories
            $postID = $post->ID;
            query_posts(
                array(
                    'cat' => $catOK,
                    'post__not_in' => array($postID)
                )
            );
            while (have_posts()) : the_post(); ?>
                <div class="content-item hover">
                    <div class="content-text">
                        <div class="cat-user">
                            Reading Quotes <span>@readingquotes</span>
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
                            <span class="quators"><?php the_excerpt();  ?></span>
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
    </div>
</div>
<?php get_footer(); ?>