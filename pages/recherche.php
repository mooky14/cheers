<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&language=fr"></script>
  </head>

  <body>
    <div id="map">
        <form>
          <input type="text" id="adresse"/>
          <input type="button" class="btn btn-primary" value="Localiser sur Google Map" onclick="TrouverAdresse();"/>
        </form>
        <span id="text_latlng"></span>
        <br>
        <div id="map-canvas" style="height:500px;width:100%"></div>
        <br>
    </div>

    <script type="text/javascript">
        var geocoder;
        var map;
        // initialisation de la carte Google Map de départ
        function initialiserCarte() {
          geocoder = new google.maps.Geocoder();
          // Ici j'ai mis la latitude et longitude du vieux Port de Marseille pour centrer la carte de départ
          var latlng = new google.maps.LatLng(49.182863, -0.37067899999999554);
          var mapOptions = {
            zoom      : 8,
            center    : {lat: 49.176282, lng: -0.34747330000004695},
            mapTypeId : google.maps.MapTypeId.ROADMAP
          }
          // map-canvas est le conteneur HTML de la carte Google Map
          map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          setMarkers(map);
        }
         
        var beaches = [
        ['Bar1', 49.209591, -0.36843999999996413, 4],
        ['Troptoplemag', 49.44323199999999, 1.0999709999999823, 5],
        ['Cronulla Beach', -34.028249, 151.157507, 3],
        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
        ['Maroubra Beach', -33.950198, 151.259302, 1]
        ];

        function setMarkers(map) {
            var image = {
              url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
              // This marker is 20 pixels wide by 32 pixels high.
              size: new google.maps.Size(20, 32),
              // The origin for this image is (0, 0).
              origin: new google.maps.Point(0, 0),
              // The anchor for this image is the base of the flagpole at (0, 32).
              anchor: new google.maps.Point(0, 32)
            };
            // Shapes define the clickable region of the icon. The type defines an HTML
            // <area> element 'poly' which traces out a polygon as a series of X,Y points.
            // The final coordinate closes the poly by connecting to the first coordinate.
            var shape = {
              coords: [1, 1, 1, 20, 18, 20, 18, 1],
              type: 'poly'
            };
            for (var i = 0; i < beaches.length; i++) {
              var beach = beaches[i];
              var marker = new google.maps.Marker({
                position: {lat: beach[1], lng: beach[2]},
                map: map,
                icon: image,
                shape: shape,
                title: beach[0],
                zIndex: beach[3]
              });
            }
        }

        function TrouverAdresse() {
          // Récupération de l'adresse tapée dans le formulaire
          var adresse = document.getElementById('adresse').value;
          geocoder.geocode( { 'address': adresse}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
              // Récupération des coordonnées GPS du lieu tapé dans le formulaire
              var strposition = results[0].geometry.location+"";
              strposition=strposition.replace('(', '');
              strposition=strposition.replace(')', '');
              // Affichage des coordonnées dans le <span>
              document.getElementById('text_latlng').innerHTML;
              // Création du marqueur du lieu (épingle)
            }
          });
        }
        // Lancement de la construction de la carte google map
        google.maps.event.addDomListener(window, 'load', initialiserCarte);
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ3w-mb4vbWAd6vSCdGskqO-dikFC4CcY&callback=initMap">
    </script>
  </body>
</html>