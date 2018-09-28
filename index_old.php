<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/jpg" href="./assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Ashesi CS Lab Inventory</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS     -->
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="./assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<!--<link href="./assets/css/demo.css" rel="stylesheet" />-->

    <!--     Fonts and icons     -->
	<link href="./assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!--<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>-->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!--<link href="./assets/css/nucleo-icons.css" rel="stylesheet">-->
	<sript src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></sript>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent" color-on-scroll="300">
        <div class="container">
			<div class="navbar-translate logo">
				<a class="navbar-brand simple-text logo-normal" href="#">Ashesi CS Lab</a>
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
	            </button>
			</div>
	        <div class="collapse navbar-collapse" id="navbarToggler">
	            <ul class="navbar-nav ml-auto">
					<li class="nav-item nav-link">
	                    <button onclick="location.href='./views/login.php'" class="nav-link btn btn-secondary"><i class="nc-icon nc-layout-11"></i>Admin Log in</button>
	                </li>
	                <li class="nav-item nav-link">
	                    <button onclick="location.href='./views/categories.php'" target="_blank" class="nav-link btn btn-secondary"><i class="nc-icon nc-book-bookmark"></i> List of Items </button>
	                </li>

	            </ul>
	        </div>
		</div>
    </nav>

		<div class="page-header" data-parallax="true">
			<div class="filter"></div>
			<div class="container">
			    <div class="motto text-center">
			        <h1>Ashesi CS Lab Inventory Platform</h1>
			        <h3>Request for equipments from Computer Science Department here.</h3>
			        <br />
			        <!--<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-outline-neutral btn-round"><i class="fa fa-play"></i>Watch video</a>-->
			        <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-outline-neutral btn-round">Make A Request</button>
                    <button type="button" data-toggle="modal" data-target="#searchRequest" class="btn btn-outline-neutral btn-round">Search for Request</button>
			    </div>
			</div>
    	</div>


		<!-- Add Modal -->
		<div class="modal fade front" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addModalLabel">Enter Request Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row col-md-12">
							<div class="form-group col-md-6">
								<label for="name">Full Name</label>
								<input type="text" class="form-control" id="name" placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="text" class="form-control" id="email" placeholder="">
							</div>

						</div>

						<div class="row col-md-12">
							<div class="form-group col-md-6">
								<label for="phone">Phone</label>
								<input type="text" class="form-control" id="phone" placeholder="">
							</div>

							<div class="form-group col-md-6">
								<label for="department">Department</label>
								<select class="form-control department" id="department">
									<option value="-1" class="form-group">Click to select department</option>
									<option value="cs" class="form-group ">Computer Science</option>
									<option value="eng" class="form-group ">Engineering</option>
									<option value="ba" class="form-group ">Business Administration</option>
									<option value="other" class="form-group ">Other</option>

								</select>
							</div>
						</div>

						<div class="row col-md-12">
							<div class="form-group usergroup col-md-6">
								<label for="usertype">User Category</label>
								<select class="form-control usertype" id="usertype">
									<option value="-1" class="form-group">Select user category</option>
									<option value="student" class="form-group ">Student</option>
									<option value="faculty" class="form-group ">Faculty</option>
									<option value="staff" class="form-group ">Staff</option>

								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="cat_select">Item</label>
								<select class="form-control item_needed" id="cat_select">
									<!--script>
                                        $(document).ready(function () {
                                            $.ajax({
                                                type: "GET",
                                                async:true,
                                                url: "./controllers/items_category_ajax.php?cmd=1",
                                                data: {},
                                                cache: false,
                                                complete: function (data) {
                                                    var newdata = $.parseJSON(data.responseText);
                                                    $("#cat_select").html("<option class='form-group' value=-1>"+ "Click to select item" + "</option>");

                                                    for(i=0;i<newdata.categories.length;i++){
                                                        var selectdata = "<option class='form-group' value="+newdata.categories[i].category_id+ ">"+newdata.categories[i].category_name+"</option>";
                                                        $(selectdata).appendTo("#cat_select");

                                                    }
                                                }
                                            });

                                        });

									</script-->
								</select>
							</div>

						</div>

						<div class="form-group row col-md-12">
							<label for="reason">Reason for request</label>
							<input type="text" class="form-control" id="reason" placeholder="">
						</div>

						<div class="row col-md-12">
							<div class="form-group col-md-6">
								<label for="date_needed">Date Needed</label>
								<input type="date" class="form-control" id="date_needed" placeholder="Date Needed">
							</div>
							<div class="form-group col-md-6">
								<label for="return_date">Return Date</label>
								<input type="date" class="form-control" id="return_date" placeholder="Date to return">
							</div>
						</div>

					</div>
					<div class="modal-footer" >
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addRequest()">Submit</button>
					</div>
				</div>
			</div>
		</div>

	<!-- Add Response Modal -->
	<div class="modal fade" id="requestResponse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p id="modBody"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">OK</button>
				</div>
			</div>
		</div>
	</div>


	<!--search modal-->
	<div class="modal fade" id="searchRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="searchRequestLabel">Search for Request Status</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<input type="text" class="form-control" id="search" placeholder="Enter request id...">
					</div>

					<div class="form-group" id="searchResult">
						<!--<span hidden="hidden"> </span>Result: <p id="searchResult"></p>-->
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Close</button>
					<button type="button" class="btn btn-primary" onclick="searchRequest()">Submit</button>
				</div>
			</div>
		</div>
	</div>



</body>

<!-- Core JS Files -->
<script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--<script src="./assets/js/jquery-3.2.1.js" type="text/javascript"></script>-->
<script src="./assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!--<script src="./assets/js/popper.js" type="text/javascript"></script>-->
<script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>-->

<!--  Paper Kit Initialization snd functons -->
<!--<script src="./assets/js/paper-kit.js?v=2.1.0"></script>-->

<script type="text/javascript">

    function addRequest() {

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var item_needed = $('.item_needed option:selected').val();
        var usertype = $('#usertype option:selected').val();
        var department = $('#department option:selected').val();
        var reason = $("#reason").val();
        var needed = $("#date_needed").val();
        var returned = $("#return_date").val();

        $.ajax({
            type: "GET",
            async: true,
            url: "./controllers/request_ajax.php?cmd=10",
            data: {
                name: name,
                email: email,
                phone: phone,
                usergroup: usertype,
                item_needed: item_needed,
                department: department,
                reason: reason,
                needed: needed,
                returned: returned
            },
            cache: false,
            complete: function (data) {
//                $("#card").flip(true);
                console.log(data)
//                alert($.parseJSON(data.responseText).message)
//                $("#status").text($.parseJSON(data.responseText).message);

                $('#modBody').text($.parseJSON(data.responseText).message)
                $("#requestResponse").modal({
                    show:true,
                    focus:true
                })
//
            },
            error: function (data) {
                console.log($.parseJSON(data.responseText))
            }

        });

    }

    function searchRequest() {

        var search = $('#search').val();
//        console.log(search);
        $.ajax({
            type: "GET",
            async:true,
            url: "./controllers/request_ajax.php?cmd=11",
            data: {
                search: search
            },
            cache: false,
            complete: function(data){
//                console.log(data)
//                console.log($.parseJSON(data.responseText))
				$('#searchResult').text("Request Status: "+$.parseJSON(data.responseText).request_status)
//                location.reload();

            },
            error: function (data) {
                console.log($.parseJSON(data.responseText))
            }

        });

    }

</script>

</html>
