<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Jennelyn Urot Peromingan </title>
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/search.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    </head>
    <body id="indexbody" data-spy="scroll" data-target=".navbar" data-offset="60">
  <nav class="navbar" id="insidenav">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li><a class="navbar-brand" href="index.php">Job Finder</a></li>
              <!-- <li><a href="#recent"">Recent Jobs</a></li>
              <li><a href="#jobseeker">Applicant</a></li>
              <li><a href="#">Employer</a></li> -->
             <!--  <li><a href="#contact">Contact Us</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
             <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="applicant_registration.php">Search Jobs</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="applicant_registration.php">Applicant</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="employer_registration.php">Employer</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li><a href="applicant_login.php">Applicant</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="employer_login.php">Employer</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
      


<div class="container-fluid" id="main1"> <!-- jumbotron fluid -->
    <div class="jumbotron text-center" id="searchjum">
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
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
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
</div> <!-- jumbotron -->
</body>
</html>
