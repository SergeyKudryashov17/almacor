<?php
/*
 * Template Name: Преимущества
 */
get_header();
?>
    <main>
        <?php get_template_part('template-part/head-banner') ?>
        <div class="wrp-advantages">
            <?php
             $i = 0;
             $j = 0;
             $advantages = get_field('list-advantages');
            ?>
            <?php
             $backgorunds = get_field('section-bg');
             foreach ($advantages as $advantage):
                 if(($i % 2 == 0) || ($i == 0)): ?>
                     <section class="content-block content-advantages no-padding position-relative">
                        <img src="<?php echo $backgorunds[$j]['bg']; ?>" alt="" class="content-block__background">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-xl-6 col-lg-6 col-md-4 col-12"></div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-12 position-relative">
                                    <div class="headline-text headline-text_left gradient-text">
                                        <?php echo $advantage['text']; ?>
                                    </div>
                                </div>
                 <?php $j++; else: ?>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-12 position-relative">
                                    <div class="headline-text headline-text_right gradient-text">
                                        <?php echo $advantage['text']; ?>
                                    </div>
                                </div>
                 <?php
                 endif;
                 $i++;
                 if($i % 2 == 0): ?>
                                <div class="col-xl-6 col-lg-6 col-md-4 col-12"></div>
                            </div>
                        </div>
                     </section>
                 <?php
                 endif;
             endforeach;
            ?>
        </div>
    </main>
<?php get_footer(); ?>