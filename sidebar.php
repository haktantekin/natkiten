    <div class="fixed-content col-lg-3">
        <div class="search-top">
            <form method="get" action="<?php bloginfo('url'); ?>">
                <input class="search-text" type="text" placeholder="Search..." autocomplete="off" list="searchtext_s" name="s" />
                <div class="input-button-icon">
                    <i class="fas fa-search"></i>
                    <input class="search-button" type="button" src="<?php bloginfo('template_url'); ?>" />
                </div>
            </form>
        </div>
        <div class="sidebar-categories">
            <h3>Categories</h3>
            <ul>
                <?php
                $args = array('orderby'   => 'name', 'order'     => 'ASC', 'hide_empty'    => '0',);
                $categories = get_categories($args);
                foreach ($categories as $category) {
                    $cat_ID = $category->term_id;
                    $cat_name = $category->name;
                    $cat_count = $category->count;
                    echo '<li><a href="' . get_category_link($cat_ID) . '" title="' . sprintf(__("View all posts in %s"), $cat_name) . '" ' . '><strong>' . $cat_name . '</strong> (' . $cat_count . ')</a></li>';
                }
                ?>
        </div>
        </ul>
    </div>