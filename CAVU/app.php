<?php
session_start();
if(!isset($_SESSION['userid']))
{
  //header("Location: login.php"); 
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>App</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/startup-materialize.min.css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Using closures in event listeners</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    </style>
     <!-- jquery independent of bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



    


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=drawing"></script>-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=drawing,geometry"></script>
    
    <script>

  var saveObject=[];
  var overlays=[];
  /*-----------------------------------------hash table ---------------------------------------------*/


function HashTable(obj)
{
    this.length = 0;
    this.items = {};
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            this.items[p] = obj[p];
            this.length++;
        }
    }

    this.setItem = function(key, value)
    {
        var previous = undefined;
        if (this.hasItem(key)) {
            previous = this.items[key];
        }
        else {
            this.length++;
        }
        this.items[key] = value;
        return previous;
    }

    this.getItem = function(key) {
        return this.hasItem(key) ? this.items[key] : undefined;
    }

    this.hasItem = function(key)
    {
        return this.items.hasOwnProperty(key);
    }
   
    this.removeItem = function(key)
    {
        if (this.hasItem(key)) {
            previous = this.items[key];
            this.length--;
            delete this.items[key];
            return previous;
        }
        else {
            return undefined;
        }
    }

    this.keys = function()
    {
        var keys = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                keys.push(k);
            }
        }
        return keys;
    }

    this.values = function()
    {
        var values = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                values.push(this.items[k]);
            }
        }
        return values;
    }

    this.each = function(fn) {
        for (var k in this.items) {
            if (this.hasItem(k)) {
                fn(k, this.items[k]);
            }
        }
    }

    this.clear = function()
    {
        this.items = {}
        this.length = 0;
    }
}
        


/*-----------------------------------------hash table ---------------------------------------------*/
var saveObjectOverlays = new HashTable();
var overlaysSaveObject = new HashTable();
var map // Global declaration of the map
var i=0;
      
      var iw = new google.maps.InfoWindow(); // Global declaration of the infowindow
      var lat_longs = new Array();
      var markers = new Array();
      var drawingManager;
      function initialize() {
          var mapOptions = {
          zoom: 8,
          mapTypeId:'satellite',
            center: new google.maps.LatLng(28.453, 77.075)
            };
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
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
      
      google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
        //$('#myModal').modal({show:true});
        var newShape = event.overlay;
        newShape.type = event.type;

         overlayClickListener(event.overlay);
                $('#vertices').val(event.overlay.getPath().getArray());
                $('#area').val(google.maps.geometry.spherical.computeArea(event.overlay.getPath()));
               
                
                
      });

            //google.maps.event.addListener(drawingManager, "overlaycomplete", function(event){
                
               
            //});
        }
function overlayClickListener(overlay) {
  overlays.push(overlay.getPath().getArray());
 google.maps.event.addListener(overlay, "click", function(event){
        $('#vertices').val(overlay.getPath().getArray());
        $('#area').val(google.maps.geometry.spherical.computeArea(overlay.getPath()));
        
          
    });


    
    google.maps.event.addListener(overlay.getPath(), 'set_at', function() {
            console.log("test");
        });
}


 //initialize();
google.maps.event.addDomListener(window, 'load', initialize);
$(function(){
    $('#save').click(function(){
      var container={
       path:document.getElementById('vertices').value,
         area:document.getElementById('area').value,
         shapeName:document.getElementById('zoneName').value,
         shapeType:document.getElementById('zoneType').value
      }
      if(saveObjectOverlays.hasItem(container.path)){
          alert("already present");
        }else{
          
          saveObject.push(container);
          var len=saveObject.length-1;
            for(var i=0;i<overlays.length;i++){
                if(container.path==overlays[i]){
               // overlaysSaveObject.setItem(overlays[i],saveObject[len]);
                //overlaysSaveObject[overlays[i]]=container;
                saveObjectOverlays.setItem(saveObject[len].path,overlays[i]);
                //saveObjectOverlays[container]=overlays[i];
                alert("saved ");
                
                break;
                
            }

          }
        }

                $('#vertices').val(null);
                $('#area').val(null);
                $('#zoneName').val(null);
                $('#zoneType').val(null);


    });
    
   $('#test').click(function(){
    
            var str=JSON.stringify(saveObject);

              alert(str);

         window.location.href = "day5.php?str=" + str; 
        
   });
   $('#getData').click(function(){
        window.location.href = "day5.php?val=getData" ;
   });


});




