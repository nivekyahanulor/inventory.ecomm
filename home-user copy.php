<?php 
require_once('include/session.php'); 
admin();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory & Ordering System System</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Inventory & Ordering System</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></i> Home</a>
                    </li>
                    <li>
                        <a href="item.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Item List</a>
                    </li>
                    <li>
                        <a href="product.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Product Profile</a>
                    </li>
                    <li>
                        <a href="stock.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Stocks</a>
                    </li>
                     <li>
                        <a href="expired.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Expired</a>
                    </li>
                    <li>
                        <a href="sales.php"><span class="glyphicon glyphicon-record" aria-hidden="true"></span> Sales</a>
                    </li>
                    <li class="active">
                        <a href="home-user.php"><span class="glyphicon glyphicon-record" aria-hidden="true"></span> User</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome <small>User</small>
                        </h1>
                        <p class="btn btn-success" style="margin-bottom: 1%;">Verified user</p>
                        <ol class="breadcrumb">
                        <li >
                        <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></i> Home</a>
                    </li>
                    <li>
                        <a href="item.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Item List</a>
                    </li>
                    <li>
                        <a href="product.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Product Profile</a>
                    </li>
                    <li>
                        <a href="stock.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Stocks</a>
                    </li>
                     <li>
                        <a href="expired.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Expired</a>
                    </li>
                    <li>
                        <a href="sales.php"><span class="glyphicon glyphicon-record" aria-hidden="true"></span> Sales</a>
                    </li>
                    <li class="active">
                        <a href="home-user.php"><span class="glyphicon glyphicon-record" aria-hidden="true"></span> User</a>
                    </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div id="order"></div>         
               
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <div class="modal fade" id="modal-confirmation">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <select name="" id="select-mode" class="form-control">
                    <option value="">test</option>
                </select>

				<h4 class="modal-title text-danger">Are you sure?</h4>
			</div>
			<div class="modal-body">
				<div align="center">
						<strong class="text-danger">
							<div id="remove-stud-msg">
								<h1></h1>
							</div>
						</strong>
						<input type="hidden" id="confirm-type" value="null">
						<button id="confirm-yes" type="button" class="btn btn-default btn-lg del-expired" >Confirm
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						</button>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="button" class="btn btn-default btn-lg" data-dismiss="modal" >Declined
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</button>	
				</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>



<?php include_once('modal/to_cart.php'); ?>
<?php //include_once('modal/confirmation.php'); ?>
<?php include_once('modal/add_new_item.php'); ?>
<?php include_once('modal/message.php'); ?>

    <script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/regis.js"></script>

</body>

</html>