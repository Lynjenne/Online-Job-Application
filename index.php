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
                    <li><a href="applicant/applicant_registration.php">Applicant</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="employer/employer_registration.php">Employer</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li><a href="applicant/applicant_login.php">Applicant</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="employer/employer_login.php">Employer</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
      
<div class="container-fluid" id="main1"> <!-- jumbotron fluid -->
    <div class="jumbotron text-center" id="searchjum">
        <form class="form-inline" id="homesearch">
            <input type="text" class="form-control" size="50" placeholder="Enter your search keyword to search a job" name="keyword" id="keyword">
            <button type="button" onclick="search()" class="btn btn-lg " style="color: black"><span class="glyphicon glyphicon-search"></span> Search</button>
        </form>
    </div>
</div> <!-- jumbotron -->
</body>
</html>
