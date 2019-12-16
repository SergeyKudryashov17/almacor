<?php
/*
 * Template Name: Объекты (вывод всех объектов)
 */
get_header();
?>

    <main>
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block_objects"
                 style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg-11.png) no-repeat;
                        background-size: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        $args = array(
                            'taxonomy'   => 'type-objects',
                            'hide_empty' => false,
                            'orderby'    => 'id',
                            'order'      => 'ASC'
                        );
                        $terms = get_terms($args);
                        foreach ($terms as $term) :
                            if($term->name == 'Искусственные сооружения')  $active_class = 'type-objects__active';
                            else  $active_class = ''; ?>
                            <div class="type-objects <?php echo $active_class; ?>" data-type="<?php echo $term->slug; ?>">
                                <span><?php echo $term->name; ?></span>
                            </div>
                        <?php endforeach; ?>
                        <div class="type-objects" data-type="all">
                            <span>Все объекты</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-block_objects">
            <div class="container">
                <?php
                $args = array(
                    'post_type' => 'objects',
                    'orderby'    => 'date',
                    'order'      => 'DESC',
                    'posts_per_page' => -1
                );
                $objects = query_posts($args);
                foreach ($objects as $object) :
                    $terms = get_the_terms($object->ID, 'type-objects'); ?>

                    <div class="building-object" data-type="<?php echo $terms[0]->slug ?>">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="sliderPortfolio">
                                    <?php
                                    $slides = get_field('photo-object', $object->ID);
                                    foreach ($slides as $slide) : ?>
                                        <img src="<?php echo $slide['photo']; ?>" alt="">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="building-object__desc">
                                    <span>НАЗВАНИЕ ОБЪЕКТА</span>
                                    <?php the_field('name-object', $object->ID); ?>
                                </div>
                                <div class="building-object__desc">
                                    <span>АДРЕС ОБЪЕКТА</span>
                                    <?php the_field('address-object', $object->ID); ?>
                                </div>
                                <div class="building-object__desc">
                                    <span>ВРЕМЯ ПРОВЕДЕНИЯ РАБОТ</span>
                                    <?php the_field('time-job-object', $object->ID); ?>
                                </div>
                                <div class="building-object__desc">
                                    <span>ОПИСАНИЕ СОСТАВА РАБОТ:</span>
                                    <?php the_field('desc-job-object', $object->ID); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
