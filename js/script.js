$(document).ready(function () {
    searchCaptionPlacholder();
    verticalAlignMainSlideHeadline();
    initSlider();
    positionSliderBtn();
    openSearch();
    openMobileMenu();
    rotateTriangle();
    showHideSubmenu();
    autoHeightAdvantages();
    adaptiveDotsSliderPorfolio();
    adaptivePaggingTopMain();
    alignmentLinkCertificate();
    switchTypeObjectsAjaxFullMini();
    scrollToMap();
});

$(window).resize(function () {
    verticalAlignMainSlideHeadline();
    positionSliderBtn();
    autoHeightAdvantages();
    adaptivePaggingTopMain();
    alignmentLinkCertificate();
});


/**
 * Cоздание собственного плейсхолдера для поисковой формы
 * Реализация отображения/удаления плейсхолдера по клику
 */
function searchCaptionPlacholder(){
    $('.search__caption').click(function () {
        var caption = $(this);

        if($(document).width() < 576)
            var parent = $(this).closest('.search_mobile');
        else
            var parent = $(this).closest('.search');

        var children = $(parent).find('.search__input');

        $(caption).addClass('search__caption_hidden');
        $(children).focus();

        $(document).mouseup(function (event) {
            var search = $('.search__input');
            if(!search.is(event.target) && search.has(event.target).length === 0){
                $(caption).removeClass('search__caption_hidden');
            }
        });
    });
    $('.search').click(function () {
        var child = $(this).find('.search__caption');
        child.addClass('search__caption_hidden');
    })
}

/**
 * Вертикальное выравнивание заголовков и описания слайда на главной странице
 */
function verticalAlignMainSlideHeadline() {
    $('.main-slide').each(function () {
        var height = $(this).height(),                      // Высота слайда
            child = $(this).find('.main-slide__content'),   // Блок с контентом слайда
            height_content = $(child).height(),             // Высота блока контента
            indent = (height - height_content) / 2;         // Величина отступов сверзу и снизу

        $(child).css('top', indent);                        // Добавляем отступы блоку с контентом
    });
}

/**
 * Инициализация слайдеров сайта
 */
function initSlider() {
    // Инициализация слайдера на Главной странице
    $('.main-slider').slick({
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    arrows: false
                }
            }
        ]
    });

    // Инициализация слайдеров начальных блоков на странице "Объекты"
    $('.sliderPortfolio').each(function () {            // Перебираем все объекты на странице
        var images = $(this).find('img');               // Сохраняем фото объекта в массив
        if (images.length > 1) {                        // Если фото больше одного
            for(i = 1; i < images.length; i++) {
                $(images[i]).css('display', 'none');    // Прячем все фото, кроме первого
            }


            if(images[0].complete || images[0].readyState === 4) {  // Если картинка находится в кеше
                $(this)                                             // Отображаем все фото объекта
                    .closest('.sliderPortfolio')
                    .find('img')
                    .css('display', 'block');

                $(this)                                             // Инициализируем слайдер для объекта
                    .closest('.sliderPortfolio')
                    .slick({
                        dots: true,
                        arrows: true,
                        adaptiveHeight: true,
                        lazyLoad: 'progressive'
                    });
            } else {                                                // Если картинка загружается в первый раз
                $(images[0]).load(function () {                     // То ждем загрузки первой картинки
                    $(this)                                         // И отображаем все оставшиеся фото
                        .closest('.sliderPortfolio')
                        .find('img')
                        .css('display', 'block');

                    $(this)                                         // Затем инициализируем слайдер
                        .closest('.sliderPortfolio')
                        .slick({
                            dots: true,
                            arrows: true,
                            adaptiveHeight: true,
                            lazyLoad: 'progressive'
                        });
                });
            }
        }
    });

    // Инициализация слайдера на странице "Наша история"
    $('.history-slider').slick({
        dots : true,
        slidesToScroll : 5,
        slidesToShow : 5,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToScroll: 4,
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToScroll : 3,
                    slidesToShow : 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToScroll : 2,
                    slidesToShow : 2,
                    arrows: false
                }
            },
            {
                breakpoint: 576,
                settings: {
                    centerMode: false,
                    slidesToScroll : 1,
                    slidesToShow : 1,
                    arrows: true,
                    dots: false
                }
            }
        ]
    });

    // Инициализация слайдера на странице новости или текстовой странице
    $('.content-block__slider').each(function () {
        var images = $(this).find('img');
        if (images.length > 1) {                        // Если фото больше одного
            for(i = 1; i < images.length; i++) {
                $(images[i]).css('display', 'none');    // Прячем все фото, кроме первого
            }


            if(images[0].complete || images[0].readyState === 4) {  // Если картинка находится в кеше
                $(this)                                             // Отображаем все фото объекта
                    .closest('.content-block__slider')
                    .find('img')
                    .css('display', 'block');

                $(this)                                             // Инициализируем слайдер для объекта
                    .closest('.content-block__slider')
                    .slick({
                        dots: false,
                        arrows: true,
                        autoplay: true,
                        autoplaySpeed: 3000
                    });
            } else {                                                // Если картинка загружается в первый раз
                $(images[0]).load(function () {                     // То ждем загрузки первой картинки
                    $(this)                                         // И отображаем все оставшиеся фото
                        .closest('.content-block__slider')
                        .find('img')
                        .css('display', 'block');

                    $(this)                                         // Затем инициализируем слайдер
                        .closest('.content-block__slider')
                        .slick({
                            dots: false,
                            arrows: true,
                            autoplay: true,
                            autoplaySpeed: 3000
                        });
                });
            }
        }
    });
}

