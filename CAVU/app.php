<?php
session_start();
if(!isset($_SESSION['userid']))
{
  header("Location: login.php"); 
}
echo $_SESSION['userid'];
?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Fields Information</title>
    <meta name="description" content="" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />

    <link rel="stylesheet" href="css/startup-materialize.min.css" />

    <!-- Material Icons -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta charset="utf-8" />
    <title>Using closures in event listeners</title>
    <style>
      html,
      body,
      #map-canvas {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <!-- jquery independent of bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi3bREc3Na2GfuV7vu1pJ2gtBStSBBJvQ&callback=initMap"
    ></script>
    <script>
      var maps = {};

      function initMap() {
        const mapOptions = {
          center: new google.maps.LatLng(-19.257753, 146.823688),
          zoom: 8,
          disableDefaultUI: true,
          mapTypeId: "satellite",
        };

        const mapElements = ["map_canvas", "map_canvas_modal"];

        mapElements.forEach((id) => {
          const element = document.getElementById(id);
          if (element) {
            maps[id] = new google.maps.Map(element, mapOptions);
          }
        });
      }
    </script>
    <script src="js/axios.min.js"></script>
    <script src="js/user.js"></script>
  </head>

  <body>
    <div class="main-demo-page">
      <div class="page-wrapper">
        <div class="app-sidebar">
          <div class="header">
            <h3>All Fields</h3>
            <div class="search">
              <input id="search" type="text" placeholder="Search" />
            </div>
          </div>
          
          <ul class="fields" id="user_requests">
            <li class="field-item">
              <img src="images/field.webp" alt="Field Image" class="circle" />
              <div class="content">
                <h5 class="title">Field Example</h5>
                <p>Field Description - 141.26 acr</p>
              </div>
            </li>
            <li class="field-item">
              <img src="images/field.webp" alt="Field Image" class="circle" />
              <div class="content">
                <h5 class="title">Field Example</h5>
                <p>Field Description - 111.56 acr</p>
              </div>
            </li>
          </ul>

          <div class="button-wrap">
            <button class="add-new-field" onclick="handleAddNewField()">
              Add New Field
            </button>
          </div>
        </div>

        <div class="map-container">
          <div class="header">
            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>

            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>

            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>

            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>

            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>

            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>

            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>

            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>

            <span class="icon">
              <img src="images/Icons/cloud.svg" />
            </span>
            <span class="text"> 2025-1-1 </span>
          </div>
          <div id="map_canvas" style="width: 100%; height: 100%"></div>
        </div>
      </div>

      <div class="select-polygon-modal" id="select-polygon-modal">
        <div class="wrapper">
          <div class="header">
            <h5 class="title">Draw Your Field</h5>
            <button class="close" onclick="closePolygonModal()">
              <img src="images/Icons/close.svg" />
            </button>
          </div>

          <div class="body">
            <div id="map_canvas_modal" style="width: 100%; height: 100%"></div>
          </div>

          <div class="actions">
            <button class="action" onclick="handleModalPolygonBackClick()">
              <img src="images/Icons/delete.svg" />
            </button>

            <button class="done-button" onclick="handleModalPolygonDoneClick()">
              Done
            </button>

            <button class="action" onclick="handleModalPolygonDeleteClick()">
              <img src="images/Icons/retry.svg" />
            </button>
          </div>
        </div>

        <div class="add-form" id="add-form">
          <form class="field-form">
            <div class="form-group">
              <label for="field-name">Field Name</label>
              <input
                type="text"
                id="field-name"
                name="field-name"
                class="form-control"
                required
              />
            </div>
            <div class="form-group">
              <label for="crop-type">Crop Type</label>
              <select id="crop-type" name="crop-type" required>
                <option value="wheat">Wheat</option>
                <option value="corn">Corn</option>
                <option value="rice">Rice</option>
                <option value="soybean">Soybean</option>
              </select>
            </div>
            <div class="form-group">
              <label for="crop-variety">Crop Variety</label>
              <input
                type="text"
                id="crop-variety"
                name="crop-variety"
                class="form-control"
                required
              />
            </div>
            <div class="form-group">
              <label for="planting-date">Planting Date</label>
              <input
                type="date"
                id="planting-date"
                name="planting-date"
                class="form-control"
                required
              />
            </div>
            <button type="submit" class="submit-button">Submit</button>
          </form>
        </div>
      </div>
    </div>

    <script>
      // <!-- ------------------------------- mycode -------------------------------- -->
      const openPolygonModal = () => {
        const selectPolygonModal = document.getElementById(
          "select-polygon-modal"
        );
        if (selectPolygonModal) selectPolygonModal.classList.add("open");
      };

      const closePolygonModal = () => {
        const selectPolygonModal = document.getElementById(
          "select-polygon-modal"
        );
        if (selectPolygonModal) selectPolygonModal.classList.remove("open");

        handleCloseForm();
      };

      const handleAddNewField = () => {
        openPolygonModal();
      };

      const handleOpenForm = () => {
        const addFieldForm = document.getElementById("add-form");
        if (addFieldForm) addFieldForm.classList.add("open");
      };

      const handleCloseForm = () => {
        const addFieldForm = document.getElementById("add-form");
        if (addFieldForm) addFieldForm.classList.remove("open");
      };

      const handleModalPolygonDoneClick = () => {
        handleOpenForm();
      };

      const handleModalPolygonDeleteClick = () => {};

      const handleModalPolygonBackClick = () => {};
      // <!-- ----------------------------- my code end ----------------------------- -->

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
