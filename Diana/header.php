            <div class="navbar navbar-default navbar-fixed-top">
  <div class="container" >
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a href="index.php" class="navbar-brand"><span class="navbar-logo">hello <span class="main-color"> user</span></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
          <li class="con"><a>Contact <i class="fa fa-group fa-lg"> </i></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
                 <div class="btn-group">
                     <?php if(!isset($_SESSION['email'])){ ?>
                     <a class="log-form" href="loginn.php"> Log in  <i class="fa fa-sign-in fa-lg"></i></a>
                     <a class="sign-form" href="regist.php"> Sign in <i class="fa fa-user fa-lg"></i></a>
                     <?php } else { ?>
                             <span class="btn  dropdown-toggle btnn" data-toggle="dropdown" >
                          
                
             </span>
             <ul >
                 <li><a href="profile.php">My Profile</a></li>
                 <li><a href="userRequests.php">My Requests</a></li>
                 <li><a href="logout.php">Log out</a></li>
             </ul>
                     <?php }
?>
                </div>
      </ul>
    </div>
  </div>
</div>

      
      
     