/**
 * Установка кнопок перелистования слайдера на края контейнера (Главная страница)
 */
function positionSliderBtn() {
    if($(document).width() > 576) {
        var document_width = $(document).width(),
            container_width = $('.container').width() + 30;

        var indent = ((document_width - container_width) / 2 ) - 15;
        if(indent < 0) indent = 0;

        $('.main-slider .slick-next').css('right', indent);
        $('.main-slider .slick-prev').css('left', indent);
    } else {
        $('.main-slider .slick-next').css('right', 0);
        $('.main-slider .slick-prev').css('left', 0);
    }
}

/**
 * Открытие формы поиска по клику на иконку в мобильном разрешении
 */
function openSearch() {
    $('.search-btn-wrp .fa').click(function () {
        // Добавляем/убираем классы отвечающий за отображение
        $(this).toggleClass('search-btn_active');
        $('.search').toggleClass('search_show');
    });
    $(document).mouseup(function (event) {
        var search = $('.search__input');
        // Отслеживаем нажатие за областью формы
        if(!search.is(event.target) && search.has(event.target).length === 0){
            // Прячем поисковую форму
            $('.search-btn .fa').removeClass('search-btn_active');
            $('.search_hidden_md').css('display', 'flex');
        }
    });
}

/**
 * Открытие мобильного меню
 */
function openMobileMenu() {
    $('.menu .fa-bars').click(function () {
        console.log('1');
        $('body').toggleClass('overflow-hidden');
        $('.menu__list_mobile').slideToggle();
    });
}

/**
 * Поворот треугольника при раскрытии пункта списка
 */
function rotateTriangle() {
    $('.vacancy__name').click(function () {
       // Находим пукнт по которому нажали, и принадлежащий ему треугольник
       var vacancy = $(this).parent('.vacancy'),
           info = $(vacancy).children('.vacancy__info'),
           triangle = $(vacancy).find('.triangle-switch');

       // Открываем пункт и поворачиваем треугольник
       $(this).toggleClass('vacancy__name_active');
       triangle.toggleClass('rotate-triangle');
       info.slideToggle();
    });
}

/**
 * Плавное отображение всплывающего меню в мобильном разрешении
 */
function showHideSubmenu() {
    // Событие клика по основному пункту меню
    $('.menu__item_mobile').click(function () {
        // Находим блок подменю
        var childsItem = $(this).find('.menu__sub-item_mobile');

        // Если есть пункты подменю, отображаем это подменю
        if(childsItem.length > 0) {
            $(this).find('.menu__submenu-wrap_mobile').slideToggle();
            $(this).find('.menu__arrow-icn_mobile').toggleClass('rotate-triangle_right');
        }
    });
}

