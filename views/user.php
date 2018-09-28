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
        <li class="nav-item active">
          <a class="nav-link" href="./user.php">
            <i class="material-icons">person</i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./categories.php">
            <i class="material-icons">content_paste</i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item">
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
          <a class="navbar-brand" href="#pablo">Users</a>
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
              <h4 class="card-title mt-0"> List of Users</h4>
              <!--<p class="card-category"> Details of Item Categories</p>-->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="itemtable">
                  <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
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
                <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Do you want to delete user?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="deleteUserComplete()">Delete</button>
              </div>
            </div>
          </div>
        </div>


        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <input type="text" class="form-control" id="firstname" placeholder="First Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addUser()">Add</button>
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
                  <input type="text" class="form-control" id="upfirstname" placeholder="First Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="uplastname" placeholder="Last Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="upemail" placeholder="Email">
                </div>
                <!--<div class="form-group">-->
                  <!--<input type="password" class="form-control" id="uppassword" placeholder="Password">-->
                <!--</div>-->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="editUserComplete()">Update</button>
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
            url: "../controllers/users_ajax.php?cmd=1",
            data: {},
            cache: false,
            complete: viewUsers
        });

    });

    function viewUsers(xhr,status) {
        if (status != "success") {
            alert("Error")
            return
        }
        else {
            var user = $.parseJSON(xhr.responseText)
            if (user == false) {
                alert("Error while loading Categories")
                return
            }
            else {
                $("#itemtable tbody").html("");
                for (i = 0; i < user.users.length; i++) {

                    var status;
                    if (user.users[i].status=="enabled"){
                        status = "disable";
                    }
                    else{
                        status = "enable";
                    }

                    var data = "<tr id=" + user.users[i].user_id + ">" + "<td>" + user.users[i].user_id +
                        "</td>" + "<td>" + user.users[i].firstname + "</td>" +
                        "<td>" + user.users[i].lastname + "</td>" + "<td>" + user.users[i].email + "</td>"
                        + "<td><a href='' onclick='changeStatus(this)'>" + status + "</a></td>"  +
                        "<td>" + user.users[i].created_at + "</td>" + "<td>" +
                        user.users[i].updated_at + "</td>" + "<td>" + "<td class='td-actions text-left' > "+
                        "<button type='button' rel='tooltip' class='btn btn-success' onclick='editUser(this)'>"+
                        "<i class='material-icons'>edit</i>" +
                        "</button>"+
                        "<button type='button' rel='tooltip' class='btn btn-danger' onclick='deleteUser(this)'>"+
                        "<i class='material-icons'>delete</i>"+
                        "</button>"+
                        "</td>" + "</tr>" ;

                    $(data).appendTo("#itemtable tbody");

                }
            }

        }
    }

    function changeStatus(object){
//        alert('here')
        var current_object = object;
        current_item_id = $(current_object).closest('tr').attr('id');

        $.ajax({
            type: "GET",
            async:true,
            url: "../controllers/users_ajax.php?cmd=5&user_id="+current_item_id,
            data: {},
            cache: false,
            complete: function(data){
//                alert("success")
                location.reload();


            }
        });


    }


    function editUser(object){
        var current_object = object;
//          var current_row_id = current_object.parentNode.parentNode.rowIndex;
        current_item_id = $(current_object).closest('tr').attr('id');

        $.ajax({
            type: "GET",
            async:true,
            url: "../controllers/users_ajax.php?cmd=3&user_id="+current_item_id,
            data: {},
            cache: false,
            complete: function(data){
                var newdata = $.parseJSON(data.responseText)
//                  console.log(newdata)
                $('#editModalTitle').text("Edit "+ newdata.firstname+ " " + newdata.lastname+"'s details")
                $('#upfirstname').val(newdata.firstname)
                $('#uplastname').val(newdata.lastname)
                $('#upemail').val(newdata.email)



                $("#editModal").modal({
                    show:true,
                    focus:true
                })
            }
        });

    }

    function editUserComplete(){

        var firstname = $('#upfirstname').val();
        var lastname = $('#uplastname').val();
        var email = $('#upemail').val();


        $.ajax({
            type: "GET",
            async:true,
            url: "../controllers/users_ajax.php?cmd=4",
            data: {
                user_id: current_item_id ,
                firstname: firstname,
                lastname: lastname,
                email: email
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

    function deleteUser(object) {
        current_object = object;
//           current_row_id = current_object.parentNode.parentNode.rowIndex;
        current_item_id = $(current_object).closest('tr').attr('id');

//          alert(current_item_id);
        $("#deleteModal").modal({
            show:true,
            focus:true
        })



    }

    function deleteUserComplete(){
        console.log("#"+current_item_id)
        $.ajax({
            type: "GET",
            async:true,
            url: "../controllers/users_ajax.php?cmd=2&user_id="+current_item_id,
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

    function addUser(){
//        var user_id = $('#user_id').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var password = $('#password').val();
        var email = $('#email').val();


//          console.log(category, item_condition, code, status, item_location, comments)

        $.ajax({
            type: "GET",
            async:true,
            url: "../controllers/users_ajax.php?cmd=0",
            data: {
//                user_id:user_id,
                firstname:firstname,
                lastname: lastname,
                email:email,
                password:password
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