    <footer class="footer footer_shadow">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 no-padding-sm">
                    <?php the_field('text-area', 2); ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-12 no-padding-sm">
                    <p>
                        <?php
                        the_field('address', 2);
                        $phones = get_field('phones', 2);
                        echo '<br>Тел:';
                        foreach ($phones as $phone) : ?>
                            <a href="#"><?php echo $phone['phone']; ?></a><br>
                        <?php endforeach;
                        echo 'Email:';
                        $emails = get_field('address-email', 2);
                        foreach ($emails as $email) : ?>
                            <a href="#"><?php echo $email['e-mail']; ?></a><br>
                        <?php endforeach; ?>
                        <a href="<?php echo get_permalink('252'); ?>">Схема проезда</a>
                    </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-12 mt-md-20 no-padding-sm">
                    <p class="text-lg-left text-md-center">
                        <?php the_field('copyright', 2); ?>
                    </p>
                    <a class="artrange" href="https://artrange.ru/sozdanie-sajtov-pod-klyuch/" title="Создание сайтов и презентаций">
                        <span>Разработка сайта</span> - <img src="<?php echo get_template_directory_uri(); ?>/img/artrange.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>