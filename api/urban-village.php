<?php
$page_title = "Urban Sensing Fusion - Pixel Level Fusion";

$custom_css = '
<!-- Bootstrap CDN untuk modal -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

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
        padding: 1.5rem;
        margin-top: 1rem;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .fusion-card:hover {
        box-shadow: 6px 6px 14px rgba(0, 0, 0, 0.15);
    }

    /* Modal styling */
    .modal-backdrop.show {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .modal-dialog.modal-xl {
        max-width: 80vw;
        margin-top: 6vh;
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
        max-height: 70vh;
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

    table td, table th {
        border-left: none !important;
        border-right: none !important;
    }

    .table th, .table td {
        font-size: 15px;
        padding: 0.5rem 0.75rem;
    }

</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btnHomogen = document.getElementById("btnHomogen");
        const btnHeterogen = document.getElementById("btnHeterogen");
        const kontenHomogen = document.getElementById("kontenHomogen");
        const kontenHeterogen = document.getElementById("kontenHeterogen");

        function showHomogen() {
            btnHomogen.classList.add("active");
            btnHeterogen.classList.remove("active");
            kontenHomogen.style.display = "block";
            kontenHeterogen.style.display = "none";
        }

        function showHeterogen() {
            btnHeterogen.classList.add("active");
            btnHomogen.classList.remove("active");
            kontenHeterogen.style.display = "block";
            kontenHomogen.style.display = "none";
        }

        // Tombol interaktif
        btnHomogen.addEventListener("click", function () {
            showHomogen();
            window.location.hash = "homogen";
        });

        btnHeterogen.addEventListener("click", function () {
            showHeterogen();
            window.location.hash = "heterogen";
        });

        // Deteksi hash URL saat page dimuat
        const hash = window.location.hash.substring(1);
        if (hash === "heterogen") {
            showHeterogen();
        } else {
            showHomogen(); // default
        }
    });
</script>

';
ob_start();
?>

