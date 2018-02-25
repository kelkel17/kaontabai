<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>KaonTaBai!</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link href="../../assets/fonts/css.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">

    <!--For Plugins external css-->
    <link rel="stylesheet" href="../../assets/css/animate/animate.css" />
    <link rel="stylesheet" href="../../assets/css/plugins.css" />

    <!--Theme custom css -->
    <link rel="stylesheet" href="../../assets/css/style3.css">
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="../../assets/css/datatable.css">
    <link rel="stylesheet" href="../../assets/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <link rel="stylesheet" href="../../assets/css/star-rating.min.css" />
    <link rel="stylesheet" href="../../assets/css/jquery-ui.css">
    <link rel="stylesheet" href="../../assets/css/jquery.timepicker.min.css" />
    <link rel="shortcut icon" href="../../assets/img/logo.png">

</head>

<body>

    <header id="home" class="navbar-fixed-top">
        <div class="main_menu_bg">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand our_logo" href="#"></a>
                                <!--<img src="assets/images/logo.png" alt="" /></a>-->
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                <ul class="nav navbar-nav navbar-left">
                                    <li><a href="home.php?id=<?php echo $_SESSION['id']?>">Home</a></li>
                                    <li><a href="restaurant.php?id=<?php echo $_SESSION['id'];?>">Restaurants</a></li>
                                </ul>
                                <?php        
                                    if($_SESSION['id'])
                                     {
                                        $customer = getCustomer(array($_SESSION['id']));
                                        foreach ($customer as $row) {
                                    ?>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <a href="customerprofile.php?id=<?php echo $row['customer_id']; ?>">
                                                <?php echo $row['customer_fname'].' '.$row['customer_lname']?>
                                            </a>
                                        </li>
                                        <li><a class="booking" href="../../Controller/logout.php">Logout</a></li>
                                    </ul>
                                    <?php } }?>
                                        <!--<li><a href="View/Customer/login.php" class="booking">Sign Up & Login</a></li>-->

                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header>