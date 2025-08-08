<?php
$page_title = "Urban Classification";

$custom_css = '
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
<style>
  .btn-group .btn {
        font-size: 14px;
        padding: 6px 16px;
        font-weight: 500;
    }

    .btn-group .btn.active {
        background-color: #007bff;
        color: white;
    }

    .content-section p {
        font-size: 15px;
        color: #003366;
        line-height: 1.7;
    }

    .toggle-buttons {
        display: flex;
        gap: 0.5rem;
        margin: 1.5rem 0;
    }

    .toggle-buttons .btn {
        border-radius: 999px !important;
        padding: 0.5rem 1.5rem;
        font-size: 15px;
        transition: all 0.2s ease-in-out;
    }

    .toggle-buttons .btn.active {
        background-color: #007bff;
        color: white;
    }
    
    .fusion-card {
        background-color: #fff;
        border-radius: 8px;
        padding: 2rem;
        margin-top: 2rem;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .fusion-card:hover {
        box-shadow: 6px 6px 14px rgba(0, 0, 0, 0.15);
    }

    .legend {
    background: white;
    padding: 8px;
    line-height: 16px;
    color: #333;
    font-size: 12px;
    box-shadow: 0 0 6px rgba(0,0,0,0.1);
    border-radius: 4px;
    max-width: 150px;
    }

    .legend h5 {
      margin: 0 0 5px;
      font-size: 13px;
      font-weight: bold;
    }

    .legend i {
      width: 14px;
      height: 14px;
      float: left;
      margin-right: 6px;
      opacity: 0.8;
      border: 1px solid #ccc;
    }

    .info.legend {
      background: white;
      padding: 10px;
      line-height: 18px;
      font-size: 13px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .info.legend i {
      width: 14px;
      height: 14px;
      float: left;
      margin-right: 8px;
      opacity: 0.85;
    }

    table td, table th {
        border-left: none !important;
        border-right: none !important;
    }

    .table th, .table td {
        font-size: 15px;
        padding: 0.5rem 0.75rem;
    }
</style>
';

$custom_js = '
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script src="https://unpkg.com/georaster"></script>
<script src="https://unpkg.com/georaster-layer-for-leaflet/dist/georaster-layer-for-leaflet.min.js"></script>
<script src="/urban-sensing-fusion-frontend/static/script/load_classification.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const btnCloudFree = document.getElementById("btnCloudFree");
    const btnCloudy = document.getElementById("btnCloudy");
    const cloudFreeDiv = document.getElementById("cloudFreeContent");
    const cloudyDiv = document.getElementById("cloudyContent");

    // Initial state
    cloudFreeDiv.style.display = "block";
    cloudyDiv.style.display = "none";
    btnCloudFree.classList.add("active");

    // Load default map
    window.initMap("mapCloudFree", "/urban-sensing-fusion-frontend/static/assets/img/non-cloudy-classification-raster/");

    btnCloudFree.addEventListener("click", function () {
      btnCloudFree.classList.add("active");
      btnCloudy.classList.remove("active");
      cloudFreeDiv.style.display = "block";
      cloudyDiv.style.display = "none";
      window.initMap("mapCloudFree", "/urban-sensing-fusion-frontend/static/assets/img/non-cloudy-classification-raster/");
    });

    btnCloudy.addEventListener("click", function () {
      btnCloudy.classList.add("active");
      btnCloudFree.classList.remove("active");
      cloudFreeDiv.style.display = "none";
      cloudyDiv.style.display = "block";
      window.initMap("mapCloudy", "/urban-sensing-fusion-frontend/static/assets/img/cloudy-classification-raster/", "_berawan");
    });
  });
</script>
';


ob_start();
?>

