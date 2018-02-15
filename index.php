<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Online Job Application </title>
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/search.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/home.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
   <!--  <script type="application/javascript">
        $(document).ready(function(){
                // Add smooth scrolling to all links in navbar + footer link
                $(".navbar a, footer a[href='#insidenav']").on('click', function(event) {

                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function(){

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                });
                $(window).scroll(function() {
                    $(".slideanim").each(function(){
                        var pos = $(this).offset().top;

                        var winTop = $(window).scrollTop();
                        if (pos < winTop + 600) {
                            $(this).addClass("slide");
                        }
                    });
                });
            })
        </script> -->
    </head>

    <!--- -------------------------------------------------------------------------------------------------- -->
    <body id="indexbody" data-spy="scroll" data-target=".navbar" data-offset="60">
  <nav class="navbar" id="insidenav">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="#recent"">Recent Jobs</a></li>
              <li><a href="#jobseeker">Job Seeker</a></li>
              <li><a href="#">Employer</a></li>
              <li><a href="#contact">Contact Us</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="applicant.php">Jobseeker</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="employer.php">Employer</a></li>
                </ul>
            </li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
      
<div class="container-fluid" id="main1"> <!-- jumbotron fluid -->
    <div class="jumbotron text-center" id="searchjum">
        <p>Search for Jobs</p>
        <form class="form-inline" id="homesearch">
            <input type="text" class="form-control" size="50" placeholder="Enter your search keyword" name="keyword" id="keyword">
            <button type="button" onclick="search()" class="btn btn-lg " style="color: black"><span class="glyphicon glyphicon-search"></span> Search</button>
        </form>
    </div>
</div> <!-- jumbotron -->
</body>
</html>
