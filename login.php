
<?php
session_start();
include('pdo.php');

if(isset($_POST['email'], $_POST['password'])){

  $email = htmlentities(trim($_POST['email']));
  $password  = htmlentities(trim($_POST['password']));

  if($email != "" && $password != ""){

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error_message'] = "You entered an invalid email format."; 
    } else {
      $query = $pdo->prepare("SELECT * FROM login WHERE email = ? AND password = ?");
      $query->bindValue(1, $email);
      $query->bindValue(2, $password);
      $query->execute();
      $value = $query->fetch(PDO::FETCH_OBJ);

      if(($query->rowCount() > 0) && ( password_verify( $passd, $result['password'] ) ) ) {
        if($query['user_type']=="applicant") {
          session_start();
          $_SESSION['login_id'] = $value->login_id;
          $_SESSION['user_type'] = $value->user_type;
          header('Location:applicant/applicant.php');
          die();
        } elseif ($query['user_type']=="employer") {
         session_start();
         $_SESSION['login_id'] = $value->login_id;
         $_SESSION['user_type'] = $value->user_type;
         $_SESSION['status'] = $value->status;
         header('Location:employer/employer.php');
         die();
       } else {
        $_SESSION['error_message'] = "Please enter a valid email and password combination.";
      }
    }
  }
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
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
  <link href="css/signin.css" rel="stylesheet">
  <script src="js/jquery-1.12.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <?php
  if(isset($_GET['msg']) && ($_GET['msg']=="failed")){
    ?>
    <script type='text/javascript'>alert("Login Failed: Invalid Username or Password!");</script>
    <?php
  }
  else if(isset($_GET['msg']) && ($_GET['msg']=="registered"))
  {
    ?>
    <script type='text/javascript'>alert("Successfully registered, Please login now!");</script>
    <?php
  }
  else if(isset($_GET['msg']) && ($_GET['msg']=='please_login'))
  {
    ?>
    <script type="text/javascript">alert("Please Login First to access your profile!");</script>
    <?php
  }
  ?>
</head>
<body>
  <nav class="navbar" id="insidenav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Job Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Login</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="applicant/register_user.php">Jobseeker</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="employer/register_emp.php">Company</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
  <div class="container-fluid" id="main1">
    <div class="jumbotron text-center" id="searchjum">
      <form class="form-signin" action="login.php" method="post">
       <label for="inputEmail" class="sr-only">Email address</label>
       <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
       <label for="inputPassword" class="sr-only">Password</label>
       <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
       <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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
