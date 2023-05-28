
 
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>hello</title>
		<!-- meta tags -->
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta name="keywords" content="">    
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- bootstrap css -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<!-- fontawesome css -->
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

		<!-- css fiels -->
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">

		<!-- HTML5 shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
				<section id="hero">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="images/slide1.jpg" alt="...">
								<div class="carousel-caption">
									<h1><a href="#">hello world </a></h1>
								</div>
							</div>
							<div class="item">
								<img src="images/slide2.jpeg" alt="...">
								<div class="carousel-caption">
									<h1><a href="#">Books, novels .. or stories !! </a></h1>
								</div>
							</div>
							<div class="item">
								<img src="images/slide3.jpg" alt="...">
								<div class="carousel-caption">
									<h1><a href="#"> Come on, choose a book  </a></h1>
								</div>
							</div>
						</div> <!-- /.carousel-inner -->

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
						</a>
					</div> <!-- /.carousel -->
				</section>
				

				<div id="main-content" class="container">
					<div class="row">
						<div class="col-sm-9">
						
						
						<?php 
                        $allcat=  getAllCategory();  
                            for ($i=0;$i<sizeof($allcat); $i++){
                        ?>
                        
							<div class="row specialize">
							
								<h2>LATEST <?php echo $allcat[$i]['name'] ?> BOOKS</h2>
                                <?php
                                $politicatlnews=getAllNewsbyCategory($allcat[$i]['id']);
                                for($j=0;$j<sizeof($politicatlnews);$j++){
                                ?>
								<div class="col-sm-4 news-block">
									<img src="adminpanel/images/<?php echo $politicatlnews[$j]['image'] ?>" class="img-responsive" alt="political">
									<a href="single.php?id=<?php  echo $politicatlnews[$j]['id'] ?>"><?php echo $politicatlnews[$j]['title']; ?></a>
								</div> <!-- /.news-block -->

							    <?php
                                }
                                ?>


							</div> <!-- /.specialize -->
                        <?php
                                }
                        ?>
							
						</div> <!-- /.col-sm-9 -->
						<div class="col-sm-3">
						
                        <?php
            include ('asid.php');
            ?>
							
						</div> <!-- /.col-sm-3 -->
					</div> <!-- /.row -->
					
				</div> <!-- /.main-content -->
				
			</main><!-- /#content -->
            
                       <?php
                            include("footer.php");
                        ?>
                        </div><!-- /.wrap -->

	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>