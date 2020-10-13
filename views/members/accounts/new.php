<?php
error_reporting(0); //php reporting set to none
session_start();
$status = 0;
$msg ="";$umsg ="";$unmsg="";$emsg ="";$pmsg ="";
$title = "Create Account | Dark Sparrows";
 $url = "http://".$_SERVER['HTTP_HOST']."/DarkSparrows2.0";   

//redi
if(!$_SESSION['redirect_from_register']) header("Location:../register");
if(isset($_POST['create'])){
    //connecting to database
require('././db.php'); 
    //getting data 
      $name = $_SESSION['name'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $retypePassword = $_POST['retype-password'];


        //selecting data from database to validate form
       $select_query = "SELECT  * FROM users";
        $select_query_result = mysqli_query($con, $select_query);
        $rows = mysqli_num_rows($select_query_result);

        //checking if account already created

       $check_query =  "select * from users where email = '$email'";
         $check_query_result = mysqli_query($con, $check_query);
         $check =  mysqli_fetch_array($check_query_result); 


        //form validation
        while ($row = mysqli_fetch_array($select_query_result)){

          //checking if username already taken
         if($username == $row['username']){
          $umsg = "Username Already taken";
          $ustatus=0;
         }else $ustatus = 1;
         

         //username validation
         $pattern = "/^[a-zA-Z0-9]{3,20}$/";
         $match = preg_match($pattern, $username);
         
         //matching username
         if (!$match) {
           $unmsg = "Username can only contain alphabets, numbers and underscore"; 
           $unstatus = 0;
         }else $unstatus = 1;


         //matching passwords
         if ($password != $retypePassword) {
           $pmsg = "Password Doesn't match";
           $pstatus = 0;
         }else $pstatus =1;


         //checking if account already created
         if ($check['account_created']) {
           $emsg = "Email already in use";
           $estatus= 0;
         }else $estatus = 1;
          }

          //final status
        $status = $ustatus && $unstatus && $pstatus && $estatus;

          if($status){
                //password encryption
                    $password = md5($password);

                //insert data into database
            $user = "insert into users(name, email, username, password, account_created, profile_created) values ('$name', '$email', '$username', '$password', '1', '0')";
                $create = mysqli_query($con, $user);
                $msg = '<h3 class="text-center">Account Created successfully.<br>click here to <a href="../login"><span class="text-danger">login</span></a></h3>';
                if ($create) {
                //sessions
                    session_start();
                 $_SESSION['username'] = $username;
                } 
          }else{
                $msg = "Something went wrong!!!<br>";
            }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ;?></title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/global.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/form.css">
</head>

<body class="bg-primary text-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 mt-3">
        <div class="card bg-transparent"><a href="../"><h2 class="logo text-center">Dark Sparrows</h2></a><h1 class="text-center">Create account</h1><p class="text-center"><?php echo "hello ".$_SESSION['name']."<br>Create your account to continue"; ?></p>
            <div class="hr"><hr></div>
          <div class="card-body px-5">
            <?php if(isset($_POST['create']) && (!$status)){ ?>
             <div class="alert text-center alert-danger" ><?php echo $msg;?>
                 <?php if(!$ustatus) echo "<caption>".$umsg.", </caption>"; ?>                 
                 <?php if(!$unstatus)  echo "<caption>".$unmsg.", </caption>"; ?>
                 <?php if(!$estatus) echo "<caption>".$emsg.", </caption>"; ?>
                 <?php if(!$pstatus) echo "<caption>".$pmsg."</caption>"; ?>
             </div>
         <?php } elseif(isset($_POST['create']) && ($status)) {?>
           <p class="text-center" ><?php echo $msg;?>
         </p>
         <?php }?>
            <form action="#" id="register" method="POST">


               <div class="form-group">
                <label for="username">Username</label>
               <input class="form-control bg-form" type="username" id="username" name="username" placeholder="username" title="Can contain only letters numbers and underscore" value="<?php echo $value = ($status) ?  $username : "" ;?>" required >
              </div>

                <div class="form-group">
                <label for="email">email</label>
                <input class="form-control bg-form" type="email" name="email" placeholder="email" title="email" value="<?php echo $value = ($_SESSION['email']!="") ?  $_SESSION['email'] : "" ;?>" required readonly>
               </div>           
                
               <div class="form-group">
                <label for="password">password</label>
                <input class="form-control bg-form" type="password" name="password" placeholder="password" title="password" required >
               </div>

                <div class="form-group">
                <label for="retype-password">retype password</label>
                <input class="form-control bg-form" type="password" name="retype-password" placeholder="retype-password" title="retype-password" required >
               </div>                            
              
               <div class="form-group">
                   <input type="submit" name="create" value="create" class="btn btn-danger btn-block" id="create">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
      $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
  </script>
  <br><br><br><br><br><br><br><br><br><br>
</body>
</html>