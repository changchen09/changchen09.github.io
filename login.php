<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$username = strip_tags($_POST['username']);
	//$password = md5($_POST['password']);
	$password = strip_tags($_POST['password']);
	
	$username = $DBcon->real_escape_string($username);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT * FROM users WHERE username='$username'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	
	if (password_verify($password, $row['password']) && $count==1) {
		$_SESSION['userSession'] = $row['user_id'];
		header("Location: home.php");
	} else {
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}
?>

<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
	  
	  <title>Lamstan - Login & Registration</title>
	  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	  
	  <link rel="stylesheet" href="style.css" type="text/css" />
	  
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/responsee.js"></script>
      <script type="text/javascript" src="js/template-scripts.js"></script> 
                 
      <!--[if lt IE 9]>
	      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <![endif]-->
   </head>
   
   <body class="size-1140">
      <!-- TOP NAV WITH LOGO -->
      <header>
         <div id="topbar">
            <div class="line">
               <div class="s-12 m-6 l-6">
                  Lamstan Ladakh
               </div>
               <div class="s-12 m-6 l-6">
                  <div class="social right">
                     <a href="https://www.facebook.com/groups/lamstan/"><i class="icon-facebook_circle"></i></a> <a href="https://twitter.com/lamstanindia"><i class="icon-twitter_circle"></i></a> <a href="https://plus.google.com/u/0/109469743551860807742"><i class="icon-google_plus_circle"></i></a> <a href="https://www.instagram.com/info.lamstan/"><i class="icon-instagram_circle"></i></a>
                  </div>
               </div>
            </div>  
         </div> 
         <nav>
            <div class="line">
               <div class="s-12 l-2">
                  <p class="logo"><a href="http://www.lamstan.com"><img src="img/Logo.png"></a></p>
               </div>
               <div class="top-nav s-12 l-10">
                  <p class="nav-text">Custom menu text</p>
                  <ul class="right">
                     <li class="active-item"><a href="#carousel">Home</a></li>
                     <li><a href="#latest-news">News feed</a></li>
                     <li><a href="#about-us">About Us</a></li>
                     <li><a href="#our-work">Our Work</a></li>
                     <li><a href="#services">Services</a></li>
                     <li><a href="#contact">Contact</a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
	  
      <section>
         
         <!-- FIRST BLOCK -->
         <div id="first-block">
            <div class="line">
               <h1>*** COME AND JOIN LAMSTAN TOGETHER WE CAN MAKE A DIFFERENCE ***</h1>
               <p>”Lamstan” attempts to bridge the opportunity divide.</p>
               
            </div>
         </div>
         
         <!-- ABOUT US -->
         <div id="about-us">
		 <div class="s-12 m-12 l-6 media-container">
               
			   <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In -></h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="username" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
            
            <a href="register.php" class="btn btn-default" style="float:right;">Sign Up Here</a>
            
        </div>  
        
        
      
		</form>
			   
         </div>
 
            <article class="s-12 m-12 l-6">
				<div class="s-12 m-12 l-4 center">
					<a href="login.php">
					<h4><strong>VOLUNTEER <br> LOGIN HERE</strong></h4></a>
				</div><br><br>
               <h2>We Provide<br> Education<br> and career planning</h2> 
               <p>Lamstan is an organisation of young people, who share the same passion for assisting their fellow students from remotest part of world. Students of different grades are offered assistance to pursue their dreams in life.

