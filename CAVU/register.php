<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/axios.min.js"></script>
  <script src="js/user.js"></script>
  <link rel="stylesheet" href="css/startup-materialize.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>


<body>

  <!-- Navbar -->
  <nav class="navbar navbar-solid-transition">
    <div class="container">
      <div class="nav-wrapper">
        <a href="https://targetek.ae" class="brand-logo"><img class="white-logo" width="100"
            src="images/white-logo.webp"> <img class="normal-logo" width="100" src="images/logo.webp"></a>
        <a target="_blank" href="login.html" class="btn login">Login</a>
        <ul id="nav-mobile" class=" hide-on-med-and-down">
          <li><a href="https://targetek.ae">Home</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>

        <a href="#" data-target="slide-out" class="sidenav-trigger button-collapse right"><i
            class="material-icons white-text">menu</i></a>
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
              <li><a href="horizontal-half.html">Horizontal Halves</a></li>
              <li><a href="sierra.html">Zoom Out</a></li>
              <li><a href="circle-reveal.html">Circle Reveal</a></li>
              <li><a href="phone-wall.html">Phone Wall</a></li>
              <li><a class="active" href="element-transitions.html">Element Transitions</a></li>
              <li><a href="basic-elements.html">Basic Elements</a></li>
              <li><a href="card-shuffle.html">Shuffle</a></li>
              <li><a href="postcards.html">Postcards</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li><a class="waves-effect waves-teal" href="blog.html">Blog</a></li>
    <li><a class="waves-effect waves-teal" href="team.html">Team</a></li>
    <li><a class="waves-effect waves-teal" href="docs/about.html">Docs</a></li>
    <li><a class="waves-effect waves-teal" href="#">Buy Now!</a></li>
  </ul>

  <div class="section login">
    <div class="row">

      <div class="col s12 m4 form-solid-back">
        <h1>Register</h1>
        <span>Hello! Enter your information</span>

        <div class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <input id="first_name" type="text" class="validate">
              <label for="first_name">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate">
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <button class="btn waves-effect waves-light green" type="submit" name="action"
                onclick="register_user()">Submit
                <i class="material-icons right">send</i>
              </button>
            </div>
          </div>
        </div>

        <div class="center">

          <br>
          <span>Registration means accepting the <a href="">Terms</a> and <a href="">Privacy Policy</a> .</span>

          <br>

          <span class="call-to-register"> Already have an account? <a class="btn solid" href="login.html">Login</a>
          </span>
        </div>

      </div>

      <div class="col s12 m8">
        <div class="background login-back">
          <img src="images/login.webp" alt="">
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
    checkbox.addEventListener("change", function () {
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
            <li><a href="#!">Blog</a></li>
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