<?php get_header(); ?>
    <main>
        <section class="head-banner"
                 style="background: url('<?php echo get_template_directory_uri(); ?>/img/head-banner.png') no-repeat;
                         background-size: cover;
                         background-position: center">
            <div class="container">
                <div class="col-12">
                    <h1 class="head-banner__headline"><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="shadow-banner"></div>
        </section>
        <section class="content-block">
            <div class="container">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="sliderPortfolio">
                                    <?php
                                    $slides = get_field('photo-object');
                                    foreach ($slides as $slide) :
                                        $img = wp_get_attachment_image_url( $slide['photo'], 'full' ); ?>
                                        <img src="<?php echo $img ?>" alt="">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="building-object__desc">
                                    <span>НАЗВАНИЕ ОБЪЕКТА</span>
                                    <?php the_field('name-object'); ?>
                                </div>
                                <div class="building-object__desc">
                                    <span>АДРЕС ОБЪЕКТА</span>
                                    <?php the_field('address-object'); ?>
                                </div>
                                <div class="building-object__desc">
                                    <span>ВРЕМЯ ПРОВЕДЕНИЯ РАБОТ</span>
                                    <?php the_field('time-job-object'); ?>
                                </div>
                                <div class="building-object__desc">
                                    <span>ОПИСАНИЕ СОСТАВА РАБОТ:</span>
                                    <?php the_field('desc-job-object'); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
