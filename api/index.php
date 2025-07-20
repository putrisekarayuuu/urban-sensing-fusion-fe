<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../static/assets/img/logo_stis.png">
	<title>Urban Sensing Fusion</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
	<link href="../static/assets/css/mediumish.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<style>
		/* Optional: custom warna link aktif */
		.nav-link.active {
			color: #007bff !important;
			font-weight: bold;
		}
		h2 {
			color: #183059;
		}
	</style>
</head>

<body>

<?php include __DIR__ . '/components/header.php'; ?>

<!-- Begin of Header Image -->
<section style="background-image: url('../static/assets/img/aerial-view-of-urban-landscape.jpg'); background-size: cover; background-position: center; position: relative; min-height: 95vh;">

    <!-- Semi transparent overlay -->
    <div style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,0.6); z-index: 1;"></div>

    <!-- Research Title -->
    <div class="research-title d-flex align-items-center justify-content-start text-white text-start" style="position: relative; z-index: 2; min-height: 95vh; padding: 2rem;">
		<div class="col-md-10 col-lg-8 px-3 pt-5">
			<h1 class="display-4 mb-4" style="font-weight: 700; ">
				Pemanfaatan <i>Data Engineering Multi-Source Remote Sensing</i> dengan <i>Data Fusion</i> untuk Kawasan Perkotaan
			</h1>
			<p class="fs-6" style="font-weight: 500;">
				Disusun oleh Putri Sekar Ayu (4SI1, 222112294); dibimbing oleh Dr. Eng. Arie Wahyu Wijayanto, SST., M.T.
			</p>
		</div>
	</div>

</section>
<!-- End of Header Image -->


