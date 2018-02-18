
<?php
echo "Success 1";

echo " Success 2";

include('pdo.php');
echo " Success 3";

if(isset($_POST['email_address'], $_POST['password'])){
echo " Success 4";

  $email_address = htmlentities(trim($_POST['email_address']));
  $password  = htmlentities(trim($_POST['password']));
  // $user_type = "employer";
  
  if($email_address != "" && $password != ""){
echo " Success 5";

    if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error_message'] = "You entered an invalid email format."; 
      echo " Success 6";

    } else {
      echo " Success 7";

     $query = "SELECT * FROM login WHERE email_address = :email_address";
     $statement = $pdo->prepare($query);
     $statement->execute(array ('email_address' => $_POST["email_address"]));
     $count = $statement->rowCount();
    $value = $statement->fetchAll(PDO::FETCH_ASSOC);
    // echo $value->login_id;
      // echo $value->user_type;
      echo " Success 8";

      if($count > 0)  {
        echo " Success 9";
        if($count['user_type'] == "applicant") {
          echo " Success 10";
           session_start();
          $_SESSION['id'] = $value['login_id'];
         $_SESSION['type'] = $value['user_type'];
          $_SESSION['status'] = $value['status'];
          // header('Location:applicant/applicant.php');
          echo " applicant Success";
        } elseif ($count['user_type'] == "employer") {
          echo " Success 11";
            session_start();
         $_SESSION['elogin_id'] = $value['login_id'];
         $_SESSION['type'] = $value['user_type'];
          $_SESSION['status'] = $value['status'];
         // header('Location:employer/employer.php');
         echo "employer Success";
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
