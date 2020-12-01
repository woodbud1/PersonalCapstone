<?php
require_once('./model/database_oo.php');
require_once('./model/User_db.php');
require_once('./model/User.php');
require_once('./model/Schedule_db.php');
require_once('./model/Schedule.php');
require_once('./model/Appointment_db.php');
require_once('./model/Appointment.php');
require_once('./model/Validation.php');


session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'Login';
    }
}

switch ($action) {
    case 'Login':
        // instanciate fields
        if(!isset($username)) { $username=''; }
        if(!isset($password)) { $password=''; }
       
        // Display the login form
        include'./view/login.php';
        break;
    
        case 'Edit Profile':
        // instanciate fields
        if (!isset($name)) {
            $name = '';
        }
        if (!isset($username)) {
            $username = '';
        }
        if (!isset($email)) {
            $email = '';
        }
        if (!isset($password)) {
            $password = '';
        }
        if (!isset($errorName)) {
            $errorName = '';
        }
        if (!isset($errorLName)) {
            $errorLName = '';
        }
        if (!isset($errorUsername)) {
            $errorUsername = '';
        }
        if (!isset($errorEmail)) {
            $errorEmail = '';
        }
        
        // Display the registration form
        include'./view/EditUserInfo.php';
        break;    
        
    case 'Edit':
        // instanciate fields

        if(!isset($errorName)) { $errorName=''; }
        if(!isset($errorEmail)) { $errorEmail=''; }
        if(!isset($errorEmail)) { $errorEmail=''; }
        
        // Display the registration form
        include'./view/EditUserInfo.php';
        break;
    case 'Registration':
        // instanciate fields
        
        if(!isset($errorFName)) { $errorFName=''; }
        if(!isset($errorUsername)) { $errorUsername=''; }
        if(!isset($errorEmail)) { $errorEmail=''; }
        if(!isset($errorStreet)) { $errorStreet=''; }
        if(!isset($errorCity)) { $errorCity=''; }
        if(!isset($errorState)) { $errorState=''; }
        if(!isset($errorPostal)) { $errorPostal=''; }
        

        // Display the registration form
        include'./view/registration.php';
        break;
    case 'Add':
          $name = filter_input(INPUT_POST, "name");
          $username = filter_input(INPUT_POST, "username");
          $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
          $password = filter_input(INPUT_POST, "password");
          $street = filter_input(INPUT_POST, "street");
          $city = filter_input(INPUT_POST, "city");
          $state = filter_input(INPUT_POST, "state");
          $postal = filter_input(INPUT_POST, "postal");
          
            var_dump($name);
            var_dump($city);
            var_dump($username);
            var_dump($email);
            var_dump($street);
            var_dump($state);
          
          $errorName ='';
          $errorUsername = '';
          $errorEmail = '';
          $errorPassword = '';
          $errorStreet = '';
          $errorCity = '';
          $errorState = '';
          $errorPostal = '';

        // Validate the inputs
    if($name === '' or $name === NULL) {
        $errorName .= "Please enter you full name. ";
    }
      
    if($username === ''){
        $errorUsername = "Please enter a Username. ";
    }else if(User_db::user_exists($username) === true){
        $errorUsername = "User name is already taken. ";
        $username = "";
    }else if(Validation::validName($username) === 0){
        $errorUsername = "Username must begin with a letter. ";
        $username = "";
    }else if(Validation::isValidUsername($username)=== false){
        $errorUsername = "Username must be 4 to 30 characters long. ";
        $username = "";
    }
    
    
    if($email === FALSE){
        $errorEmail = "Please enter a valid email. ";
    }else if(User_db::email_exists($email) === true){
        $errorEmail = "Email address is already taken. ";
        $email = ""; 
    }else if($email === NULL){
        $errorEmail = "Please enter an email address. ";
    }
    
    if($password === ''){
        $errorPassword .= "Please enter a password. ";
    }else if(Validation::validPasswordLength($password) === false){
        $errorPassword = "Password must be between 12 and 100 characters";
    }
    else if(Validation::isValidPassword($password) === false){
        $errorPassword = "Password must meet at least 3 out of the following 4 complexity rules: 

        i. at least 1 uppercase character (A-Z) 

        ii. at least 1 lowercase character (a-z)

        iii. at least 1 digit (0-9) 

        iv. at least 1 special character (punctuation)  ";
    }

    if($street === '' or $street === NULL) {
        $errorStreet .= "Please enter your street address. ";
    }
    
        if($city === '' or $city === NULL) {
        $errorCity = "Please enter your city of residence. ";
    }
    
        if($state === '' or $state === NULL) {
        $errorState = "Please enter your state of residence. ";
    }
    
        if($postal === '' or $postal === NULL) {
        $errorPostal = "Please enter your postal (Zip) code. ";
    }
    
    if($errorName !== '' || $errorUsername !== '' || $errorEmail !== '' || $errorPassword !== '' || $errorStreet !== '' || $errorCity !== '' || $errorState !== '' || $errorPostal !== ''){
        include('view/registration.php');
        break;
    }else {
        $phonenumber = '0000000000';
        $image = '';
        $notes = 'notes';
        $type = 0;
        $_SESSION['username'] = $username;
        mkdir("./images/".$username, 0777, true);
        User_db::add_user($username, $password, $name, $email, $image, $phonenumber, $street, $city, $state, $type, $notes);
        $appointments = Appointment_db::select_all();
        $user = User_db::get_user($username);
        $type = User_db::get_type($username);
        $_SESSION['Type'] = $type;
        include('view/landing.php'); 
        break;
    }
    case 'Schedule Appt':
        $ID = filter_input(INPUT_POST, "ID");
        include('view/ScheduleAppt.php'); 
        break;
    case 'Verify Login':
        $username = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");

        if (!isset($errorLogin)) {
            $errorLogin = '';
        }
        if (!isset($errorUsername)) {
            $errorUsername = '';
        }
        if (!isset($errorPassword)) {
            $errorPassword = '';
        }

        if ($username === '') {
            $errorUsername = "Please enter a Username. ";
        }
        if ($password === '') {
            $errorPassword = "Please enter a Password. ";
        }

        if ($errorUsername !== '' || $errorPassword !== '') {
            $errorLogin = 'Invalid User Code or Password';
            include('view/login.php');
        } else {
            if (User_db::user_exists($username)) {
                $checkUser = User_db::verify_user($username, $password);
                if ($checkUser === true) {
                    $user = User_db::get_user($username);
                    $type = User_db::get_type($username);
                    $_SESSION['username'] = $username;
                    $_SESSION['Type'] = $type;
                    $appointments = Appointment_db::select_all();
                    include('view/landing.php');
                } else {
                    $errorLogin = 'Invalid User Code or Password';
                    include('view/login.php');
                }
            } else {
                $errorLogin = 'Invalid User Code or Password';
                include('view/login.php');
            }
        }
          break;
    case 'Add Walk Availability':
        if (!isset($dayerror)) {
            $dayerror = '';
        }
        if (!isset($timeerror)) {
            $timeerror = '';
        }
        if (!isset($dateerror)) {
            $dateerror = '';
        }
        if (!isset($day)) {
            $day = '';
        }
        if (!isset($time)) {
            $time = '';
        }
        if (!isset($date)) {
            $date = '';
        }
        include('view/AddSchedule.php');   
        break;      
    case 'Add Walk':
        $day = filter_input(INPUT_POST, "day");
        $time = filter_input(INPUT_POST, "time");
        $date = filter_input(INPUT_POST, "date");
        
        if (!isset($dayerror)) {
            $dayerror = '';
        }
        if (!isset($timeerror)) {
            $timeerror = '';
        }
        if (!isset($dateerror)) {
            $dateerror = '';
        }

        if ($day === '') {
        $dayerror = "Please select a day. ";
        }
        
        if ($time === '') {
            $timeerror = "Please select a time. ";
        }

        if ($date === ''){
        $dateerror = 'Please enter a date';}
        
        if ($dateerror !== '' || $dayerror !== '' || $timeerror !== '') {
            include('view/AddSchedule.php');
            break;
        } else {
            $IsBooked = '0';
            $username = $_SESSION['username'];
            $user = User_db::get_user($username);
            $WalkerId = $user->getUserId();
            Schedule_db::add_schedule_item($date, $day, $time, $IsBooked, $WalkerId);
            include('view/Landing.php');
            break;
        }
        break;
    case 'Cancel':
        $ID = filter_input(INPUT_POST, "ID");
        $appt = Appointment_db::get_appointment($ID);
        $ScheduleId = $appt->getScheduleID();
        $IsBooked = '0';
        Schedule_db::update_schedule_item($ScheduleId, $IsBooked);
        Appointment_db::delete_appointment($ID);
         $username = $_SESSION['username'];
        $user = User_db::get_user($username);
        $appointments = Appointment_db::select_all();
        include('view/Landing.php');  
        break;
        case 'RemoveAppt':
        $ID = filter_input(INPUT_POST, "ID");
        include('view/RemoveAppt.php'); 
        break;
    case 'Confirm':
        $username = $_SESSION['username'];
        $user = User_db::get_user($username);
        $CustomerId = $user->getUserId();
        $ScheduleId = filter_input(INPUT_POST, "ID");
        $Status = "Accepted";
        Appointment_db::add_appointment($CustomerId, $ScheduleId, $Status);
        $IsBooked = '1';
        Schedule_db::update_schedule_item($ScheduleId, $IsBooked);
        $appointments = Appointment_db::select_all();
        include('view/Landing.php');   
        break;
    case 'View Schedule':
     //$type = $_SESSION['type'];
//        if ($type = 1){
//        include('view/customerSchedule.php');
//        break;
//        }if ($type = 2){
//        include('view/walkerSchedule.php');  
//        break;
//        }else{
     $schedules = '';
    $appointments = '';
     $schedules = Schedule_db::select_all();
     $appointments = Appointment_db::select_all();
     include('view/combinedSchedule.php');    
//        }    
     break;    
    case 'Save':
          $username = $_SESSION['username'];
          $name = filter_input(INPUT_POST, "name");
          $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
          $password = filter_input(INPUT_POST, "password");
  
          $error = '';
          $errorName ='';
          $errorEmail = '';
          $errorPassword = '';

        // Validate the inputs
    if($name === '') {
        $errorName .= "Please enter your name. ";
    }else if(Validation::validName($name) === 0){
        $errorName .= "Name must begin with a letter. ";
        $name = "";
    }
    
    if($email === FALSE){
        $errorEmail = "Please enter a valid email. ";
    }
    
    if($password === ''){
        $errorPassword .= "Please enter a password. ";
    }else if(Validation::validPasswordLength($password) === false){
        $errorPassword = "Password must be between 12 and 100 characters";
    }
    else if(Validation::isValidPassword($password) === false){
        $errorPassword = "Password must meet at least 3 out of the following 4 complexity rules: 

        i. at least 1 uppercase character (A-Z) 

        ii. at least 1 lowercase character (a-z)

        iii. at least 1 digit (0-9) 

        iv. at least 1 special character (punctuation)  ";
    }
    
    if($errorName !== '' || $errorEmail !== '' || $errorPassword !== '') {
        include('view/EditUserInfo.php'); 
        break;
    }else {
        $username = $_SESSION['username'];
        User_db::update_user($username,$name, $email, $password);
        $user = User_db::get_user($username);
        $appointments = Appointment_db::select_all();
        include('view/landing.php'); 
        break;
    }
    case 'Landing':
    $username = $_SESSION['username'];
    $user = User_db::get_user($username);
     $appointments = Appointment_db::select_all();
    include('view/landing.php');
    break;

    case 'Image Upload':
        include('view/ImageUpload.php'); 
        break;
    case 'uploadImage':
      if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $temp = $_FILES['image']['name'];
      $temp2 = explode('.', $temp);
      $temp3 = end($temp2);
      $file_ext = strtolower($temp3);
      
//      var_dump($_FILES);
      
      $extensions= array("jpeg","jpg","png", "gif");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="file extension not in whitelist: " . join(',',$extensions);
      }
      if(empty($errors)==true){
         $username = $_SESSION['username']; 
         move_uploaded_file($file_tmp,"images/".$username."/".$file_name);
         User_db::change_image($username, $file_name);
         $user = User_db::get_user($username);
        include('view/EditUserInfo.php'); 
        break;
      }
   }
    case 'Logout':
     unset($_SESSION);
     session_destroy();
     session_write_close();
     include('view/logout.php');
     die;
     break;
}