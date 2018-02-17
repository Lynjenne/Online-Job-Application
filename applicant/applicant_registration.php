   <?php
   include ('../pdo.php');
   if(isset($_POST['submit']))
   {
    echo " before sa try catch";
      $servername = "127.0.0.1";
      $username = "root";
      $password = "";
      $dbname = "online_job";
      try {
        $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email_address = htmlentities(trim($_POST['email_address']));
        $password = htmlentities(trim($_POST['password']));
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $user_type = "applicant";
        $status = 1;

        $applicant_name = $_POST['applicant_name'];
        $applicant_phone = $_POST['applicant_phone'];
        $applicant_address = $_POST['applicant_address'];
        $applicant_experience = $_POST['applicant_experience'];
        $applicant_skills = $_POST['applicant_skills'];
        $applicant_basic_education = $_POST['applicant_basic_education'];
        $applicant_master_edu = $_POST['applicant_master_edu'];

        $queryLogin = $connect->prepare('INSERT INTO login (email_address, password, user_type, status) VALUES (?, ?, ?, ?)');
        $queryLogin->bindValue(1, $email_address);
        $queryLogin->bindValue(2, $password);
        $queryLogin->bindValue(3, $user_type);
        $queryLogin->bindValue(4, $status);
        $queryLogin->execute();

        $query = $pdo->prepare("SELECT login_id FROM login WHERE email_address = :email_address");
        $query->execute(array(':email_address' => $email_address) );
        $value = $query->fetch(PDO::FETCH_OBJ);
        echo $value->login_id;

        $pdoQueryApplicant = $connect->prepare('INSERT INTO applicant (login_id, applicant_name, applicant_phone, applicant_address, applicant_experience, applicant_skills, applicant_basic_education, applicant_master_edu) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $pdoQueryApplicant->bindValue(1, $value->login_id);
        $pdoQueryApplicant->bindValue(2, $applicant_name);
        $pdoQueryApplicant->bindValue(3, $applicant_phone);
        $pdoQueryApplicant->bindValue(4, $applicant_address);
        $pdoQueryApplicant->bindValue(5, $applicant_experience);
        $pdoQueryApplicant->bindValue(6, $applicant_skills);
        $pdoQueryApplicant->bindValue(7, $applicant_basic_education);
        $pdoQueryApplicant->bindValue(8, $applicant_master_edu);

        $pdoQueryApplicant->execute();

        if($queryLogin && $pdoQueryApplicant)
        {
           header('location:../login.php?msg=registered');
           die();
       }
       else {
        $unsuccessful = "Please try again";
        echo $unsuccessful;
    }
} catch (PDOException $exc) {
  echo $exc->getMessage();
  exit();
}
}

?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jennelyn Urot Peromingan</title>
  <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
  <link href="../css/main.css" rel="stylesheet">
  <link href="../css/applicant.css" rel="stylesheet">
  <script type="text/javascript" src="../js/validate.js"></script>
  <script src="../js/jquery-1.12.0.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>  
  <script src="../location/location.js"></script>  
</head>
<body>
    <nav class="navbar" id="insidenav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">Applicant Registrastion</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="container">
            <FORM id="reguser" METHOD="post" ACTION="applicant_registration.php" enctype="multipart/form-data" class="form-horizontal">
                <h3 class="h3style">Login Detials </h3>
                <div class="form-group">
                    <div class="col-sm-4">
                       <input type="email" name="email_address" placeholder="E-mail Address" class="form-control" id="email">
                   </div>
                   <label class="error"></label>
               </div>  
               <div class="form-group"> 
                   <div class="col-sm-4">  <input type="password" id="passnew" placeholder="Password" name="password" class="form-control">
                   </div>
                   <label class="error"></label>
               </div>
               <div class="form-group">
                 <div class="col-sm-4">        
                    <input type="password" id="passconf" placeholder="Confirm Password" name="pass2" class="form-control" required>
                </div>
                <label class="error" id="pass2error"></label>
            </div> 
            <div class="page-header"></div>
            <h3 class="h3style">Contact Information</h3>
            <div class="form-group">
                <div class="col-sm-4">
                    <input type="text" id="name" placeholder="Full Name" name="applicant_name" class="form-control"> 
                </div>
                <label class="error"></label>
            </div>
            <div class="form-group">
              <div class="col-sm-5"><textarea id="addr" rows="5" placeholder="Address" name="applicant_address" class="form-control"></textarea>
              </div>
              <label class="error"></label>
          </div>
          <div class="form-group">
           <div class="col-sm-3"><input type="text" name="applicant_phone" placeholder=" Mobile number" class="form-control" id="mobno">
           </div>
           <label class="error"></label>
       </div>
       <div class="page-header"></div>    
       <h3 class="h3style">Current Employment Details </h3> 
       <div class="form-group"> 
        <div class="col-sm-4">
            <select name="applicant_experience" class="form-control" id="experience" required>
                <option value="">Select Work Experience </option>
                <option value="1">1 year </option>
                <option value="2">2 year </option>
                <option value="3">3 year </option>
                <option value="4">4 year </option>
                <option value="5">5 year </option>
                <option value="6">6 year </option>
                <option value="7">7 year </option>
                <option value="8">8 year </option>
                <option value="9+">9+ year </option>
            </select>
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-4"><input type="text" name="applicant_skills" placeholder="Skills" class="form-control" name="skills" id="skills">
        </div>
        <label class="error"></label>
    </div>
    <div class="page-header"></div>
    <h3 class="h3style">Educational Qualifications </h3>
    <div class="form-group"> 
       <div class="col-sm-4"> <select name="applicant_basic_education" id="ugcourse" class=" form-control" required>
        <option value="" label="Select Basic Education">Select Basic Education</option>
        <option value="Not Pursuing Graduation"> Not Pursuing Graduation</option>
        <option value="B.A">B.A</option>
        <option value="B.Arch">B.Arch</option>
        <option value="BCA">BCA</option>
        <option value="B.B.A">B.B.A</option>
        <option value="B.Com">B.Com</option>
        <option value="B.Ed">B.Ed</option>
        <option value="BDS">BDS</option>
        <option value="BHM">BHM</option>
        <option value="B.Pharma">B.Pharma</option>
        <option value="B.Sc">B.Sc</option>
        <option value="B.Tech/B.E.">B.Tech/B.E.</option>
        <option value="LLB">LLB</option>
        <option value="MBBS">MBBS</option>
        <option value="Diploma">Diploma</option>
        <option value="BVSC">BVSC</option>
        <option value="Other">Other</option>
    </select>
</div>
</div>
<div class="form-group"> 
    <div class="col-sm-4"> <select name="applicant_master_edu" id="pgcourse"  class="form-control" required>
        <option value="">Select Masters Education</option>
        <option value="Not Pursuing Post Graduation"> Not Post Pursuing Graduation</option>
        <option value="CA">CA</option>
        <option value="CS">CS</option>
        <option value="ICWA (CMA)">ICWA (CMA)</option>
        <option value="Integrated PG">Integrated PG</option>
        <option value="LLM">LLM</option>
        <option value="M.A">M.A</option>
        <option value="M.Arch">M.Arch</option>
        <option value="M.Com">M.Com</option>
        <option value="M.Ed">M.Ed</option>
        <option value="M.Pharma">M.Pharma</option>
        <option value="M.Sc">M.Sc</option>
        <option value="M.Tech">M.Tech</option>
        <option value="MBA/PGDM">MBA/PGDM</option>
        <option value="MCA">MCA</option>
        <option value="MS">MS</option>
        <option value="PG Diploma">PG Diploma</option>
        <option value="MVSC">MVSC</option>
        <option value="MCM">MCM</option>
        <option value="Other">Other</option>
    </select>
</div>
</div>
<div class="page-header"> </div>
<div class="form-group form-inline col-sm-10">
    <button class="btn btn-success" type="submit" name="submit" id="reg" value="submit">Register</button>
    <label class="col-sm-2"></label>
    <button class="btn btn-danger" type="reset" id="reset"> Reset </button>
</div>
</form>
</body>
</html>