<div class="container px-5 mt-5">
  <div class="article-post content-section">
    <h2 class="mb-4"><b>Urban Land Classification</b></h2>
    <h6 style="font-size: 16px; line-height: 1.7;" class="my-3">
      Pemetaan tutupan lahan merupakan salah satu aspek penting dalam analisis wilayah perkotaan. 
      Pada bagian ini, dilakukan analisis terhadap pemanfaatan citra hasil <i>pixel-level fusion</i> sebagai input dalam proses klasifikasi. Eksperimen dilakukan pada dua skenario pengamatan, yaitu <b>skenario bebas awan</b> yang merepresentasikan area dengan kondisi visual yang optimal, dan <b>skenario tertutup awan</b> yang menguji performa klasifikasi pada kondisi gangguan visual akibat keberadaan awan.
    </h6>

    <h6 style="font-size: 16px; line-height: 1.7;" class="my-3">
      Metode klasifikasi <b>Random Forest (RF)</b> digunakan dalam penelitian ini untuk mengklasifikasikan tutupan lahan perkotaan berdasarkan data hasil <i>fusion</i>. Proses klasifikasi dilakukan terhadap <b>enam kelas tutupan lahan</b>, yaitu: <b>Bareland</b> (lahan terbuka), <b>Built-up</b> (permukiman dan bangunan), <b>Lake</b> (danau), <b>Other Vegetation</b> (vegetasi lainnya), <b>Paddy Fields</b> (lahan sawah), dan <b>River</b> (sungai).
    </h6>
    
    <!-- Toggle Buttons -->
    <div class="toggle-buttons mt-4 mb-3">
      <button class="btn btn-outline-primary btn-toggle" id="btnCloudFree">Cloud-Free Urban Areas</button>
      <button class="btn btn-outline-primary btn-toggle" id="btnCloudy">Cloudy Urban Areas</button>
    </div>

    <!-- Cloud-Free Content -->
    <div id="cloudFreeContent" class="fusion-card">
      <h4><b>Output Proses <i>Fusion</i> di Kawasan Perkotaan Bebas Awan</b></h4>
      <div style="text-align: center; margin: 2rem 0;">
          <img src="../static/assets/img/cloudfree-urban.png" 
          alt="Output Fusion Wilayah Perkotaan Bebas Awan" 
          style="width: 60%; border-radius: 8px; cursor: zoom-in;"/>
      </div>
      <div class="fusion-card">
        <p style="margin: 0;">
          Secara umum, hasil <i>fusion</i> mampu memperjelas <b>interpretasi visual dan spasial</b> dari tiap <b>tutupan lahan</b> yang ada di wilayah perkotaan.
        </p>
      </div>

      <br><br>
      <h4><b>Hasil Klasifikasi Tutupan Lahan Kawasan Perkotaan Bebas Awan</b></h4>
      <div style="display: flex; justify-content: center;">
        <div id="mapCloudFree" style="height:500px; width:90%; border:1px solid #ccc; border-radius:6px;" class="mt-2"></div>
      </div>
      <div class="fusion-card" style="margin: 0;">
        <p style="margin: 0;">
          Secara umum, <b>penggunaan citra hasil <i>fusion</i></b> sebagai input <b>mampu menghasilkan performa klasifikasi tutupan lahan yang baik dan konsisten</b>.
        </p>
      </div>

      <br><br>

      <h4><b>Evaluasi Kuantitatif Klasifikasi Tutupan Lahan Kawasan Perkotaan Bebas Awan</b></h4>
      <div class="table-responsive">
        <table class="table table-bordered border-0 table-hover mt-4" style="border-collapse: collapse;">
          <thead class="thead-light">
            <tr style="border-bottom: 2px solid #dee2e6;">
              <th><b>Metode</b></th>
              <th><i>Accuracy</i></th>
              <th><i>Precision</i></th>
              <th><i>Recall</i></th>
              <th><i>F1-Score</i></th>
            </tr>
          </thead>
          <tbody style="border-top: none;">
            <tr>
              <td>Sentinel-1</td>
              <td>37.35%</td>
              <td>37.38%</td>
              <td>37.35%</td>
              <td>37.36%</td>
            </tr>
            <tr>
              <td>Sentinel-2</td>
              <td>86.52%</td>
              <td>86.64%</td>
              <td>86.52%</td>
              <td>86.57%</td>
            </tr>
            <tr style="background-color: #c2e0c6;"> <!-- green highlight -->
              <td><b>Urban Sensing Fusion Brovey</b></td>
              <td><b>88.87%</b></td>
              <td><b>88.91%</b></td>
              <td><b>88.87%</b></td>
              <td><b>88.85%</b></td>
            </tr>
            <tr>
              <td>Urban Sensing Fusion IHS</td>
              <td>82.84%</td>
              <td>83.34%</td>
              <td>82.84%</td>
              <td>82.93%</td>
            </tr>
            <tr>
              <td>Urban Sensing Fusion PCS</td>
              <td>77.43%</td>
              <td>77.66%</td>
              <td>77.43%</td>
              <td>77.38%</td>
            </tr>
            <tr>
              <td>Urban Sensing Fusion Gram-Schmidt</td>
              <td>77.46%</td>
              <td>77.71%</td>
              <td>77.46%</td>
              <td>77.42%</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="fusion-card">
        <p style="margin: 0;">
          Dalam <b>skenario wilayah perkotaan</b> Kota Jambi <b>bebas awan</b>, citra hasil fusion dengan metode 
          <b>Urban Sensing Fusion Brovey</b> menunjukkan <b>performa klasifikasi tutupan lahan</b> yang 
          <span style="color:crimson;"><b>paling optimal</b></span> dibandingkan metode lainnya dengan 
          <b>nilai F1-score sebesar 88.85%</b>.
        </p>
      </div>
      <div class="fusion-card">
        <p style="margin: 0;">
          <b>Lebih tinggi</b> dibandingkan <i>benchmark</i> <b>Sentinel-2</b>, dengan peningkatan sebesar 
          <b>2.35% pada akurasi</b>, <b>2.27% pada precision</b>, <b>2.35% pada recall</b>, dan 
          <b>2.28% pada F1-score</b>.
        </p>
      </div>
    </div>

    <!-- Cloudy Content -->
    <div id="cloudyContent" class="fusion-card" style="display: none;">
      <h4><b>Output Proses <i>Fusion</i> di Kawasan Perkotaan Tertutup Awan</b></h4>
      <div style="text-align: center; margin: 2rem 0;">
          <img src="../static/assets/img/cloudy-urban.png" 
          alt="Output Fusion Wilayah Perkotaan Tertutup Awan" 
          style="width: 57%; border-radius: 8px; cursor: zoom-in;"/>
      </div>

      <div class="fusion-card">
        <p style="margin: 0;">
          Citra hasil <i>fusion</i> mampu menambahkan informasi pada area yang sulit dikenali oleh Sentinel-2 akibat tutupan awan, terutama pada objek seperti danau, sungai, dan area terbangun. Perairan memiliki nilai backscatter yang sangat rendah, sedangkan bangunan memiliki nilai tinggi, sehingga keduanya dapat ditangkap lebih jelas melalui proses <i>fusion</i>.
        </p>
      </div>

      <br><br>
      <h4><b>Hasil Klasifikasi Tutupan Lahan Kawasan Perkotaan Tertutup Awan</b></h4>

      <div style="display: flex; justify-content: center;">
        <div id="mapCloudy" style="height:500px; width:90%; border:1px solid #ccc; border-radius:6px;" class="mt-2"></div>
      </div>

      <div class="fusion-card">
        <p >
          Pada kondisi wilayah yang tertutup awan, <b>Sentinel-2 kurang mampu menghasilkan klasifikasi dengan baik</b>. Banyak <b>objek tertutup awan</b> sehingga wilayah tersebut mengalami <b>misklasifikasi</b>. Sedangkan itu, secara umum, <b>klasifikasi menggunakan hasil Urban Sensing Fusion</b> menunjukkan kualitas yang <b>lebih konsisten</b> pada <b>kondisi wilayah tertutup awan</b>.
        </p>
      </div>

      <br><br>

      <h4><b>Evaluasi Kuantitatif Klasifikasi Tutupan Lahan Kawasan Perkotaan Tertutup Awan</b></h4>
      <div class="table-responsive">
        <table class="table table-bordered border-0 table-hover mt-4" style="border-collapse: collapse;">
          <thead class="thead-light">
            <tr style="border-bottom: 2px solid #dee2e6;">
              <th><b>Metode</b></th>
              <th><i>Accuracy</i></th>
              <th><i>Precision</i></th>
              <th><i>Recall</i></th>
              <th><i>F1-Score</i></th>
            </tr>
          </thead>
          <tbody style="border-top: none;">
            <tr>
              <td>Sentinel-1</td>
              <td>38.92%</td>
              <td>38.89%</td>
              <td>38.92%</td>
              <td>38.89%</td>
            </tr>
            <tr>
              <td>Sentinel-2</td>
              <td>60.20%</td>
              <td>60.78%</td>
              <td>60.20%</td>
              <td>60.20%</td>
            </tr>
            <tr style="background-color: #c2e0c6;"> <!-- green highlight -->
              <td><b>Urban Sensing Fusion Brovey</b></td>
              <td><b>66.73%</b></td>
              <td><b>67.26%</b></td>
              <td><b>66.73%</b></td>
              <td><b>66.56%</b></td>
            </tr>
            <tr>
              <td>Urban Sensing Fusion IHS</td>
              <td>64.09%</td>
              <td>64.03%</td>
              <td>64.09%</td>
              <td>63.77%</td>
            </tr>
            <tr>
              <td>Urban Sensing Fusion PCS</td>
              <td>62.35%</td>
              <td>62.33%</td>
              <td>62.35%</td>
              <td>62.07%</td>
            </tr>
            <tr>
              <td>Urban Sensing Fusion Gram-Schmidt</td>
              <td>63.31%</td>
              <td>63.29%</td>
              <td>63.31%</td>
              <td>63.02%</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="fusion-card">
    <p style="margin: 0;">
      Penggunaan <b>citra hasil <i>fusion</i></b> secara umum konsisten <b>menghasilkan performa klasifikasi</b> yang <b>lebih tinggi</b> dibandingkan <b>Sentinel-2</b>, dengan <b>peningkatan nilai</b> metrik evaluasi di kisaran <b>2–6%</b>. <b>Performa paling optimal</b> diperoleh dari klasifikasi menggunakan citra <b>Urban Sensing Fusion Brovey</b>.
    </p>
  </div>


    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/components/layout.php';
?>
