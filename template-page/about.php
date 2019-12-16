<?php
/*
 * Template Name: О нас
 */
get_header();
?>
    <main>
        <?php get_template_part('template-part/head-banner') ?>
        <section class="content-block" style="background: url('<?php echo get_template_directory_uri(); ?>/img/bg-5.png'); background-size: 100% 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 order-lg-1 order-2 text-block">
                        <?php the_field('main-info'); ?>
                        <a href="<?php the_field('link-page'); ?>" class="button button_gradient-brown button_shadow">
                            <?php the_field('txt-btn'); ?>
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-12 order-lg-2 order-1 vertical-align align-items-center">
                        <img class="brd-rad-img mw-90 mar-btn-20 shadow-img" src="<?php the_field('img-main-info'); ?>" alt="">
                        <div class="text-caption">
                            Торговая марка, свидетельство на товарный знак  № 439441 зарегистрированный в Патентном ведомстве РФ 20.06.2011 г. 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-block" style="background: url('<?php echo get_template_directory_uri(); ?>/img/bg-4.png'); background-size: 100% 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-block__headline">НАМИ ПОСТРОЕНО</h2>
                        <div class="border-bottom-block content-block__border-btm"></div>
                    </div>
                </div>
                <div class="row">
                    <?php
                     $view_projects = get_field('view-project');
                     foreach ($view_projects as $view_project): ?>
                         <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                             <div class="circe-icn">
                                 <img class="circe-icn__img" src="<?php echo $view_project['icon-type']; ?>" alt="">
                                 <div class="circe-icn__caption"><?php echo $view_project['desc-type']; ?></div>
                             </div>
                         </div>
                     <?php
                     endforeach;
                    ?>
                </div>
                <div class="row indent-part">
                    <div class="col-12">
                        <h2 class="content-block__headline">Крупные проекты в которых мы приняли участие</h2>
                        <div class="border-bottom-block content-block__border-btm"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php
                     $i = 0;
                     $projects = get_field('projects');
                     foreach ($projects as $project):
                         if(($i == 0) || (($i % 2) == 0)):
                            $j = 0; ?>
                             <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                 <div class="row">
                         <?php endif; ?>
                             <div class="col-sm-6 col-12">
                                 <div class="icn-small">
                                     <div class="icn-small__img">
                                         <img src="<?php echo $project['icon-project'] ?>" alt="">
                                     </div>
                                     <div class="icn-small__caption gradient-text"><?php echo $project['time']; ?></div>
                                     <div class="icn-small__desc"><?php echo $project['name-project']; ?></div>
                                 </div>
                             </div>
                         <?php
                         $j++;
                         if($j == 2): ?>
                                </div>
                             </div>
                         <?php
                         endif;
                         $i++;
                     endforeach;
                    ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>