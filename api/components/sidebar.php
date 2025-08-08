<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$currentPage = basename($currentPath);
?>

<nav class="sidebar">
  <div class="nav flex-column">
    <a class="nav-link <?php if($currentPage == 'fusion-theory.php') echo 'active'; ?>" href="fusion-theory.php">
      <i class="fa-solid fa-book"></i>
      <span class="label-text">Methodology</span>
    </a>
    <a class="nav-link <?php if($currentPage == 'research.php') echo 'active'; ?>" href="research.php">
      <i class="fa-solid fa-magnifying-glass"></i>
      <span class="label-text">Fusion Framework</span>
    </a>
    <a class="nav-link <?php if($currentPage == 'urban-village.php') echo 'active'; ?>" href="urban-village.php">
      <i class="fa-solid fa-layer-group"></i>
      <span class="label-text">Pixel Level Fusion</span>
    </a>
    <a class="nav-link <?php if($currentPage == 'urban-classification.php') echo 'active'; ?>" href="urban-classification.php">
      <i class="fa-solid fa-globe"></i>
      <span class="label-text">Urban Classification</span>
    </a>

    <!-- Nanti digabung ke dalam urban classification -->
  </div>
</nav>

<style>
.sidebar {
  position: fixed;
  top: 56px;
  left: 0;
  width: 240px;
  height: calc(100vh - 56px);
  background-color: #f8f9fa;
  padding-top: 1rem;
  overflow-y: auto;
  border-right: 1px solid #dee2e6;
  z-index: 1030;
  transition: width 0.3s ease;
}

.sidebar .nav-link {
  display: flex;
  align-items: center;
  padding: 12px 20px;
  font-size: 15px;
  font-weight: bold;
  color: #007bff;
}

.sidebar .nav-link i {
  font-size: 18px;
  min-width: 20px;
  text-align: center;
}

.sidebar .nav-link.active {
  background-color: #e9ecef;
  color: #007bff !important;
}

.sidebar .label-text {
  margin-left: 10px;
  white-space: nowrap;
  overflow: hidden;
  transition: opacity 0.3s ease;
}

/* Saat layar kecil: sidebar mengecil & label disembunyikan */
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
}
</style>
