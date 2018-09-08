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
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href ="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <sript src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></sript>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
          <li class="nav-item  ">
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
          <li class="nav-item">
            <a class="nav-link" href="./categories.php">
              <i class="material-icons">content_paste</i>
              <p>Categories</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./items.php">
              <i class="material-icons">library_books</i>
              <p>Inventory</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./requests.php">
              <i class="material-icons">bubble_chart</i>
              <p>Request</p>
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
            <a class="navbar-brand" href="#pablo">Inventory Items</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <button class="btn btn-primary btn-round btn-just-icon" id="" data-toggle="modal" aria-haspopup="true"
                        aria-expanded="false" data-target="#addModal">
                  <i class="material-icons">add</i>
                  <div class="ripple-container"></div>
                  <!--<span class="notification"></span>-->
                  <!--<p class="d-lg-none d-md-block">-->
                    <!--Some Actions-->
                  <!--</p>-->
                </button>
                <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">-->
                  <!--<a class="dropdown-item" href="#">Mike John responded to your email</a>-->
                  <!--<a class="dropdown-item" href="#">You have 5 new tasks</a>-->
                  <!--<a class="dropdown-item" href="#">You're now friend with Andrew</a>-->
                  <!--<a class="dropdown-item" href="#">Another Notification</a>-->
                  <!--<a class="dropdown-item" href="#">Another One</a>-->
                <!--</div>-->
              </li>

                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <button class="btn btn-outline-primary btn-round btn-just-icon"  data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-target="navbarDropdownMenuLink">
                        <i class="material-icons">settings</i>
                        <div class="ripple-container"></div>
                        <!--<span class="notification"></span>-->
                        <!--<p class="d-lg-none d-md-block">-->
                        <!--Some Actions-->
                        <!--</p>-->
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../models/logout.php">Logout</a>
                        <a class="dropdown-item" href="#">Change Password</a>
                    </div>
                </li>
              <!--<li class="nav-item">-->
                <!--&lt;!&ndash;<a class="nav-link" href="#">&ndash;&gt;-->
                  <!--&lt;!&ndash;<i class="material-icons">person</i>&ndash;&gt;-->
                  <!--&lt;!&ndash;<p class="d-lg-none d-md-block">&ndash;&gt;-->
                    <!--&lt;!&ndash;Account&ndash;&gt;-->
                  <!--&lt;!&ndash;</p>&ndash;&gt;-->
                <!--&lt;!&ndash;</a>&ndash;&gt;-->
              <!--</li>-->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">

            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Item Categories</h4>
                  <!--<p class="card-category"> Details of Item Categories</p>-->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="itemtable">
                      <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Category</th>
                        <th>Condition</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Comments</th>
                        <th>Created At</th>
