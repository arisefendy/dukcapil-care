// Sidebar Toggle
const hamburger = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");

if (hamburger && sidebar) {
  // Fungsi untuk toggle sidebar
  hamburger.addEventListener("click", () => {
    sidebar.classList.toggle("active");
  });

  // Otomatis set sidebar menjadi active ketika viewport !== mobile
  window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
      sidebar.classList.add("active");
    } else {
      sidebar.classList.remove("active");
    }
  });

  // Inisialisasi sidebar
  if (window.innerWidth > 768) {
    sidebar.classList.add("active");
  }
}

// Show password toggle
const inputPassword = document.querySelector("#inputPassword");
const togglePassword = document.querySelector("#togglePassword");

togglePassword.addEventListener("click", () => {
  const type =
    inputPassword.getAttribute("type") === "password" ? "text" : "password";
  inputPassword.setAttribute("type", type);

  if (type === "text") {
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  } else {
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
  }
});