</script>
<script src="js/axios.min.js"></script>
    <script src="js/user.js"></script>

  </head>
  <body>

 
    <ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">
        <div class="background">
        <img src="">
        </div>
        <a href="setting.php"><img class="circle" src="images/profile-menu.svg"></a> 
        <a href="setting.php"><span class="white-text name">John Doe</span></a>
        <a href="setting.php"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div>
    </li>
        <li><a href="">Profile Setting</a></li>
        <li><a href="">Join Us</a></li>
        <li><a href="javascript:logout()">Log Out</a></li>
      <li class="no-padding"> 
        <ul class="collapsible collapsible-accordion">
          <li class="bold">
            <a class="collapsible-header waves-effect waves-teal active">Sub Menu Test</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="">Profile Setting</a></li>
                <li><a href="">Join Us</a></li>
                <li><a href="">Log Out</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>

    <div class=" login">
      <div class="row">

      <div class="col s12 m3 ">
        <a data-target="slide-out" class="sidenav-trigger button-collapse app-side"><i class="material-icons white-text">menu</i></a> 
        <h2>All Fields </h2> 
        <div class="search-wrapper">
            <input id="search" placeholder="Search">
            <div class="search-results"></div>
          </div>
      

        <div class="col s12 no-padding">
            <ul class="field-item" id = "user_requests">
                <li><img src="images/field.webp"> <span class="title">Field Example</span> <p>Field Description - 141.26 acr </p></li>
                <li><img src="images/field.webp"> <span class="title">Field Example</span> <p>Field Description - 111.56 acr </p></li>
            </ul>
        </div>
        
          <div class="center">
            
            <br>

            <button class="btn solid"  onclick="add_new_request()">Add New Field</button> 
          </div>
          
          <br>
          <div class="center footer-wrp">
            <span>Registration means accepting the <a href="">Terms</a> and <a href="">Privacy Policy</a> .</span>
            </div>
        </div>

        <div class="col s12 m9 map-wrp">
        <div class="container-fluid">
    <div class="row">
      <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
        <div id="map_canvas" style="width:100%; height:700px;"></div>
          </div>

          <div class="" style="">
          <h4>Coordinates</h4>
            <textarea type="text" rows="5" name="vertices" value="" id="vertices" style="width:100%;">  </textarea>
            <h4>Area</h4>
                <input type="text"  name="area" value="" id="area"  style="width:100%;">
              <h4>Zone Name</h4>
                <input type="text"  name="zoneName" value="" id="zoneName" placeholder="Zone Name" style="width:100%;">
                <h4>Zone Type</h4>
                <input type="text"  name="zoneType" value="" id="zoneType" placeholder="Zone Type" style="width:100%;">
              <button class="btn button-primary" type="button" name="save" value="Save!" id="save">Add</button>
              <button class="btn button-default" type="button" name="test" value="test!" id="test">Save to dataBase</button>
                  <button class="btn button-default" type="button" name="func" value="func" id="getData">Get data</button>
              <br>
       
              
        </div>
      </div>
</div>
        </div>


      </div>
    </div>





    <div class="toggle">
      <input type="checkbox" class="checkbox" id="ChangeTheme">
      <label for="ChangeTheme" class="checkbox-label">
        <i class="material-icons">wb_sunny</i>
        <i class="material-icons">brightness_3</i>
        <span class="ball"></span>
      </label>
    </div>

<script>
      
var checkbox = document.getElementById("ChangeTheme"); 
if (sessionStorage.getItem("mode") == "light") {
  darkmode(); 
} else {
  nodark(); 
}
checkbox.addEventListener("change", function() {
  if (checkbox.checked) {
    darkmode(); 
  } else {
    nodark(); 
  }
});

function darkmode() {
  document.body.classList.add("light"); 
  checkbox.checked = true; 
  sessionStorage.setItem("mode", "light"); 
}
function nodark() {
  document.body.classList.remove("light"); 
  checkbox.checked = false; 
  sessionStorage.setItem("mode", "dark"); 
}
</script>
   

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>

    <!-- External libraries -->
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/ScrollMagic.min.js"></script>
    <script src="js/animation.gsap.min.js"></script>

    <!-- Initialization script -->
    <script src="js/startup.js"></script>
    <script src="js/init.js"></script>
  </body>
</html>
