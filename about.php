<?php include "allcss.php"; ?>



<body>



<div id="wrapper" class="wrapper clearfix">

		<?php include "header.php"; ?>



	



	<section id="page-title" class="page-title">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-6">

					<h1>about</h1>

				</div>

			

				<div class="col-xs-12 col-sm-12 col-md-6">

					<ol class="breadcrumb text-right">

						<li>

							<a href="index.php">Home</a>

						</li>

						<li class="active">about</li>

					</ol>

				</div>

				

			</div>

		

		</div>

	

	</section>



	



	<section id="featured1" class="featured featured-1">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12">



 <?php

include('db.php');





$result = mysqli_query($con,"SELECT * FROM terms where id = 7");

while($row = mysqli_fetch_array($result))

{



echo '

		'.$row['content'].''; 

	}

	?>





				</div>

			</div>

		</div>

	</section>


	

	<!-- Clients -->

		<section id="clients" class="clients bg-gray">

		<div class="container heading">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-12">

					<p class="subheading">Awesome</p>

					<h2>Our Brands</h2>

				</div>

				<!-- .col-md-12 end -->

			</div>

			<!-- .row end -->

			

			<div class="row heading-desc">

				<div class="col-xs-12 col-sm-12 col-md-10">

					<p>Car Shop is a business theme. Perfectly suited for Auto Mechanic, Car Repair Shops, Car Wash, Garages, Automobile Mechanicals, Mechanic Workshops, Auto Painting, Auto Centres.</p>

				</div>

				<!-- .col-md-10 end -->

				<div class="col-xs-12 col-sm-12 col-md-2">

					<a class="btn btn-primary btn-block" href="#">Check All Brands</a>

				</div>

				<!-- .client end -->

			</div>

			<!-- .row end -->

			

		</div>

		<!-- .container end -->

		<div class="container">

			<div class="clients-bg">

				<div class="row">

					<div class="col-xs-12 colsm-12 col-md-12 client-carousel">

						<!-- Client #1 -->

						

 <?php

include('db.php');

$result = mysqli_query($con,"SELECT * FROM client");

while($row = mysqli_fetch_array($result))

{

echo '

<div class="client">

<img src="images/clients/'.$row['img'].'" alt="'.$row['name'].'">

</div>				

'; 

} 

						?> 

					

					</div>

				</div>

	

			</div>

		</div>

		

	</section>

	<?php include "footer.php"; ?>

</div>

<?php include "allscript.php"; ?>