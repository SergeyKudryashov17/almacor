<?php
$ID = get_the_ID();
$terms = get_the_terms($ID, 'type-objects');
$term_object = $terms[0]->slug;

$slides = get_field('photo-object');
$img = wp_get_attachment_image_url( $slides[0]['photo'], 'full' );
$full_name = cutStr(get_field('name-object'), 160);
$short_name = get_field('short-name-object');

if ($short_name == '') $name = strip_tags($full_name);
else $name = $short_name;

?>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 object-card-wrp" data-type="<?= $term_object ?>">
    <a href="<?= get_permalink() ?>" class="object-card">
        <div class="object-card__img" style="background: url(<?= $img ?>) center/cover;"></div>
        <div class="object-card__desc">
            <span class="object-card__headline"><?= $name; ?></span>
        </div>
    </a>
</div>