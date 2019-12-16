<?php
/*
 * Template Name: Партнеры
 */
get_header();
?>
    <main>
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-block__headline">Партнеры</h2>
                        <div class="border-bottom-block content-block__border-btm"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-center">
                            <?php
                            $logo_partners = get_field('logo-partners');
                            foreach ($logo_partners as $logo) : ?>
                                <img class="logo-company" src="<?php echo $logo['logo']; ?>" alt="">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mini-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-block__headline">Проектировщики</h2>
                        <div class="border-bottom-block content-block__border-btm"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-wrap align-items-center justify-content-center">
                            <?php
                            $logo_proektir = get_field('logo-proektir');
                            foreach ($logo_proektir as $logo) : ?>
                                <img class="logo-company" src="<?php echo $logo['logo']; ?>" alt="">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
