<!DOCTYPE html>
<html>
<head>
	<title>HighMinds | Ecomerce Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"></link>

	<!--icon-->
	<link rel="shortcut icon" href="myIcon.ico">

	<!--fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
	<div class="header" id="myHeader"><!--start header-->
		<div class="container"> <!--start container-->

			<div class="navbar"> <!--start navbar-->
				<div class="logo">
					<h1>HGHMNDS</h1>
				</div>

				<nav>
					<ul id="menuItems">
						<li><a href="#myHeader" class="active">Home</a></li>
						<li><a href="#myProduct">Products</a></li>
						<li><a href="#myAbout">About</a></li>
						<li><a href="#myContact">Contact</a></li>
						<li><a href="account.php">Account</a></li>
					</ul>
				</nav>
				<img src="assets/images/cart.png" width="30px" height="30px;">
				<img src="assets/images/menu.png" class="menu-icon" onclick="menuToggle()">
			</div> <!--end navbar-->

			<div class="row"> <!--start row-->
				<div class="col-2">
					<h1>HGHMNDS</h1>
					<p>Never out of place. <br> Smart clothing for everyday living.</p>
					<a href="account.php" class="btn">Buy Now &#8594;</a>
				</div>

				<div class="col-2">
					<img src="assets/images/main.png" class="this-image">
				</div>

			</div><!--end row-->


		</div><!--end container-->
	</div><!--end header-->

	<br>
	<!----- featured products ------>
	<div class="small-container" id="myProduct"> <!--start small-container-->
		<h2 class="title">Featured Products</h2>
		<div class="row"> <!--start row-->
			<div class="col-3">
				<img src="assets/images/products/product-1.jpg" width="400px" >
				<h4>HGHMNDS 3BL4CK</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Php720.00</p>
			</div> <!--end col-->

			<div class="col-3">
				<img src="assets/images/products/product-2.jpg" width="400px" >
				<h4>KALMADO K5LMD2</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<p>Php700.00</p>
			</div> <!--end col-->

			<div class="col-3">
				<img src="assets/images/products/product-3.jpg" width="400px" >
				<h4>HGHMNDS 2GRNZ9</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
				</div>
				<p>Php720.00</p>
			</div> <!--end col-->
		</div> <!--end row-->

		<!--Latest Products-->
		<h2 class="title">Latest Products</h2>
		<div class="row"> <!--start row-->
			<div class="col-4">
				<img src="assets/images/products/latest-1.jpg" width="250px" >
				<h4>HGHMNDS BPLN2</h4>
				<div class="ratingg">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Php720.00</p>
			</div> <!--end col-->

			<div class="col-4">
				<img src="assets/images/products/latest-2.jpg" width="250px" >
				<h4>HGHMNDS WPLN1</h4>
				<div class="ratingg">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<p>Php720.00</p>
			</div> <!--end col-->

			<div class="col-4">
				<img src="assets/images/products/latest-3.jpg" width="250px" >
				<h4>HGHMNDS BPLK2</h4>
				<div class="ratingg">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
				</div>
				<p>Php720.00</p>
			</div> <!--end col-->
			<div class="col-4">
				<img src="assets/images/products/latest-4.jpg" width="250px" >
				<h4>HGHMNDS WPLK1</h4>
				<div class="ratingg">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Php720.00</p>
			</div> <!--end col-->
		</div> <!--end row-->

		<div class="row"> <!--start row-->
			<div class="col-4">
				<img src="assets/images/products/latest-5.jpg" width="250px" >
				<h4>KALMADO BLPKN5</h4>
				<div class="ratingg">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Php700.00</p>
			</div> <!--end col-->

			<div class="col-4">
				<img src="assets/images/products/latest-6.jpg" width="250px" >
				<h4>KALMADO BPLW2</h4>
				<div class="ratingg">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<p>Php700.00</p>
			</div> <!--end col-->

			<div class="col-4">
				<img src="assets/images/products/latest-7.jpg" width="250px" >
				<h4>KALMADO RPLN4</h4>
				<div class="ratingg">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
				</div>
				<p>Php700.00</p>
			</div> <!--end col-->
			<div class="col-4">
				<img src="assets/images/products/latest-8.jpg" width="250px" >
				<h4>KALMADO NPLK3</h4>
				<div class="ratingg">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>Php700.00</p>
			</div> <!--end col-->
		</div> <!--end row-->
	</div> <!--end small-container-->


	<!----- Offer ------>
	<div class="offer"> <!--start offer -->
		<div class="small-container"> <!--start small-container-->
			<div class="row">
				<div class="col-2">
					<img src="assets/images/products/offer-1.jpg" class="offer-img" width="370px">
				</div>
				<div class="col-2">
					<h4>Exclusively Available</h4>
					<h1>Strain Collection</h1>
					<p>
						Maintain your style with our newest Strain Collection.
					</p>
					<a href="account.php" class="btn">Buy Now &#8594;</a>
				</div>
			</div>
		</div> <!--end small-container-->
	</div> <!--end offer -->


	<!----- Testimonial ------>
	<div class="testimonial"> <!----- start testimonial ------>
		<div class="small-container"> <!----- start small-container ------>
			<h2 class="title">Testimonials</h2>
			<div class="row"> <!----- start row ------>
				<div class="col-3"> <!----- start col ------>
					<i class="fa fa-quote-left"></i>
					<p>I was recently at your store, what a delight to find you! Thank you, not only for your expertise but also for you encouragement in making more conscientious choices.</p>
					<div class="ratingg">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<img src="assets/images/testimonial-1.jpg">
					<h3>Al James</h3>
				</div> <!----- end col ------>

				<div class="col-3"> <!----- start col ------>
					<i class="fa fa-quote-left"></i>
					<p>I LOVE THE SHIRTS, they are probably the best t-shirts I have ever had. I'll be buying all the colors when I have some extra cash.</p>
					<div class="ratingg">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<img src="assets/images/testimonial-2.jpg">
					<h3>Christine</h3>
				</div> <!----- end col ------>

				<div class="col-3"> <!----- start col ------>
					<i class="fa fa-quote-left"></i>
					<p>How uplifting it was for me to see a business run with such heart, integrity and faith. Not only did I purchase some wonderful clothing, but I felt better about myself.</p>
					<div class="ratingg">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<img src="assets/images/testimonial-3.jpg">
					<h3>Shanti Dope</h3>
				</div> <!----- end col ------>

			</div> <!----- end row ------>

		</div> <!----- end small-container ------>
	</div> <!----- end testimonial ------>


	<!----- about-us ------>
	<div class="about-us" id="myAbout"> <!--start about-us -->
		<div class="small-container"> <!--start small-container-->
			<h2 class="title">Few Words About Us</h2>
			<div class="row">
				<div class="col-2">
					<h1>HGHMNDS</h1>
					<p>
						Don't be into trends. Don't make fashion own you, you decide what you are, what you want to express by the way you dress and the way to live. What you wear is how you present yourself to the world, especially today, when human contacts are so quick. Fashion is instant language.
					</p>
					<a href="#" class="btn">Read More &#8594;</a>
				</div>
				<div class="col-2">
					<img src="assets/images/logo.png" class="offer-img" width="370px">
				</div>
			</div>
		</div> <!--end small-container-->
	</div> <!--end about-us -->


	<!----- Why us ------>
	<div class="why-us"> <!----- start why-us ------>
		<div class="small-container"> <!----- start small-container ------>
			<h2 class="title">Why Choose Us</h2>
			<div class="row"> <!----- start row ------>
				<div class="col-3"> <!----- start col ------>
					<img src="assets/images/why-us-1.png">
					<h3>Fast Services</h3>
					<p>We're tend to bring super quality, quick delivery. Ever so marvelous packaging. Experience first-rate service.</p>
				</div> <!----- end col ------>

				<div class="col-3"> <!----- start col ------>
					<img src="assets/images/why-us-2.jpg">
					<h3>Great Team</h3>
					<p>Coming together is a beginning, staying together is progress, and working together is success.</p>
				</div> <!----- end col ------>

				<div class="col-3"> <!----- start col ------>
					<img src="assets/images/why-us-3.jpg">
					<h3>Best Deals</h3>
					<p>We promise you, this clothing will brings you so much joy and makes you so comfortable.</p>
				</div> <!----- end col ------>
				

			</div> <!----- end row ------>

		</div> <!----- end small-container ------>
	</div> <!----- end why-us ------>


	<!----- the team ------>
	<div class="the-team"> <!----- start the-team ------>
		<div class="small-container"> <!----- start small-container ------>
			<h2 class="title">Meet the Team</h2>
			<div class="row"> <!----- start row ------>
				<div class="col-3"> <!----- start col ------>
					<img src="assets/images/the-team-1.jpg">
					<h3>John Benedict Regore</h3>
					<p>Developer</p>
				</div> <!----- end col ------>

				<div class="col-3"> <!----- start col ------>
					<img src="assets/images/the-team-2.jpg">
					<h3>Raphael Abejero</h3>
					<p>Developer</p>
				</div> <!----- end col ------>

				<div class="col-3"> <!----- start col ------>
					<img src="assets/images/the-team-3.jpg">
					<h3>John Patrick Martinez</h3>
					<p>Tester</p>
				</div> <!----- end col ------>
			</div> <!----- end row ------>

			<div class="row"> <!----- start row ------>
				<div class="col-2"> <!----- start col ------>
					<img src="assets/images/the-team-4.jpg">
					<h3>Maria Emerlita Orbiso</h3>
					<p>Designer</p>
				</div> <!----- end col ------>

				<div class="col-2"> <!----- start col ------>
					<img src="assets/images/the-team-5.jpg">
					<h3>Sid Airo Ramirez</h3>
					<p>Designer</p>
				</div> <!----- end col ------>
			</div> <!----- end row ------>

		</div> <!----- end small-container ------>
	</div> <!----- end the-team ------>


	<!----- contact-us ------>
	<div class="contact-us" id="myContact"> <!--start contact-us -->
		<div class="small-container"> <!--start small-container-->
			<h2 class="title">Get in touch with us</h2>
			<div class="row"> <!----- start row ------>
				<div class="col-2"> <!----- start col ------>
					<h4>Connect with us : </h4>
					<p>For support or any questions : <br> Email us at <a href="mailto:jbbbregore099@gmail.com">webgroup1@gmail.com</a>
					</p><br>
					<h4>HGHMNDS Makati :</h4>
					<p><a href="https://www.google.com/maps/place/HGHMNDS+MAKATI/@14.5677413,121.0465046,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c911ac012fb1:0xa1235f7b6ef6d7b!8m2!3d14.5677361!4d121.0486933" target="_blank">Unit C7, Guadalupe Arcadia Square, Makati, Metro Manila</a>
					</p><br>
					<h4>Phone number : </h4>
					<p>0912 345 6789</p>
				</div> <!----- end col ------>
				<div class="col-2"> <!----- start col ------>
					<form action="#">
						<div class="my-form">
							<h4>Please fill out this quick form.</h4>
							<input type="text" name="contact-name" id="contact-name" required placeholder="Name"><br>
							<input type="email" name="contact-email" id="contact-email"  required placeholder="Your email address"><br>
							<textarea name="message" id="message" rows="5" cols="45" required placeholder="Message"></textarea><br>
							<a href="mailto:jbbbregore099@gmail.com"><input type="submit"></a>
						</div>
						
					</form>
				</div> <!----- end col ------>
			</div> <!----- end row ------>
		</div> <!--end small-container-->
	</div> <!--end contact-us -->














	<!----- footer ------>
	<div class="footer"> <!----- start footer ------>
		<div class="container"> <!----- start container ------>
			<div class="row"> <!----- start row ------>
				<div class="footer-col-1"> <!----- start col-1 ------>
					<img src="assets/images/logo.jpg">
				</div> <!----- end col-1 ------>

				<div class="footer-col-2"> <!----- start col-2 ------>
					<h3>Download Our App</h3>
					<p>Download App for Android and Ios in your mobile phone.</p>
					<div class="app-logo">
						<img src="assets/images/store-1.png">
						<img src="assets/images/store-2.png">
					</div>
				</div> <!----- end col-2 ------>

				<div class="footer-col-3"> <!----- start col-3 ------>
					<h3>Useful Links</h3>
					<ul>
						<li>Coupons</li>
						<li>Blog Post</li>
						<li>Return Policy</li>
					</ul>
				</div> <!----- end col-3 ------> 

				<div class="footer-col-4"> <!----- start col-4 ------>
					<h3>Follow Us</h3>
					<ul>
						<li><a href="https://www.facebook.com/HGHMNDS" target="_blank">Facebook</a></li>
						<li><a href="https://www.instagram.com/highmindsclothing/" target="_blank">Instagram</a></li>
						<li><a href="">Twitter</a></li>
					</ul>
				</div> <!----- end col-4 ------> 

			</div> <!----- end row ------>
			<hr>
			<p class="copyright">Copyright 2021 - Group 1</p>
		</div> <!----- end container ------>
	</div> <!----- end footer ------>



	<!----- script ------>
	<script src="assets/js/script.js"></script>
</body>
</html>