
<?php
include('pdo.php');
include("employer_session.php");

include('employerClass.php');
$employerClass = new employerClass();

$errorMsgReg='';
$errorMsgLogin='';

/* Login Form */
if (!empty($_POST['submit']))
{
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];

    if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
    {
        $ID=$employerClass->employerLogin($email_address,$password);
        
        if($ID)
        {
            $_SESSION['employer_id'] = $ID; // Storing user session value
            $_SESSION['email_address'] = $employerClass->employerDetails($ID)->Email;

            if (isset($_POST['redirect_to']) && $_POST['redirect_to'] != '') {
                header('location: '.$_POST['redirect_to']);
            } else {
                header('Location: https://jennelynperomingan.herokuapp.com/index.php'); // Page redirecting to home.php
            }
        }
        else
        {
            $errorMsgLogin="Incorrect email address or password.";
        }
    } else {
      $errorMsgLogin="Please fill out all the forms before you continue.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jennelyn Urot Peromingan</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <link href="../css/signin.css" rel="stylesheet">
  <script src="../js/jquery-1.12.0.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar" id="insidenav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Login</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="applicant/applicant_registration.php">Applicant</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="employer/employer_registration.php">Company</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
  <div class="container-fluid" id="main1">
    <div class="jumbotron text-center" id="searchjum">
      <form class="form-signin" action="" method="post">
        <?php if(isset($_SESSION['error_message'])){ ?>
        <div class="error-message">
        <?php echo htmlentities($_SESSION['error_message']); ?>
        </div>
        <?php $_SESSION['error_message'] = null; } ?>
       <label for="inputEmail" class="sr-only">Email address</label>
       <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email_address">
       <label for="inputPassword" class="sr-only">Password</label>
       <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
       <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
     </form>
   </div>
 </div>
 <div class="container col-sm-10 pull-right" >
  <div class="row">
    <div class="askreg">
      <div class="col-lg-3">
        <br>
      </div>
    </div>
  </div>
</div>
</body>
</html>
