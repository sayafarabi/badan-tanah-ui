<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsetTanah;

class AsetSubMenuController extends Controller
{
    public function peta()
    {
        $asets = AsetTanah::all();

        return view('admin.aset_peta', compact('asets'));
    }

    public function profil()
    {
        $asets = AsetTanah::query()
            ->orderBy('nama_lokasi')
            ->get();

        $totalAset = $asets->count();

        $totalLuas = $asets->sum(function ($aset) {
            return (float) $aset->luas_hektar;
        });

        $totalProvinsi = $asets
            ->pluck('provinsi')
            ->filter()
            ->unique()
            ->count();

        $totalKabupaten = $asets
            ->pluck('kabupaten')
            ->filter()
            ->unique()
            ->count();

        $peruntukan = $asets
            ->pluck('peruntukan')
            ->filter()
            ->unique()
            ->values();

        $status = $asets
            ->pluck('status')
            ->filter()
            ->unique()
            ->values();

        return view('admin.aset_profil', compact(
            'asets',
            'totalAset',
            'totalLuas',
            'totalProvinsi',
            'totalKabupaten',
            'peruntukan',
            'status'
        ));
    }

    public function pengelolaan()
    {
        $asets = AsetTanah::query()
            ->orderBy('nama_lokasi')
            ->get();

        $totalAset = $asets->count();

        $totalTersedia = $asets->where('status', 'Tersedia')->count();

        $totalDalamProses = $asets->where('status', 'Dalam Proses')->count();

        return view('admin.aset_pengelolaan', compact(
            'asets',
            'totalAset',
            'totalTersedia',
            'totalDalamProses'
        ));
    }

    public function pengembangan()
    {
        $asets = AsetTanah::query()
            ->orderBy('nama_lokasi')
            ->get();

        $totalPengembangan = $asets->count();

        $totalBerjalan = $asets->filter(function ($aset) {
            return strtolower(trim((string) $aset->status)) === 'dalam proses';
        })->count();

        $totalSelesai = $asets->filter(function ($aset) {
            return strtolower(trim((string) $aset->status)) === 'dalam pengembangan';
        })->count();

        return view('admin.aset_pengembangan', compact(
            'asets',
            'totalPengembangan',
            'totalBerjalan',
            'totalSelesai'
        ));
    }

    public function wilayah()
    {
        $asets = AsetTanah::all();

        return view('admin.aset_wilayah', compact('asets'));
    }

    public function status()
    {
        $asets = AsetTanah::all();

        return view('admin.aset_status', compact('asets'));
    }

    public function dokumen()
    {
        $asets = AsetTanah::query()
            ->orderBy('nama_lokasi')
            ->get();

        return view('admin.aset_dokumen', compact('asets'));
    }

    public function statistik()
    {
        $asets = AsetTanah::query()
            ->orderBy('nama_lokasi')
            ->get();

        $totalAset = $asets->count();

        $totalLuas = $asets->sum(function ($aset) {
            return (float) $aset->luas_hektar;
        });

        $totalProvinsi = $asets
            ->pluck('provinsi')
            ->filter()
            ->unique()
            ->count();

        $totalPeruntukan = $asets
            ->pluck('peruntukan')
            ->filter()
            ->unique()
            ->count();

        $peruntukanStats = $asets
            ->filter(fn ($aset) => ! empty($aset->peruntukan))
            ->groupBy('peruntukan')
            ->map(function ($items) {
                return [
                    'jumlah' => $items->count(),
                    'luas' => $items->sum(fn ($aset) => (float) $aset->luas_hektar),
                ];
            })
            ->sortByDesc('jumlah');

        $skemaStats = $asets
            ->filter(fn ($aset) => ! empty($aset->skema))
            ->groupBy('skema')
            ->map(function ($items) {
                return [
                    'jumlah' => $items->count(),
                    'luas' => $items->sum(fn ($aset) => (float) $aset->luas_hektar),
                ];
            })
            ->sortByDesc('jumlah');

        $wilayahStats = $asets
            ->filter(fn ($aset) => ! empty($aset->provinsi))
            ->groupBy('provinsi')
            ->map(function ($items) use ($totalAset) {
                $jumlah = $items->count();

                return [
                    'jumlah' => $jumlah,
                    'luas' => $items->sum(fn ($aset) => (float) $aset->luas_hektar),
                    'persentase' => $totalAset > 0
                        ? round(($jumlah / $totalAset) * 100)
                        : 0,
                ];
            })
            ->sortByDesc('jumlah');

        return view('admin.aset_statistik', compact(
            'asets',
            'totalAset',
            'totalLuas',
            'totalProvinsi',
            'totalPeruntukan',
            'peruntukanStats',
            'skemaStats',
            'wilayahStats'
        ));
    }
}
