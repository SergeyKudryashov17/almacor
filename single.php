<?php get_header(); ?>
    <main>
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-block__headline content-block__headline_left"><?php the_title(); ?></h2>
                        <div class="border-bottom-block brd-btm-long"></div>
                        <div class="new-item__date new-item__date_on-page"><?php the_field('date-news'); ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="content-block__text">
                            <?php
                            $photos = get_field('photos');
                            if($photos != null) : ?>
                                <div class="content-block__slider">
                                    <?php foreach ($photos as $photo) : ?>
                                        <img src="<?php echo $photo['photo']; ?>" alt="">
                                    <?php endforeach; ?>
                                </div>
                            <?php
                            endif;

                            if ( have_posts() ) :
                                while ( have_posts() ) :
                                    the_post();
                                    the_content();
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