<div class="container px-5 mt-5">
  <div class="article-post content-section">
    <h2 class="mb-4"><b>Pengujian <i>Pixel-Level Fusion</i> pada Kawasan Perkotaan Homogen dan Heterogen</b></h2>

    <h6 style="font-size: 16px; line-height: 1.7;">
        Penelitian ini juga difokuskan pada pengkajian <i>pixel-level fusion</i> pada dua jenis wilayah perkotaan, yaitu <b>wilayah perkotaan homogen</b> dan <b>heterogen</b>, yang dibedakan berdasarkan variasi jenis tutupan lahannya.
    </h6>

    <div class="btn-group my-3 toggle-buttons" role="group">
        <button type="button" class="btn btn-outline-primary active mr-2" id="btnHomogen">Homogeneous Urban Areas</button>
        <button type="button" class="btn btn-outline-primary" id="btnHeterogen">Heterogeneous Urban Areas</button>
    </div>

    <div class="fusion-card">
        <!-- Konten HOMOGEN -->
        <div id="kontenHomogen">
            <p>
                Dalam penelitian ini, <b>wilayah homogen</b> merujuk pada kawasan dengan <b>jenis tutupan lahan yang seragam</b>, seperti <b>area permukiman dan vegetasi</b>. Wilayah ini digunakan untuk mengevaluasi hasil <i>pixel-level fusion</i> pada area yang secara visual dan spektral cenderung stabil.
            </p>
            <div style="text-align: center; margin: 2rem 0;">
                <img src="../static/assets/img/kelurahan-pematang-sulur.jpg" 
                     alt="Visualisasi Kelurahan Pematang Sulur" 
                     style="width: 50%; border-radius: 8px;">
            </div>
            <p>
                <b>Kelurahan Pematang Sulur, Kecamatan Telanaipura, Kota Jambi</b> dipilih sebagai sampel <b>kawasan perkotaan homogen</b> untuk pengujian <i>pixel-level fusion</i> dalam penelitian ini.
            </p>    
            <br>
            <h4><b>Output Proses <i>Fusion</i> di Kawasan Perkotaan Homogen</b></h4>
            <div style="text-align: center; margin: 2rem 0;">
                <img src="../static/assets/img/urban-sensing-fusion-pemsul.png" 
                     alt="Output Fusion Kelurahan Pematang Sulur" 
                     style="width: 60%; border-radius: 8px; cursor: zoom-in;"
                     data-toggle="modal" data-target="#modalFusionHomogen">
            </div>
            <div class="fusion-card mt-4">
                <p style="margin: 0;">
                    Secara visual, <i>pixel-level fusion</i> dengan metode Urban Sensing Brovey menunjukkan distorsi spektral paling tinggi, sedangkan metode IHS, PCS, dan GS menghasilkan tone warna yang relatif serupa satu sama lain. 
                    Meskipun perbedaan antar hasil fusion tidak terlalu mencolok, secara umum <b>proses <i>fusion</i> pada wilayah homogen</b> sangat membantu dalam <b>memperjelas batas spasial dan fitur permukaan wilayah perkotaan</b>.
                </p>
            </div>
            
            <br>

            <h4><b>Evaluasi Kuantitatif Hasil <i>Fusion</i> Kawasan Perkotaan Homogen</b></h4>
            <div class="table-responsive">
                <table class="table table-bordered border-0 table-hover mt-4" style="border-collapse: collapse;">
                    <thead class="thead-light">
                        <tr style="border-bottom: 2px solid #dee2e6;">
                        <th>Metode</th>
                        <th>PSNR</th>
                        <th>SSIM</th>
                        <th>SAM</th>
                        <th>ERGAS</th>
                        <th>UIQI</th>
                        </tr>
                    </thead>
                    <tbody style="border-top: none;">
                        <tr style="background-color: #d4edda;"> <!-- green highlight -->
                        <td><b>Urban Sensing Fusion Brovey</b></td>
                        <td><b>17.9266</b></td>
                        <td><b>0.6235</b></td>
                        <td><b>0.4550</b></td>
                        <td><b>103.5818</b></td>
                        <td><b>0.5906</b></td>
                        </tr>
                        <tr>
                        <td>Urban Sensing Fusion IHS</td>
                        <td>12.3396</td>
                        <td>0.5367</td>
                        <td>0.4651</td>
                        <td>118.4932</td>
                        <td>0.4830</td>
                        </tr>
                        <tr>
                        <td>Urban Sensing Fusion PCS</td>
                        <td>12.2401</td>
                        <td>0.5349</td>
                        <td>0.4662</td>
                        <td>118.7224</td>
                        <td>0.4818</td>
                        </tr>
                        <tr>
                        <td>Urban Sensing Fusion Gram-Schmidt</td>
                        <td>12.2787</td>
                        <td>0.5356</td>
                        <td>0.4654</td>
                        <td>118.6137</td>
                        <td>0.4823</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="fusion-card">
            <p style="margin: 0;">
                <b>Urban Sensing Fusion Brovey</b> memberikan hasil evaluasi terbaik di semua metrik, meskipun secara visual tampak paling berbeda dari citra aslinya. Hasil ini justru menunjukkan <b>struktur dan kemiripan citra</b> yang lebih baik dibanding metode lainnya.
            </p>
            </div>
        </div>

        <!-- Konten HETEROGEN -->
        <div id="kontenHeterogen" style="display: none;">
            <p>
                <b>Wilayah perkotaan heterogen</b> pada penelitian ini merujuk pada kawasan dengan 
                <b>komposisi tutupan lahan yang beragam secara spasial</b>, mencakup elemen seperti 
                <b>permukiman, badan air</b>, serta <b>vegetasi</b>.
            </p>
            <div style="text-align: center; margin: 2rem 0;">
                <img src="../static/assets/img/kelurahan-legok.png" 
                     alt="Visualisasi Kelurahan Legok" 
                     style="width: 60%; border-radius: 8px;">
            </div>
            <p>
                <b>Kelurahan Legok, Kecamatan Danau Sipin, Kota Jambi</b> dipilih sebagai sampel <b>kawasan perkotaan heterogen</b> untuk pengujian <i>pixel-level fusion</i> dalam penelitian ini.
            </p>  
            <h4><b>Output Proses <i>Fusion</i> di Kawasan Perkotaan Heterogen</b></h4>
            <div style="text-align: center; margin: 2rem 0;">
                <img src="../static/assets/img/urban-sensing-fusion-legok.png" 
                     alt="Output Fusion Kelurahan Legok" 
                     style="width: 60%; border-radius: 8px; cursor: zoom-in;"
                     data-toggle="modal" data-target="#modalFusionHeterogen">
            </div>
            <div class="fusion-card">
                <p style="margin: 0;">
                    Secara umum, <b>warna dan tone</b> untuk tiap objek pada <b>setiap metode <i>fusion</i> mirip</b>, dengan <b>perbedaan utama pada kontras</b>. <i>Menariknya, pada kawasan heterogen, perbedaan ini menjadi lebih terlihat</i> karena variasi objek yang kompleks, sehingga hasil <i>fusion</i> semakin berperan dalam <b>membedakan fitur-fitur permukaan</b> secara lebih jelas. Metode <b>Urban Sensing Fusion Brovey</b> menunjukkan <b>distorsi visual paling tinggi</b>, sedangkan <b>PCS</b> dan <b>Gram–Schmidt</b> menghasilkan <b>output fusion yang mirip</b> dan lebih stabil secara tampilan.
                </p>
            </div>
            <br>
            
            <h4><b>Kebermanfaatan Hasil <i>Fusion</i> di Kawasan Perkotaan Heterogen</b></h4>
                <div style="text-align: center; margin: 2rem 0;">
                    <img src="../static/assets/img/inspeksi-visual-fusion-legok.png" 
                        alt="Inspeksi Visualisasi Kelurahan Legok" 
                        style="width: 70%; border-radius: 8px;">
                </div>
                <div class="fusion-card">
                    <p style="margin: 0;">
                        Pada <b>wilayah perkotaan heterogen</b>, <i>peran proses fusion menjadi semakin terlihat signifikan</i>. Kompleksitas tutupan lahan yang tinggi membuat <b>perbedaan nilai spektral</b> antar objek sulit ditangkap oleh citra asli, sehingga <b>hasil fusion berkontribusi lebih besar dalam memperjelas batas dan karakteristik tiap objek</b>.
                    </p>
                </div>

            <br>
            <h4><b>Evaluasi Kuantitatif Hasil <i>Fusion</i> Kawasan Perkotaan Heterogen</b></h4>
            <div class="table-responsive">
                <table class="table table-bordered border-0 table-hover mt-4" style="border-collapse: collapse;">
                <thead class="thead-light">
                    <tr style="border-bottom: 2px solid #dee2e6;">
                    <th>Metode</th>
                    <th>PSNR</th>
                    <th>SSIM</th>
                    <th>SAM</th>
                    <th>ERGAS</th>
                    <th>UIQI</th>
                    </tr>
                </thead>
                <tbody style="border-top: none;">
                    <tr>
                    <td><b>Urban Sensing Fusion Brovey</b></td>
                    <td style="background-color: #d4edda;"><b>18.5279</b></td>
                    <td style="background-color: #d4edda;"><b>0.6542</b></td>
                    <td>0.7039</td>
                    <td style="background-color: #d4edda;"><b>110.3973</b></td>
                    <td style="background-color: #d4edda;"><b>0.6144</b></td>
                    </tr>
                    <tr>
                    <td>Urban Sensing Fusion IHS</td>
                    <td>11.6839</td>
                    <td>0.5595</td>
                    <td style="background-color: #d4edda;"><b>0.6609</b></td>
                    <td>122.8015</td>
                    <td>0.4986</td>
                    </tr>
                    <tr>
                    <td>Urban Sensing Fusion PCS</td>
                    <td>12.8250</td>
                    <td>0.5834</td>
                    <td>0.6750</td>
                    <td>120.2472</td>
                    <td>0.5261</td>
                    </tr>
                    <tr>
                    <td>Urban Sensing Fusion Gram-Schmidt</td>
                    <td>12.3937</td>
                    <td>0.5746</td>
                    <td>0.6706</td>
                    <td>121.3375</td>
                    <td>0.5150</td>
                    </tr>
                </tbody>
                </table>
            </div>

            <div class="fusion-card">
                <p>
                    Metode <b>Brovey</b> unggul dalam hal <b>kesesuaian struktur, kontras, dan luminansi</b> terhadap citra referensi, ditunjukkan oleh nilai <b>PSNR</b>, <b>SSIM</b>, <b>ERGAS</b>, dan <b>UIQI</b> yang paling tinggi. Namun, metode ini juga menghasilkan <b>deviasi spektral terbesar</b> berdasarkan nilai <b>SAM</b>, yang justru lebih rendah diperoleh oleh <b>metode IHS</b>.
                </p>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- MODAL FUSION HOMOGEN -->
<div class="modal fade" id="modalFusionHomogen" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content custom-modal">
      <button type="button" class="close-btn" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <img src="../static/assets/img/urban-sensing-fusion-pemsul.png" alt="Zoom Fusion Homogen" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<!-- MODAL FUSION HETEROGEN-->
<div class="modal fade" id="modalFusionHeterogen" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content custom-modal">
      <button type="button" class="close-btn" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <img src="../static/assets/img/urban-sensing-fusion-legok.png" alt="Zoom Fusion Legok" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/components/layout.php';
?>
