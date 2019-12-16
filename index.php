<?php get_header(); ?>
    <main>
        <section class="light-shadow-bottom">
            <div class="main-slider">
                <?php
                 $slides = get_field('slider');
                 foreach ($slides as $slide): ?>
                     <div class="main-slide" style="background: url('<?php echo $slide['img_slide']; ?>'); background-size: cover; background-position: center;">
                        <div class="shadow-banner shadow-banner_light"></div>
                        <div class="container h-100 position-relative">
                            <div class="main-slide__content">
                                <h2 class="main-slide__headline"><?php echo $slide['name_slide']; ?></h2>
                                <div class="border-bottom-block main-slide__border-btm"></div>
                                <div class="main-slide__description">
                                    <?php echo $slide['desc_slide']; ?>
                                </div>
                                <a href="<?php echo $slide['page']; ?>" class="main-slide__link button button_small button_white">Подробнее</a>
                            </div>
                        </div>
                    </div>
                 <?php
                 endforeach;
                ?>
            </div>
        </section>
        <section class="content-block" style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg.png) no-repeat; background-size: 100% 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-block__headline">Новости компании</h2>
                        <div class="border-bottom-block content-block__border-btm"></div>
                    </div>
                </div>
                <div class="row news-list">
                    <?php
                    $args = array(
                        'order'          => 'DESC',
                        'orderby'        => 'date',
                        'cat'            => 10,
                        'posts_per_page' => 4
                    );
                    $news = query_posts($args);
                    foreach ($news as $new) :
                        $desc = get_field('short-desc-news', $new->ID);
                        if(strlen($desc) > 150) {
                            $short_desc = cutStr($desc, 300, ' ...');
                        } else {
                            $short_desc = $desc;
                        }
                        ?>
                        <div class="col-xl-3 col-lg-5 col-md-6 col-sm-9 col-11">
                            <a href="<?php echo get_permalink($new->ID); ?>" class="new-item">
                                <img class="new-item__img" src="<?php the_field('image-news', $new->ID) ?>">
                                <div class="new-item__headline"><?php echo $new->post_title ?></div>
                                <div class="new-item__border-btm border-bottom-block"></div>
                                <div class="new-item__date"><?php the_field('date-news', $new->ID); ?></div>
                                <div class="new-item__desc"><?php echo $short_desc; ?></div>
                                <a class="new-item__button" href="<?php echo get_permalink($new->ID); ?>">Подробнее</a>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="http://almacor-group.ru/category/news/" class="button button_big button_brown">Архив новостей</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-block__headline">ПОЧЕМУ МЫ?</h2>
                        <div class="border-bottom-block content-block__border-btm"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php
                     $fst_adv = get_field('1_advanteges');
                     $scd_adv = get_field('2_advanteges');
                     $three_adv = get_field('3_advanteges');
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-10">
                        <div class="why-us-block">
                            <div class="why-us-block__big-num">1</div>
                            <div class="why-us-block__headline">
                                <?php if($fst_adv[0]['acf_fc_layout'] == 'Текст'): ?>
                                    <div class="gradient-text"><?php echo $fst_adv[0]['text_advanteges']; ?></div>
                                <?php elseif($fst_adv[0]['acf_fc_layout'] == 'Изображение'): ?>
                                    <img src="<?php echo $fst_adv[0]['img_advantages']; ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="why-us-block__desc">
                                <?php
                                if($fst_adv[1]['acf_fc_layout'] == 'Текст'):
                                    echo $fst_adv[1]['text_advanteges'];
                                else: ?>
                                    <img src="<?php echo $fst_adv[1]['img_advantages']; ?>" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-10">
                        <div class="why-us-block">
                            <div class="why-us-block__big-num">2</div>
                            <div class="why-us-block__headline">
                                <?php if($scd_adv[0]['acf_fc_layout'] == 'Текст'): ?>
                                    <div class="gradient-text"><?php echo $scd_adv[0]['text_advanteges']; ?></div>
                                <?php elseif($scd_adv[0]['acf_fc_layout'] == 'Изображение'): ?>
                                    <img src="<?php echo $scd_adv[0]['img_advantages']; ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="why-us-block__desc">
                                <?php
                                if($scd_adv[1]['acf_fc_layout'] == 'Текст'):
                                    echo $scd_adv[1]['text_advanteges'];
                                else: ?>
                                    <img src="<?php echo $scd_adv[1]['img_advantages']; ?>" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-10">
                        <div class="why-us-block">
                            <div class="why-us-block__big-num">3</div>
                            <div class="why-us-block__headline">
                                <?php if($three_adv[0]['acf_fc_layout'] == 'Текст'): ?>
                                    <div class="gradient-text"><?php echo $three_adv[0]['text_advanteges']; ?></div>
                                <?php elseif($three_adv[0]['acf_fc_layout'] == 'Изображение'): ?>
                                    <img src="<?php echo $three_adv[0]['img_advantages']; ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="why-us-block__desc">
                                <?php
                                if($three_adv[1]['acf_fc_layout'] == 'Текст'):
                                    echo $three_adv[1]['text_advanteges'];
                                else: ?>
                                    <img src="<?php echo $three_adv[1]['img_advantages']; ?>" alt="">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <a href="http://almacor-group.ru/zakazchiki/#certificate" class="banner-link">
                            <img src="http://almacor-group.ru/wp-content/uploads/2019/09/banner-1.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6 col-12">
                        <a href="http://almacor-group.ru/mass-media/" class="banner-link">
                            <img src="http://almacor-group.ru/wp-content/uploads/2019/09/banner-2.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>