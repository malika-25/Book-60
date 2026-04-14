# Peminjaman Buku UKK Project Plan (Sastra.in)

## Overview
Aplikasi Perpustakaan Sekolah Digital "Sastra.in" berbasis web untuk memudahkan siswa dan admin perpustakaan dalam peminjaman dan pendataan buku. Aplikasi ini dirancang untuk berjalan secara offline/lokal (Localhost) sesuai standar Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak 2025/2026 Paket 4.

## Project Type
**WEB**

## Success Criteria
- [ ] Admin dapat login, mengelola buku, anggota, dan transaksi peminjaman/pengembalian.
- [ ] User (Siswa) dapat mendaftar, login, melihat daftar buku, dan melakukan peminjaman/pengembalian.
- [ ] Aplikasi berjalan tanpa koneksi internet (semua asset lokal).
- [ ] Terdapat fitur pencarian buku.
- [ ] Deliverables akhir meliputi Database (`.sql`), Dokumentasi lengkap (ERD, Deskripsi Program, Fungsi, Debugging, Evaluasi), dan Kode Program.

## Tech Stack
- **Framework Utama**: Laravel 12
- **Frontend/Styling**: Tailwind CSS & Alpine.js (Modern, ringan, dan kompatibel untuk environment offline)
- **Database**: MySQL (Standard UKK)
- **Aesthetics**: Glassmorphism/Tactile maximalism (Antigravity guidelines)

## File Structure
```text
/
├── app/                  # Controller & Models
├── database/
│   ├── migrations/       # Schema DB
│   └── seeders/          # Dummy data testing
├── public/               # Asset statis offline (CSS, JS, Images)
├── resources/
│   └── views/            # Blade templates (Admin & User)
├── docs/                 # Folder hasil dokumentasi UKK
│   ├── sastrain.sql
│   ├── ERD.pdf
│   └── Laporan.pdf
└── PLAN-ukk-peminjaman-buku.md
```

## Task Breakdown

### Task 1: Database Setup & Authentication
- **Agent**: `database-architect`, `backend-specialist`
- **Skills**: `database-design`
- **Priority**: P0
- **Dependencies**: None
- **INPUT**: Konfigurasi Laravel & MySQL.
- **OUTPUT**: Skema DB untuk tabel `users` (admin/user), `books` (buku), `categories` (kategori), dan `transactions` (peminjaman), beserta Auth system.
- **VERIFY**: `php artisan migrate --seed` berhasil dijalankan dan user dapat login sesuai role.

### Task 2: Admin Dashboard & CRUD Master Data
- **Agent**: `frontend-specialist`, `backend-specialist`
- **Skills**: `frontend-design`, `clean-code`
- **Priority**: P1
- **Dependencies**: Task 1
- **INPUT**: Model Book dan User.
- **OUTPUT**: Halaman kelola buku (CRUD Buku) dan kelola anggota (CRUD Anggota).
- **VERIFY**: Admin dapat menambahkan, mengedit, dan menghapus data buku & pengguna dari antarmuka web.

### Task 3: User Dashboard & Pencarian Buku
- **Agent**: `frontend-specialist`, `backend-specialist`
- **Skills**: `frontend-design`
- **Priority**: P1
- **Dependencies**: Task 1, Task 2
- **INPUT**: Halaman depan pengguna.
- **OUTPUT**: Tampilan katalog buku, fitur pencarian buku terintegrasi, detail buku.
- **VERIFY**: Warga sekolah bisa melihat daftar buku dan mencari dengan keyword tertentu secara responsif.

### Task 4: Sistem Transaksi Peminjaman & Pengembalian
- **Agent**: `backend-specialist`
- **Skills**: `api-patterns`
- **Priority**: P2
- **Dependencies**: Task 3
- **INPUT**: Data peminjam dan data buku.
- **OUTPUT**: Alur logika user meminjam buku, admin menyetujui, dan proses pengembalian buku.
- **VERIFY**: Status buku berubah ketika dipinjam, histori transaksi tercatat.

### Task 5: Dokumentasi UKK (ERD, Laporan, SQL Dump)
- **Agent**: `orchestrator`
- **Skills**: `technical-writing`
- **Priority**: P3
- **Dependencies**: Task 4
- **INPUT**: Kode lengkap + fitur selesai.
- **OUTPUT**: File `.sql` diexport, ERD selesai digambar, Laporan Evaluasi dan Deskripsi Program diformat dalam PDF/Word.
- **VERIFY**: Folder `docs/` berisi seluruh evidence yang diminta Soal Praktik UKK 2025.

---

## Phase X: VERIFICATION CHECKLIST
- [ ] **Lint**: Pass (Kode sudah dirapikan)
- [ ] **Security**: Tidak ada credential expose & middleware auth terpasang di rute admin
- [ ] **Build**: Build asset lokal Tailwind CSS selesai (`npm run build`)
- [ ] Semua role (Admin & User) telah diuji coba alur transaksinya
- [ ] File presentasi & Laporan sesuai panduan UKK tersedia di `docs/`
- [ ] **Date**: [Akan Diupdate Saat Selesai]
