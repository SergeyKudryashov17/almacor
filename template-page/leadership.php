<?php
/*
 * Template Name: Руководство
 */
get_header();
?>
    <main style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg-6.png) repeat-y; background-size: 100%">
        <section class="content-block">
            <div class="container">
                <?php
                 $leadership = get_field('leadership');
                 foreach ($leadership as $leader): ?>
                     <div class="leadership">
                            <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-5 col-12">
                                <img class="leadership__photo" src="<?php echo $leader['photo'] ?>">
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7 col-12">
                                <div class="leadership__wrp">
                                    <div class="leadership__name gradient-text"><?php echo $leader['name'] ?></div>
                                    <div class="leadership__position"><?php echo $leader['position'] ?></div>
                                    <div class="border-bottom-block bdr-btm-b_bold bdr-btm-b_brown"></div>
                                    <div class="leadership__info">
                                        <p><?php echo $leader['general-info'] ?></p>
                                    </div>
                                    <div class="leadership__info">
                                        <p class="headline-p dark-brown-color">ОБРАЗОВАНИЕ</p>
                                        <p><?php echo $leader['education']; ?></p>
                                    </div>
                                    <div class="leadership__info">
                                        <p class="headline-p dark-brown-color">ТРУДОВАЯ ДЕЯТЕЛЬНОСТЬ</p>
                                        <?php echo $leader['job']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                 <?php
                 endforeach;
                ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>