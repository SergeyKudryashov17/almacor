<?php
/*
 * Template Name: География объектов
 */
get_header();
?>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <main>
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block_categories"
                 style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg-7.png);
                        background-size: 100%">
            <div class="container">
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
                        $color_class = get_field('colors_markers', 'type-objects_'.$term->term_id).'-type-objects'; ?>
                        <div class="type-objects_map <?php echo $color_class; ?>" data-type-map="<?php echo $term->slug; ?>">
                            <span><?php echo $term->name; ?></span>
                        </div>
                    <?php endforeach; ?>
                    <div class="type-objects_map type-objects__active" data-type-map="all">
                        <span>Все объекты</span>
                    </div>
                </div>

<!--                <div class="select-type">-->
<!--                    <div class="select-type__wrap">-->
<!--                        <select class="select-type__list" name="" id="">-->
<!--                            <option value="all">Все</option>-->
<!--                            --><?php
//                            $args_select = array(
//                                'taxonomy'   => 'type-objects',
//                                'hide_empty' => false,
//                                'orderby'    => 'id',
//                                'order'      => 'ASC'
//                            );
//                            $terms = get_terms($args_select);
//                            foreach ($terms as $term) :
//                                echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
//                            endforeach;
//                            ?>
<!--                        </select>-->
<!--                        <div class="select-type__submit">-->
<!--                            <span>Фильтровать</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div id="map-yandex-objects"></div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
