	<?php
 session_start();
include './config/function.php';
    if(isset($_POST['email'])){
    //    if(isset($_POST['email']) && $_POST['email']!="" &&
      //    isset($_POST['pass']) && $_POST['pass']!=""){
            
  
       
     
	    $email = test_input($_POST['email']);
        $pass =  test_input($_POST['pass']);
         $name = test_input($_POST['name']);			
			//$dob=test_input($_POST['dob']);
	  //  $country=test_input($_POST['country']);
		/*   $email = $_POST['email'];
        $pass =  $_POST['pass'];
         $name =$_POST['name'];			
			$dob=$_POST['dob'];
	    $country=$_POST['country'];*/
		
		
// AddUser($name , $email , $pass ,$dob,$country);
$add= addUser(array($name , $email , 
$pass ));
           header('Location: index.php');

        $_SESSION['id']= $add[0];
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
         //   $_SESSION['dob'] = $dob;
          //  $_SESSION['country'] = $country;
                             
           header('Location: index.php');
     //  }
		
		}
            
	?>
<html lang="en">
	<head>
		<title>Regist | LALO LIBRARY</title>
		<!-- meta tags -->
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">    
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, 

initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- bootstrap css -->
		<link rel="stylesheet" type="text/css" 

href="css/bootstrap.min.css">

		<!-- fontawesome css -->
		<link rel="stylesheet" type="text/css" 

href="css/font-awesome.min.css">

		<!-- css fiels -->
		<link rel="stylesheet" type="text/css" 

href="style.css">
		<link rel="stylesheet" type="text/css" 

href="css/responsive.css">

		<!-- HTML5 shiv and Respond.js for IE8 support of 

HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the 

page via file:// -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- .wrap -->
		<div id="wrap">
		
              <?php
            include ('header.php');
            ?> 
			
		
	



<!-- #content -->
			<main id="content" class="narrowcolumn">
				<div id="main-content" 

class="container">
					<div class="row">
						<div class="col-sm-

9">
							<div 

class="row specialize">
								

<h2>Regist in LALO Laibrary</h2>

<div class="sign">
    <i class="fa fa-close fa-lg "></i>
        <form action="#" method="POST">
           <label for="InputUsername">UserName</label> 
            <input class="form-control" type="text" placeholder=" 

User Name" name="name"
                   id="name" autocomplete="off">
            <br>
               <label for="InputUsername">UserEmail</label>
                 <input class="form-control"  type="email" 

placeholder=" User Email" name="email"  id="email" 

autocomplete="off">
            <br>
        		<label 

for="InputUsername">UserPassword</label>
                <input class="form-control"  type="password" 

placeholder=" User Password" name="pass"  id="password" 

autocomplete="off"> 
       <br>
        		
                
         <div class="form-group save">
                        <button type="submit" class="btn btn-primary 

form-control"
                                name="regist" id="regist"> Regist Now 

</button>                        
                    </div>
                 </form>
</div>


									

							
							<!--	<form 

class="dropdown-">
									

<div class="form-">
									

<label for="InputUsername">Username</label>
									

<input type="text" class="form-control" id="InputUsername" 

placeholder="Username">
									

</div>
									

<div class="form-">
									

<label for="exampleInputPassword1">Password</label>
									

<input type="password" class="form-control" 

id="exampleInputPassword1" placeholder="Password">
									

</div>
									

<button type="submit" class="btn btn-">Login</button>
								

</form> -->
								
							</div> <!-- 

/.specialize -->

						</div> <!-- /.col-

sm-9 -->
						



    <div class="col-sm-3">
						
                                   <?php
            include ('asid.php');
            ?>
				
						</div> <!-- /.col-

sm-3 -->
					</div> <!-- /.row -->
				</div> <!-- /.main-content -->
			</main><!-- /#content -->

			
                       <?php
                            include("footer.php");
                        ?>
        
			<!-- /#footer -->
			
		</div><!-- /.wrap -->

	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>