function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function showCamera() {
  // Menampilkan kamera-container
  document.getElementById('kamera-container').style.display = 'block';

  // Mengambil izin akses kamera
  navigator.mediaDevices.getUserMedia({ video: true })
      .then((stream) => {
          video.srcObject = stream;
      })
      .catch((err) => {
          console.error('Gagal mengakses kamera:', err);
      });
}