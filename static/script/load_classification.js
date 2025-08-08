// 📦 Buat fungsi initMap jadi global (bisa dipanggil dari PHP atau script lain)
window.initMap = function (divId, basePath, suffix = "") {
  const baseTile = "https://services.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}";

  const rasterConfigs = [
    { name: "S1", key: "s1" },
    { name: "S2", key: "s2" },
    { name: "Brovey", key: "brovey" },
    { name: "IHS", key: "ihs" },
    { name: "PCS", key: "pcs" },
    { name: "GS", key: "gs" }
  ];

  const map = L.map(divId).setView([-1.6, 103.6], 12);
  L.tileLayer(baseTile, { attribution: "Tiles &copy; Esri" }).addTo(map);

  const overlays = new Map();

  const loadPromises = rasterConfigs.map(config => {
    const filename = `lulc_${config.key}${suffix}.tif`;
    return fetch(basePath + filename)
      .then(res => res.arrayBuffer())
      .then(arrayBuffer => parseGeoraster(arrayBuffer))
      .then(georaster => {
        const layer = new GeoRasterLayer({
          georaster,
          opacity: 1,
          resolution: 128
        });
        overlays.set(`LULC ${config.name}`, layer);
        return layer;
      })
      .catch(err => {
        console.error(`Gagal memuat ${filename}`, err);
        return null;
      });
  });

  Promise.all(loadPromises).then(layers => {
    let firstBounds = null;
    layers.forEach(layer => {
      if (layer) {
        layer.addTo(map);
        if (!firstBounds) {
          firstBounds = layer.getBounds();
        }
      }
    });

    if (firstBounds && firstBounds.isValid()) {
      map.fitBounds(firstBounds);
    }

    const orderedOverlayObject = {};
    ["S1", "S2", "Brovey", "IHS", "PCS", "GS"].forEach(key => {
      const label = `LULC ${key}`;
      if (overlays.has(label)) {
        orderedOverlayObject[label] = overlays.get(label);
      }
    });

    L.control.layers(null, orderedOverlayObject, { collapsed: false }).addTo(map);

    const legend = L.control({ position: "bottomleft" });
    legend.onAdd = function () {
      const div = L.DomUtil.create("div", "info legend");
      div.innerHTML += "<h5>Kelas LULC</h5>";
      div.innerHTML += '<i style="background: #FFA500"></i> Bareland<br>';
      div.innerHTML += '<i style="background: #FF6347"></i> Built-up<br>';
      div.innerHTML += '<i style="background: #4682B4"></i> Lake<br>';
      div.innerHTML += '<i style="background: #006400"></i> Other Vegetation<br>';
      div.innerHTML += '<i style="background: #98FB98"></i> Paddy Fields<br>';
      div.innerHTML += '<i style="background: #FFFF00"></i> River<br>';
      return div;
    };
    legend.addTo(map);
  });
};

// 🧭 Navigasi antar skenario dengan hash (#cloudfree / #cloudy)
document.addEventListener("DOMContentLoaded", function () {
  const container = document.getElementById("classificationContainer");
  const btnCloudFree = document.getElementById("btnCloudFree");
  const btnCloudy = document.getElementById("btnCloudy");

  function setActiveButton(cloudFreeActive) {
    if (cloudFreeActive) {
      btnCloudFree?.classList.add("active");
      btnCloudy?.classList.remove("active");
    } else {
      btnCloudy?.classList.add("active");
      btnCloudFree?.classList.remove("active");
    }
  }

  function loadCloudfree(setHash = true) {
    if (!container) return;
    container.innerHTML = "Loading...";
    fetch("../api/urban-classification-cloudfree.php")
      .then(res => res.text())
      .then(html => {
        container.innerHTML = html;
        window.initMap("mapNonCloudy", "/urban-sensing-fusion-frontend/static/assets/img/non-cloudy-classification-raster/");
        if (setHash) window.location.hash = "cloudfree";
      });
  }

  function loadCloudy(setHash = true) {
    if (!container) return;
    container.innerHTML = "Loading...";
    fetch("../api/urban-classification-cloudy.php")
      .then(res => res.text())
      .then(html => {
        container.innerHTML = html;
        window.initMap("mapCloudy", "/urban-sensing-fusion-frontend/static/assets/img/cloudy-classification-raster/", "_berawan");
        if (setHash) window.location.hash = "cloudy";
      });
  }

  // 🧩 Tombol manual switching
  btnCloudFree?.addEventListener("click", function () {
    setActiveButton(true);
    loadCloudfree();
  });

  btnCloudy?.addEventListener("click", function () {
    setActiveButton(false);
    loadCloudy();
  });

  // 🔄 Cek hash untuk load awal
  const currentHash = window.location.hash.replace("#", "");
  if (currentHash === "cloudy") {
    setActiveButton(false);
    loadCloudy(false); // jangan set ulang hash
  } else {
    setActiveButton(true);
    loadCloudfree(false);
  }
});
