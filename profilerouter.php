<?php


 $request = $_SERVER['REQUEST_URI'];

 require('db.php');

//select query 
 $select_query = "SELECT * FROM `profiles`";
        $select_query_result = mysqli_query($con, $select_query);
         $rows = mysqli_num_rows($select_query_result);

  $profile_url = "/user/";
  $str = '/DarkSparrows2.0/v1/user/beinghuman';
  $profile_exists = 0;
 if(!preg_match($profile_url, $request)){
    require('router.php');
       } else {
           while($user = mysqli_fetch_array($select_query_result)){
           if($request == '/DarkSparrows2.0/v1/user/'.$user['username']) {  $profile_exists = 1;}
           else{ $profile_exists += $profile_exists;}
  }
       }
       if($profile_exists){
        require('dashboard/profile.php');
       }