<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="..assets/img/favicon.png">
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
</head>

<body class="">

    <div class="main-panel">

      <div class="content ">
        <div class="container-fluid">

            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Login</h4>
                  <!--<p class="card-category"> Details of Item Categories</p>-->
                </div>
                <div class="card-body">

                  <form>
                    <div style = "color:red" id = "errorMsg"> </div>
                    <br>
                    <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">mail</i>
                            </span>
                      </div>
                      <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>

                    <br>
                    <br>

                    <div class="input-group">
                      <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">lock</i>
                            </span>
                      </div>
                      <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>

                    <br>
                    <br>

                    <button type="button" class="btn btn-primary" onclick="login()">Sign In</button>
                  </form>

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>

  <!--   Core JS Files   -->

  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <sript src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></sript>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

      /*
   * function to validate username
   */
      function validateEmail(email)
      {
          var rgText= /([a-z]{1,30}).([a-z]{1,30})@([ashesi.edu.gh])/;

          if(!rgText.test(email))
          {
              errorMsg.innerHTML="Invalid Username";
              return false;
          }
          return true;

      }

      /*
       callback function for login method
       */
      function loginComplete(xhr, status)
      {
          console.log(xhr);
          if (status != "success")
          {
              alert("Invalid Login");
          }
          else{

              var log = $.parseJSON(xhr.responseText);
//          console.log(xhr);
              if (log.result == 0)
              {
                  errorMsg.innerHTML = log.message;
              }
              else
              {
//              console.log($.parseJSON(xhr.responseText).values)
//              document.cookie = "user="+JSON.stringify($.parseJSON(xhr.responseText).values)+ "; expires=0; path=/";
//              var cookie = getCookie("user");
//              console.log(cookie);
                  location.href = "./dashboard.php";
              }

          }


      }

      /*makes request to the ajax page
       */
      function login()
      {
          var email = $("#email").val();
          var password = $("#password").val();
//          if (!validateEmail(email))
//          {
//              return;
//          }


          var url = "../controllers/login_ajax.php?cmd=1&email=" + email + "&password=" + password;

          $.ajax(url,
              {
                  async: true,
                  complete: loginComplete
              });
      }




  </script>

</body>

</html>