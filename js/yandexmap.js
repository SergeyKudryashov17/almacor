var map,
    objectManager;

$(document).ready(function () {
    if($('#map-yandex-contacts').length) {
        ymaps.ready(initMapContact);
    }
    if($('#map-yandex-objects').length) {
        ymaps.ready(initMapObject);
        chooseCategoryObjects();
    }
});

// Инициализация карты контактов
function initMapContact() {
    var address = $('#map-yandex-contacts').attr('data-address');
    var geoCoder = ymaps.geocode(address);
    geoCoder.then(
        function (res) {
            var firstGeoObject = res.geoObjects.get(0),
                coords = firstGeoObject.geometry.getCoordinates(),
                bounds = firstGeoObject.properties.get('boundedBy');

            map = new ymaps.Map('map-yandex-contacts',{
                center: coords,
                zoom: 14
            });
            map.behaviors.disable('scrollZoom')
            var GeoObject = new ymaps.GeoObject({
                geometry: {
                    type: "Point",
                    coordinates: coords
                }
            });
            map.geoObjects.add(GeoObject);
        }
    );
}

// Инициализация карты объектов
function initMapObject() {
    map = new ymaps.Map('map-yandex-objects',{
        center: [55.76, 37.64],
        zoom: 11
    });

    // Для добавления множества меток используем ObjectManager
    objectManager = new ymaps.ObjectManager({
        // Включаем кластеризацию меток
        clusterize: true,
        // Выставляем параметры для кластеризации
        gridSize: 32,
        clusterDisableClickZoom: true,
        clusterIconLayout: "default#pieChart"
    });

    // Добавляем метки из JSON файла в менеджер и отображаем их на карте
    map.geoObjects.add(objectManager);
    $.ajax({
        url: "../wp-content/themes/artrange/map-objects/list-objects.json"
    }).done(function(data) {
        objectManager.add(data);
    });
}

// Обработчик выбора категории
function chooseCategoryObjects() {
    $('.type-objects_map').click(function () {
        $('.type-objects_map').each(function () {
            $(this).removeClass('type-objects__active');
        });
        $(this).addClass('type-objects__active');
        var selectCategory =  $(this).attr('data-type-map');
        // Очищается карта
        objectManager.removeAll();
        // Если выбираются все объекты для отображения
        if(selectCategory == 'all') {

            objectManager = new ymaps.ObjectManager({
                // Включаем кластеризацию меток
                clusterize: true,
                // Выставляем параметры для кластеризации
                gridSize: 32,
                clusterDisableClickZoom: true,
                clusterIconLayout: "default#pieChart"
            });

            // Загрузка и отображение меток из общего файла
            map.geoObjects.add(objectManager);
            $.ajax({
                url: "../wp-content/themes/artrange/map-objects/list-objects.json"
            }).done(function (data) {
                objectManager.add(data);
            });

        } else {
            // Иначе выбирается категория объектов

            objectManager = new ymaps.ObjectManager({
                // Включаем кластеризацию меток
                clusterize: true,
                // Выставляем параметры для кластеризации
                gridSize: 32,
                clusterDisableClickZoom: true,
                clusterIconLayout: "default#pieChart"
            });

            // Загрузка и отображение меток из файла выбранной категории
            map.geoObjects.add(objectManager);
            $.ajax({
                url: "../wp-content/themes/artrange/map-objects/" + selectCategory + "-list.json"
            }).done(function (data) {
                objectManager.add(data);
            });
        }
    });
}