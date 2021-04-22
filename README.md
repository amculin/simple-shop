Simple Shop
===========

SimpleShop adalah API resources yang disediakan untuk layanan e-commerce sederhana dan dibangun di atas *framework* Yii2 dengan versi minimal atau mikro. Penjelasan lebih lanjut mengenai Yii2 *micro version* ini bisa dibaca di https://www.yiiframework.com/doc/guide/2.0/en/tutorial-yii-as-micro-framework.

Proyek dengan versi terakhir saat dokumen *readme* ini ditulis memiliki batasan fungsi/menu meliputi:
- User Management
- Item Management
- Payment Management
- Event Management

Teknologi yang Digunakan
========================

- PHP 7
- MySQL DBMS 
- [Yii2](https://www.yiiframework.com/doc/guide)

Konfigurasi
===========
## Konfigurasi Database
Buat database dengan nama `tes_simple_shop`, lalu import file `test_simple_shop.sql` untuk membuat skema database dan beberapa contoh data

## ReST Client
Pengujian bisa menggunakan Postman versi terbaru (Postman v8.2.3). Import file `Simple Shop.postman_collection.json` untuk melihat beberapa contoh penggunaan resource yang tersedia.

## Otentikasi
Sistem ini menggunakan otentikasi sederhana dengan melewatkan parameter `access-token` melalui query params. Access token yang disediakan bisa dilihat pada tabel user pada kolom `auth_key`
