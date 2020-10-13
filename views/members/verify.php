<?php 
session_start();
// redirect to register page  if  not registered
if(!($_SESSION['otp_sent'])) header("Location:register");

//database connection
require('././db.php');

//welcome msg
echo "Hello ".$_SESSION['username'].". Please verify your account by entering the otp you recieved";

$username = $_SESSION['username'];
		
		//select query
	    $select_query = "select * from members where username = '$username'";
     	 $select_query_result = mysqli_query($con, $select_query);
        
        //getting user data in an array 
         $row = mysqli_fetch_array($select_query_result, MYSQLI_ASSOC);

         //redirect to profile page if already verified
         if($row['verified'])header("Location:profile/new");

         //else verify account with otp
		if(isset($_POST['verify'])){
          $id = $row['id'];
        if ($_POST['otp'] == $row['otp']) {
     	 $verified = 1;   

     	 //deleting otp after verification    	
         $update_query = "UPDATE `members` SET `otp` = ' ', `verified` = '1' WHERE `members`.`id` = $id";
        $update_query_result = mysqli_query($con, $update_query);

        //sessions
         $_SESSION['is_user_verified'] = ($update_query_result) ?   1 : 0 ;


        if($_SESSION['is_user_verified']) header("Location:profile/new");
        } else {
        	echo "Wrong OTP";
        }
}
?>

    <form id="otp" method="POST" action="#" >
        <input type="number" minlength="4" maxlength="4" name="otp" placeholder="Enter OTP" title="OTP" >
         <button type="submit" name="verify" value="verify">verify</button>
    </form>