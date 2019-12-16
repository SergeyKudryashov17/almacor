<?php
/*
 * Template Name: Контакты
 */

get_header();
?>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=29d30cc5-b654-41ae-aec8-d5a77e4e71ed&lang=ru_RU" type="text/javascript"></script>
    <main>
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-12">
                        <div class="contacts-info">
                            <?php the_field('contact-info'); ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-12">
                        <div id="map-yandex-contacts" data-address="<?php the_field('address') ?>"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
