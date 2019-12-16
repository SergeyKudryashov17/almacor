<?php get_header(); ?>
    <main>
        <section class="head-banner"
                 style="background: url('<?php the_field('head-banner'); ?>') no-repeat;
                     background-size: cover;
                     background-position: center">
            <div class="container">
                <div class="col-12">
                    <?php
                    if(get_field('position-text') == 'right') {
                        $right_class_headline = 'head-banner__headline_right';
                        $right_class_desc = 'head-banner__desc_right';
                    } else {
                        $right_class_headline = '';
                        $right_class_desc = '';
                    }
                    ?>
                    <h1 class="head-banner__headline <?php echo $right_class_headline; ?>"><?php single_cat_title(); ?></h1>
                    <div class="head-banner__desc <?php echo $right_class_desc; ?>">
                        <?php the_field('text-block'); ?>
                    </div>
                </div>
            </div>
            <?php
            $flag_shadow = get_field('shadow-banner');
            if($flag_shadow == 'true') : ?>
                <div class="shadow-banner"></div>
            <?php endif; ?>
        </section>
        <section class="content-block">
            <div class="container">
                <div class="row news-list">
                    <?php
                    if( have_posts() ) :
                        while( have_posts() ) : the_post();
                            $desc = get_field('short-desc-news', $new->ID);
                            if(strlen($desc) > 150) {
                                $short_desc = cutStr($desc, 300, ' ...');
                            } else {
                                $short_desc = $desc;
                            }
                            ?>
                            <div class="col-xl-3 col-lg-5 col-md-6 col-sm-9 col-11">
                                <a href="<?php echo get_permalink( get_the_ID() ); ?>" class="new-item">
                                    <img class="new-item__img" src="<?php the_field('image-news'); ?>">
                                    <div class="new-item__headline"><?php the_title(); ?></div>
                                    <div class="new-item__border-btm border-bottom-block"></div>
                                    <div class="new-item__date"><?php the_field('date-news'); ?></div>
                                    <div class="new-item__desc"><?php echo $short_desc; ?></div>
                                    <a class="new-item__button" href="<?php echo get_permalink( get_the_ID() ); ?>">Подробнее</a>
                                </a>
                            </div>
                            <?php
                        endwhile;
                        $args_page = array(
                            'end_size' => 2,
                            'mid_size' => 2,
                            'prev_next' => false
                        );
                        the_posts_pagination($args_page);
                    endif;
                    ?>
                </div>
                <?php  ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