Various students from Ladakh, due to incompetent facilities/opportunities in their own native area, find the necessity for moving to other cities to further their studies/career. Pursuing studies or hunting jobs in other cities opens a whole new can of worms. In their crusade, students often get trapped into dilemmas, such as, which college to study, which course to opt for, will engineering do the best for them or should they opt for commerce courses, and the list goes on for eternity. In all these chaos, many students end up studying in wrong colleges/schools, or leaving the idea altogether and returning back to their respective homes. 
               </p>
               <div class="about-us-icons">
                  <i class="icon-paperplane_ico"></i> <i class="icon-trophy"></i> <i class="icon-clock"></i>
               </div>
            </article>
         </div>
		 
         <!-- SERVICES -->
         <div id="services">
            <div class="line">
               <h2 class="section-title">What we do</h2>
               <div class="margin">
                  <div class="s-12 m-6 l-4 margin-bottom">
                     <i class="icon-vector"></i>
                     <div class="service-text">
                        <h3>Lamstan operates in remote areas and provide guidance to students regarding their career goals </h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                     </div>
                  </div>
                  <div class="s-12 m-6 l-4 margin-bottom">
                     <i class="icon-eye"></i>
                     <div class="service-text">
                        <h3>We look to the future</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                     </div>
                  </div>
                  <div class="s-12 m-12 l-4 margin-bottom">
                     <i class="icon-random"></i>
                     <div class="service-text">
                        <h3>provide a very exclusive opportunity to seek advice from experienced professionals</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- LATEST NEWS -->
         <div id="latest-news">
            <div class="line">
              <h2 class="section-title">Latest News</h2> 
              <div class="margin">
                <div class="s-12 m-6 l-6">
                  <div class="s-12 l-2">
                    <div class="news-date">
                      <p class="day">21</p><p class="month">MARCH</p><p class="year">2017</p>
                    </div>
                  </div>
                  <div class="s-12 l-10">
                    <div class="news-text">
                      <h4>JNU UG Admission 2017</h4>
                      <p>...................</p>
                    </div>
                  </div>   
                </div> 
                <div class="s-12 m-6 l-6">
                  <div class="s-12 l-2">
                    <div class="news-date">
                      <p class="day">20</p><p class="month">MARCH</p><p class="year">2017</p>
                    </div>
                  </div>
                  <div class="s-12 l-10">
                    <div class="news-text">
                      <h4>Aligarh Muslim University admissions 2017</h4>
                      <p>.................</p>
                    </div>
                  </div>   
                </div>  
              </div>
            </div>
         </div> 
         <!-- CONTACT -->
         <div id="contact">
            <div class="line">
               <h2 class="section-title">Contact Us</h2>
               <div class="margin">
                  <div class="s-12 m-12 l-3 hide-m hide-s margin-bottom right-align">
                    <img src="img/contact.jpg" alt="">
                  </div>
                  <div class="s-12 m-12 l-4 margin-bottom right-align">
                     <h3>Contact Details</h3>                                         
					 
					 
					 
                     <address>
                        <p><strong>Call us for help with any aspect of your purchase, Offline.</strong><br><pre>Ph. 08800332445 (New- Delhi)
						
   009596985101 (Leh- Ladakh) </pre></p>
                        <p><strong>Address:</strong>&nbsp;Choglamsar,
Leh Ladakh-194101,
Jammu & Kashmir. </p>
                        <p><strong>E-mail:</strong>&nbsp;info.lamstan@gmail.com </p>
                     </address>
                     <br />
                    
                  </div>
                  <div class="s-12 m-12 l-5">
                    <h3>FEEDBACK FORM (Incase improvement required)</h3>
                    <form class="customform" action="">
                      <div class="s-12"><input name="" placeholder="Your e-mail" title="Your e-mail" type="text" /></div>
                      <div class="s-12"><input name="" placeholder="Your name" title="Your name" type="text" /></div>
                      <div class="s-12"><textarea placeholder="Your message" name="" rows="5"></textarea></div>
                      <div class="s-12 m-12 l-4"><button class="color-btn" type="submit">Submit Button</button></div>
                    </form>
                  </div>                
               </div>
            </div>
         </div>
        
      </section>
      <!-- FOOTER -->
      <footer>
         <div class="line">
            <div class="s-12 l-6">
               <p>Copyright 2017, UIET Design </p>
			   <p>CONTACT US: <strong>   <br>Ph. 08800332445 (New- Delhi)-
       009596985101 (Leh- Ladakh)</strong>| <strong>info.lamstan@gmail.com</strong></p>
               
            </div>
            <div class="s-12 l-6">
               <a class="right" href="http://www.uiet.puchd.ac.in/" title="~ Stanzin ~ Rinchen ~ Vaishali ~">Design and coding<br> by UIET students</a>
            </div>
         </div>
      </footer>
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {
            var theme_slider = $("#owl-demo");
            $("#owl-demo").owlCarousel({
                navigation: false,
                slideSpeed: 300,
                paginationSpeed: 400,
                autoPlay: 6000,
                addClassActive: true,
             // transitionStyle: "fade",
                singleItem: true
            });
            $("#owl-demo2").owlCarousel({
                slideSpeed: 300,
                autoPlay: true,
                navigation: true,
                navigationText: ["&#xf007","&#xf006"],
                pagination: false,
                singleItem: true
            });
        
            // Custom Navigation Events
            $(".next-arrow").click(function() {
                theme_slider.trigger('owl.next');
            })
            $(".prev-arrow").click(function() {
                theme_slider.trigger('owl.prev');
            })     
        }); 
      </script>
   </body>
</html>