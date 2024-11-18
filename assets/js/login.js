// login.js

// Fungsi untuk validasi form login
function validateLoginForm(form) {
    const identifier = form.querySelector("#identifier");
    const password = form.querySelector("#password");
    let isValid = true;

    // Validasi email/username
    if (!identifier.value.trim()) {
        identifier.style.borderColor = 'red';
        isValid = false;
    } else {
        identifier.style.borderColor = '';
    }

    // Validasi password
    if (!password.value.trim()) {
        password.style.borderColor = 'red';
        isValid = false;
    } else {
        password.style.borderColor = '';
    }

    return isValid;
}

// Menambahkan event listener untuk form login
const loginForm = document.querySelector("#loginForm");
if (loginForm) {
    loginForm.addEventListener("submit", function(event) {
        if (!validateLoginForm(loginForm)) {
            event.preventDefault(); // Mencegah form submit jika validasi gagal
        }
    });
}

// Menampilkan pesan error jika ada
const errorMessage = document.querySelector(".error");
if (errorMessage) {
    setTimeout(() => {
        errorMessage.style.display = "none"; // Menyembunyikan pesan error setelah beberapa detik
    }, 5000);
}
