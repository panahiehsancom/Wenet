<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cavu - Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/startup-materialize.min.css">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-solid-transition">
      <div class="container">
      <div class="nav-wrapper">
        <a href="https://targetek.ae" class="brand-logo"><img class="white-logo" width="100" src="images/white-logo.webp" > <img class="normal-logo" width="100" src="images/logo.webp" ></a>
        <a target="_blank" href="login.php" class="btn login">Login</a>
        <ul id="nav-mobile" class=" hide-on-med-and-down">
          <li><a href="https://targetek.ae">Home</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>

        <a href="#" data-target="slide-out" class="sidenav-trigger button-collapse right"><i class="material-icons white-text">menu</i></a>
      </div>
    </div>
    </nav>
    <ul id="slide-out" class="sidenav">
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li class="bold">
            <a class="collapsible-header waves-effect waves-teal active">Pages</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="">Test</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <li><a class="waves-effect waves-teal" href="blog.php">Blog</a></li>
      <li><a class="waves-effect waves-teal" href="#">Buy Now!</a></li>
    </ul>


    <div class="section black valign-wrapper">
      <div class="row valign">
        <div class="container">
          <div class="row">
            <div class="col s12"><h1 class="section-title">Get in Touch</h1></div>
          </div>
          <div class="row staggered-transition-wrapper" data-duration="0" data-staggereddelay=".9">

            <div class="col s12 m6 feature-description staggered-transition-wrapper" data-duration="0" data-staggereddelay=".9">

            <a class="tel" href="tel:+44123456789"><i class="material-icons">phone_in_talk</i> +44-123456789</a>
            <a class="tel" href="tel:+44123456789"><i class="material-icons">phone_in_talk</i>+44-123456789</a>
<br>
            <a class="tel" href="mailto:test@test.com" ><i class="material-icons">email</i>hi@cavu.com </a>
            <div class="contac-map-wrp">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13724379.67526029!2d-106.3120974!3d32.8802213!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86e269cdd219a1d1%3A0x36c0bb97e873a751!2sCAVU%20Aerospace!5e0!3m2!1sen!2s!4v1739592589575!5m2!1sen!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

              </div>
              <div class="col s12 m6 left-in-out fade-in-out">
              <p>
              We are open to partnerships and collaborations.  Please contact us if you are interested in working together. We look forward to hearing from you.
              </p>
                    <form>
                      <div class="row">
                        <div class="col s12"><h2 class="section-title">Contact Us</h2></div>
                        <div class="input-field col s6">
                          <input id="first_name" type="text">
                          <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="last_name" type="text">
                          <label for="last_name">Last Name</label>
                        </div>
                        <div class="input-field col s12">
                          <textarea id="message" class="materialize-textarea"></textarea>
                          <label for="message">Message</label>
                          <a class="waves-effect waves-light btn-large">Button</a>
                        </div>
                      </div>
                    </form>
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
    <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col s6 m3">
            <img class="materialize-logo" src="images/materialize-teal.png" alt="">
            <p>Made with love by Materialize.</p>
          </div>
          <div class="col s6 m3">
            <h5>About</h5>
            <ul>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="#!">Pricing</a></li>
              <li><a href="#!">Docs</a></li>
            </ul>
          </div>
          <div class="col s6 m3">
            <h5>Connect</h5>
            <ul>
              <li><a href="#!">Community</a></li>
              <li><a href="#!">Subscribe</a></li>
              <li><a href="#!">Email</a></li>
            </ul>
          </div>
          <div class="col s6 m3">
            <h5>Contact</h5>
            <ul>
              <li><a href="#!">Twitter</a></li>
              <li><a href="#!">Facebook</a></li>
              <li><a href="#!">Github</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

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
