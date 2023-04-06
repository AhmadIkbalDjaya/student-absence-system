// Dapatkan elemen select dan span
const tahunAjaranSelect = document.getElementById("tahun-ajaran");
const tahunAjaranTerpilih = document.getElementById("tahun-ajaran-terpilih");
const tahunAjaranBerikutnya = document.getElementById("tahun-ajaran-berikutnya");

// Tambahkan event listener untuk perubahan nilai di select
tahunAjaranSelect.addEventListener("change", function() {
  // Dapatkan nilai yang dipilih dan ubah ke tipe integer
  const tahunAjaranTerpilihValue = parseInt(tahunAjaranSelect.value);
  
  // Jika nilai kosong, reset nilai pada elemen span
  if (tahunAjaranTerpilihValue === NaN) {
    tahunAjaranTerpilih.innerHTML = "-";
    tahunAjaranBerikutnya.innerHTML = "-";
  } else {
    // Ubah nilai pada elemen span
    tahunAjaranTerpilih.innerHTML = tahunAjaranTerpilihValue + "/" + (tahunAjaranTerpilihValue + 1);
    tahunAjaranBerikutnya.innerHTML = (tahunAjaranTerpilihValue + 1).toString();
  }
});
