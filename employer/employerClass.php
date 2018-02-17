<?php

if (!function_exists('getdatabase')) {
  include('database.php');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

class employerClass {

	 public function employerLogin($email_address, $password){
    try {
      $db = getdatabase();
      $hash_password = md5($password); //Password encryption
      $stmt = $db->prepare("SELECT login_id FROM login WHERE email_address=:email_address AND password=:hash_password");
      $stmt->bindParam("email_address", $email_address, PDO::PARAM_STR);
      $stmt->bindParam("hash_password", $hash_password, PDO::PARAM_STR);
      $stmt->execute();
      $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
      $db = null;
      if ($data) {
        return $data->login_id;
      }
      else {
        return false;
      }
    } catch(PDOException $e) {
      echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
  }

  // User Details
  public function employerDetails($login_id, $status){
    try {
      $db = getDB();
      $stmt = $db->prepare("SELECT * FROM login WHERE login_id=:login_id AND status=:status");
      $stmt->bindParam("login_id", $login_id, PDO::PARAM_INT);
       $stmt->bindParam("status", $status, PDO::PARAM_INT);
      $stmt->execute();
      $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
      return $data;
    } catch(PDOException $e) {
      echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
  }
}

?>
