<?php
/* ************************************** HElPER FUNCTIONS **************************************************** */

    function clean($string){
        return htmlentities($string);
    }
    function redirect($location){
        return header("Location: {$location}");
    }
    function set_msg($message){
        if(!empty($message)){
            $_SESSION['message'] = $message;
        }else{
            $message = "";
        }
    }
    function display_msg(){
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    function token_generator(){
        $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
        return $token;
    }

    function validation_err($error_msg){

$error_msg = <<<ept
<div class="alert-container">
<div class="alert">
<span class="closebtn" id="alert" onclick="this.parentElement.style.display='none';">&times;</span> 
<strong>Warning!</strong>$error_msg
</div>
</div>          
ept;
return $error_msg;
    }
function validation_ok($success_msg){

$success_msg = <<<succ
    
<div class="alert-container">
<div class="alert-two">
<span class="closebtn" id="alert" onclick="this.parentElement.style.display='none';">&times;</span> 
<strong >Success!</strong>$success_msg
</div>
</div>          
succ;
return $success_msg;
 }

function send_email($email=null, $subject=null, $msg=null, $altMsg=null, $imgatt=null, $imgatt2=null, $imgatt3=null, $imgatt4=null, $imgatt5=null, $imgatt6=null){

    $mail = new PHPMailer\PHPMailer\PHPMailer();;

    //Server settings              
    $mail->isSMTP();                         
    $mail->Host       = 'smtp.hostinger.com';                     
    $mail->Username   = 'eric@ezeemax.net';
    $mail->Password   = 'Er!c22lo';
    $mail->Port       = 587; 
    $mail->SMTPAuth   = true;         
    $mail->SMTPSecure = 'tls';        
    
    $mail->setFrom('eric@ezeemax.net', 'EzeeMax');
    $mail->addAddress($email);     // Add a recipient
    $mail->addBCC('excarzmail@gmail.com');  
    
    // Content
    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $msg;
    $mail->AltBody = $altMsg;

    
    $mail->addAttachment($imgatt, 'ImgOne.jpg');    // Optional name
    $mail->addAttachment($imgatt2, 'ImgTwo.jpg');    // Optional name
    $mail->addAttachment($imgatt3, 'ImgThree.jpg');    // Optional name
    $mail->addAttachment($imgatt4, 'ImgFour.jpg');    // Optional name
    $mail->addAttachment($imgatt5, 'ImgFive.jpg');    // Optional name
    $mail->addAttachment($imgatt6, 'ImgSix.jpg');    // Optional name

    if(!$mail->send()){
        echo validation_err(' Email could not be send');
    }else{
        echo validation_ok(' Email sent. Link can be found in email inbox or spam folder.');
    }

//    return mail($email, $subject, $msg, $header.s);

    
}


    function ifIsMethod($method=null){
        if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

            return true;
        }
        return false;
    }

     /* ************************************** REGISTRATION VALIDATION FUNCTIONS **************************************************** */


    function email_exist($email){
    
        $db = new Database();
        $getRow = $db->getRow("SELECT user_id FROM users WHERE email = '$email'");
         if($getRow == true){
            return true;
         }else{
             return false;
         }
    }

     function validate_user_reg(){

        $errors = [];
        $max = 20;
        $min = 3;

         if($_SERVER['REQUEST_METHOD'] == "POST"){
            $username = clean($_POST['uname']);
            $user_email = clean($_POST['mail']);
            $password = clean($_POST['pass']);
            $comfirm_password = clean($_POST['passTwo']);


            if(strlen($username) < $min){
                $errors[] = "your username cannot be less than {$min} characters";
            }
            if(strlen($username) > $max){
                $errors[] = "your username cannot exceed {$max} characters";
            }

            /* if(strlen($user_email) > $min){
                $errors[] = "your email cannot be less than {$min} characters";
            } */
            if($password !== $comfirm_password){
                $errors[] = "your passwords needs to be identical";
            }

            if(!empty($errors)){
                foreach($errors as $error){
                  echo validation_err($error);

                }
            }
         }
     }



/* ************************************** Acttivate Users FUNCTIONS **************************************************** */

function activate_user(){

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        if(isset($_GET['email'])){
           $email = trim(clean($_GET['email']));
            $validation_code = trim(clean($_GET['code']));

          function die_ruact($value){
            if($value == true){
                $db = new Database();
                $updateRow = $db->updateRow("UPDATE users SET activate = ?, validation_code = ? WHERE email = ? AND validation_code = ?",  [1, 0, trim(clean($_GET['email'])), trim(clean($_GET['code'])) ]);
                
set_msg(
<<<ezee
<div class="alert-container">
<div class="alert-two">
<span class="closebtn" id="alert" onclick="this.parentElement.style.display='none';">&times;</span> 
Your account has been activated. Please sign in above!
</div>
</div>
ezee
);
                redirect('./');
            }else{
                
set_msg(
<<<eze
<div class="alert-container">
<div class="alert">
<span class="closebtn" id="alert" onclick="this.parentElement.style.display='none';">&times;</span> 
Your account has already been activated. Please sign in above
</div>
</div>
eze
);
redirect('./');

            }
        }
        
        $db = new Database();
     
        $getRow = $db->getRow("SELECT user_id FROM users WHERE email = ? AND validation_code = ?", [$email, $validation_code ]);
     
        die_ruact($getRow);
        $db->Disconnect();

        
    
        }
    }
}

