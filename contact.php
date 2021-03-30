<?php include "allcss.php"; ?>



<body>

<!-- Document Wrapper -->

<div id="wrapper" class="wrapper clearfix">

		<?php include "header.php"; ?>



	

	

	<section id="page-title" class="page-title">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-6">

					<h1>contact</h1>

				</div>

				<!-- .col-md-6 end -->

				<div class="col-xs-12 col-sm-12 col-md-6">

					<ol class="breadcrumb text-right">

						<li>

							<a href="index.php">Home</a>

						</li>

						<li class="active">contact</li>

					</ol>

				</div>

			

			</div>

		

		</div>

	

	</section>



	

	<!-- Google Maps -->

	<section class="google-maps pb-0 pt-0">

		<div class="container-fluid">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12 pr-0 pl-0">

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15082.706678147966!2d72.87408987447266!3d19.07794839338701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c892ce021c7d%3A0x73ad48289689d491!2sSadhana%20Motor%20Accessories!5e0!3m2!1sen!2sin!4v1577525113618!5m2!1sen!2sin" width="100%" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
<!-- 
					<div style="max-width:100%;list-style:none; transition: none;overflow:hidden;width:100%;height:300px;"><div id="googlemaps-canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=mumbai+&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="googlemap-html" href="https://www.embed-map.com" id="grabmap-info">https://www.embed-map.com</a><style>#googlemaps-canvas img{max-width:none!important;background:none!important;font-size: inherit;font-weight:inherit;}</style></div> -->

				</div>

			</div>

		</div>

	</section>

	<!-- .google-maps end -->

	







	<!--<section id="featured1" class="featured featured-1">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12">



 <?php

include('db.php');





$result = mysqli_query($con,"SELECT * FROM terms where id = 6");

while($row = mysqli_fetch_array($result))

{



echo '

		'.$row['content'].''; 

	}

	?>





				</div>

			</div>

		</div>

	</section>	 -->



	<!-- Contact #1 -->

	<section class="contact">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-8 widget-contact pl-0 pr-0 p-none-xs p-none-sm">

					   <?php

include('db.php');



 if(isset($_POST['save']))

    {





            $name=$_POST['name'];

          

            $mobile=$_POST['mobile'];

            $email=$_POST['email'];

            $message=$_POST['message'];

    

       		$save=mysqli_query($con,"INSERT INTO contactform (name,mobile,email,message) VALUES ('$name','$mobile','$email','$message')");

    

  ?>

                <script>

                alert('Thank You For Your Feedback ...');

                window.location.href='contact.php';

                </script>

                <?php

          

                           

    }

?>



  <form action="contact-handler.php" method="post" enctype="multipart/form-data">



						<div class="col-md-6">

							<input type="text" class="form-control mb-30" name="name" id="name" placeholder="Name :" required/>

						</div>

						<div class="col-md-6">

							<input type="email" class="form-control mb-30" name="email" id="email" placeholder="Email :" required/>

						</div>



						<div class="col-md-12">

							<input type="number" class="form-control mb-30" name="subject" id="subject" placeholder="Mobile :" required/>

						</div> 





						<div class="col-md-12">

							<textarea class="form-control mb-30" name="message" id="message" rows="4" placeholder="Message" required></textarea>

						</div> 

						<div class="col-md-12">



						



							<button type="submit" id="submit-message" name="save" class="btn btn-primary btn-block">Send Message</button>

						</div>

						

					</form>

				</div>

				<!-- .col-md-8 end -->

				<div class="col-xs-12 col-sm-12 col-md-4">

					<div class="contct-widget-content">

						<p class="mb-0">Reach us</p>

						<div class="widget-contact-info mt-md">

							<div class="col-xs-12 col-sm-12 col-md-6 pl-0 mb-30-xs mb-30-sm">

								<h6>Phone :</h6>

								<p><i class="fa fa-phone"></i>‎+91 98677 26671</p>

							</div>

							<!-- .col-md-6 end -->

							<div class="col-xs-12 col-sm-12 col-md-6">

								<h6>Email :</h6>

								<p class="mb-0"><i class="fa fa-envelope"></i><a href="mailto:info@sadhanamotors.com">info@sadhanamotors.com</a></p>

							</div>

							<!-- .col-md-6 end -->

							<div class="col-xs-12 col-sm-12 col-md-12 pl-0 mt-30 mb-30-xs mb-30-sm">

								<h6>Address :</h6>

								<p class="mb-0"><i class="fa fa-map-marker"></i>
									Shop No. 9, Kantharia Mahal, 
									Opp Pheonix Market City mall, 
									Kurla West, 
									Mumbai - 400070
								</p>

							</div>

							<!-- .col-md-12 end -->

						</div>

					</div>

				</div>

				<!-- .col-md-4 end -->

			</div>

			<!-- .row end -->

		</div>

		<!-- .container end -->

	</section>

	<?php include "footer.php"; ?>





</div>

<!-- #wrapper end -->



<?php include "allscript.php"; ?>