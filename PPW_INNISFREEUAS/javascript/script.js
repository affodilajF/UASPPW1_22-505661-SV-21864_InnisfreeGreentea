// toggle navbar active
const navbarN = document.querySelector(".navbar-n");
// ketika menu di-click
document.querySelector("#menu").onclick = () => {
  navbarN.classList.toggle("active");
};

// klik diluar sidebar untuk menghlangkan nav
const menu = document.querySelector("#menu");

document.addEventListener("click", function (e) {
  if (!menu.contains(e.target) && !navbarN.contains(e.target)) {
    navbarN.classList.remove("active");
  }
});

function scrollToSection(sectionId) {
  const section = document.querySelector(sectionId);
  if (section) {
    section.scrollIntoView({ behavior: "smooth" });
  }
}

// AJAXXX
// Mendapatkan semua elemen tautan dengan kelas "eye"
// var links = document.querySelectorAll(".eye");

// // Fungsi yang akan dijalankan saat tautan diklik
// function handleClick(event) {
//   event.preventDefault(); // Mencegah perilaku default pengalihan halaman

//   // Mendapatkan ID dari atribut data pada tautan yang diklik
//   var id = this.getAttribute("data-id");

//   // Mengirim data ID ke file PHP yang akan memprosesnya
//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", "productPage.php"); // Ganti 'process.php' dengan URL skrip PHP yang akan memproses data
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4 && xhr.status === 200) {
//       // Tangani respons dari server di sini
//       var response = xhr.responseText;
//       console.log(response); // Menampilkan respons di konsol browser
//       // ...
//     }
//   };
//   xhr.send("id=" + id); // Mengirim data ID ke skrip PHP
// toggleModal();

// Lakukan operasi yang diinginkan setelah mengirim data ke server
// ...
// }

// Menambahkan event listener untuk setiap tautan
// for (var i = 0; i < links.length; i++) {
//   links[i].addEventListener("click", handleClick);
// }

// function toggleModal() {
//   const modalSec = document.querySelector("#item-detail-modal");
//   modalSec.classList.add("active"); // Tambahkan kelas 'active' pada elemen modal
//   modalSec.setAttribute("id", "new-item-detail-modal"); // Ubah ID elemen menjadi "new-item-detail-modal"
// }

// function handleEyekClick(event) {
//   event.preventDefault(); // Mencegah perilaku default pengalihan halaman

//   document.getElementById("item-detail-modal").style.zIndex = "99";
// }

// MODAL BOX
// AMBIL MODAL

// document.addEventListener("DOMContentLoaded", function () {
//   var eyek = document.getElementById("eyek");
//   var modalSec = document.querySelector(".modal-sec");

//   eyek.addEventListener("click", function () {
//     modalSec.classList.add("active");
//   });
// });

// Modal Box
// Ambil elemen modal
// const itemDetailModal = document.querySelector("#item-detail-modal");

// // Ambil semua tombol detail
// const itemDetailButtons = document.querySelectorAll(".eyek");

// // Loop melalui setiap tombol detail
// itemDetailButtons.forEach((button) => {
//   button.addEventListener("click", (e) => {
//     e.preventDefault();
//     itemDetailModal.classList.toggle("active");
//   });
// });

// Function to toggle the modal

// const eyeButtons = document.querySelector(".eyek");
// eyeButtons.forEach((button) => {
//   button.addEventListener("click", (e) => {
//     document.querySelector("#item-detail-modal").style.display = "flex";
//     e.preventDefault();
//   });
// });

// const eyeButtons = document.querySelectorAll(".eye");
// const modalSec = document.querySelector("#item-detail-modal");

// eyeButtons.forEach((button) => {
//   button.addEventListener("click", (e) => {
//     modalSec.classList.toggle("active");
//     e.preventDefault();
//   });
// });

// const itemDetailModal = document.querySelector("#item-detail-modal");
// // // // ambil tombol detailnya
// const itemDetailButton = document.querySelectorAll(".eyek");

// itemDetailButton.onclick = (e) => {
//   // itemDetailModal.computedStyleMap.display = "flex";
//   itemDetailModal.classList.toggle("active");
//   e.preventDefault();
// };

// document.querySelectorAll(".eyek").onclick = (e) => {
//   document.querySelector("#item-detail-modal").style.display = "flex";
//   e.preventDefault();
// };
// const itemDetailButtons = document.querySelectorAll(".eyek");
// const itemDetailModal = document.getElementById("item-detail-modal");

// button.addEventListener("click", function (e) {
//   e.preventDefault();
//   itemDetailButtons.classList.add("active");
// });

// function onSubmitForm(event) {
//   // Menghentikan resubmission data
//   event.preventDefault();

//   // Melakukan operasi AJAX jika perlu
//   // ...

//   // Memuat ulang halaman menggunakan JavaScript
//   location.reload();
//   return false;
// }

// ngebuat efek sticky soalnya position:sticky egk bs
// window.addEventListener("scroll", function () {
//   const navbar = document.querySelector(".navbar");
//   if (window.scrollY > 0) {
//     navbar.classList.add("scrolled");
//   } else {
//     navbar.classList.remove("scrolled");
//   }
// });

// window.addEventListener("scroll", function () {
//   var navbar = document.querySelector(".navbar");
//   var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

//   if (scrollTop >= 0.5 * 16) {
//     // Mengubah 0.5rem menjadi piksel (1rem = 16px)
//     navbar.style.top = "0";
//   } else {
//     navbar.style.top = "5rem";
//   }
// });