/* ************************************** LOGGED IN FUNCTIONS **************************************************** */

function logged_in(){
    if(isset($_SESSION['email']) || isset($_COOKIE['EzeeMax']) ){
        return true;
    }else{
        return false;
    }
}

/************************************** Recover Password **************************************************** */

    function recover_pass(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){


            if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']){
               
                $email = trim($_POST['email']);
               
                if(email_exist($email)){

                   $validation_code = strtoupper(substr(md5(uniqid($email)), 0, 6));

                  setcookie('temp_access', $validation_code, time()+ 3600 );
                 
                     $db = new Database();
                     $updateRow = $db->updateRow("UPDATE users SET validation_code = '$validation_code' WHERE email = '$email'");
                    
                    $templete_file = "./includes/templetes/forget.php";
                    $subject = "Password Reset";
 
                    $swap_var = array(
                        "{SITE_ADDR}" => "https://maketime.org.za/",
                        "{EMAIL_LOGO}" => "https://i.ibb.co/7JrcNzd/round-icon-huge.png",
                        "{EMAIL_ADDR}" => $email,
                        "{VALID_CODE}" => $validation_code,
                        "{HEADING}" => "Your Validation code is",
                        "{MSG}" => "click here to reset your password",
                        "{INSTA_LINK}" =>"https://www.instagram.com/EzeeMaxonline/?hl=en",
                        "{LINKEDIN_LINK}" => "https://www.linkedin.com/in/ex-carz-76b5b01b8/",
                        "{TWITTER_LINK}" => "https://twitter.com/EzeeMax1",
                        "{FACEB_LINK}" => "https://www.facebook.com/EzeeMax-101128935117855"

                    );

                    if(file_exists($templete_file)){
                       $message = file_get_contents($templete_file); 
                    }else{
                        die('unable to locate file');
                    }

                    foreach(array_keys($swap_var) as $key){
                        if(strlen($key) > 2 && trim($key) !== ""){
                            $message = str_replace($key, $swap_var[$key], $message);
                        }
                    }

        $message2 = "
Hello...

Welcome back. 
   
Unfortunatly your email server does not support HTML emails. 

But that's okay. We've got you covered.

Your validation code is $validation_code

In order for you to reset you account password you will need to copy the following address into the url address bar.

https://maketime.org.za/code.php?email=$email&code=$validation_code

Good luck and all the best.

";
                    
                    

                    send_email($email, $subject, $message, $message2);
                        
                        header('Refresh: 10; URL=./');
                       
                }else{
                    echo validation_err(' This email does not exist');
                }
            }else{
                redirect('./');
            }
            
        }
    }
  /* ************************************** CODE VALIDATION FUNCTIONS **************************************************** */

  function validation_code(){

    if(isset($_COOKIE['temp_access'])){ 

        if(!isset($_GET['email']) && !isset($_GET['code'])){
            redirect('./');

        }elseif(empty($_GET['email']) || empty($_GET['code'])){
            redirect('./');
        }else {

            if(isset($_POST['code'])){
                $email = trim(clean($_GET['email']));
                $validation_code = trim(clean($_POST['code']));
                $db = new Database();
                $getRow = $db->getRow("SELECT user_id FROM users WHERE validation_code = '$validation_code' AND email = '$email' ");
                if($getRow == true){

                    setcookie('temp_access', $validation_code, time()+ 3600 );

                    redirect("./reset.php?email=$email&code=$validation_code");
                }else{
                    echo validation_err('Sorry wrong validation code.');
                }
            }
        }
        
    }else{

        set_msg(
<<<ezee
<div class="alert-container">
<div class="alert">
<span class="closebtn" id="alert" onclick="this.parentElement.style.display='none';">&times;</span> 
ALERT: Cookie Validation time has expired .
</div>
</div>
ezee
);
        redirect('forgot.php?forgot=' . uniqid(true));
    }
  }
  /* ************************************** PASSWORD RESET FUNCTIONS **************************************************** */

  function pass_reset(){
    if(isset($_COOKIE['temp_access'])){ 
        if(isset($_GET['email']) && isset($_GET['code'])){
            
            
        if(isset($_SESSION['token']) && isset($_POST['token'])){
            if($_POST['token'] === $_SESSION['token']){

                if($_POST['password'] === $_POST['confirmPassword']){
                    $updated_password = trim($_POST['password']) ;
                    $updated_password = password_hash($updated_password , PASSWORD_BCRYPT, array('cost' => 12));
                    function die_update($value){
                        $value;
                     }
                    $db = new Database();
                    $updateRow = $db->updateRow("UPDATE users SET password = ?, validation_code = ? WHERE email = ?",  [$updated_password, 0, trim($_GET['email'])]);
                    die_update($updateRow); 

                    set_msg(
<<<ezee
<div class="alert-container">
<div class="alert-two">
<span class="closebtn" id="alert" onclick="this.parentElement.style.display='none';">&times;</span> 
Your password has been updated successfully.
</div>
</div>
ezee
                    );

                    header('Refresh: 10; URL=./');


                    }
                }
            }
        }
    }else{
        set_msg(
<<<ezee
<div class="alert-container">
<div class="alert">
<span class="closebtn" id="alert" onclick="this.parentElement.style.display='none';">&times;</span> 
ALERT: Cookie Validation time has expired .
</div>
</div>
ezee
        );
        redirect('./forgot.php?forgot=' . uniqid(true));
    }
  }

?>
