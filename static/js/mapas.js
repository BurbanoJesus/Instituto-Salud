

$(document).ready(function () {
    function initMap(){
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 1.4717949084251858,
                lng: -77.5808529606071
            },
            zoom: 9,
            mapTypeId: 'hybrid'

        });
    }

    initMap();
    // map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
    var marcador;
    var flag_m = false;
   

        var lat_lng_fam = $('#ubi_familia').val();
        console.log('lat_lng_fam');

    if ($('#ubi_familia').length > 0){
        lat_lng_fam = lat_lng_fam.split(',');
        if(lat_lng_fam[0] != 0){
            console.log('gasolina'+parseFloat(lat_lng_fam[0])+''+parseFloat(lat_lng_fam[1]));
            var lat_lon = new google.maps.LatLng(parseFloat(lat_lng_fam[0]),parseFloat(lat_lng_fam[1]));
            marcador = new google.maps.Marker({
            position: lat_lon,
            title: 'Ubicacion de la Familia'
            });
            marcador.setMap(map);
            map.setCenter(lat_lon);
            map.setZoom(14);
            flag_m = true;
            console.log('gasolina');
        }
    }

    //Creacion de evento click al mapa
    google.maps.event.addListener(map, 'click', function (evt) {
        if (flag_m === true) {
            marcador.setMap(null);
        }
        $('#lat_lng').val(evt.latLng.lat()+','+evt.latLng.lng());
        // console.debug($('#lat_lng').val();
        var lat_lon = new google.maps.LatLng(evt.latLng.lat(), evt.latLng.lng());
        marcador = new google.maps.Marker({
        position: lat_lon,
        title: 'Ubicacion de la Familia'
        });
        marcador.setMap(map);
        flag_m = true;
    });

    $('.btn_geolo').on("click", function() {
        // map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
          pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        map.setCenter(new google.maps.LatLng(pos.lat, pos.lng));
        map.setZoom(14);

       }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } 
        else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    
});
    // Try HTML5 geolocation.
    // if (navigator.geolocation) {
    //   navigator.geolocation.getCurrentPosition(function(position) {
    //       pos = {
    //       lat: position.coords.latitude,
    //       lng: position.coords.longitude
    //     };

    //     // marker = new google.maps.Marker({
    //     // position: pos,
    //     // draggable: false,
    //     // animation: google.maps.Animation.DROP,
    //     // map: map
    //     // });
    //     // map.setCenter(pos);

    //     // document.getElementById("pos").value = marker.getPosition().lat()+","+ marker.getPosition().lng();

    //    }, function() {
    //         handleLocationError(true, infoWindow, map.getCenter());
    //       });
    //     } 
    //     else {
    //       // Browser doesn't support Geolocation
    //       handleLocationError(false, infoWindow, map.getCenter());
    //     }
      
    //   function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    //     infoWindow.setPosition(pos);
    //     infoWindow.setContent(browserHasGeolocation ?
    //                           'Error: The Geolocation service failed.' :
    //                           'Error: Your browser doesn\'t support geolocation.');
    //   }
    
});

// if(navigator.onLine) {
//     // el navegador está conectado a la red
// } else {
//     // el navegador NO está conectado a la red
// }