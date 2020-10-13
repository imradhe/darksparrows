<?php  session_start();
 $request;

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta name="mobile-web-app-capable" content="yes">
         <link rel="canonical" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$request ?>" />
            <meta content="Dark Sparrows" name="description" />
            <meta property="og:title" content="Dark Sparrows Profiles" />
            <meta property="og:description" content="Dark Sparrows Profiles." />
            <meta property="og:type" content="home" />
    <link rel="shortcut icon" href="http://darksparrows.ga/favicon.ico" type="image/x-icon">
    <title>Home | Dark Sparrows</title>
    <link rel="stylesheet" href="./assets/css/global.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <link href="./dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">



    <style>
        body{
            min-height: 100vh;
        }
    .logo{
        font-size: 30px;
        margin-top: 15px;
        margin-left: 10px;
        user-select: none;
        pointer-events: none;
    }
.navbar{
    padding-top: 5px !important;
    background-color: transparent !important;
    border-color: transparent !important ;
}
#bs-example-navbar-collapse-1{
    padding-right: 15px;
    padding-left: 15px;
    border-top:0px;
    -webkit-box-shadow:0px 0px 0px rgba(255,255,255,.1);
    box-shadow:0px 0px 0px rgba(255,255,255,.1);
}
.bg-secondary{
  background-color: #099688 !important ;
}

ul li a{
    text-decoration: none;  
}
ul li.active a {
    color: black !important;
    background-color: transparent !important;
    background-image: url('../assets/img/cloud.svg');
    background-position: center;
    background-repeat: no-repeat;
    background-position-x: 5px;
    background-position-y: -3px;
    padding: 18px;
    height: 50px;
}
.dashboard:hover{
  font-size: 82%;
}
.profile:hover{
  font-size: 68%;
}
li a:hover{
    background-color: transparent !important;
    color: black !important;  
    transition: none;
    background-image: url('./assets/img/cloud.svg');
    background-repeat: no-repeat;
    background-position: center;
    background-position-x: 10px;
    background-position-y: -3px;
    padding: 18px;
    height: 50px;
    transition: 0.5s ease;
}
.font-primary{
    font-family: Quicksand;
}
    </style>
  </head>
  <body class="bg-primary font-primary">
   

    <?php if((!isset($_SESSION['logged_in']) || empty($_SESSION['username']))) {?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
        </div>
        <div class="logo">Dark Sparrows</div>
      </a>
          </div>  
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">                          
            </ul>            
            <ul class="nav navbar-nav pad navbar-right">
                <li class="hover"><a href=" ">HOME <span class="sr-only">(current)</span></a></li>
                <li class="hover"><a href="./register">SIGNUP</a></li>
                <li class="hover"><a href="./login">LOGIN</a></li>
              <li class="hover"><a href="./about">ABOUT</a></li>              
            </ul>
          </div>
        </div>
      </nav>

<?php } else { ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
        </div>
        <div class="logo">Dark Sparrows</div>
      </a>
          </div>  
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">                          
            </ul>            
            <ul class="nav navbar-nav pad navbar-right">
                <li class="dashboard hover"><a href="./dashboard/home">MY HOME<span class="sr-only">(current)</span></a></li>
                <li class="profile hover"><a href="./user/<?php echo $_SESSION['username'];?>">MY PROFILE</a></li>
              <li class="hover"><a href="../about">ABOUT</a></li>                <li class="hover"><a href="./logout">LOGOUT</a></li>            
            </ul>
          </div>
        </div>
      </nav>

      <?php }?>

      <div class="container text-center">
      	<img src="./assets/img/banner.png">
      	<h1>Welcome To Dark Sparrows!</h1>
      	<p>All the registered members of Dark Sparrows can now create their Accounts.</p>
      	<a class="btn btn-danger" href="./register">REGISTER</a>

      </div>

<!--Enti cheppu.-->
      
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" ></script>
  </body>
</html>