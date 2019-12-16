<?php
/*
 * Template Name: Вакансии
 */
get_header();
?>
    <main>
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block" style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg-7.png) repeat; background-size: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content-block__sub-headline">Список вакансий</div>
                        <div class="border-bottom-block bdr-btm-b_slim"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php
                        $args = array(
                            'post_type' => 'jobs',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'ASC'
                        );

                        $jobs = query_posts($args);

                        foreach ($jobs as $job) : ?>
                            <div class="vacancy">
                                <div class="vacancy__name">
                                    <div class="triangle-switch"></div>
                                    <?php echo esc_html( get_the_title($job->ID) ); ?>
                                </div>
                                <div class="vacancy__info" style="display: none;">
                                    <div class="vacancy__info-part">
                                        <div class="list-headline">ОБЯЗАННОСТИ:</div>
                                        <?php echo get_field('duties', $job->ID); ?>
                                    </div>
                                    <div class="vacancy__info-part">
                                        <div class="list-headline">ТРЕБОВАНИЯ:</div>
                                        <?php echo get_field('requirements', $job->ID); ?>
                                    </div>
                                    <div class="vacancy__info-part">
                                        <div class="list-headline">УСЛОВИЯ:</div>
                                        <?php echo get_field('conditions', $job->ID); ?>
                                    </div>
                                    <div class="vacancy__info-part">
                                        <div class="list-headline">КОНТАКТНАЯ ИНФОРМАЦИЯ:</div>
                                        <?php echo get_field('contact-info', $job->ID); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
