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
            <h1 class="head-banner__headline <?php echo $right_class_headline; ?>">
                <?php
                if(in_category( 10 )) echo 'Новости';
                else the_title();
                ?>
            </h1>
            <div class="head-banner__desc <?php echo $right_class_desc; ?>">
                <?php the_field('text-block'); ?>
            </div>
        </div>
    </div>
    <?php
    $flag_shadow = get_field('shadow-banner');
    if($flag_shadow == 'true') : ?>
        <div class="shadow-banner"></div>
    <?php endif; ?>
</section>