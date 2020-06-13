// yandex map path for set placemark
ymaps.ready(function () {
 var map = new ymaps.Map("yandex-map", {
   center: [43.486948, 39.895896],
   zoom: 19
 });
 var placemark = new ymaps.Placemark([43.486948, 39.895896]);
 map.geoObjects.add(placemark);
});
