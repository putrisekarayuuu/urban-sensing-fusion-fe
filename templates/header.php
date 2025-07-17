<?php
// Mendapatkan nama file yang sedang dibuka 
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top mediumnavigation">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="container">
		<a class="navbar-brand" href="index.php">
			<img src="../static/assets/img/logo_stis.png" alt="logo">
			<span class="ml-2" style="font-size: 15px; font-weight: bold; color: #001833;">Urban Sensing Fusion Website</span>
		</a>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link <?php if($currentPage == 'index.php') echo 'active'; ?>" href="index.php">INTRODUCTION</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($currentPage == 'research.php') echo 'active'; ?>" href="research.php">RESEARCH</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($currentPage == 'fusion.php') echo 'active'; ?>" href="fusion.php">FUSION SECTION</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