<!-- Begin Article
================================================== -->
<div class="container px-5">
	<div class="row">

		<!-- Begin Post -->
		<div class="col-md-12 col-md-offset-2 col-xs-12">

			<!-- Begin Post Content -->
			<div class="article-post">

				<div class="remote-sensing-introduction" style="padding-top: 1.5rem;">
					<h2 class="section-title"><b>The Era of Massive Remote Sensing Data</b></h2>
					
					<figure style="text-align: center; margin: 2rem auto;">
						<img src="../static/assets/img/earth-observation.gif" alt="Earth Observation Animation" style="width: 100%; max-width: 600px; display: block; margin: 0 auto;">
						
						<div style="max-width: 600px; margin: 0 auto; font-size: 11px; color: #555; text-align: justify;">
							<figcaption style="margin-top: 0.5rem;">Gambar 1. Ilustrasi Pengamatan Bumi oleh Satelit Sentinel-2</figcaption>
							<figcaption>Sumber: European Space Agency (ESA)</figcaption>
						</div>
					</figure>
					<h4>
						<b>
							Remote Sensing as A Part of Geospatial Big Data
						</b>
					</h4>
					<p>
						Data remote sensing merupakan salah satu bagian dari <i>geospatial big data</i>, yang terus berkembang dengan volume data yang sangat masif hingga saat ini, di mana jumlahnya terus bertambah dan bahkan dapat mencapai ukuran <i>terabyte</i> setiap harinya. 
						Tak hanya besar dalam jumlah, data ini juga sangat beragam karena dihasilkan oleh berbagai jenis sensor dengan variasi dalam format, resolusi, dan waktu akuisisi. Kecepatan akuisisi yang semakin tinggi, bersama dengan perbedaan tingkat ketelitian, akurasi, dan kondisi pengambilan data, membentuk kompleksitas karakteristik data secara keseluruhan. 
						Karakteristiknya yang kaya, kompleks, dan beragam menjadikan data ini memiliki potensi yang sangat besar untuk mendukung berbagai riset dan aplikasi lintas bidang, bahkan telah banyak dimanfaatkan dalam berbagai konteks penelitian saat ini. 
					</p>
				</div>

				<div class="data-engineering-introduction"  style="padding-top: 1.5rem;">
					<h2 class="section-title"><b>Data Engineering in Remote Sensing</b></h2>
					<br>
					<h4>
						<b>
							The Importance of Pre-Processing in Remote Sensing
						</b>
					</h4>
					<p>
						Karena kompleksitas dan heterogenitasnya yang tinggi, terutama untuk data multisumber, <i>geospatial big data</i> seperti data <i>remote sensing</i> sangat dipengaruhi oleh berbagai faktor selama proses akuisisi, seperti kondisi atmosfer, sudut pencitraan, dan perbedaan karakteristik sensor. 
						Faktor-faktor ini dapat menurunkan kualitas citra yang dikumpulkan dan menghasilkan data yang tidak konsisten antar waktu atau antar sensor. 
						Oleh karena itu, tahapan <i>preprocessing</i> yang tepat sangat diperlukan sebelum data digunakan dalam proses analisis, guna memastikan hasil yang diperoleh tetap akurat dan dapat diandalkan.
					</p>

					<h4>
						<b>
							The Perspective of Data Engineering in Remote Sensing
						</b>
					</h4>

				<div class="data-engineering-container" style="display: flex; max-width: 1200px; margin: 30px auto; gap: 2rem; align-items: center;" class="data-engineering-container">
					<div style="flex: 0 0 50%;">
						<img src="../static/assets/img/Data Engineering Stream.png" alt="Data Engineering Stream" style="width: 100%; height: auto; display: block; max-width:max-content;">
						<div style="font-size: 12px; color: #555; text-align: center; margin-top: 0.5rem;">
						Gambar 2. Data Engineering Stream Illustration
						</div>
					</div>

					<div style="flex: 1; min-width: 0;">
						<p>
						Kebutuhan akan <i>preprocessing</i> yang terstruktur sejalan dengan prinsip <i>data engineering</i>, yaitu bagaimana data dikembangkan dan disiapkan agar siap dianalisis. Mengingat kompleksitas <i>remote sensing big data</i>, proses pengelolaan, penyimpanan, dan integrasinya memerlukan arsitektur komputasi yang andal, <i>pipeline</i> yang efisien, serta tahapan seperti harmonisasi data, preprocessing lanjutan, analitik, dan standar interoperabilitas untuk memastikan integrasi data yang efektif lintas <i>platform</i> akuisisi data.
						</p>
					</div>
				</div>

				<p>
					Tahapan-tahapan <i>preprocessing</i> ini merupakan komponen krusial yang turut menentukan kualitas dan keandalan data yang digunakan pada proses berikutnya. Tanpa persiapan data yang matang, proses analisis yang dijalankan berisiko menghasilkan output yang tidak akurat maupun tidak konsisten dengan kondisi sebenarnya. 
				</p>
				<p>
					Beberapa tahapan preprocessing yang umum dilakukan meliputi koreksi atmosferik, koreksi topografi, <i>coregistration</i>, koreksi radiometrik, koreksi geometrik, serta tahapan lanjutan seperti <b><i>data fusion</i></b> yang berguna untuk memperkaya informasi dari data, khususnya ketika mengolah data yang berasal dari berbagai sumber dan sensor yang berbeda.
				</p>

				<div class="data-fusion-introduction" style="padding-top: 2rem;">
					<h2 class="section-title"><b>Multi-Source Remote Sensing Data Fusion</b></h2>
					<br>
					<h4>
						<b>
							The Need for Fusion: No Single Sensor Tells the Whole Story
						</b>
					</h4>
					<p class="pt-2"> <b>Seperti yang telah diketahui</b>, <i>remote sensing</i> memiliki peran penting dalam kajian analisis geospasial. Salah satu definisinya dijelaskan oleh Lillesand & Kiefer (2015) sebagai berikut:</p>
					<blockquote>
						Remote sensing merupakan teknik untuk memperoleh informasi mengenai suatu objek menggunakan instrumen berupa sensor yang dipasang pada wahana, seperti satelit, pesawat, atau drone, tanpa kontak langsung terhadap objek yang diteliti. 
					</blockquote>
					<p>
						Satelit merupakan salah satu wahana yang sering dimanfaatkan dalam remote sensing dan produk yang dihasilkan dari teknik ini dikenal sebagai citra satelit.</p>
					</p>
					<p>
						Secara umum, sensor satelit terbagi menjadi dua jenis: pasif dan aktif. Sensor pasif tidak memancarkan energi sendiri, melainkan merekam pantulan sinar matahari. Data yang dihasilkan kaya secara spektral, namun sensitif terhadap cuaca. Sebaliknya, sensor aktif memancarkan energinya sendiri dan merekam pantulan dari permukaan bumi, sehingga lebih andal dalam segala kondisi dan unggul untuk memantau struktur serta topografi. Pemilihan sensor bergantung pada kebutuhan dan karakteristik citra, karena masing-masing memiliki keunggulan tersendiri.
					</p>
					<p>
						Sebagai ilustrasi, berikut disajikan perbandingan visual antara dua jenis sensor yang sering digunakan dalam konteks citra satelit, yaitu sensor aktif <i>Synthetic Aperture Radar</i> dan sensor pasif optik. Kedua citra tersebut diambil di wilayah yang sama. 
					</p>
					<figure>
						<img src="../static/assets/img/Perbandingan Visual Sensor Sentinel-1 dan Sentinel-2 [AWAN].png" style="width: 100%; max-width: 600px; display: block; margin: 0 auto;">
						<figcaption style="font-size: 12px; color: #555; margin-top: 0.5rem; text-align: center;">
							Gambar 3. Perbandingan visual antara (a) citra SAR Sentinel-1 Level-1 GRD dan (b) citra optik Sentinel-2 MSI Level-2A pada kondisi cuaca berawan di area dan tanggal pengamatan yang sama.
						</figcaption>
					</figure>
					<p>
						Berdasarkan ilustrasi tersebut, dapat diamati adanya trade-off dalam penggunaan masing-masing sensor. Citra satelit Synthetic Aperture Radar yang ditunjukkan pada gambar (a) mampu memberikan informasi struktur objek yang lebih detail dan tetap dapat merekam dengan jelas meskipun dalam kondisi cuaca buruk atau berawan. 
						Sebaliknya, citra satelit optik yang ditunjukkan pada gambar (b) menyajikan detail spektral yang lebih kaya, namun kualitas visualnya secara keseluruhan lebih rentan terhadap gangguan cuaca buruk, seperti tutupan awan, sehingga objek di bawahnya tidak dapat teramati dengan jelas.
					</p>
					<p>
						Lebih lanjut, berikut ini disajikan pula ilustrasi terkait penggunaan citra SAR dan Optik pada kawasan perkotaan sekitar Kota Jambi dan Kabupaten Muaro Jambi dalam skala pengamatan yang luas. 
					</p>
					<figure>
						<img src="../static/assets/img/Perbandingan Visual Sensor Sentinel-1 dan Sentinel-2 [DIFERENSIASI OBJEK].png" style="width: 100%; max-width: 600px; display: block; margin: 0 auto;">
						<figcaption style="font-size: 12px; color: #555; margin-top: 0.5rem; text-align: center;">
							Gambar 4. Perbedaan karakteristik pencitraan antara sensor citra (a) citra SAR Sentinel-1 Level-1 GRD dan (b) citra optik Sentinel-2 MSI Level-2A pada area dan tanggal pengamatan yang sama.
						</figcaption>
					</figure>
					<p>
						Sebagaimana ditunjukkan pada ilustrasi di atas, membedakan objek dengan karakteristik spektral serupa pada citra optik menjadi tantangan karena respons spektralnya yang mirip, terlebih apabila objek-objek tersebut berada dalam jarak yang berdekatan dan citra yang digunakan memiliki resolusi spasial yang kurang memadai.  Sebaliknya, citra SAR mampu membedakan objek-objek tersebut secara lebih jelas melalui variasi nilai backscatter, meskipun interpretasi visualnya cukup sulit dilakukan. 
					</p>
					<p>
						Keterbatasan masing-masing jenis sensor, sebagaimana dijelaskan sebelumnya, menunjukkan bahwa tidak ada satu sensor pun yang dapat menyediakan seluruh informasi secara akurat dan konsisten dalam berbagai kondisi pengamatan. Untuk memanfaatkan informasi komplementer dari berbagai sumber citra, diperlukan pengintegrasian data multisumber, yang sering disebut sebagai <i>remote sensing image fusion</i> atau lebih umum <i>data fusion</i>, guna menghasilkan citra yang lebih mudah diinterpretasi, kaya akan informasi dan lebih bermakna untuk digunakan pada proses analisis lanjutan (Pohl & van Genderen, 2016).
					</p>
					<br>
					<h4>
						<b>
							Understanding Remote Sensing Image Fusion
						</b>
					</h4>
					<figure>
						<img src="../static/assets/img/Processing Level of RSIF.png" style="width: 100%; max-width: 600px; display: block; margin: 0 auto;">
						<figcaption style="font-size: 12px; color: #555; margin-top: 0.5rem; text-align: center;">
							Gambar 5. Pembagian level <i>Remote Sensing Image Fusion</i> (Pohl & van Genderen, 1998)
						</figcaption>
					</figure>
					<p>
						Secara umum, Remote Sensing Image Fusion diklasifikasikan ke dalam tiga level, yang didasarkan pada tingkatan input yang di-fusi, yaitu <i>pixel-level fusion</i>, <i>feature-level fusion</i>, dan <i>decision-level fusion</i> (Pohl & Van Genderen, 1998). 
					</p>
					<ol>
						<li style="margin-bottom: 10px;">
							<strong><i>Pixel Level Fusion</i></strong> Fusion dilakukan langsung terhadap dua atau lebih citra mentah dengan menggabungkan informasi pada tingkat piksel, sehingga menghasilkan citra gabungan yang mempertahankan informasi dari masing-masing sumber dan lebih fleksibel untuk berbagai jenis analisis.
						</li>
						<li style="margin-bottom: 10px;">
							<strong><i>Feature Level Fusion</i>:</strong> Fitur-fitur penting (tepi, bentuk, atau tekstur) diekstraksi terlebih dahulu dari masing-masing citra sumber, kemudian fitur-fitur tersebut digabungkan untuk membentuk feature map yang merepresentasikan informasi utama dari seluruh citra sumber. 
						<li style="margin-bottom: 10px;">
							<strong><i>Decision Level Fusion</i>:</strong> Identifikasi atau klasifikasi dilakukan secara terpisah pada masing-masing citra sumber, kemudian hasil keputusan dari tiap proses identifikasi tersebut digabungkan untuk memperoleh keputusan akhir.
						</li>
					</ol>
					<p>
						Meskipun proses <i>data fusion</i> berpotensi menyebabkan hilangnya sebagian informasi dari citra sumber, hasil akhirnya justru memberikan nilai tambah melalui penyajian informasi yang lebih terpadu dan bermakna. Bahkan, Zhang (2010) turut menyatakan bahwa:
					</p>
					<blockquote>
						Penggabungan citra multisumber dapat dianggap sebagai solusi utama untuk mengoptimalkan ekstraksi informasi dari data penginderaan jauh (<i>remote sensing</i>)
					</blockquote>
					<br>

					<h2>
						<b>
							Research Focuses
						</b>
					</h2>
					<div style="display: flex; max-width: 1200px; margin: 30px auto; gap: 1rem; align-items: center;" class="data-engineering-container">
						<div style="flex: 0 0 30%; text-align: center;">
							<img src="../static/assets/img/urban-remote-sensing.png" alt="Urban Remote Sensing Illustration" style="width: 80%; height: auto; display: block; margin: 0 auto;">
						</div>

						<div style="flex: 1; min-width: 0;">
							<p class="px-0 mx-0">
								Dengan memanfaatkan pendekatan <i>remote sensing image fusion</i>, selanjutnya penelitian ini akan dibahas secara lebih lanjut dalam konteks pemetaan wilayah perkotaan dengan menggabungkan citra satelit SAR dan optik. Penjelasan mengenai data, metode, serta hasil analisis akan disajikan pada halaman <b>Research</b>.
							</p>
							<a href="<?= 'research.php'; ?>" class="btn btn-primary">
								View Research Section
							</a>
						</div>
					</div>
					
				</div>
			</div>
			<!-- End Post Content -->

			<br>
			<!-- Begin Tags -->
			<div class="after-post-tags">
				<ul class="tags">
					<li><a href="#">Data Fusion</a></li>
					<li><a href="#">Sar-Optical Fusion</a></li>
					<li><a href="#">Sentinel-1</a></li>
					<li><a href="#">Sentinel-2</a></li>
					<li><a href="#">Urban Remote Sensing</a></li>
				</ul>
			</div>
			<!-- End Tags -->

		</div>
		<!-- End Post -->

	</div>
</div>
<!-- End Article
================================================== -->

<div class="hideshare"></div>

<!-- Begin Footer
================================================== -->
<div class="container">
	<div class="footer">
		<p class="pull-left">
			 Copyright &copy; 2025 Putri Sekar Ayu
		</p>
		<p class="pull-right">
			 Mediumish Theme by <a target="_blank" href="https://www.wowthemes.net">WowThemes.net</a>
		</p>
		<div class="clearfix">
		</div>
	</div>
</div>
<!-- End Footer
================================================== -->

<?php include __DIR__ . '/components/backToTop.html'; ?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/mediumish.js"></script>


</body>
</html>
