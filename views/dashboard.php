<?php
session_start();

// checking to see if session contains the user id
if(!isset($_SESSION['USER']['user_id'])){
    header("Location: ../views/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Ashesi CS Lab Inventory
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.css" rel="stylesheet"/>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          CS LAB INVENTORY
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./categories.php">
              <i class="material-icons">content_paste</i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./items.php">
              <i class="material-icons">library_books</i>
              <p>Inventory</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./requests.php">
              <i class="material-icons">bubble_chart</i>
              <p>All Request</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./checkedout.php">
              <i class="material-icons">content_paste</i>
              <p>Checked Out</p>
            </a>
          </li>


            <li class="nav-item ">
                <a class="nav-link" href="./log.php">
                    <i class="material-icons">bubble_chart</i>
                    <p>Log</p>
                </a>
            </li>
          <!--<li class="nav-item ">-->
            <!--<a class="nav-link" href="./map.php">-->
              <!--<i class="material-icons">location_ons</i>-->
              <!--<p>Maps</p>-->
            <!--</a>-->
          <!--</li>-->
          <!--<li class="nav-item ">-->
            <!--<a class="nav-link" href="./notifications.php">-->
              <!--<i class="material-icons">notifications</i>-->
              <!--<p>Notifications</p>-->
            <!--</a>-->
          <!--</li>-->
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.php">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
<!--            <form class="navbar-form">-->
<!--              <div class="input-group no-border">-->
<!--                <input type="text" value="" class="form-control" placeholder="Search...">-->
<!--                <button type="submit" class="btn btn-white btn-round btn-just-icon">-->
<!--                  <i class="material-icons">search</i>-->
<!--                  <div class="ripple-container"></div>-->
<!--                </button>-->
<!--              </div>-->
<!--            </form>-->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li> &nbsp; &nbsp;
<!--              <li class="nav-item dropdown">-->
<!--                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                  <i class="material-icons">notifications</i>-->
<!--                  <span class="notification">5</span>-->
<!--                  <p class="d-lg-none d-md-block">-->
<!--                    Some Actions-->
<!--                  </p>-->
<!--                </a>-->
<!--                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">-->
<!--                  <a class="dropdown-item" href="#">Mike John responded to your email</a>-->
<!--                  <a class="dropdown-item" href="#">You have 5 new tasks</a>-->
<!--                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>-->
<!--                  <a class="dropdown-item" href="#">Another Notification</a>-->
<!--                  <a class="dropdown-item" href="#">Another One</a>-->
<!--                </div>-->
<!--              </li>-->
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <a href="categories.php">
                  <div class="card-body">
                    <h4 class="card-title">Total Item Categories</h4>
                    <p class="card-category">
                      <span class="text-success" id="totalItems"></p>
                  </div>
                </a>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> recently updated
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Total Items Checked Out</h4>
                  <p class="card-category" id="checkedOut"></p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> recently updated
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Total Yearly Requests</h4>
                  <p class="card-category" id="yearReqs"></p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> recently updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

              <div class="col-lg-6 col-md-12">
                  <div class="card">
                      <div class="card-header card-header-tabs card-header-primary">
                          <h4 class="card-title">Request Status Breakdown</h4>
                          <p class="card-category">Gives you a breakdown of requests by Status</p>
                      </div>
                      <div class="card-body ct-chart" id="req-status">

                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-12">
                  <div class="card">
                      <div class="card-header card-header-tabs card-header-primary">
                          <h4 class="card-title">Request Department Breakdown</h4>
                          <p class="card-category">Gives you a breakdown of requests by Department</p>
                      </div>
                      <div class="card-body ct-chart" id="req-department">

                      </div>
                  </div>
              </div>



      </div>

        <div class="row">

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Items Under Categories</h4>
                        <p class="card-category">Counts items under categories</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="cat-table">
                            <thead class="text-warning">
                            <!--                      <th>ID</th>-->
                            <th>Category Name</th>
                            <th>Number of Items</th>
                            <!--                      <th>Country</th>-->
                            </thead>
                            <tbody >

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Requests Under  User Categories</h4>
                        <p class="card-category">Counts requests under categories</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover" id="usercat-table">
                            <thead class="text-warning">
                            <!--                      <th>ID</th>-->
                            <th>User Category</th>
                            <th>Number of Requests</th>
                            <!--                      <th>Country</th>-->
                            </thead>
                            <tbody >

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Ashesi CS Lab
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script><i class="material-icons"></i>
              <a href="https://www.creative-tim.com" target="_blank">Ashesi CS Lab</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <sript src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></sript>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<!--  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>-->
  <!--  Google Maps Plugin    -->
<!--  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
  <!-- Chartist JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
<!--  <script src="../assets/demo/demo.js"></script>-->
  <script>

      $(document).ready(function(){
          console.log("start...");
          $.when(
              $.ajax({
                  type: "GET",
                  async:true,
                  url: "../controllers/dashboard_ajax.php?cmd=0",
                  data: {},
                  cache: false,
                  complete: function(data){

//                      console.log($.parseJSON(data.responseText));
                      $('#totalItems').text($.parseJSON(data.responseText).items + " items")

                  }

              }),

              $.ajax({
                  type: "GET",
                  async:true,
                  url: "../controllers/dashboard_ajax.php?cmd=1",
                  data: {},
                  cache: false,
                  complete: function(data){

                      $('#checkedOut').text($.parseJSON(data.responseText).items + " items")

                  }


              }),

              $.ajax({
                  type: "GET",
                  async:true,
                  url: "../controllers/dashboard_ajax.php?cmd=2",
                  data: {},
                  cache: false,
                  complete: function(data) {

                      var category = $.parseJSON(data.responseText);
                      $("#cat-table tbody").html("");
                      for (i = 0; i < category.itemsCategories.length; i++) {

                          var data = "<tr>" + "<td>" + category.itemsCategories[i].category_name +
                              "</td>" + "<td>" + category.itemsCategories[i].items + "</td>" +
                              "</tr>";

                          $(data).appendTo("#cat-table tbody");


                      }
                  }


              }),

              $.ajax({
                  type: "GET",
                  async:true,
                  url: "../controllers/dashboard_ajax.php?cmd=3",
                  data: {},
                  cache: false,
                  complete: function(data){


                      $('#yearReqs').text($.parseJSON(data.responseText).requests + " requests")


                  }


              }),

              $.ajax({
                  type: "GET",
                  async:true,
                  url: "../controllers/dashboard_ajax.php?cmd=4",
                  data: {},
                  cache: false,
                  complete: function(data){

                      var result = $.parseJSON(data.responseText);
                      var labels = [];
                      var values = []
                      for (i=0; i< result.itemsCategories.length; i++){
                          labels.push(result.itemsCategories[i].request_status)
                          values.push(result.itemsCategories[i].requests)

                      }


                      new Chartist.Bar('#req-status', {
                          labels: labels,
                          series: values
                      }, {
                          distributeSeries: true
                      });





                  }


              }),

              $.ajax({
                  type: "GET",
                  async:true,
                  url: "../controllers/dashboard_ajax.php?cmd=5",
                  data: {},
                  cache: false,
                  complete: function(data){

                      var category = $.parseJSON(data.responseText);
                      $("#usercat-table tbody").html("");
                      for (i = 0; i < category.itemsCategories.length; i++) {

                          var data = "<tr>" + "<td>" + category.itemsCategories[i].user_category +
                              "</td>" + "<td>" + category.itemsCategories[i].requests + "</td>" +
                              "</tr>";

                          $(data).appendTo("#usercat-table tbody");


                      }

                  }


              }),

              $.ajax({
                  type: "GET",
                  async:true,
                  url: "../controllers/dashboard_ajax.php?cmd=6",
                  data: {},
                  cache: false,
                  complete: function(data){
                      var result = $.parseJSON(data.responseText);
                      var labels = [];
                      var values = []
                      for (i=0; i< result.itemsCategories.length; i++){
                          labels.push(result.itemsCategories[i].department)
                          values.push(result.itemsCategories[i].requests)

                      }


                      new Chartist.Bar('#req-department', {
                          labels: labels,
                          series: values
                      }, {
                          distributeSeries: true
                      });

                  }


              })

          ).then(function () {
              //this callback will be fired once all ajax calls have finished.
          console.log("done");
          });
      });
  </script>
</body>

</html>