<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\KeranjangRepository;
use Illuminate\Http\Request;

class ApiKeranjangController extends Controller
{
    private $keranjangRepository;

    public function __construct(KeranjangRepository $keranjangRepository)
    {
        $this->keranjangRepository = $keranjangRepository;
    }

    public function index()
    {
        $keranjangs = $this->keranjangRepository->all();
        return $keranjangs;
    }

    public function simpan(Request $request)
    {
        $data = array(
            'produk_id' => $request->produk_id,
            'konsumen_id' => $request->konsumen_id,
            'status' => $request->status,
            'jumlah' => $request->jumlah,
            'harga_jual' => $request->harga_jual
        );
        $keranjangs = $this->keranjangRepository->create($data);
        if ($keranjangs) {
            return response()->json('sukses', 200);
        } else {
            return response()->json('gagal', 400);
        }
    }

    public function hapus($id)
    {

        $hapus = $this->keranjangRepository->delete($id);
        if ($hapus) {
            return response()->json('sukses', 200);
        } else {
            return response()->json('gagal', 400);
        }
    }

    public function gantiJumlah(Request $request, $id)
    {
        $gantiJumlah = $request->jumlah;
        $ganti = $this->keranjangRepository->updateJumlah($gantiJumlah, $id);
        if ($ganti) {
            return response()->json([
                'jumlah' => $ganti
            ], 200);
        } else {
            return response()->json('gagal', 400);
        }
    }

    public function cekHarga(Request $request)
    {
        $cekHarga = $request->id_keranjang;
        $cek = $this->keranjangRepository->checkPrice($cekHarga, 'id_keranjang');
        if ($cekHarga) {
            return response()->json([
                'total' => $cek
            ], 200);
        } else {
            return response()->json('gagal', 400);
        }
    }
}
