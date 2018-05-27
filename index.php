  <?php

  //To Handle Session Variables on This Page
  session_start();

  //Including Database Connection from pdo.php file to avoid rewriting in all files
  require_once("pdo.php");
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Portal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="index.php" class="logo logo-bg">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b> Online Job </b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="jobs.php">Search Jobs</a>
            </li>
            <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Sign Up <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="register-candidates.php">Applicant</a></li>
                  <li><a href="register-company.php">Employer</a></li>
                </ul>
              </li>
            <li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sign-in" aria-hidden="true"></i> Login <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="login.php">Applicant</a></li>
                  <li><a href="login.php">Employer</a></li>
                </ul>
              </li>
            <?php } else { 

              if(isset($_SESSION['id_user'])) { 
            ?>        
            <li>
              <a href="user/index.php">Dashboard</a>
            </li>
            <?php
            } else if(isset($_SESSION['id_company'])) { 
            ?>        
            <li>
              <a href="company/index.php">Dashboard</a>
            </li>
            <?php } ?>
            <li>
              <a href="logout.php">Logout</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 latest-job margin-bottom-20">
              <h1 class="text-center">Latest Jobs</h1>            
              <?php 
            /* Show any 4 random job post
             * 
             * Store sql query result in $result variable and loop through it if we have any rows
             * returned from database. $result->num_rows will return total number of rows returned from database.
            */
            $sql = "SELECT * FROM job_post Order By Rand() Limit 4";
              $result = $conn->prepare($sql);
              $result->execute();

            if($result->rowCount()) {
              while($row = $result->fetch())
              {
                $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
                $result1 = $conn->prepare($sql1);
                $result1->execute();

                if($result1->rowCount()) {
                  while($row1 = $result1->fetch())
                  {
               ?>
              <div class="attachment-block clearfix">
                <img class="attachment-img" src="img/photo1.png" alt="Attachment Image">
                <div class="attachment-pushed">
                  <h4 class="attachment-heading"><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>/Month</span></h4>
                  <div class="attachment-text">
                      <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?> | Experience <?php echo $row['experience']; ?> Years</strong></div>
                  </div>
                </div>
              </div>
            <?php
                }
              }
              }
            }
            ?>

            </div>
          </div>
        </div>
      </section>

    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin-left: 0px;">
      <div class="text-center">
        <strong>Copyright &copy; 2018 Online Job Application.</strong> All rights reserved.
      </div>
    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>
  </body>
  </html>
