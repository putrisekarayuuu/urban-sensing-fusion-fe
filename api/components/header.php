<?php
// Ambil path URL saat ini (misal '/', '/index.php', '/research.php')
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$currentPage = basename($currentPath);

// Perlakukan '/' atau '' sebagai 'index.php'
if ($currentPage === '' || $currentPage === '/') {
    $currentPage = 'index.php';
}
?>

<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top mediumnavigation py-3 px-4">
    <div class="container d-flex justify-content-between align-items-center">
   
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="../static/assets/img/logo_stis.png" alt="logo">
            <span class="ml-2" style="font-size: 15px; font-weight: bold; color: #001833;">Urban Sensing Fusion Website</span>
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="container">
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($currentPage == 'index.php') echo 'active'; ?>" href="index.php">INTRODUCTION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(in_array($currentPage, ['research.php', 'urban-village.php', 'urban-classification.php', 'cloudy-area.php'])) echo 'active'; ?>" href="research.php">RESEARCH</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($currentPage == 'fusion.php') echo 'active'; ?>" href="fusion.php">FUSION SECTION</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- jQuery (WAJIB sebelum Bootstrap.js) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
