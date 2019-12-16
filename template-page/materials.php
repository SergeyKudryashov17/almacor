<?php
/*
 * Template Name: Материалы
 */
get_header();
?>
    <main>
        <section class="mini-padding-top">
            <div class="container">
                <div class="row">
                    <?php
                    $material = get_field('materials');
                    foreach ($material as $item) :
                        $item_value = $item['item'];
                        if($item_value['content'][0]['acf_fc_layout'] == 'file') {
                            $link = $item_value['content'][0]['file'];
                        }
                        if($item_value['content'][0]['acf_fc_layout'] == 'page') {
                            $link = $item_value['content'][0]['page'];
                        }
                        if($item_value['content'][0]['acf_fc_layout'] == 'link') {
                            $link = $item_value['content'][0]['link'];
                        }
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                            <div class="type-material">
                                <a href="<?php echo $link; ?>" class="type-material__item" target="_blank">
                                    <div>
                                        <img src="<?php echo $item_value['image']; ?>" alt="" class="type-material__logo">
                                        <img src="<?php echo $item_value['image-hover']; ?>" alt="" class="type-material__logo_hover">
                                    </div>
                                </a>
                                <a href="<?php echo $link; ?>" class="type-material__name" target="_blank"><?php echo $item_value['name']; ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>