/**
 * Установка высоты секций "Преимущества" равной высоте фоновой картинки
 */
function autoHeightAdvantages() {
    if($(document).width() > 767) {
        // Адаптируем картинку под размеры экрана
        $('.content-advantages').each(function () {
            var img = $(this).find('.content-block__background'),   // Фоновое изображение
                section = $(this),                                  // Секция
                sectionWidth = $(this).width();                     // Ширина секции

            // Находим высоту картинки, как только она загрузится
            $(img).load(function() {
                $(this).width(sectionWidth);        // Масштабируем картинку по ширине экрана
                var heightImg = $(this).height();   // Получаем высоту масштабируемой картинки
                $(section).height(heightImg);       // Устанавливаем высоту секции равной высоте картинки
            });

            // Расчитываем повторно, в случае если изображение уже было загружено
            $(img).width(sectionWidth);
            var heightImg = $(img).height();
            $(section).height(heightImg);
        });
    } else {
        // Удаляем установленную высоту для блоков (если есть)
        $('.content-advantages').each(function () {
            $(this).removeAttr('style');
        });
    }
}

/**
 * Адаптинвый отступ точек слайдера на странице "Объекты"
 */
function adaptiveDotsSliderPorfolio() {
    $('.building-object').each(function () {
        // Получаем высоту блока с точками слайдера
        var dots = $(this).find('.slick-dots'),
            height = $(dots).height();

        // В зависимости от высоты устанавливаем нужный отступ снизу
        if(height > 28) {
            $(dots).css('bottom', '-72px');
        }
    });
}

/**
 * Асинхронная загрузка объектов на странице "Объекты" при пролистовании до конца страницы
 */
function loadObjects() {
    if($('.content-block_objects').length) {
        $(window).scroll(function(){

            var bottomOffset = 1000; // отступ от нижней границы сайта, до которого должен доскроллить пользователь, чтобы подгрузились новые посты
            var data = {
                'action': 'loadmore',   // название php-обработчика
                'query': args_posts,    // аргументы запроса
                'page' : current_page   // номер текущей страницы
            };

            if( $(document).scrollTop() > ($(document).height() - bottomOffset) && !$('body').hasClass('loading')){

                $.ajax({
                    url:ajaxurl,
                    data:data,
                    type:'POST',
                    beforeSend: function( xhr){
                        $('body').addClass('loading');
                        $('.loading-post').css('opacity', 1);
                    },
                    success:function(data){
                        if( data ) {
                            $('.loading-post').css('opacity', 0);   // Скрываем анимацию загрузки
                            $('#lazy-load-objects').before(data);   // Вставляем на страницу полученные посты

                            var Objects = $('.sliderPortfolio'),                            // Массив с объектами на странице
                                countObjects = Objects.length,                              // Количество объектов на странице
                                countNewObjects = $(data).find('.sliderPortfolio').length,  // Количество вновь добавленных объектов
                                startNumber = countObjects - countNewObjects;               // Начальная позиция для перебора добавленных объектов

                            // Цикл, прокручивающий вновь добавленные объекты на страницу
                            for(i = startNumber; i < countObjects; i++) {
                                var img = $(Objects[i]).find('img');        // Собираем все картинки конкретного объекта

                                // Если картинок в блоке больше одной
                                if (img.length > 1) {
                                    for (j = 1; j < img.length; j++) {
                                        $(img[j]).css('display', 'none');   // Оставляем только одну картинку для отображения в объекте
                                    }

                                    // Если первая картинка закеширована
                                    if(img[0].complete || img[0].readyState === 4) {
                                        // Отображаем другие картинки объекта
                                        $(img[0])
                                            .closest('.sliderPortfolio')
                                            .find('img')
                                            .css('display', 'block');

                                        // Инициализируем слайдер
                                        $(img[0])
                                            .closest('.sliderPortfolio')
                                            .slick({
                                                dots: true,
                                                arrows: true,
                                                adaptiveHeight: true,
                                                lazyLoad: 'progressive'
                                            });
                                    } else {
                                        // Если нет, ожидаем загрузку картинки
                                        $(img[0]).load(function () {
                                            // Отображаем другие картинки в блоке
                                            $(this)
                                                .closest('.sliderPortfolio')
                                                .find('img')
                                                .css('display', 'block');

                                            // Инициализируем слайдер
                                            $(this)
                                                .closest('.sliderPortfolio')
                                                .slick({
                                                    dots: true,
                                                    arrows: true,
                                                    adaptiveHeight: true,
                                                    lazyLoad: 'progressive'
                                                });
                                        })
                                    }
                                }
                            }

                            $('body').removeClass('loading');
                            current_page++;
                        } else {
                            $('.loading-post').css('opacity', 0);
                            $('body').removeClass('loading');
                        }
                    }
                });
            }
        });
    }
}

