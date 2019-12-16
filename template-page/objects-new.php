<?php
/*
 * Template Name: Объекты
 */
get_header();
?>

<main>
    <?php get_template_part('template-part/head-banner'); ?>
    <section class="content-block_categories"
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
    <style>
        .building-object {
            display: block;
        }
    </style>
    <section class="content-block_objects">
        <div class="container">
            <?php

            $args = array(
                'post_type'      => 'objects',
                'orderby'        => 'date',
                'taxonomy'       => 'iskusstvennye-sooruzhenija',
                'order'          => 'DESC',
                'posts_per_page' => '-1'
            );
            query_posts($args);

            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part('template-part/template-object');
                endwhile;
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
