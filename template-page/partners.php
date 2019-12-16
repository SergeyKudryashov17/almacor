<?php
/*
 * Template Name: Заказчики
 */
get_header();
?>
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
                    <h1 class="head-banner__headline <?php echo $right_class_headline; ?>"><?php the_title(); ?></h1>
                    <div class="head-banner__desc <?php echo $right_class_desc; ?>">
                        <?php the_field('text-block'); ?>
                        <a href="#certificate" class="button button_all-white button_big">
                            <img class="button__icon" src="<?php echo get_template_directory_uri(); ?>/img/svg-icon/005-recommended-white.svg" alt="">
                            Нас рекомендуют
                        </a>
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
                <div class="list-partners">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="content-block__sub-headline mar-btn-20">ОСНОВНЫМИ НАШИМИ ЗАКАЗЧИКАМИ, НАЧИНАЯ С 2012<br> ГОДА ПО НАСТОЯЩЕЕ ВРЕМЯ, ЯВЛЯЮТСЯ:</h2>
                            <div class="border-bottom-block bdr-btm-b_slim brd-btm-long"></div>
                        </div>
                    </div>
                    <?php
                    $list_main_partners = get_field('list-main-partners');
                    foreach ($list_main_partners as $partner) : ?>
                        <div class="row partner">
                            <div class="col-xl-3 col-md-4 col-sm-5 col-12 parnter__img">
                                <img src="<?php echo $partner['logo'] ?>" alt="">
                            </div>
                            <div class="col-xl-9 col-md-8 col-sm-7 col-12 partner__name">
                                <p><?php echo $partner['text']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="list-partners">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="content-block__sub-headline mar-btn-20">ТЕХНИЧЕСКИЕ ЗАКАЗЧИКИ:</h2>
                            <div class="border-bottom-block bdr-btm-b_slim brd-btm-long"></div>
                        </div>
                    </div>
                    <?php
                    $list_partners_now = get_field('list-partners-now');
                    foreach ($list_partners_now as $partner) : ?>
                        <div class="row partner">
                            <div class="col-xl-3 col-md-4 col-sm-5 col-12 parnter__img">
                                <img src="<?php echo $partner['logo'] ?>" alt="">
                            </div>
                            <div class="col-xl-9 col-md-8 col-sm-7 col-12  partner__name">
                                <p><?php echo $partner['text']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="content-block" id="certificate">
            <div class="container">
                <div class="row">
                    <?php
                    $list_certificates = get_field('list-certificates');
                    foreach ($list_certificates as $certificate) : ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="certificate">
                                <img src="<?php echo $certificate['certificate']; ?>" alt="">
                                <a href="<?php echo $certificate['certificate']; ?>"
                                   class="certificate__active"
                                   data-lightbox="image-1">
                                    <span>Смотреть полностью</span>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
