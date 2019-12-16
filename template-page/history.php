<?php
/*
 * Template Name: История
 */
get_header();
?>
    <main>
        <?php get_template_part('template-part/head-banner'); ?>
        <section class="content-block" style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg-9.png) no-repeat; background-size: 100% 100%;">
            <div class="container">
               <div class="row">
                   <div class="col-12">
                       <h2 class="content-block__headline">Основные вехи нашего развития</h2>
                       <div class="border-bottom-block content-block__border-btm"></div>
                   </div>
               </div>
               <div class="row history-slider">
                   <?php
                   $dates = get_field('main-date');
                   foreach ($dates as $date) : ?>
                       <div class="history-date">
                           <div class="history-date__year"><?php echo $date['date']; ?></div>
                           <img class="history-date__img" src="<?php echo $date['img'] ?>">
                           <div class="history-date__desc" lang="ru">
                               <?php echo $date['desc']; ?>
                           </div>
                       </div>
                   <?php endforeach;  ?>
                </div>
            </div>
        </section>
        <section class="content-block" style="background: url(<?php echo get_template_directory_uri(); ?>/img/bg-8.png) no-repeat; background-size: 100% 100%;">
            <div class="container">
                <div class="custom-list">
                    <div class="row">
                        <?php
                        $list_progress = get_field('list-progress');
                        $items = array();
                        foreach ($list_progress as $item) :
                            array_push($items, $item);
                        endforeach;
                        $count = count($items);
                        ?>
                        <div class="col-xl-6 col-lg-6 col-12">
                            <?php
                            for($i = 0; $i < $count; $i++) :
                                if(($i == 0) || (($i % 2) == 0)) : ?>
                                    <div class="custom-list__item">
                                        <div class="custom-list__marker">
                                            <span class="d-inline-block gradient-text"><?php echo $items[$i]['fact'] ?></span>
                                        </div>
                                        <span class="custom-list__desc">
                                            <?php echo $items[$i]['desc']; ?>
                                        </span>
                                    </div>
                                <?php endif;
                            endfor;
                            ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-12">
                            <?php
                            for($i = 0; $i < $count; $i++) :
                                if(($i % 2) != 0) : ?>
                                    <div class="custom-list__item">
                                        <div class="custom-list__marker">
                                            <span class="d-inline-block gradient-text"><?php echo $items[$i]['fact'] ?></span>
                                        </div>
                                        <span class="custom-list__desc">
                                            <?php echo $items[$i]['desc']; ?>
                                        </span>
                                    </div>
                                <?php endif;
                            endfor;
                            ?>
                            <a href="<?php echo get_permalink('1749'); ?>" class="button button_gradient-brown button_big">Полный перечень реализованных проектов</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
