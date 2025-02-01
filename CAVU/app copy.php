<!doctype html>
<html>
  <head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no"> 

 
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=drawing"></script>-->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=drawing,geometry"></script>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>App</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/startup-materialize.min.css">
    <script src="js/map.js"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <li><a href="">Log Out</a></li>
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
            <ul class="field-item">
                <li><img src="images/field.webp"> <span class="title">Field Example</span> <p>Field Description - 141.26 acr </p></li>
                <li><img src="images/field.webp"> <span class="title">Field Example</span> <p>Field Description - 111.56 acr </p></li>
            </ul>
        </div>
          <div class="center">
            
            <br>

             <a class="btn solid" href="register.php">   <i class="material-icons">add</i> Add New Field</a> 
          </div>
          
          <br>
          <div class="center footer-wrp">
            <span>Registration means accepting the <a href="">Terms</a> and <a href="">Privacy Policy</a> .</span>
            </div>
        </div>

        <div class="col s12 m9 map-wrp">
        <div id="map_canvas"  width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4300.963169225863!2d-111.63641684712711!3d57.384929394927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53b08ddf8c494e97%3A0xc4247a92fc9148ad!2sBitumount%2C%20AB%20T0P%201B0%2C%20Canada!5e0!3m2!1sen!2s!4v1738095994572!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
