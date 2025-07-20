<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../static/assets/img/logo_stis.png">
  <title>Urban Sensing Fusion</title>


  <!-- Bootstrap core CSS -->
	<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->

  <!-- Font Awesome -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">

  <!-- Custom styles for this template -->
  <link href="../static/assets/css/mediumish.css" rel="stylesheet">

  <!-- Bootstrap 4.6.2 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Chart JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <!-- GeoTIFF dan GeoRaster -->
  <script src="../static/libs/geotiff.bundle.min.js"></script>
  <script src="../static/libs/georaster.browser.bundle.min.js"></script>
  <script src="../static/libs/proj4.js"></script>
  <script src="../static/libs/georaster-layer-for-leaflet.browserify.min.js"></script>

  <style>
    body {
        padding-top: 56px;
    }

    .nav-link.active {
        color: #007bff !important;
        font-weight: bold;
    }

  </style>

</head>

<body>

<?php include __DIR__ . '/components/header.php'; ?>

<!-- Hero Section -->
<section style="background-image: url('../static/assets/img/aerial-view-of-urban-landscape.jpg'); background-size: cover; background-position: center; min-height: 60vh; position:relative;">
  <div style="position:absolute; top:0; right:0; bottom:0; left:0; background-color: rgba(0,0,0,0.6); z-index:1;"></div>
  <div class="d-flex align-items-center justify-content-start text-white" style="position:relative; z-index:2; min-height:60vh; padding:2rem;">
    <div class="col-lg-10 px-3 pt-5 text-justify">
      <h2>Fusion Section</h2>
      <br>
      <p><strong>1.</strong> Citra yang dapat dicakup dalam proses ini adalah <strong>citra satelit Synthetic Aperture Radar Sentinel-1</strong> dan <strong>citra satelit optik Sentinel-2</strong></p>
      <p><strong>2.</strong> Komposisi data mencakup <strong>3 band RGB dan 1 polarisasi</strong>, dengan urutan band citra optik sebagai berikut: <code>B2 - B3 - B4</code> (Blue – Green – Red)</p>
      <p><strong>3.</strong> Citra yang digunakan harus sudah melalui proses <strong>preprocessing</strong>. Silakan merujuk pada panduan berikut untuk memastikan data Anda telah memenuhi standar yang dibutuhkan:</p>
      <button class="btn btn-outline-light mt-2" data-toggle="modal" data-target="#modalPreprocessGuide">
        📄 Buka Panduan Preprocessing (PDF)
      </button>
    </div>
  </div>
</section>

<!-- Main Content -->
<div class="container-fluid px-4 mt-4">
  <div class="row equal-height">

    <!-- Left Panel: Upload Card -->
    <div class="col-lg-4 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body" style="height: 95vh;">
          <h4 class="card-title mb-3">Fusion Input</h4>

          <!-- SAR Upload -->
          <label class="mb-1 d-flex align-items-center">
            <img src="../static/assets/img/sar_stack.png" alt="SAR icon" width="50" class="mr-2">
            <span>SAR Image</span>
          </label>
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="sarInput" name="sar_file" aria-describedby="sarAddon" accept="image/*">
              <label class="custom-file-label" for="sarInput">Choose SAR Image</label>
            </div>
          </div>

          <!-- RGB Upload -->
          <label class="mb-1 d-flex align-items-center">
            <img src="../static/assets/img/rgb_stack.png" alt="RGB icon" width="50" class="mr-2">
            <span>RGB Image</span>
          </label>
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="rgbInput" name="rgb_file" aria-describedby="rgbAddon" accept="image/*">
              <label class="custom-file-label" for="rgbInput">Choose RGB Image</label>
            </div>
          </div>

          <br>

          <!-- Judul dengan ikon -->
          <div class="d-flex align-items-center mb-2">
            <i class="fa fa-th-large text-dark mr-2"></i>
            <h6 class="mb-0">Pixel-Level Fusion Method</h6>
          </div>
          <small class="text-muted d-block mb-3">Choose one or more fusion methods</small>

          <!-- Box dengan checkbox -->
          <div class="border rounded bg-light p-3" id="methodCheckboxes">
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" id="brovey" value="brovey" checked>
              <label class="form-check-label" for="brovey">Brovey</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" id="ihs" value="ihs" checked>
              <label class="form-check-label" for="ihs">IHS</label>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" id="pcs" value="pcs" checked>
              <label class="form-check-label" for="pcs">PCS</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gs" value="gs" checked>
              <label class="form-check-label" for="gs">Gram-Schmidt</label>
            </div>
          </div>

          <!-- Tombol Fuse -->
          <button id="fuseButton" class="btn btn-primary mt-3 w-100">
            <i class="fa fa-magic mr-1"></i> Fuse!
          </button>

          <!-- Area hasil -->
          <div id="downloadArea" class="mt-3"></div>
        </div>
      </div>
    </div>

    <!-- Right Panel: Map -->
    <div class="col-lg-8">
      <div id="map" style="height:95vh; width:100%; border-radius:0.25rem; overflow:hidden;"></div>
    </div>

  </div>
</div>

<!-- Footer -->
<div class="container mt-4">
  <div class="footer py-3 border-top text-center">
    <small>&copy; 2025 Putri Sekar Ayu | Theme by WowThemes.net</small>
  </div>
</div>

<!-- Full Page Loader -->
<div id="fullPageLoader" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background-color: rgba(0, 0, 0, 0.5); z-index:9999; align-items:center; justify-content:center;">
  <div class="text-center text-white">
    <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;">
      <span class="sr-only">Loading...</span>
    </div>
    <p class="mt-3">Fusing data... please wait</p>
  </div>
</div>

<!-- Modal Preprocessing Guide -->
<div class="modal fade" id="modalPreprocessGuide" tabindex="-1" role="dialog" aria-labelledby="modalPreprocessGuideLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="modalPreprocessGuideLabel">Panduan Preprocessing (PDF)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="height:80vh;">
        <iframe src="../static/assets/docs/Preprocessing Guide for S1-S2 Before Fusion.pdf" width="100%" height="100%" style="border:none;"></iframe>
      </div>

      <div class="modal-footer">
        <a href="../static/assets/docs/Preprocessing Guide for S1-S2 Before Fusion.pdf" download class="btn btn-primary">
          <i class="fa fa-download mr-1"></i> Download PDF
        </a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>

<?php include __DIR__ . '/components/backToTop.html'; ?>

<!-- Scripts (Bootstrap + Leaflet + Custom) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="../static/script/fusion_script.js"></script>

</body>
</html>
