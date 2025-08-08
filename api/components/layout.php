<?php
// Detect current page for active sidebar/navbar
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$currentPage = basename($currentPath);
if ($currentPage === '' || $currentPage === '/') {
    $currentPage = 'index.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Urban Sensing Fusion Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" href="../static/assets/img/logo_stis.png">

  <!-- Styles -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
  <link href="../static/assets/css/mediumish.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      padding-top: 150px;
      margin: 0;
    }

    .navbar.fixed-top {
      z-index: 1041; /* Lebih tinggi dari sidebar */
    }

    .sidebar {
      position: fixed;
      top: 56px;
      left: 0;
      width: 220px;
      height: calc(100vh - 56px);
      background-color: #f8f9fa;
      padding-top: 3rem;
      overflow-y: auto;
      border-right: 1px solid #dee2e6;
      z-index: 1030;
    }

    .sidebar .nav-link.active {
      font-weight: bold;
      color: #183059 !important;
      background-color: #e9ecef;
    }

    h2 {
      color: #183059;
    }

    .nav-link.active {
		color: #007bff !important;
		font-weight: bold;
	}
	
    .sidebar a {
        font-weight: 500;
        color: #007bff;
    }

    .main-wrapper {
      margin-left: 240px;
      margin-top: 2.5em; /* naik/turun sesuai ukuran font */
      padding: 1px;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 70px;
        padding-left: 0;
        padding-right: 0;
    }

    .sidebar .label-text {
      display: none;
    }

    .sidebar .nav-link {
      justify-content: center;
      padding: 12px 0;
    }

    .main-wrapper {
      margin-left: 70px; /* sesuai sidebar kecil */
    }
  }


  </style>

  <?= $custom_css ?? '' ?>
</head>
<body>

  <?php include __DIR__ . '/header.php'; ?>
  <?php include __DIR__ . '/sidebar.php'; ?>

  <div class="main-wrapper">
    <?= $content ?? '' ?>
    <?php include __DIR__ . '/footer.php'; ?>
  </div>

  <?php include __DIR__ . '/backToTop.html'; ?>

  <!-- JS scripts -->
  <script src="../static/assets/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" crossorigin="anonymous"></script>
  <script src="../static/assets/js/bootstrap.min.js"></script>
  <script src="../static/assets/js/ie10-viewport-bug-workaround.js"></script>
  <!-- <script src="../static/assets/js/mediumish.js"></script> -->
  <?= $custom_js ?? '' ?>
</body>
</html>
