<!DOCTYPE html>
<html>
<?php 
$thisPage = "About";
include "../view/_partials/headView.php"; ?>
<?php include "./_partials/js.php";?>
<body>
	<?php include "../view/_partials/navbarView.php"; ?>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 570px;background-color: black">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block imgC" src="../assets/img/bg1.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block imgC" src="../assets/img/bg2.jpg"  alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block imgC" src="../assets/img/bg3.jpg"  alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</body>
</html>