// script.js

// Fungsi untuk konfirmasi logout
function confirmLogout() {
    return confirm("Apakah Anda yakin ingin keluar?");
}

// Fungsi untuk memvalidasi form secara umum
function validateForm(form) {
    let isValid = true;
    form.querySelectorAll('input').forEach(input => {
        if (input.required && !input.value.trim()) {
            input.style.borderColor = 'red'; // Menandai input yang belum diisi
            isValid = false;
        } else {
            input.style.borderColor = ''; // Menghapus border merah jika valid
        }
    });
    return isValid;
}

// Event listener untuk tombol logout
document.querySelector("#logoutButton")?.addEventListener("click", function(event) {
    if (!confirmLogout()) {
        event.preventDefault(); // Membatalkan logout jika pengguna tidak yakin
    }
});

// Menambahkan validasi form pada halaman tertentu
document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", function(event) {
        if (!validateForm(form)) {
            event.preventDefault(); // Mencegah form untuk disubmit jika validasi gagal
        }
    });
});