<!--                        <th>Updated At</th>-->
                        <!--<th class="text-right">Actions</th>-->
                      </tr>
                      </thead>
                      <tbody>

                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>

          <!-- Delete Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Do you want to delete item?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="deleteItemComplete()">Delete</button>
                </div>
              </div>
            </div>
          </div>


          <!-- Add Modal -->
          <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addModalLabel">New Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" class="form-control" id="code" placeholder="Item Code">
                  </div>
                  <div class="form-group">
                    <select class="form-control category" id="cat_select">
                    <script>
                        $(document).ready(function () {
                            $.ajax({
                                type: "GET",
                                async:true,
                                url: "../controllers/items_category_ajax.php?cmd=1",
                                data: {},
                                cache: false,
                                complete: function (data) {
                                    var newdata = $.parseJSON(data.responseText);
                                    $("#cat_select").php("<option class='form-group' value=-1>"+ "Click to select category" + "</option>");

                                    for(i=0;i<newdata.categories.length;i++){
                                        var selectdata = "<option class='form-group' value="+newdata.categories[i].category_id+ ">"+newdata.categories[i].category_name+"</option>";
                                        $(selectdata).appendTo("#cat_select");

                                    }
                                }
                            });

                        });

                    </script>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control condition">
                      <option value="-1" class="form-group">Click to select item condition</option>
                      <option value="working" class="form-group ">Working</option>
                      <option value="not working" class="form-group ">Not Working</option>
                      <option value="partially_working" class="form-group ">Partially Working</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="location" placeholder="Item Location">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="status" placeholder="Item Status">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="comments" placeholder="Comments">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addItem()">Add</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Modal -->
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" class="form-control" id="upcode" placeholder="Item Code">
                  </div>
                  <div class="form-group">
                    <select class="form-control upcategory" id="catselect">
                      <script>
                          $(document).ready(function () {
                              $.ajax({
                                  type: "GET",
                                  async:true,
                                  url: "contollers/items_category_ajax.php?cmd=1",
                                  data: {},
                                  cache: false,
                                  complete: function (data) {
                                      var newdata = $.parseJSON(data.responseText);
                                      $("#catselect").php("<option class='form-group' value=-1>"+ "Click to select category" + "</option>");

                                      for(i=0;i<newdata.categories.length;i++){
                                          var selectdata = "<option class='form-group' value="+newdata.categories[i].category_id+ ">"+newdata.categories[i].category_name+"</option>";
                                          $(selectdata).appendTo("#catselect");

                                      }
                                  }
                              });

                          });

                      </script>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control upcondition">
                      <option value="-1" class="form-group">Click to select item condition</option>
                      <option value="working" class="form-group ">Working</option>
                      <option value="not working" class="form-group ">Not Working</option>
                      <option value="partially_working" class="form-group ">Partially Working</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="uplocation" placeholder="Item Location">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="upstatus" placeholder="Item Status">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="upcomments" placeholder="Comments">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editItemComplete()">Update</button>
                </div>
              </div>
            </div>
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
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->

  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

  <script>
      $(document).ready(function () {
          $.ajax({
              type: "GET",
              async:true,
              url: "../controllers/items_ajax.php?cmd=1",
              data: {},
              cache: false,
              complete: viewCategories
          });

      });

      function viewCategories(xhr,status) {
          if (status != "success") {
              alert("Error")
              return
          }
          else {
              var item = $.parseJSON(xhr.responseText)
              if (item == false) {
                  alert("Error while loading Categories")
                  return
              }
              else {
                  $("#itemtable tbody").html("");
                  for (i = 0; i < item.items.length; i++) {

                      var data = "<tr id=" + item.items[i].item_code + ">" + "<td>" + item.items[i].item_code +
                          "</td>" + "<td>" + item.items[i].category_name + "</td>" +
                          "<td>" + item.items[i].item_condition + "</td>" + "<td>" + item.items[i].location + "</td>"
                          + "<td>" + item.items[i].status + "<td>" + item.items[i].comments +
                          "<td>" + item.items[i].created_at + "</td>" + "<td>" + "<td class='td-actions text-left' > "+
                          "<button type='button' rel='tooltip' class='btn btn-success' onclick='editItem(this)'>"+
                          "<i class='material-icons'>edit</i>" +
                          "</button>"+
                          "<button type='button' rel='tooltip' class='btn btn-danger' onclick='deleteItem(this)'>"+
                          "<i class='material-icons'>delete</i>"+
                          "</button>"+
                          "</td>" + "</tr>" ;

                      $(data).appendTo("#itemtable tbody");

                  }
              }

          }
      }



      function editItem(object){
          var current_object = object;
//          var current_row_id = current_object.parentNode.parentNode.rowIndex;
          var current_item_id = $(current_object).closest('tr').attr('id');

          $.ajax({
              type: "GET",
              async:true,
              url: "../controllers/items_ajax.php?cmd=3&item="+current_item_id,
              data: {},
              cache: false,
              complete: function(data){
                  var newdata = $.parseJSON(data.responseText)
//                  console.log(newdata)
                  $('#editModalTitle').text("Edit "+ newdata.category_name+ " : " + newdata.item_code)
                  $('#upcode').val(newdata.item_code)
                  $('#uplocation').val(newdata.location)
                  $('#upstatus').val(newdata.status)
                  $('#upcomments').val(newdata.comments)
                  $('.upcategory').val(newdata.item_category).prop('selected',true);
                  $('.upcondition').val(newdata.item_condition).prop('selected',true);


                  $("#editModal").modal({
                      show:true,
                      focus:true
                  })
              }
          });

      }

      function editItemComplete(){
          var code = $('#upcode').val();
          var category = $('.upcategory option:selected').val();
          var item_condition = $('.upcondition option:selected').val();
          var status = $('#upstatus').val();
          var item_location = $('#uplocation').val();
          var comments = $('#upcomments').val();


          $.ajax({
              type: "GET",
              async:true,
              url: "../controllers/items_ajax.php?cmd=4",
              data: {
                  code:code,
                  category: category,
                  item_condition: item_condition,
                  status: status,
                  item_location: item_location,
                  comments: comments
              },
              cache: false,
              complete: function(data){
//                  console.log($.parseJSON(data.responseText))

//                  $.notify({
//                      icon: "add_alert",
//                      message: "Item updated successfully"
//
//                  },{
//                      type: 'success',
//                      timer: 1000,
//                      placement: {
//                          from: "top",
//                          align: "left"
//                      }
//                  });

                  location.reload()
              }
          });


      }

      function deleteItem(object) {
           current_object = object;
//           current_row_id = current_object.parentNode.parentNode.rowIndex;
           current_item_id = $(current_object).closest('tr').attr('id');

//          alert(current_item_id);
          $("#deleteModal").modal({
              show:true,
              focus:true
          })



      }

      function deleteItemComplete(){
          console.log("#"+current_item_id)
          $.ajax({
              type: "GET",
              async:true,
              url: "../controllers/items_ajax.php?cmd=2&item="+current_item_id,
              data: {},
              cache: false,
              complete: function(){

                  $("#"+current_item_id).remove();
//                  $.notify({
//                      icon: "add_alert",
//                      message: "Item deleted successfully"
//
//                  },{
//                      type: 'success',
//                      timer: 1000,
//                      placement: {
//                          from: "top",
//                          align: "left"
//                      }
//                  });

              }


          });
      }

      function addItem(){
          var code = $('#code').val();
          var category = $('.category option:selected').val();
          var item_condition = $('.condition option:selected').val();
          var status = $('#status').val();
          var item_location = $('#location').val();
          var comments = $('#comments').val();

//          console.log(category, item_condition, code, status, item_location, comments)

          $.ajax({
              type: "GET",
              async:true,
              url: "../controllers/items_ajax.php?cmd=0",
              data: {
                  code:code,
                  category:category,
                  item_condition: item_condition,
                  status: status,
                  item_location:item_location,
                  comments:comments
              },
              cache: false,
              complete: function(data){

                  location.reload();

              },
              error: function (data) {
                  console.log($.parseJSON(data.responseText))
              }

          });


      }
          </script>

</body>

</html>