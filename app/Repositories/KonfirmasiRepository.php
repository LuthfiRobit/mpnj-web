<?php

namespace App\Repositories;

use App\Models\Konfirmasi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonfirmasiRepository
{
    public function dataKonfirmasi($kode_transaksi)
    {
        return Transaksi::where('kode_transaksi', $kode_transaksi)
            ->with('pembeli')
            ->get()
            ->map(
                function ($konfirm) {
                    return [
                        'kode_transaksi' => $konfirm->kode_transaksi,
                        'pembeli' => [
                            'pembeli_id' => $konfirm->pembeli->id_konsumen,
                            'username' => $konfirm->pembeli->nama_lengkap
                        ],
                        'total_bayar' => $konfirm->total_bayar,
                        'id_rekening' => $konfirm->rekening_admin_id
                    ];
                }
            );
    }
}
