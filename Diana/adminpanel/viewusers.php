
      <?php
if(isset($_GET['ser']) && $_GET['ser']!=""){
    $retval=deleteuser($_GET['ser']);
    if($retval==1){
        $message="delete done";
    }else{
        $message="delete not done";
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
						<li><i class="fa fa-laptop"></i>View users</li>						  	
					</ol>
				</div>
			</div>
            <br><br>
		<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                         <?php 
                          if(isset($message)){
                              echo $message;
                          }
                          ?>
                          <header class="panel-heading">
                              All Users
                          </header>
                          
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Name</th>
                                 <th><i class="icon_calendar"></i> email</th>
                              </tr>
                              <?php
                               $categoreis=getusers();
                              // var_dump($categoreis);
                               for ($i=0;$i<sizeof($categoreis); $i++){
                               ?>
                              <tr>
                                 <td><?php echo $categoreis[$i]['name']  ?></td>
                                 <td><?php echo $categoreis[$i]['email']  ?></td>
                                 <td>
                                  <div class="btn-group">

                                      <a class="btn btn-primary" href="?p=updateuser&name=<?php  echo $categoreis[$i]['name']?>&id=<?php echo $categoreis[$i]['id']  ?>"><i class="fa fa-edit"></i></a>
                                      <a class="btn btn-danger" href="?p=viewcategory&ser=<?php  echo $categoreis[$i]['id']   ?>"><i class="fa fa-times"></i></a>
                                  </div>
                                  </td>
                              </tr>
                           <?php
                               }
                            ?>
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>
  </section>
</section>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>