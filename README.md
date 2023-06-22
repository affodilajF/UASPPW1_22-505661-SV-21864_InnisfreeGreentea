# UASPPW1_22-505661-SV-21864_InnisfreeGreentea

Penjelasan Website

Innisfree Green Tea Website: Sebuah platform pemasaran yang menawarkan pengalaman transaksi skincare. Lebih khususnya, kami menyediakan produk skincare Innisfree varian Green Tea. Setelah menyelesaikan proses registrasi dan login, Anda akan dibawa ke halaman utama dengan dua tombol menu utama, "Shop Now" dan "GoPumpChallenge". Kedua tombol ini mencerminkan dua tujuan utama kami, yaitu menyediakan proses transaksi yang mudah dan mengadakan event-event yang diadakan oleh Innisfree. Website ini dilengkapi dengan fitur pencarian produk berdasarkan nama, filter produk berdasarkan parameter tertentu, dan keranjang belanja yang memungkinkan Anda menyimpan barang-barang yang ingin Anda beli.

1.	Design Rapi 
Sebelum memasuki dan sembari melakukan proses development, explorasi desain telah dilakukan. File figma dapat dilihat di https://www.figma.com/file/wTIBpLKu33flw2OTy2kjXt/innsfree-greentea?type=design&node-id=0%3A1&mode=design&t=pCuASAwDQfhWZF6q-1. 

Website dibuat dengan 3 warna utama yatu Hjau, Oren, dan Kuning. Ukuran padding dibuat se-konsisten mungkin yaitu 1.4rem 10% yang berarti memberikan ruang tambahan pada sisi atas dan bawah elemen sebesar 1.4rem, dan ruang tambahan pada sisi kiri dan kanan elemen sebesar 10% dari lebar elemen.

2.	Website Responsive
Sebagai tujuan dari proses belajar, pada tahap awal pengembangan, website dibuat dengan menggunakan styling CSS saja. Dengan memanfaatkan media query CSS dengan breakpoint sebagai berikut : Laptop (max-wdth: 1366px), Tablet (max-wdth: 758px), Mobile (max-wdth: 450px), Laptop (max-wdth: 1366px).

Laptop :
![gambar 8](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/4f52a6d8-33b6-4858-8760-16afc4897bba)

Mobile (Samsung Galaxy S8+ width: 360px).
![gambar 5](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/7b8fd697-26bc-4944-bc77-8dc3a98a09db)

Tablet (Ipad Air width: 820px).
![gambar 6](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/fbda0c30-2ff8-4c17-b010-a605252cc253)

Selanjutnya, saya memanfaatkan bootstrap untuk membuat website menjadi lebh responsive. 
![gambar 7](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/a815f26f-8b4a-4d51-beb6-be79c457b1ac)


3.	Direct Feedback
Menampilkan produk apa saja yang berada di cart masing-masing pengguna.
Search by name, filter by parameter.
Berikut adalah cuplikan sourcecode phpnya.
![gambar 9](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/02905fcb-f28c-472f-8a84-93004af49311)



Selain itu juga menggunakan alert apabila suatu tindakan telah dilakukan oleh pengguna. 
![gambar 10](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/998e6312-d154-480b-9df4-db0d39e12ace)


5.	Konten Dinamis 
Menampilkan data-data produk dari database.
Semua prodk dari database ditampilkan dengan melakukan looping.
![gambar 11](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/14d02591-99c1-4d8e-b8a9-628fab698b0f)



