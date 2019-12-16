<?php
$ID = get_the_ID();
$terms = get_the_terms($ID, 'type-objects');
$term_object = $terms[0]->slug;
?>
<div class="building-object" data-type="<?= $term_object ?>">
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="sliderPortfolio">
                <?php
                $slides = get_field('photo-object');
                foreach ($slides as $slide) :
                    $img = wp_get_attachment_image_url( $slide['photo'], 'full' );
                    ?>
                    <img src="<?php echo $img; ?>" data-lazy="<?php echo $img; ?>" alt="">
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="building-object__desc">
                <span>НАЗВАНИЕ ОБЪЕКТА</span>
                <?php the_field('name-object'); ?>
            </div>
            <div class="building-object__desc">
                <span>АДРЕС ОБЪЕКТА</span>
                <?php the_field('address-object'); ?>
            </div>
            <div class="building-object__desc">
                <span>ВРЕМЯ ПРОВЕДЕНИЯ РАБОТ</span>
                <?php the_field('time-job-object'); ?>
            </div>
            <div class="building-object__desc">
                <span>ОПИСАНИЕ СОСТАВА РАБОТ:</span>
                <?php the_field('desc-job-object'); ?>
            </div>
        </div>
    </div>
</div>