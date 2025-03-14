<html>

<head>
 <!-- jquery independent of bootstrap -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=drawing"></script>-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=drawing,geometry"></script>
    
    <script>
        var drawingManager;
        var map;
        function initMap()
        {
            const map = new google.maps.Map(document.getElementById("map_canvas"), {
            zoom: 8,
        center: {lat: 24.886, lng: -70.268 },
        mapTypeId: 'satellite',
            });
            // Define the LatLng coordinates for the polygon's path.
           
        }
        function clear_map()
        {
            const map = new google.maps.Map(document.getElementById("map_canvas"), {
            zoom: 8,
        center: {lat: 24.886, lng: -70.268 },
        mapTypeId: 'satellite',
            });
        const triangleCoords = [
        { },
        ];
        // Construct the polygon.
        const bermudaTriangle = new google.maps.Polygon({
            paths: triangleCoords,
        fillColor: '#cccccc',
        fillOpacity: 0.5,
        strokeColor: '#000000',
            });

        bermudaTriangle.setMap(null);
        }
        function enable_draw()
        {
            const map = new google.maps.Map(document.getElementById("map_canvas"), {
            zoom: 8,
        center: {lat: 24.886, lng: -70.268 },
        mapTypeId: 'satellite',
            });
        drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
        drawingModes: [google.maps.drawing.OverlayType.POLYGON]
        },
        polygonOptions: {
            editable: true,
        draggable: true,
        fillColor: '#cccccc',
        fillOpacity: 0.5,
        strokeColor: '#000000',

            }
      });
        drawingManager.setMap(map);
        }
        function disable_draw()
        {
            drawingManager.setMap(null); 
        }
        function show()
        {
            const map = new google.maps.Map(document.getElementById("map_canvas"), {
            zoom: 8,
        center: {lat: 24.886, lng: -70.268 },
        mapTypeId: 'satellite',
            });
        const triangleCoords = [
        {lat: 25.774, lng: -80.19 },
        {lat: 18.466, lng: -66.118 },
        {lat: 32.321, lng: -64.757 },
        {lat: 25.774, lng: -80.19 },
        ];
        // Construct the polygon.
        const bermudaTriangle = new google.maps.Polygon({
            paths: triangleCoords,
        fillColor: '#cccccc',
        fillOpacity: 0.5,
        strokeColor: '#000000',
            });

        bermudaTriangle.setMap(map);
        }
        initMap();
    </script>
</head>


<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
                <div id="map_canvas" style="width:100%; height:700px;"></div>
            </div>
        </div>
    </div>
    <div>
        <button onclick="clear_map()"> clear </button>
        <button onclick="enable_draw()"> enable </button>
        <button onclick="disable_draw()"> disable</button>
        <button onclick="show()"> show </button>
    </div>
</body>

</html>