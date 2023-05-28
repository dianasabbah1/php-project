<?php
if(isset($_GET['ser']) && $_GET['ser']!=""){
  $retval=getuserById($_GET['ser']);
 
}
  if(isset($_POST['add']) && $_POST['add'] =="update"){
       $retval=updateuser($_POST['password'],$_GET['id']);
       if($retval ==1){
            $message="update user done";
       }else{
             $message="update not done";
       }
   }
?>
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Users</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>edit user</li>						  	
					</ol>
				</div>
			</div>
            <br><br>
		
		<div class="row">
				 <div class="col-md-12 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Edit user</div>  
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    
<div class="form quick-post">
          <!-- Edit profile form (not working)-->
          
          <?php
    if(isset($message)){
        echo $message;
    }
        ?>
          <form class="form-horizontal" action=""  method="post">
              <!-- Title -->
              <div class="form-group">
                <label class="control-label col-lg-2" for="category_name">Name</label>
                <div class="col-lg-10"> 
                <input type="text" class="form-control" id="category_name" name="name"
                  value="<?php 
                         if(isset($_GET['name']) && $_GET['name']!=""){
                         echo $_GET['name'];
                         }
                         ?>">
                <label class="control-label col-lg-2" for="category_name">new password</label>

<input type="password" class="form-control" id="password" name="password"
                  value=""/>
                </div>
              </div>                             

              <!-- Buttons -->
              <div class="form-group">
                 <!-- Buttons -->
                 <div class="col-lg-offset-2 col-lg-9">
                    <button type="submit" class="btn btn-primary" id="add" name="add" value="<?php
                        if(isset($_GET['id']) && $_GET['id']!=""){
                            echo "update";
                        }else{
                            echo "publish";
                        }
                        ?>"><?php
                        if(isset($_GET['id']) && $_GET['id']!=""){
                            echo "update";
                        }else{
                            echo "publish";
                        }
                        ?></button>
                        
                <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                  </div>
         </form>
                                    </div>
                  

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
 