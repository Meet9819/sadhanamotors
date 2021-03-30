<?php include "allcss.php"; ?>

<body>

<div id="wrapper" class="wrapper clearfix">
		<?php include "header.php"; ?>

	<section id="page-title" class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6">
					<h1>FAQs</h1>
				</div>
		
				<div class="col-xs-12 col-sm-12 col-md-6">
					<ol class="breadcrumb text-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li class="active">FAQs</li>
					</ol>
				</div>
				
			</div>
		
		</div>
	
	</section>
	

	<section id="featured1" class="featured featured-1"> 


			<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
				<div class="ast_faq_section">
					<div class="panel-group" id="accordion">
				


						 <?php
include('db.php');
$result = mysqli_query($con,"SELECT * FROM faq ");
while($row = mysqli_fetch_array($result))
{

echo '  
				<div  class="panel panel-default">
					  <div class="panel-heading" style="    background-color: #ec1c23;">
						

						  <a style="color: #ffffff;" href="#'.$row['id'].'" data-toggle="collapse" data-parent="#accordion" > 
						  <h4 class="panel-title">
						'.$row['question'].'


						 
						</h4> </a>
					  </div>
					  <div id="'.$row['id'].'"  class="panel-collapse collapse out"> 
						<div class="panel-body">'.$row['answer'].'  




				 </div> 

					  </div>
					</div>

					'; } ?> 

					
				  </div>
				</div>
			</div>
		</div>
	</div>


	
	</section>	
	<?php include "footer.php"; ?>
</div>
<?php include "allscript.php"; ?>