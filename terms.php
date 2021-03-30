<?php include "allcss.php"; ?>

<body>

<div id="wrapper" class="wrapper clearfix">
		<?php include "header.php"; ?>

	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>Terms & Conditions</h1>
				</div>
		
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">Terms & Conditions</li>
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


$result = mysqli_query($con,"SELECT * FROM terms where id = 1");
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
	<?php include "footer.php"; ?>
</div>
<?php include "allscript.php"; ?>