/**
 * Асинхронная загрузка объектов на странице "Объекты" при переключении типа объекта (полная версия карточки Объекта)
 */
function switchTypeObjectsAjaxFull() {
    if($('.content-block_objects').length) {
        $('.type-objects').click(function () {
            $('.type-objects').removeClass('type-objects__active'); // Отключаем все активные кнопки
            $(this).toggleClass('type-objects__active');            // Делаем активной ту, на которую нажали

            var type = $(this).attr('data-type');                   // Получаем тип объекта из атрибута кнопки
            if(type === 'all') {
                // Формируем запрос на сервер для получения всех объектов
                var args_post2 = {
                    'post_type': 'objects',
                    'orderby': 'date',
                    'order': 'DESC',
                    'posts_per_page': '-1'
                }
            }else {
                // Формируем запрос на сервер для получения объектов конкретного типа
                var args_post2 = {
                    'post_type': 'objects',
                    'orderby': 'date',
                    'type-objects': type,
                    'order': 'DESC',
                    'posts_per_page': '-1'
                }
            }

            // Общий запрос к севрверу
            var data = {
                'action' : 'loadmore2',
                'query' : args_post2
            };

            // Удаляем предыдущие объекты других типов со страницы
            $('.building-object').each(function () {
                $(this).remove();
            });
            $('.loading-post').each(function (index) {
                $(this).remove;
            })

            $.ajax({
                url: ajaxurl,
                data: data,
                type: 'POST',
                beforeSend: function(xhr) {
                    $('body').addClass('loading');
                    $('.loading-post').css('opacity', 1);
                },
                success: function(data) {
                    if( data ) {
                        $('.loading-post').css('opacity', 0);       // Скрываем анимацию загрузки
                        $('#lazy-load-objects').before(data);       // Вставляем на страницу полученные объекты

                        // Перебираем все полученные объекты
                        $('.sliderPortfolio').each(function () {
                            var images = $(this).find('img');               // Добавляем в массив все изображения объекта
                            // Если иозображений больше одного
                            if (images.length > 1) {
                                // for(i = 1; i < images.length; i++) {
                                //     $(images[i]).css('display', 'none');    // Прячем все изображения объекта кроме первого
                                // }

                                // Если картинка загружается из кеша
                                if(images[0].complete || images[0].readyState === 4) {
                                    // Отображаем все картинки объекта
                                    $(images[0])
                                        .closest('.sliderPortfolio')
                                        .find('img')
                                        .css('display', 'block');

                                    // Инициализируем слайдер
                                    $(images[0])
                                        .closest('.sliderPortfolio')
                                        .slick({
                                            dots: true,
                                            arrows: true,
                                            adaptiveHeight: true,
                                            lazyLoad: 'progressive'
                                        });
                                } else {
                                    // Иначе ждем пока картинка загрузится с сервера
                                    $(images[0]).load(function () {
                                        // Отображаем остальные картинки
                                        $(this)
                                            .closest('.sliderPortfolio')
                                            .find('img')
                                            .css('display', 'block');

                                        // Инициализируем слайдер
                                        $(this)
                                            .closest('.sliderPortfolio')
                                            .slick({
                                                dots: true,
                                                arrows: true,
                                                adaptiveHeight: true,
                                                lazyLoad: 'progressive'
                                            });
                                    });
                                }
                            }
                        });

                        $('body').removeClass('loading');
                    }
                }
            });
        });
    }
}

