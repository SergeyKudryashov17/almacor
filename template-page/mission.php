<?php
/*
 * Template Name: Миссия
 */
get_header();
?>
    <main>
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block"
                 style="background: url(<?php echo get_template_directory_uri();?>/img/bg-12.png;) no-repeat;
                        background-size: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-block__headline"></h2>
                        <div class="border-bottom-block content-block__border-btm bdr-btm-b_slim brd-btm-long"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-11 col-12 mx-auto">
                        <div class="quote">
                            <?php
                            while( have_posts() ) : the_post();
                                the_content();
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>