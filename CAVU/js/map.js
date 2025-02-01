var saveObject=[];
var overlays=[];

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

