<?php
$page_title = "Urban Sensing Fusion Research";

$custom_css = '
<!-- Bootstrap 4 CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
.modal-backdrop.show {
  background-color: rgba(0, 0, 0, 0.8);
}

.modal-dialog.modal-xl {
  max-width: 80vw;
  margin-top: 6vh; /* geser sedikit ke bawah */
}

.modal-content.custom-modal {
  background-color: transparent;
  border: none;
  box-shadow: none;
  position: relative;
}

.modal-body {
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-body img {
  max-width: 100%;
  max-height: 70vh;  /* tadinya 85vh */
  width: auto;
  height: auto;
  object-fit: contain;
  border-radius: 10px;
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 20px;
  font-size: 2rem;
  color: white;
  border: none;
  background: none;
  z-index: 1001;
}
</style>
';
ob_start();
?>

<!-- Begin Article Content -->
<div class="container px-5 mt-5">
  <div class="article-post">
    <h2 class="section-title"><b>Urban Sensing Fusion Framework</b></h2>

    <h5 style="font-weight: 600; color: #007bff; margin: 2rem auto 1rem auto;">
      Introduction
    </h5>

    <!-- Gambar 7: Ekspektasi (TANPA modal) -->
    <div class="framework-introduction d-flex flex-wrap" style="gap: 2rem; max-width: 1200px; margin: 10px auto;">
      <div style="flex: 0 0 50%;">
        <img src="../static/assets/img/urban-sensing-fusion-expectation.png"
             alt="Urban Sensing Fusion Framework Expectation"
             style="width: 100%;">
      </div>
      <div style="flex: 1;">
        <p style="font-size: 15px; font-weight: 500;">
             Framework ini dikembangkan menggunakan citra satelit beresolusi menengah dari platform Sentinel, yang meliputi:
        </p>
        <h5 style="font-size: 15px; font-weight: bold; color: #007bff;">
          <i class="fa-solid fa-satellite mr-2 text-primary"></i>
          Citra <i>Synthetic Aperture Radar</i> Sentinel-1 Level-1 GRD
        </h5>
        <h5 style="font-size: 15px; font-weight: bold; color: #007bff; margin-top: 15px;">
          <i class="fa-solid fa-satellite mr-2 text-primary"></i>
          Citra Optik Sentinel-2 MSI Level-2A
        </h5>
        <p style="font-size: 15px; margin-top: 20px;">
            Selain itu, framework ini dirancang untuk pendekatan analisis di <b>wilayah perkotaan</b>, dengan output yang diharapkan berupa <b>evaluasi terhadap pixel-level fusion</b> pada berbagai tipe kawasan kota, serta penerapannya dalam <b>klasifikasi tutupan lahan pada tingkat administratif kota</b>.
        </p>
      </div>
    </div>

    <p style="font-size: 15px;">
        Selanjutnya, disajikan <i>framework</i> <b>Urban Sensing Fusion</b> yang diusulkan dalam penelitian ini. 
        Framework ini terdiri dari dua bagian utama, yaitu tahap <i>preprocessing</i> serta inti dari proses <i>data fusion</i> itu sendiri, sebagaimana ditunjukkan dalam rancangan berikut.
    </p>

    <!-- Gambar 8: PREPROCESSING -->
    <h5 style="font-weight: 600; color: #007bff; margin: 2rem auto 1rem auto;">
        Urban Sensing Fusion Preprocessing
    </h5>
    <div class="text-center mb-4">
    <img src="../static/assets/img/urban-sensing-fusion-preprocessing.png"
        alt="Urban Sensing Fusion Framework Preprocessing"
        style="width: 60%; max-width: 1000px; cursor: zoom-in;"
        data-toggle="modal" data-target="#modalPreprocessing">
    </div>
    <p style="font-size: 15px; max-width: 1000px; margin: 0 auto;">
        Tahapan <i>pre-processing</i> mencakup proses awal terhadap data citra Sentinel, mulai dari penanganan data pada level sebelumnya, pengolahan khusus terhadap produk citra pada level yang digunakan dalam studi ini, hingga menghasilkan citra yang siap digunakan untuk proses <i>data fusion</i> selanjutnya.
    </p>


    <!-- Gambar 9: CORE PROCESS -->
    <h5 style="font-weight: 600; color: #007bff; margin: 3rem auto 1rem auto;">
        Urban Sensing Fusion Core Process
    </h5>
    <div class="text-center mb-4">
    <img src="../static/assets/img/urban-sensing-fusion-core.png"
        alt="Urban Sensing Fusion Framework Core"
        style="width: 60%; max-width: 1000px; cursor: zoom-in;"
        data-toggle="modal" data-target="#modalCore">
    </div>
    <p style="font-size: 15px; max-width: 1000px; margin: 0 auto;">
    Tahapan utama dalam <i>framework</i> ini berfokus pada proses <b>data fusion</b>, yang melibatkan pembagian skenario eksperimental pada level SLS (kelurahan) dengan karakteristik kawasan yang <i>heterogen</i> maupun <i>homogen</i>. Hasil dari proses ini diharapkan dapat menghasilkan <b>best practice</b> tahapan <i>pre-processing</i> yang dapat diterapkan secara efektif pada level administratif kota.
    </p>


    <br>
    <div style="box-shadow: 5px 5px 12px rgba(0, 0, 0, 0.2); padding: 15px; background-color: #fff; border-radius: 6px; max-width: 1000px; margin: 0 auto;">
        <p style="font-size: 15px; color: #003366; margin: 0;">
            Selanjutnya, hasil penerapan <i>framework</i> dalam penelitian ini akan dibahas lebih lanjut, dengan fokus pada wilayah kajian yang telah ditentukan, yaitu <b>Kota Jambi, Provinsi Jambi</b>.
        </p>
    </div>
  </div>
</div>

<!-- MODAL PREPROCESSING -->
<div class="modal fade" id="modalPreprocessing" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content custom-modal">
      <button type="button" class="close-btn" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <img src="../static/assets/img/urban-sensing-fusion-preprocessing.png" alt="Zoom Preprocessing" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<!-- MODAL CORE -->
<div class="modal fade" id="modalCore" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content custom-modal">
      <button type="button" class="close-btn" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <img src="../static/assets/img/urban-sensing-fusion-core.png" alt="Zoom Core" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/components/layout.php';
?>
