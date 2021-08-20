      <div class="col-lg-4 sidebar  hidden-xs">
        <?php get_sidebar(); ?>
      </div>
      </div>
      </div>
      </main>
      <div class="side-panel">
        <div class="side-panel-close">
          <i class="fa fa-times"></i>
        </div>
        <div class="search-top">
          <form method="get" action="<?php bloginfo('url'); ?>">
            <input class="search-text" type="text" placeholder="Search..." autocomplete="off" list="searchtext_s" name="s" />
            <div class="input-button-icon">
              <i class="fas fa-search"></i>
              <input class="search-button " type="button" src="<?php bloginfo('template_url'); ?>" />
            </div>
          </form>
        </div>
        <div class="side-panel-in">
          <?php wp_nav_menu(array('theme_location' => 'Header')); ?>
        </div>
        <div class="side-panel-categories">
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
      </div>
      <div class="mobile-bar">
        <ul>
          <li>
            <a href="http://readingquotes.com/"> <i class="fas fa-home"></i></a>
          </li>
          <li>
            <div class="mobile-menu-icon d-lg-none d-inline-block">
              <i class="fas fa-bars"></i>
            </div>
          </li>
        </ul>
      </div>
      <?php wp_footer(); ?>
      <script async src="<?php bloginfo('template_url'); ?>/assets/public/js/natkah-min.js"></script>
      </body>

      </html>