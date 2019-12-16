<?php get_header(); ?>
    <main>
        <section class="content-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="content-block__headline content-block__headline_left">Результаты поиска: <?php echo get_search_query(); ?></h2>
                        <div class="border-bottom-block brd-btm-long"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="search-wrap">
                            <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post(); ?>
                                    <div class="search-result">
                                        <a href="<?php echo get_permalink(); ?>" class="search-result__title"><?php the_title(); ?></a>
                                        <div class="search-result__excerpt"></div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <div class="search-result">
                                    <div class="search-result__title">Извините, по Вашему результату ничего не найдено</div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>