# UASPPW1_22-505661-SV-21864_InnisfreeGreentea

Penjelasan Website

Innisfree Green Tea Website: Sebuah platform pemasaran yang menawarkan pengalaman transaksi skincare. Lebih khususnya, website ini menyediakan produk skincare Innisfree varian Green Tea. Setelah menyelesaikan proses registrasi dan login, pengguna akan dibawa ke halaman utama dengan dua tombol menu utama, "Shop Now" dan "GoPumpChallenge". Kedua tombol ini mencerminkan dua tujuan utama website ini, yaitu menyediakan proses transaksi yang mudah dan mengadakan event-event yang diadakan oleh Innisfree. Website ini dilengkapi dengan fitur pencarian produk berdasarkan nama, filter produk berdasarkan parameter tertentu, dan keranjang belanja yang memungkinkan pengguna menyimpan barang-barang yang ingin dibeli.

1.	Design Rapi.
   
Sebelum memasuki dan sembari melakukan proses development, explorasi desain telah dilakukan. File figma dapat dilihat di https://www.figma.com/file/wTIBpLKu33flw2OTy2kjXt/innsfree-greentea?type=design&node-id=0%3A1&mode=design&t=pCuASAwDQfhWZF6q-1. 

Website dibuat dengan 3 warna utama yatu Hjau, Oren, dan Kuning. Ukuran padding dibuat se-konsisten mungkin yaitu 1.4rem 10% yang berarti memberikan ruang tambahan pada sisi atas dan bawah elemen sebesar 1.4rem, dan ruang tambahan pada sisi kiri dan kanan elemen sebesar 10% dari lebar elemen.

2.	Website Responsive.
   
Sebagai tujuan dari proses belajar, pada tahap awal pengembangan, website dibuat dengan menggunakan styling CSS saja. Dengan memanfaatkan media query CSS dengan breakpoint sebagai berikut : Laptop (max-wdth: 1366px), Tablet (max-wdth: 758px), Mobile (max-wdth: 450px), Laptop (max-wdth: 1366px) serta breakpoint yang saya temukan terhadap desain website saya yaitu (max-width: 1199px).

Media query pada HTML adalah sebuah teknik yang digunakan untuk mengubah tampilan atau perilaku elemen-elemen pada halaman web berdasarkan karakteristik perangkat atau ukuran tampilan yang digunakan oleh pengguna. Media query memungkinkan pengembang web untuk menyesuaikan tampilan dan responsivitas halaman web agar lebih optimal pada berbagai perangkat dan ukuran layar yang berbeda. Pada gambar dibawah ini, terlihat sintaks @media (max-width: 1199px). @media (max-width: 1199px) artinya aturan CSS yang terdapat di dalam media query tersebut akan diterapkan jika lebar layar perangkat tidak melebihi 1199 piksel.
Dengan menggunakan media query ini, kita dapat mengubah tampilan dan perilaku elemen-elemen pada halaman web ketika lebar layar perangkat berada di rentang tertentu. Pada contoh di atas, aturan CSS yang ada di dalam media query tersebut akan aktif jika lebar layar perangkat berada di bawah atau sama dengan 1199 piksel. Ini biasanya digunakan untuk mengatur tampilan pada perangkat dengan ukuran sedang seperti tablet atau laptop dengan layar yang lebih kecil.

![gambar 12](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/70d1239b-5c3f-43d3-8d1a-54cd17a3239a)


Laptop

![gambar 8](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/4f52a6d8-33b6-4858-8760-16afc4897bba)

Mobile (Samsung Galaxy S8+ width: 360px).

![gambar 5](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/7b8fd697-26bc-4944-bc77-8dc3a98a09db)

Tablet (Ipad Air width: 820px).

![gambar 6](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/fbda0c30-2ff8-4c17-b010-a605252cc253)

Selanjutnya, saya memanfaatkan bootstrap untuk membuat website menjadi lebh responsive. 

![gambar 7](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/a815f26f-8b4a-4d51-beb6-be79c457b1ac)


3.	Direct Feedback.
Menampilkan produk apa saja yang berada di cart masing-masing pengguna.
Search by name, filter by parameter.
Berikut adalah cuplikan sourcecode phpnya. 

![gambar 9](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/02905fcb-f28c-472f-8a84-93004af49311)



Selain itu juga menggunakan alert apabila suatu tindakan telah dilakukan oleh pengguna.

![gambar 10](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/998e6312-d154-480b-9df4-db0d39e12ace)


4.	Konten Dinamis.
Menampilkan data-data produk dari database.
Semua prodk dari database ditampilkan dengan melakukan looping.
Setelah proses pengambilan data dengan query SELECT, barisan data disimpan kedalam $row. Data-data tersebut akan di-looping dan diprint terhadap struktur html sebagai berikut. 
![gambar 11](https://github.com/affodilajF/UASPPW1_22-505661-SV-21864_InnisfreeGreentea/assets/130672181/14d02591-99c1-4d8e-b8a9-628fab698b0f)




