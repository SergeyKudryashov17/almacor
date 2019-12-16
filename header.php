<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="0da9efee4e7ba0fc" />
    <link rel="shortcut icon" href="/wp-content/uploads/2019/09/bez-zagolovka.ico" type="image/x-icon">
    <?php if(is_category()) : ?>
        <title><?php single_cat_title(); ?></title>
    <?php else : ?>
        <title><?php the_title(); ?></title>
    <?php endif; ?>

    <?php wp_head(); ?>
    <?php get_template_part('template-part/counters'); ?>

</head>
<body class="">
    <script>
        // Определяем явялется ли браузер IE
        var userAgent = navigator.userAgent;
        if ((userAgent.search(/MSIE/) > 0) || (userAgent.search(/Edge/) > 0) || (userAgent.search(/Trident/) > 0)) {
            // Добавляем класс для переключение некоторых стилей
            document.body.className = 'ie';
        }
    </script>
    <header class="header header_shadow">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 no-padding">
                    <a href="http://almacor-group.ru" class="logo">
                        <img src="/wp-content/uploads/2019/07/logo-new.svg" alt="" class="logo__img">
<!--                        <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/new-logo.svg" alt="" class="logo__img">-->
                    </a>
                </div>
                <div class="col-lg-10 col-md-9 col-8 no-padding d-flex justify-content-md-around flex-md-row flex-row-reverse">
                    <nav class="menu">
                        <ul class="menu__list">
                        <?php
                        $menu_items = wp_get_nav_menu_items('Главное меню');

                        $menu_array = array();
                        $submenu_array = array();

                        foreach ($menu_items as $menu_item) :
                            if($menu_item->menu_item_parent == 0) :
                                $menu_item_array = array();
                                $menu_item_array['ID']     = $menu_item->ID;
                                $menu_item_array['title']  = $menu_item->title;
                                $menu_item_array['url']    = $menu_item->url;
                                array_push($menu_array, $menu_item_array);
                            else :
                                $submenu_item_array = array();
                                $submenu_item_array['ID']     = $menu_item->ID;
                                $submenu_item_array['title']  = $menu_item->title;
                                $submenu_item_array['url']    = $menu_item->url;
                                $submenu_item_array['parent'] = $menu_item->menu_item_parent;
                                array_push($submenu_array, $submenu_item_array);
                            endif;
                        endforeach;

                        foreach ($menu_array as $item) :
                            $count_item = 0; ?>
                            <li class="menu__item">
                                <a class="menu__link" href="<?php echo $item['url']; ?>">
                                    <?php echo $item['title']; ?>
                                </a>

                                <div class="menu__submenu-wrap">
                                    <?php foreach ($submenu_array as $sub_item) :
                                        if($sub_item['parent'] == $item['ID']) : ?>
                                            <div class="menu__sub-item">
                                                <a class="menu__link" href="<?php echo $sub_item['url']; ?>">
                                                    <?php echo $sub_item['title']; ?>
                                                </a>
                                            </div>
                                            <?php
                                            $count_item++;
                                        endif;
                                    endforeach; ?>
                                </div>
                                <?php if($count_item > 0) : ?>
                                    <img src="<?php echo get_template_directory_uri();?>/img/svg-icon/001-down-arrow.svg" alt="" class="menu__arrow-icn">
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>

                        </ul>
                        <div class="menu__button">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                    <div class="search search_hidden-md">
                        <?php get_search_form(); ?>
                    </div>
                    <div class="search-btn-wrp search-btn-wrp_visible-md">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-relative">
            <ul class="menu__list_mobile">
                <li class="search_mobile">
                    <form role="search" method="get" id="searchform" action="<?php bloginfo( 'url' ); ?>" >
                        <input type="text" class="search__input" name="s" id="s">
                        <div class="search__caption">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <span>Поиск по сайту</span>
                        </div>
                    </form>
                </li>
                <?php
                $menu_items = wp_get_nav_menu_items('Главное меню');

                foreach ($menu_array as $item) :
                    $count_item = 0; ?>

                    <li class="menu__item_mobile">
                        <a class="menu__link" href="<?php echo $item['url']; ?>">
                            <?php echo $item['title']; ?>
                        </a>
                        <div class="menu__submenu-wrap menu__submenu-wrap_mobile">
                            <?php foreach ($submenu_array as $sub_item) :
                                if($sub_item['parent'] == $item['ID']) : ?>
                                    <div class="menu__sub-item_mobile">
                                        <a class="menu__link" href="<?php echo $sub_item['url']; ?>">
                                            <?php echo $sub_item['title']; ?>
                                        </a>
                                    </div>
                                    <?php
                                    $count_item++;
                                endif;
                            endforeach; ?>
                        </div>
                        <?php if($count_item > 0) : ?>
                            <img src="<?php echo get_template_directory_uri();?>/img/svg-icon/001-down-arrow.svg" alt="" class="menu__arrow-icn_mobile rotate-triangle_right">
                        <?php endif; ?>
                    </li>

                <?php endforeach; ?>
            </ul>
        </div>
    </header>