/**
 * Асинхронная загрузка объектов на странице "Объекты" при переключении типа объекта (мини версия карточки Объекта)
 */
function switchTypeObjectsAjaxFullMini() {
    if($('.content-block_objects').length) {
        $('.type-objects').click(function () {
            $('.type-objects').removeClass('type-objects__active'); // Отключаем все активные кнопки
            $(this).toggleClass('type-objects__active');

            var type = $(this).attr('data-type');                   // Получаем тип объекта из атрибута кнопки

            if (type === 'all') {
                // Формируем запрос на сервер для получения всех объектов
                var args_post = {
                    'post_type': 'objects',
                    'orderby': 'date',
                    'order': 'DESC',
                    'posts_per_page': '-1'
                }
            } else {
                // Формируем запрос на сервер для получения объектов конкретного типа
                var args_post = {
                    'post_type': 'objects',
                    'orderby': 'date',
                    'type-objects': type,
                    'order': 'DESC',
                    'posts_per_page': '-1'
                }
            }

            // Общий запрос к севрверу
            var data = {
                'action' : 'loadmore2',
                'query' : args_post
            };

            $.ajax({
                url: 'http://almacor-group.ru/wp-admin/admin-ajax.php',
                data: data,
                type: 'POST',
                beforeSend: function(xhr) {
                    $('body').addClass('loading');
                    $('.loading-post').css('opacity', 1);
                },
                success: function(data) {
                    console.log(data);
                    if (data) {
                        // Вставляем на страницу полученные объекты
                        $('.objects-cards > .container > .row').html(data);
                        $('body').removeClass('loading');
                    }
                }
            });
        });
    }
}

/**
 * Отображение объектов при переключении типов (без асинхронной подгрузки)
 */
function switchTypeObjects() {
    // Для основной версии страницы "Объекты"
    if ( ($('.content-block_objects').length) && ($('.objects-cards').length != 0) ) {
        $('.type-objects').click(function () {
            $('.type-objects').removeClass('type-objects__active'); // Отключаем все активные кнопки
            $(this).toggleClass('type-objects__active');            // Делаем активной ту, на которую нажали

            var nameType = $(this).attr('data-type');

            if (nameType === 'all') {
                $('.building-object').css('display', 'block');
            } else {
                $('.building-object').each(function () {
                    if ($(this).attr('data-type') != nameType) {
                        $(this).css('display', 'none');
                    } else {
                        $(this).css('display', 'block');
                    }
                });
            }
        });
    }
    // Для версии с карточками объектов (objects-mini)
    if ($('.objects-cards').length) {
        $('.type-objects').click(function () {
            $('.type-objects').removeClass('type-objects__active'); // Отключаем все активные кнопки
            $(this).toggleClass('type-objects__active');            // Делаем активной ту, на которую нажали

            var nameType = $(this).attr('data-type');

            if (nameType === 'all') {
                $('.object-card-wrp').css('display', 'block');
            } else {
                $('.object-card-wrp').each(function () {
                    if ($(this).attr('data-type') != nameType) {
                        $(this).css('display', 'none');
                    } else {
                        $(this).css('display', 'block');
                    }
                });
            }
        });
    }
}

/**
 * Автоматическая установка отступа main от верхней границы документа. Размер отступа равен размеру шапки сайта
 */
function adaptivePaggingTopMain() {
    $('main').css('padding-top', $('header').height());
}

/**
 * Плавный скролл к карте при нажатии на категорию объектов и сворачивание неактивных категорий
 */
function scrollToMap() {
    $('.type-objects_map').click(function () {
        if($(document).width() < 768) {
            var top = $('#map-yandex-objects').offset().top - $('header').height() - 20;
            $('body,html').animate({scrollTop: top}, 1000);
        }
    });
}

/**
 * Выравнивание текста ссылки для сертификатов (страница Заказчики)
 */
function alignmentLinkCertificate() {
    if ($('.certificate').length > 0) {
        $('.certificate__active').each(function () {
           var heightCertificate = $(this).height(),
               heightTextLink = $(this).find('span').height();
               paddingCertificate = (heightCertificate - heightTextLink) / 2;

           $(this).css('padding-top', paddingCertificate);
        });
    }
}





