let overlayLayers = {};
let currentLayerControl = null;

// Inisialisasi Leaflet Map
const map = L.map('map').setView([-2.5, 117.5], 4);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 18,
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

document.addEventListener("DOMContentLoaded", function () {
  const fullPageLoader = document.getElementById("fullPageLoader");
  fullPageLoader.style.display = "none";

  const fuseButton = document.getElementById("fuseButton");
  const downloadArea = document.getElementById("downloadArea");

  fuseButton.addEventListener("click", async function () {
    const rgbInput = document.getElementById("rgbInput").files[0];
    const sarInput = document.getElementById("sarInput").files[0];

    if (!rgbInput || !sarInput) {
      alert("Both RGB and SAR images must be selected.");
      return;
    }

    const checkedMethods = Array.from(document.querySelectorAll('#methodCheckboxes input:checked'))
      .map(cb => cb.value);

    if (checkedMethods.length === 0) {
      alert("Please select at least one fusion method.");
      return;
    }

    const formData = new FormData();
    formData.append("rgb_file", rgbInput);
    formData.append("sar_file", sarInput);
    formData.append("methods", checkedMethods.join(","));

    try {
      fullPageLoader.style.display = "flex";

      const response = await fetch("https://putrisekarayuuu123-urban-sesing-fusion-be.hf.space/process", {
        method: "POST",
        body: formData
      });

      if (!response.ok) {
        const errorText = await response.text();
        alert("Error: " + errorText);
        return;
      }

      const result = await response.json();
      console.log("Hasil JSON:", result);

      // Reset download area once
      if (downloadArea) {
        downloadArea.innerHTML = "";
      }

      // Clear existing overlays
      Object.values(overlayLayers).forEach(layer => {
        if (map.hasLayer(layer)) map.removeLayer(layer);
      });
      overlayLayers = {};

      // Remove old layer control
      if (currentLayerControl) {
        map.removeControl(currentLayerControl);
        currentLayerControl = null;
      }

      // Add new overlays
      if (result.previews && result.previews.length > 0) {
        result.previews.forEach(p => {
          const previewUrl = "https://putrisekarayuuu123-urban-sesing-fusion-be.hf.space" + p.url;
          const overlay = L.imageOverlay(previewUrl, p.bounds, { opacity: 1.0 });
          overlay.addTo(map);
          overlayLayers = {
            [p.method.toUpperCase()]: overlay,
            ...overlayLayers
          };
        });

        currentLayerControl = L.control.layers(null, overlayLayers).addTo(map);
        map.fitBounds(result.previews[0].bounds);
      } else {
        alert("No preview layers available.");
      }

      // Add ZIP download button
      if (result.zip_url) {
        const zipLink = document.createElement("a");
        zipLink.href = "https://putrisekarayuuu123-urban-sesing-fusion-be.hf.space" + result.zip_url;
        zipLink.classList.add("btn", "btn-info", "mt-3", "mr-3", "d-flex", "align-items-center", "justify-content-center", "w-100");
        zipLink.setAttribute("download", "");

        // Tambahkan ikon dan teks sekaligus
        zipLink.innerHTML = `<i class="fa fa-download mr-2"></i> Download All Results (ZIP)`;

        downloadArea.appendChild(zipLink);
        console.log("ZIP button added with URL:", result.zip_url);
      } else {
        console.warn("zip_url not found in response.");
      }

    } catch (error) {
      console.error("Unexpected error:", error);
      alert("Something went wrong.");
    } finally {
      fullPageLoader.style.display = "none";
    }
  });

  // Update file name label
  document.querySelectorAll('.custom-file-input').forEach(function (input) {
    input.addEventListener('change', function () {
      const fileName = this.files[0] ? this.files[0].name : "Choose file";
      this.nextElementSibling.innerHTML = fileName;
    });
  });
});
