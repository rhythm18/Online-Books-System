<?php session_start(); include("inc/connect.php");?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Dhanyog | Registration Details<</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Accrue a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/site-style.css" rel='stylesheet' type='text/css' />
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
</head>
<body>
	<!--/banner-->
	<div class="banner-inner" id="home">
		<!-- header -->
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header">
				<h1 class="logo">
					<a class="navbar-brand" href="index.php">
						Dhanyog
					</a>
				</h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fas fa-bars"></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link ml-lg-0" href="index.php">Home
								
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="product.php">Products</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="business-plan.php">Business Plan</a>
						</li>
						

						<li class="nav-item">
							<a class="nav-link" href="index.php#signupform">Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="user_login.php">Login</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact Us</a>
												
						</li>
						<!--
						<li class="search">
							<a class="play-icon popup-with-zoom-anim" href="#small-dialog">
								<i class="fas fa-search"></i>
							</a>
							<div id="small-dialog" class="mfp-hide">
								<div class="search-top">
									<div class="search-inn">
										<form action="#" method="post" class="disply-flex">
											<input class="form-control" type="search" name="search" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
											<button class="btn2">
												<i class="fas fa-search"></i>
											</button>
										</form>
									</div>
								</div>
							</div>
						</li> -->
					</ul>
				</div>
				<!-- <form class="form-inline my-2 my-lg-0">
							  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
							</form> -->
			</nav>
		</header>
		<!-- //header -->
		<!-- /banner-text -->
		   <div class="ban-inner-content text-center">
			   <ol class="breadcrumb justify-content-center">
					<li class="breadcrumb-item">
						<a href="index.php">Home</a>
					</li>
					<li class="breadcrumb-item active">Member Registration</li>
				</ol>
			</div>
		<!-- //banner-text -->
	</div>
	<!-- //banner -->
	<!-- contact -->
	<section class="bottom-banner-w3layouts contact">

		<div class="inner-sec-w3ls-agileinfo">
			<div class="map">
				
				<div class="main_grid_contact">
					<div class="form">
						<h4 class="mb-4 text-center">Registration Confirmation</h4>
								           
				<?php

				$id=$_GET['id'];
				echo "<b>Member Registration Completed Successfully !!<b>";
				$sql="select * from users where user_id=$id";

				$rs=mysqli_query($conn,$sql);

				$row=mysqli_fetch_array($rs);



				echo "<p>Member Id: ".$row['member_id']."</p>";

				echo "<p>Name: ".$row['name']."</p>";;

				echo "<p>Mobile Number: ".$row['mobile']."</p>";;

				echo "<p>E-Mail Id: ".$row['email']."</p>";;

				echo "<p>Password: ".$row['password']."</p>";;

				echo "<p>Registration Date: ".$row['join_date'];



				echo "<br><br><a href=user_login.php>Login Now</a>";

				  ?>
					</div>
				</div>
			</div>
		</div>
	</section>
			<footer>
	<?php include("inc/site-footer.php");?>
	</footer>
	<!-- //footer -->

	<!-- //Custom-JavaScript-File-Links -->
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide"
			});
		});
	</script>
	<!-- //flexSlider -->
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery.magnific-popup.js" ></script>
	<!--//pop-up-box-->
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!--//search-bar-->

	<!-- carousel -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$('.owl-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: true
					},
					600: {
						items: 1,
						nav: false
					},
					900: {
						items: 1,
						nav: false
					},
					1000: {
						items: 1,
						nav: true,
						loop: false,
						margin: 20
					}
				}
			})
		})
	</script>
	<!-- //carousel -->
	<!--/ start-smoth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
<!--// end-smoth-scrolling -->
	<script>
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	
	<!-- /js -->
	  <script src="js/bootstrap.js"></script>
	<!-- //js -->

	 <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/site_main.js"></script>

     <script type="text/javascript">
  $(document).ready(function () {
        $("#sendmessage").css("display", "none");
          $(document.body).on('click', '#submitme', function(){
        
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var message = $('#message').val();
                    
            $.ajax({
                type : 'POST',
                url : 'sendQuery.php',
                data : {name:name,email:email,message:message},
                async:false,
                success:function(response){
                //alert(response);
                      if(response=='s'){
                           $("#sendmessage").css("display", "block");
                           
                                    $('#name').val('');
                                    $('#email').val('');
                                    $('#message').val('');
                           
                           
                      }else if(response=='n'){
                           
                           $("#errormessage").html("Please contact to Admin");
                           $("#errormessage").css("display", "block");
                      }else{
                           $("#errormessage").html("Please contact to Admin");
                           $("#errormessage").css("display", "block");
                          
                      }
                      
                  
                      
                      
                } 
            });
                    
                    
          });
        
   });
  </script>
</body>
</html>