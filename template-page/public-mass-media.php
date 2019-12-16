<?php
/*
 * Template Name: Публикации в СМИ
 */
get_header();
?>
    <main style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg-6.png) repeat-y; background-size: 100%">
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        $args = array(
                            'post_type' => 'public-content',
                            'posts_per_page' => -1
                        );
                        $public = query_posts($args);
                        foreach ($public as $value) :
                            $link = get_field('link-material', $value->ID);
                            $material = get_field('material', $value->ID);
                            if($link == '') {
                                $public_link = $material;
                            } else {
                                $public_link = $link;
                            }?>
                            <div class="public">
                                <span class="public__date"><?php echo get_the_date('d.m.Y', $value->ID); ?></span>
                                <a class="public__link" href="<?php echo $public_link ?>" target="_blank">
                                    <span><?php echo $value->post_title; ?></span>
                                    <img class="public__icon" src="<?php echo get_field('icon-media', $value->ID); ?>" alt="">
                                </a>
                                <div class="public__text"><?php echo get_field('text-desc', $value->ID); ?></div>
                            </div>
                        <?php endforeach;  ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
