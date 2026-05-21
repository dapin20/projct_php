# Aplikasi Manajemen Berita & User

Aplikasi web berbasis PHP untuk manajemen berita dengan sistem login dan role-based access control.

## 📋 Fitur

### Sistem Autentikasi
- ✅ Login dengan username & password
- ✅ Session-based authentication
- ✅ Dual role access (Admin & User)
- ✅ Secure logout

### Admin Dashboard
- ✅ Kelola User (CRUD)
  - Tambah user baru
  - Lihat detail user
  - Edit user (username, email, level, password)
  - Hapus user
- ✅ Kelola Berita (CRUD)
  - Tambah berita baru
  - Lihat detail berita
  - Edit berita
  - Hapus berita
- ✅ Dashboard dengan statistik

### User Dashboard
- ✅ Berita Saya
  - Lihat berita yang dibuat
  - Tambah berita baru
  - Edit berita milik sendiri
  - Hapus berita milik sendiri
- ✅ Semua Berita
  - Lihat semua berita di sistem (read-only)
  - Lihat detail berita

## 🗂️ Struktur Folder

```
modul18/tugasmandiri/
├── login.php                 # Halaman login
├── logout.php                # Logout & destroy session
├── koneksi.php               # Database connection
├── database.sql              # Database schema
├── admin/
│   ├── index.php            # Admin dashboard
│   ├── user_list.php        # Daftar user
│   ├── user_detail.php      # Detail user
│   ├── user_tambah.php      # Form tambah user
│   ├── user_edit.php        # Form edit user
│   ├── user_hapus.php       # Delete user
│   ├── berita_list.php      # Daftar berita
│   ├── berita_detail.php    # Detail berita
│   ├── berita_tambah.php    # Form tambah berita
│   ├── berita_edit.php      # Form edit berita
│   └── berita_hapus.php     # Delete berita
└── user/
    ├── index.php             # User dashboard
    ├── berita_saya.php       # Berita yang dibuat user
    ├── berita_detail.php     # Detail berita milik user
    ├── berita_tambah.php     # Form tambah berita
    ├── berita_edit.php       # Form edit berita
    ├── berita_hapus.php      # Delete berita
    ├── semua_berita.php      # Lihat semua berita (read-only)
    └── semua_berita_detail.php # Detail berita dari list semua
```

## 🚀 Cara Menggunakan

### 1. Setup Database
```sql
1. Buat database baru: CREATE DATABASE db_modul18;
2. Import file database.sql ke database tersebut
3. Update koneksi di file koneksi.php sesuai konfigurasi lokal Anda
```

### 2. Login
```
Demo Account:
- Admin    : admin / password123
- User 1   : user1 / password123
- User 2   : user2 / password123
```

### 3. Akses Aplikasi
- Admin: http://localhost/projct_php/modul18/tugasmandiri/login.php
- Pilih role dan login sesuai kebutuhan

## 🔐 Fitur Keamanan

- ✅ Session-based authentication
- ✅ Password hashing dengan bcrypt
- ✅ SQL injection prevention (mysqli_real_escape_string)
- ✅ Role-based access control
- ✅ Authorization checks di setiap halaman
- ✅ Logout session destroy

## 🎨 Design & UI

- ✅ Bootstrap 4.5.2 untuk responsive design
- ✅ Font Awesome 5.15.4 untuk icons
- ✅ Gradient color scheme (Purple gradient)
- ✅ Clean dan modern interface
- ✅ Fully responsive layout

## 📊 Database Schema

### Table: users
```
- id (INT, Primary Key, Auto Increment)
- username (VARCHAR 50, UNIQUE)
- password (VARCHAR 255)
- email (VARCHAR 100)
- level (ENUM: 'admin', 'user')
- created_at (TIMESTAMP)
```

### Table: berita
```
- id (INT, Primary Key, Auto Increment)
- judul (VARCHAR 255)
- isi (TEXT)
- user_id (INT, Foreign Key → users.id)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP ON UPDATE)
```

## 🔄 Workflow

### Admin:
1. Login → Admin Dashboard
2. Kelola User: Tambah/Edit/Hapus/Lihat User
3. Kelola Berita: Tambah/Edit/Hapus/Lihat Berita
4. Logout

### User:
1. Login → User Dashboard
2. Berita Saya: Kelola berita milik sendiri (CRUD)
3. Semua Berita: Lihat semua berita (read-only)
4. Logout

## ⚠️ Catatan

- Password default semua user: `password123`
- Saat membuat user baru, password bisa diisi apapun
- Hanya admin yang bisa kelola user dan berita orang lain
- User hanya bisa mengedit berita milik sendiri
- Session timeout sesuai konfigurasi PHP (default 24 menit)

## 📝 Teknologi yang Digunakan

- PHP 7.x
- MySQL/MariaDB
- HTML5
- CSS3
- Bootstrap 4.5.2
- Font Awesome 5.15.4
- JavaScript (jQuery)

## ✏️ Modifikasi & Pengembangan

Anda dapat mengembangkan aplikasi ini lebih lanjut dengan:
- Menambah fitur profile user
- Menambah pagination untuk list
- Menambah search & filter
- Menambah upload image untuk berita
- Menambah comment system
- Menambah category untuk berita
- Dll.

---

**Dibuat untuk: Tugas Mandiri Modul 18**
