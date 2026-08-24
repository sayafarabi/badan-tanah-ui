<?php

namespace Database\Seeders;

use App\Models\AsetTanah;
use App\Models\Berita;
use App\Models\Halaman;
use App\Models\MenuNavigasi;
use App\Models\PengaturanWebsite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Isi Pengaturan Website (Website Builder)
        PengaturanWebsite::create([
            'judul_hero' => 'Mengelola Tanah, Memajukan Negeri',
            'subjudul_hero' => 'Badan Bank Tanah mengelola aset tanah negara secara profesional, transparan, dan berkelanjutan untuk kepentingan rakyat.',
            'tombol_text' => 'Selengkapnya',
            'tombol_link' => '/aset',
            'warna_utama' => '#0B2A4A',
            'warna_sekunder' => '#1D4ED8',
        ]);

        // Isi Halaman Tentang (Statis)
        Halaman::create([
            'judul' => 'Tentang Badan Bank Tanah',
            'isi' => 'Badan Bank Tanah adalah lembaga pemerintah yang mengelola aset tanah negara secara profesional, transparan, dan berkelanjutan untuk kepentingan rakyat.',
            'gambar' => null,
        ]);

        // Isi Halaman Pemanfaatan & Kerjasama (Statis)
        Halaman::create([
            'judul' => 'Pemanfaatan & Kerjasama Usaha',
            'isi' => 'Badan Bank Tanah membuka peluang kerjasama untuk investasi, reforma agraria, dan kemitraan strategis. Kami menyediakan skema pemanfaatan yang fleksibel dan transparan.',
            'gambar' => null,
        ]);

        // Isi Menu Navigasi (Menu aktif)
        MenuNavigasi::create([
            'nama' => 'Beranda',
            'link' => '/',
            'status' => 'Aktif',
        ]);
        MenuNavigasi::create([
            'nama' => 'Tentang',
            'link' => '/tentang',
            'status' => 'Aktif',
        ]);
        MenuNavigasi::create([
            'nama' => 'Aset Persediaan Tanah',
            'link' => '/aset',
            'status' => 'Aktif',
        ]);
        MenuNavigasi::create([
            'nama' => 'Pemanfaatan & Kerjasama',
            'link' => '/pemanfaatan',
            'status' => 'Aktif',
        ]);
        MenuNavigasi::create([
            'nama' => 'Publikasi',
            'link' => '/publikasi',
            'status' => 'Aktif',
        ]);
        MenuNavigasi::create([
            'nama' => 'Kontak',
            'link' => '/kontak',
            'status' => 'Aktif',
        ]);

        // Isi Data Aset
        AsetTanah::create([
            'nama_lokasi' => 'Kawasan Industri Terpadu Batang',
            'provinsi' => 'Jawa Tengah',
            'kabupaten' => 'Batang',
            'luas_hektar' => 2450.00,
            'peruntukan' => 'Industri',
            'skema' => 'Sewa',
            'status' => 'Tersedia',
            'gambar' => null,
            'lat' => -6.9,
            'lng' => 109.7,
            'deskripsi' => 'Kawasan Industri Terpadu Batang (KITB) adalah kawasan industri strategis yang dikembangkan untuk mendukung investasi dan hilirisasi industri di Jawa Tengah. Kawasan ini memiliki akses langsung ke jalan tol Trans Jawa dan dekat dengan pelabuhan.',
        ]);

        AsetTanah::create([
            'nama_lokasi' => 'Tanah Bekas HGU PT. Sinar Harapan',
            'provinsi' => 'Sumatera Selatan',
            'kabupaten' => 'Musi Banyuasin',
            'luas_hektar' => 1850.50,
            'peruntukan' => 'Pertanian',
            'skema' => 'Kerjasama',
            'status' => 'Dalam Pengembangan',
            'gambar' => null,
            'lat' => -3.3,
            'lng' => 114.5,
            'deskripsi' => 'Tanah eks HGU seluas 1.850 Hektar yang sedang dalam proses pengembangan untuk mendukung program ketahanan pangan nasional. Lokasi strategis dengan sumber air melimpah untuk sektor pertanian.',
        ]);

        AsetTanah::create([
            'nama_lokasi' => 'Kawasan Sentra Pangan Merauke',
            'provinsi' => 'Papua Selatan',
            'kabupaten' => 'Merauke',
            'luas_hektar' => 5320.75,
            'peruntukan' => 'Pertanian',
            'skema' => 'Sewa',
            'status' => 'Tersedia',
            'gambar' => null,
            'lat' => -8.5,
            'lng' => 140.4,
            'deskripsi' => 'Kawasan Sentra Pangan Merauke merupakan lahan pertanian skala besar yang berada di Kabupaten Merauke. Kawasan ini diproyeksikan menjadi lumbung pangan nasional dengan dukungan irigasi modern dan teknologi pertanian.',
        ]);

        // Isi Data Berita
        Berita::create([
            'judul' => 'Peluang Investasi di Kawasan Strategis Nasional',
            'slug' => 'peluang-investasi-di-kawasan-strategis-nasional',
            'ringkasan' => 'Badan Bank Tanah membuka peluang investasi bagi investor di berbagai kawasan strategis.',
            'konten' => 'Badan Bank Tanah membuka peluang investasi bagi investor di berbagai kawasan strategis. Kawasan ini memiliki potensi besar untuk dikembangkan.',
            'kategori' => 'Berita',
            'penulis' => 'Admin',
            'views' => 1245,
            'status' => 'Dipublikasikan',
            'gambar' => null,
            'tanggal_publikasi' => now(),
        ]);

        Berita::create([
            'judul' => 'Siaran Pers: Kolaborasi dengan Pemerintah Daerah',
            'slug' => 'siaran-pers-kolaborasi-dengan-pemerintah-daerah',
            'ringkasan' => 'Badan Bank Tanah memperkuat kolaborasi dengan pemerintah daerah untuk optimalisasi aset.',
            'konten' => 'Badan Bank Tanah memperkuat kolaborasi dengan pemerintah daerah untuk optimalisasi aset.',
            'kategori' => 'Siaran Pers',
            'penulis' => 'Admin',
            'views' => 800,
            'status' => 'Dipublikasikan',
            'gambar' => null,
            'tanggal_publikasi' => now(),
        ]);

        Berita::create([
            'judul' => 'Optimalisasi Aset Tanah untuk Mendukung Pembangunan Nasional',
            'slug' => 'optimalisasi-aset-tanah-untuk-mendukung-pembangunan-nasional',
            'ringkasan' => 'Badan Bank Tanah terus mendorong optimalisasi aset tanah untuk mendukung pembangunan nasional.',
            'konten' => 'Badan Bank Tanah terus mendorong optimalisasi aset tanah melalui pemanfaatan yang produktif, berkelanjutan, dan memberikan manfaat bagi masyarakat serta mendukung pembangunan nasional.',
            'kategori' => 'Berita',
            'penulis' => 'Admin',
            'views' => 650,
            'status' => 'Dipublikasikan',
            'gambar' => null,
            'tanggal_publikasi' => now(),
        ]);

    }
}
