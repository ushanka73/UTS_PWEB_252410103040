<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    private const HARI = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

    private const JADWAL = [
        [
            'hari' => 'Senin',
            'kode' => 'KSF1401',
            'mata_kuliah' => 'Analisa dan Desain Perangkat Lunak',
            'waktu' => '07:50 - 09:40',
            'ruangan' => 'Ruang Kuliah B2, Gedung 24B UPT Perpustakaan',
            'dosen' => 'Dr. Brian Rizqi Paradisiaca Darnoto S.Kom. M.Kom.',
            'warna' => 'blue',
        ],
        [
            'hari' => 'Senin',
            'kode' => 'KSF1304',
            'mata_kuliah' => 'Kecerdasan Buatan',
            'waktu' => '11:30 - 13:20',
            'ruangan' => 'Ruang Kuliah A3.2, Gedung 24A Ilmu Komputer',
            'dosen' => 'Gayatri Dwi Santika S.SI., M.Kom, Damar Novtahaning M.Sc., Annisa Fitri Maghfiroh Harvyanti, S.Si., M.Si.',
            'warna' => 'violet',
        ],
        [
            'hari' => 'Senin',
            'kode' => 'KSF1408',
            'mata_kuliah' => 'Manajemen Keamanan Sistem Informasi',
            'waktu' => '15:10 - 17:00',
            'ruangan' => 'Ruang Kuliah A3.3, Gedung 24A Ilmu Komputer',
            'dosen' => 'Prof. Drs. Antonius Cahya Prihandoko, M.App.Sc., Ph.D.',
            'warna' => 'rose',
        ],
        [
            'hari' => 'Senin',
            'kode' => 'KSF1401',
            'mata_kuliah' => 'Analisa dan Desain Perangkat Lunak',
            'waktu' => '18:00 - 20:40',
            'ruangan' => 'Ruang Kuliah B2, Gedung 24B UPT Perpustakaan',
            'dosen' => '-',
            'warna' => 'blue',
        ],
        [
            'hari' => 'Selasa',
            'kode' => 'KSF1310',
            'mata_kuliah' => 'Pemrograman Fungsional',
            'waktu' => '08:50 - 10:30',
            'ruangan' => 'Ruang Kuliah A3.2, Gedung 24A Ilmu Komputer',
            'dosen' => 'GAMA WISNU FAJARIANTO S.Kom., M.Kom., Mohammad Zarkasi, S.Kom., M.Kom.',
            'warna' => 'amber',
        ],
        [
            'hari' => 'Rabu',
            'kode' => 'KSF1409',
            'mata_kuliah' => 'Pemrograman Berbasis Website',
            'waktu' => '07:00 - 08:40',
            'ruangan' => 'Ruang Kuliah C2.3, Gedung 24C Ilmu Komputer',
            'dosen' => 'Stanislaus Jiwandana Pinasthika S.Kom., M.Cs, Muhammad Andryan Wahyu Saputra M.Kom., GAMA WISNU FAJARIANTO S.Kom., M.Kom.',
            'warna' => 'emerald',
        ],
        [
            'hari' => 'Rabu',
            'kode' => 'KSU1302',
            'mata_kuliah' => 'Arsitektur Komputer',
            'waktu' => '08:50 - 10:30',
            'ruangan' => 'Ruang Kuliah C2.2, Gedung 24C Ilmu Komputer',
            'dosen' => 'Nova El Maidah S.Si., M.Cs.',
            'warna' => 'cyan',
        ],
        [
            'hari' => 'Rabu',
            'kode' => 'UNU9002',
            'mata_kuliah' => 'Pertanian Industrial Berkelanjutan',
            'waktu' => '12:30 - 14:10',
            'ruangan' => 'R. Kuliah C601, Gedung CDAST Selatan Cluster 24',
            'dosen' => 'Dr. Eng. Ir. Idah Andriyani S.TP., M.T.',
            'warna' => 'lime',
        ],
        [
            'hari' => 'Rabu',
            'kode' => 'KSF1304',
            'mata_kuliah' => 'Kecerdasan Buatan',
            'waktu' => '15:10 - 17:50',
            'ruangan' => 'Ruang Kuliah CDAST 1 (Lantai 4), Gedung CDAST Ilmu Komputer',
            'dosen' => '-',
            'warna' => 'violet',
        ],
        [
            'hari' => 'Kamis',
            'kode' => 'KSF1308',
            'mata_kuliah' => 'Grafika Komputer',
            'waktu' => '10:40 - 12:20',
            'ruangan' => 'Ruang Kuliah C2.2, Gedung 24C Ilmu Komputer',
            'dosen' => 'Annisa Fitri Maghfiroh Harvyanti, S.Si., M.Si.',
            'warna' => 'indigo',
        ],
        [
            'hari' => 'Kamis',
            'kode' => 'KSU1208',
            'mata_kuliah' => 'Pemrograman Berorientasi Obyek',
            'waktu' => '12:30 - 15:10',
            'ruangan' => 'Ruang Kuliah C2.2, Gedung 24C Ilmu Komputer',
            'dosen' => 'Damar Novtahaning M.Sc.',
            'warna' => 'orange',
        ],
        [
            'hari' => "Jumat",
            'kode' => 'KSU1208',
            'mata_kuliah' => 'Pemrograman Berorientasi Obyek',
            'waktu' => '07:00 - 09:40',
            'ruangan' => 'Ruang Kuliah C2.3, Gedung 24C Ilmu Komputer',
            'dosen' => '-',
            'warna' => 'orange',
        ],
        [
            'hari' => "Jumat",
            'kode' => 'KSF1308',
            'mata_kuliah' => 'Grafika Komputer',
            'waktu' => '15:10 - 17:50',
            'ruangan' => 'Ruang Kuliah B1, Gedung 24B UPT Perpustakaan',
            'dosen' => '-',
            'warna' => 'indigo',
        ],
        [
            'hari' => "Jumat",
            'kode' => 'KSF1409',
            'mata_kuliah' => 'Pemrograman Berbasis Website',
            'waktu' => '18:00 - 20:40',
            'ruangan' => 'Ruang Kuliah A3.3, Gedung 24A Ilmu Komputer',
            'dosen' => '-',
            'warna' => 'emerald',
        ],
    ];

    private const TUGAS = [
        [
            'nama' => 'Implementasi Laravel',
            'mata_kuliah' => 'Pemrograman Web',
            'deskripsi' => 'Membangun halaman aplikasi menggunakan Laravel dan Blade.',
            'deadline' => '2026-11-12',
            'status' => 'Belum Dikerjakan',
        ],
        [
            'nama' => 'Laporan Praktikum',
            'mata_kuliah' => 'Analisa dan Desai Perangkat Lunak',
            'deskripsi' => 'Menyusun System Request.',
            'deadline' => '2026-11-13',
            'status' => 'Sedang Dikerjakan',
        ],
        [
            'nama' => 'Pemrograman Fungsional',
            'mata_kuliah' => 'Algoritma dan Pemrograman',
            'deskripsi' => 'Menyelesaikan latihan struktur data dan algoritma.',
            'deadline' => '2026-11-10',
            'status' => 'Selesai',
        ],
    ];

    public function login(): View
    {
        return view('login');
    }

    public function dashboard(Request $request): View
    {
        $tanggal = now('Asia/Jakarta')->locale('id');
        $hariIni = $tanggal->translatedFormat('l');
        $tugas = $this->siapkanTugas();
        $tugasAktif = $this->filterTugasAktif($tugas);

        return view('dashboard', [
            'username' => $this->getUsername($request),
            'tanggalHariIni' => $tanggal->translatedFormat('l, d F Y'),
            'hariNavigasi' => in_array($hariIni, self::HARI, true) ? $hariIni : self::HARI[0],
            'jadwalHariIni' => $this->filterJadwal($hariIni),
            'tugasAktif' => $tugasAktif,
            'tugasPrioritas' => array_slice($tugasAktif, 0, 3),
            'jumlahTugasSelesai' => count($tugas) - count($tugasAktif),
        ]);
    }

    public function pengelolaan(Request $request): View
    {
        $hari = $request->query('hari', self::HARI[0]);

        if (! is_string($hari) || ! in_array($hari, self::HARI, true)) {
            $hari = self::HARI[0];
        }

        $tugas = $this->siapkanTugas();
        $tugasAktif = $this->filterTugasAktif($tugas);

        return view('pengelolaan', [
            'username' => $this->getUsername($request),
            'hari' => $hari,
            'daftarHari' => self::HARI,
            'jadwalHariIni' => $this->filterJadwal($hari),
            'tugas' => $tugas,
            'jumlahTugasAktif' => count($tugasAktif),
            'jumlahTugasSelesai' => count($tugas) - count($tugasAktif),
        ]);
    }

    public function profile(Request $request): View
    {
        $username = $this->getUsername($request);

        return view('profil', [
            'username' => $username,
            'mahasiswa' => [
                'Nama' => $username,
                'Username' => $username,
                'Program Studi' => 'Informatika',
                'Fakultas' => 'Ilmu Komputer',
                'Universitas' => 'Universitas Jember',
                'Status' => 'Mahasiswa aktif',
            ],
        ]);
    }

    public function logout(): RedirectResponse
    {
        return redirect()->route('login');
    }

    private function getUsername(Request $request): string
    {
        $input = $request->query('username', 'Mahasiswa');

        if (! is_string($input)) {
            return 'Mahasiswa';
        }

        $username = Str::substr(trim(strip_tags($input)), 0, 30);

        return $username !== '' ? $username : 'Mahasiswa';
    }

    private function filterJadwal(string $hari): array
    {
        return array_values(array_filter(
            self::JADWAL,
            static fn (array $item): bool => $item['hari'] === $hari
        ));
    }

    private function siapkanTugas(): array
    {
        return array_map(static function (array $item): array {
            $item['deadline_format'] = Carbon::parse($item['deadline'])
                ->locale('id')
                ->translatedFormat('d F Y');

            $item['status_class'] = match ($item['status']) {
                'Selesai' => 'status-done',
                'Sedang Dikerjakan' => 'status-progress',
                default => 'status-pending',
            };

            return $item;
        }, self::TUGAS);
    }

    private function filterTugasAktif(array $tugas): array
    {
        return array_values(array_filter(
            $tugas,
            static fn (array $item): bool => $item['status'] !== 'Selesai'
        ));
    }
}
