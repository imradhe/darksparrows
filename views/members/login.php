<?php
 error_reporting(0); //php reporting set to none
$status = 0;
$msg ="";$umsg ="";$emsg ="";$pmsg ="";
$title = "Login | Dark Sparrows";
 $url = "http://".$_SERVER['HTTP_HOST']."/DarkSparrows2.0";   
if(isset($_POST['submit'])){
    //connecting to database
require('././db.php'); 
    //getting data 
      $username =  $_POST['username'];
      $password = $_POST['password'];

        //selecting data from database to validate form
       $select_query =  "select * from users where username = '$username'";
         $select_query_result = mysqli_query($con, $select_query);
         $rows = mysqli_num_rows($select_query_result);

          if(!$rows) $umsg = "User doesn't exist";

        //form validation
        while ($row = mysqli_fetch_array($select_query_result)){
          if(md5($password) == $row['password']){
             $msg = "login success";
            $status = 1 ; 
          }
            else {
              $pmsg = "Invalid password";
              $status = 0;
            }
          }
          if($status){
                  //sessions
                 session_start();
                 $_SESSION['username'] = $username;
                 $_SESSION['logged_in'] = 1;
            // Redirect to verify page
            header("Location: dashboard/home");                
          }else{
                $msg.= "Something went wrong!!!";
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
        <div class="card bg-transparent"><a href="../"><h2 class="logo text-center">Dark Sparrows</h2></a><h1 class="text-center">Login</h1><p class="text-center"><?php echo "Login to your account to continue"; ?></p>
            <div class="hr"><hr></div>
          <div class="card-body px-5">
            <?php if(isset($_POST['submit']) && (!$status)){ ?>
             <div class="alert text-center alert-danger" ><?php echo $msg;?>
                 <?php if(!empty($umsg)) echo "<br><caption>".trim($umsg)."</caption>"; ?>
                 <?php if(!empty($umsg) && !empty($pmsg)) echo "&"; ?>
                 <?php if(!empty($pmsg)) echo "<caption>".$pmsg."</caption>"; ?>
             </div>
         <?php } elseif(isset($_POST['submit']) && ($status)) {?>
           <div class="alert text-center alert-success" ><?php echo $msg;?>
         </div>
         <?php }?>
            <form action="#" id="register" method="POST">


               <div class="form-group">
                <label for="username">Username</label>
               <input class="form-control bg-form" type="username" id="username" name="username" placeholder="username" title="Can contain only letters numbers and underscore" required >
              </div>
                
               <div class="form-group">
                <label for="password">password</label>
                <input class="form-control bg-form" type="password" name="password" placeholder="password" title="password" required >
               </div>                        
              
               <div class="form-group">
                   <input type="submit" name="submit" value="Submit" class="btn btn-danger btn-block" id="submit">
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