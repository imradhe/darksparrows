<?php
 error_reporting(1); //php reporting set to none
$status = 0;
$msg ="";$umsg ="";
$title = "Register | Dark Sparrows";
 $url = "http://".$_SERVER['HTTP_HOST']."/DarkSparrows2.0";    
if(isset($_POST['submit'])){
    //connecting to database
require('././db.php'); 
    //getting data 
	$name = mysqli_real_escape_string($con, $_POST['name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
 
        //selecting data from database to validate form
       //select query
     $select_query = "select * from list where email = '$email'";
     $select_query_result = mysqli_query($con, $select_query);             

        //getting user data in an array 
         $row = mysqli_fetch_array($select_query_result, MYSQLI_ASSOC);

        if ($row['email'] == $email) {
          $msg = "Your acount will be created shortly";
          $status= 1;
          if ($status) {
            session_start();
                 $_SESSION['email'] = $email;
                 $_SESSION['name'] = $name;
                 $_SESSION['redirect_from_register'] = 1;
            header("Location:account/new");
          }
        }
        else{
          $status= 0;
         $msg = 'Your account is not currently registered. Please contact <a href="mailto:darksparrowsindia@gmail.com?subject=Requesting acceess to create profile"  style="text-transform:lowercase;">darksparrowsindia@gmail.com</a>';}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./assets/css/global.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/form.css">
</head>

<body class="bg-primary text-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 mt-3">
        <div class="card bg-transparent"><a href="./"><h2 class="logo text-center">Dark Sparrows</h2></a><h1 class="text-center">Register</h1>
            <div class="hr"><hr></div>
          <div class="card-body px-5">
            <?php if(isset($_POST['submit']) && (!$status)){ ?>
             <div class="alert text-center alert-danger" ><?php echo $msg;?>
             </div>
         <?php } elseif(isset($_POST['submit']) && ($status)) {?>
           <p class="text-center" ><?php echo $msg;?></p>
         <?php }?>
            <form action="#" id="register" method="POST">


              <div class="form-group">
                <label for="name">name</label>
                <input class="form-control bg-form" type="name" name="name" placeholder="name" value="<?php echo $value = ($status) ?  $name : "" ;?>"title="name" required>
               </div>
                
                <div class="form-group">
                <label for="email">email</label>
                <input class="form-control bg-form" type="email" name="email" placeholder="email" title="email" value="<?php echo $value = ($status) ?  $email : "" ;?>" required>
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