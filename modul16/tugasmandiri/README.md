# Aplikasi Pendaftaran Ekstrakurikuler dengan Login & Session

Aplikasi web berbasis PHP dengan fitur autentikasi user (login/register) dan management data pendaftaran ekstrakurikuler.

## 📋 Fitur Utama

### 1. **Sistem Autentikasi**
- Register user baru
- Login dengan username & password
- Password di-hash menggunakan bcrypt (aman)
- Session management untuk autentikasi

### 2. **Dua Level User**

#### **Level Admin**
- ✅ Melihat semua data (View)
- ✅ Menambah data baru (Insert)
- ✅ Mengedit data (Update)
- ✅ Menghapus data (Delete)
- ✅ Logout

#### **Level User**
- ✅ Hanya bisa melihat data (View Only)
- ✅ Tidak bisa mengedit, menambah, atau menghapus
- ✅ Logout

### 3. **Design**
- Bootstrap 5 untuk tampilan responsif
- Font Awesome untuk icon
- Gradient color yang menarik
- Mobile-friendly

## 🗂️ Struktur File

```
modul16/tugasmandiri/
├── koneksi.php              # Koneksi database
├── register.php             # Halaman register
├── proses_register.php      # Proses register
├── login.php                # Halaman login
├── proses_login.php         # Proses login
├── logout.php               # Logout & destroy session
├── index.php                # Dashboard Admin (CRUD Data)
├── tampil.php               # Dashboard User (View Only)
├── tambah.php               # Form tambah data
├── proses_tambah.php        # Proses tambah data
├── edit.php                 # Form edit data
├── proses_edit.php          # Proses edit data
├── hapus.php                # Hapus data
└── database.sql             # Script membuat tabel
```

## 🚀 Cara Install

### 1. **Persiapan Database**
- Buka phpMyAdmin (http://localhost/phpmyadmin)
- Buat database baru dengan nama: `db_latihan`
- Import file `database.sql`:
  - Copy isi file database.sql
  - Paste ke SQL Query di phpMyAdmin
  - Klik Go/Execute

### 2. **Test Login**
Setelah import database, Anda bisa login dengan:

**User Admin:**
- Username: `admin`
- Password: `admin123`

**User Biasa:**
- Username: `user`
- Password: `user123`

### 3. **Akses Aplikasi**
- Register: `http://localhost/projct_php/modul16/tugasmandiri/register.php`
- Login: `http://localhost/projct_php/modul16/tugasmandiri/login.php`

## 📌 Catatan Penting

- Password di-hash dengan **bcrypt** untuk keamanan
- Menggunakan **prepared statement** untuk prevent SQL Injection
- Session digunakan untuk autentikasi
- Setiap halaman CRUD dilindungi dengan session check
- User level "user" tidak bisa mengakses halaman admin

## 🔒 Keamanan

✅ Password di-hash (bcrypt)
✅ SQL Injection prevention (prepared statement)
✅ Session authentication
✅ Input sanitization (htmlspecialchars)
✅ Level-based access control

## 💡 Cara Membuat User Baru

1. Klik link "Daftar di sini" di halaman login
2. Isi username dan password
3. Default level = "user" (hanya bisa view)
4. Untuk membuat admin, ubah langsung di database atau modifikasi kode

## 📝 Modifikasi Level User

Jika ingin membuat user baru sebagai admin, edit file `proses_register.php`:
```php
$level = "admin"; // Ubah "user" menjadi "admin"
```

Atau ubah langsung di database:
```sql
UPDATE tb_user SET level='admin' WHERE username='username_user';
```

---
**Dibuat dengan Bootstrap 5 & Font Awesome** 🚀
