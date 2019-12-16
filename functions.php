<?php

/**
 * Подключение стилей и скриптов
 */
add_action( 'wp_enqueue_scripts', 'include_script_css' );
function include_script_css () {
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true );
    wp_enqueue_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), null, true );
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), null, true );
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/slick/slick.min.js', array(), null, true );
    wp_enqueue_script( 'lightbox-js', get_stylesheet_directory_uri() . '/assets/lightbox/js/lightbox.js', array(), null, true );
    wp_enqueue_script( 'yandex-map', get_stylesheet_directory_uri() . '/js/yandexmap.js', array(), null, true );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array(), null, true );

    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', false, null );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', false, null );
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/slick/slick.css', false, null );
    wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/assets/slick/slick-theme.css', false, null );
    wp_enqueue_style( 'lightbox-css', get_stylesheet_directory_uri() . '/assets/lightbox/css/lightbox.css', false, null );
    wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/css/fonts.css', false, null );
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/css/style.css', false, null );
    wp_enqueue_style( 'media-css', get_stylesheet_directory_uri() . '/css/media.css', false, null );

}

/**
 * Активирование поддержки SVG
 */
add_filter( 'upload_mimes', 'upload_svg' );
function upload_svg($mime_types) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}

/**
 * Регистрация меню
 */
register_nav_menus( array(
    'main'    => 'Главное меню',
));


/**
 * Удаляет H2 из шаблона пагинации
 */
add_filter( 'navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){

    return '
        <nav class="navigation %1$s" role="navigation">
            <div class="nav-links">%3$s</div>
        </nav>    
	';
}

/**
 * Обрезает строку до определённого количества символов не разбивая слова.
 * @param string $str строка
 * @param int $length длина, до скольки символов обрезать
 * @param string $postfix постфикс, который добавляется к строке
 * @return string обрезанная строка
 */
function cutStr($str, $length=50, $postfix='...') {
    if ( strlen($str) <= $length)
        return $str;

    $temp = substr($str, 0, $length);
    return substr($temp, 0, strrpos($temp, ' ') ) . $postfix;
}

/**
 * Ajax загрузка постов при скролле на странице "Объекты"
 */
add_action( 'wp_ajax_loadmore', 'lazy_load_posts' );
add_action( 'wp_ajax_nopriv_loadmore', 'lazy_load_posts' );
function lazy_load_posts() {
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    query_posts( $args );
    if( have_posts() ) :
        while( have_posts() ): the_post();

            get_template_part('template-part/template-object');

        endwhile;
    endif;
    die();
}

/**
 * Ajax загрузка постов при переключении типов объектов
 */
add_action( 'wp_ajax_loadmore2', 'start_posts_switch' );
add_action( 'wp_ajax_nopriv_loadmore2', 'start_posts_switch' );
function start_posts_switch() {
    query_posts( $_POST['query'] );
    if( have_posts() ) :
        while( have_posts() ): the_post();
            get_template_part('template-part/template-object-mini');
        endwhile;

        global $wp_query;
        if ( $wp_query->max_num_pages > 1 ) : ?>
            <script id="lazy-load-objects">
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php',
                    args_posts = '<?php echo serialize($wp_query->query_vars) ?>',
                    current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
            </script>
        <?php
        endif;

    endif;
    die();
}

/**
 * Запуск создания JSON файла с объектами (для страницы с картой)
 */
add_action( 'save_post_objects', 'create_json_files' );     // Событие обновления/добавления поста типа "objects"
add_action( 'create_type-objects', 'create_json_files' );   // Событие создания элемента таксономии "type-objects"
add_action( 'edited_type-objects', 'create_json_files' );   // Событие реадктирования элемента таксономии "type-objects"
/**
 * Создание JSON файлов с объектами для отображения на карте c помощью API Яндекс.Карт
 */
function create_json_files() {

    // Получение всех категорий объектов
    $args_select = array(
        'taxonomy'   => 'type-objects',
        'hide_empty' => false,
        'orderby'    => 'id',
        'order'      => 'ASC'
    );
    $terms = get_terms($args_select);

    // Создание отдельных массивов для объектов категорий
    $category_JSON = array();
    foreach ($terms as $term) :
        $category_JSON[$term->slug] = array();
        $category_JSON[$term->slug]["type"] = "FeatureCollection";
        $category_JSON[$term->slug]["features"] = array();
    endforeach;

    // Создание массива для записи основного JSON
    $main_JSON = array();
    $main_JSON["type"] = "FeatureCollection";
    $main_JSON["features"] = array();

    // Запрос на получение всех объектов
    $args = array(
        'post_type'      => 'objects',
        'posts_per_page' => -1
    );
    $objects = query_posts($args);

    // Перебор всех объектов
    $i = 0;
    foreach ($objects as $object) :
        // Изменение типа переменной координат для записи в JSON
        $coordinates_string = get_field('address-map', $object->ID);
        $coordinates_array = explode(',', $coordinates_string);
        $coordinates_array[0] = (float) $coordinates_array[0];
        $coordinates_array[1] = (float) $coordinates_array[1];

        // Заполнение основного файла

        // Сбор данных, требуемых для отображения на карте
        $value = array();
        $value["type"] = "Feature";
        $value["id"] = $i;                                                                                              // Запись ID
        $value["geometry"] = array();
        $value["geometry"]["type"] = "Point";
        $value["geometry"]["coordinates"] = $coordinates_array;                                                         // Запись координат
        $value["properties"] = array();
        $value["properties"]["balloonContent"] = $object->post_title.'<br>'
                                                .get_field('address-object', $object->ID).
                                                '<a href="'.get_permalink($object->ID).'">Подробнее</a>';               // Запись заголовка и адреса в балун
        $value["properties"]["clusterCaption"] = $object->post_title;                                                   // Запись заголовка в блок кластера
        $value["properties"]["hintContent"] = $object->post_title;                                                      // Запись заголовка в хинт
        $term_object = get_the_terms($object->ID, 'type-objects');                                                      // Получение категории объекта
        $color_marker = get_field('colors_markers', 'type-objects_'.$term_object[0]->term_id);                          // Получение цвета маркера
        $icon_marker = get_field('icon_marker', $object->ID);                                                           // Получение иконки
        if($icon_marker == null) $icon_marker = "Dot";                                                                  // Установка значения если данная настройка не установлена
        // Запись полученных настроек
        $value["options"] = array();
        $value["options"]["preset"] = "islands#".$color_marker.$icon_marker.'Icon';

        // Запись в массивы
        array_push($main_JSON["features"], $value);                                 // Запись в массив для основного файла
        array_push($category_JSON[$term_object[0]->slug]["features"], $value);      // Запись в массив для файла категории объекта

        $i++;
    endforeach;

    // Создание основного файла JSON
    $directory = get_template_directory().'/map-objects/list-objects.json';
    file_put_contents($directory, json_encode($main_JSON, JSON_UNESCAPED_UNICODE));

    // Создание JSON файлов категорий
    foreach ($terms as $term) :
        $directory = get_template_directory().'/map-objects/'.$term->slug.'-list.json';
        file_put_contents($directory, json_encode($category_JSON[$term->slug], JSON_UNESCAPED_UNICODE));
    endforeach;

}

