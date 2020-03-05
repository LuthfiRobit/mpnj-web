<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Konsumen;
use App\Models\Pelapak;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use File;

class ProfileWebController extends Controller
{
    protected $client, $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = env('API_RAJAONGKIR');
    }

    public function index()
    {
        return view('web/web_profile');
    }

    public function ubah(Request $request, $role, $id)
    {
        $sessionId = Session::get('id');

        $foto = $request->file('foto_profil');

        if ($foto == null) {
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'nomor_hp' => $request->no_hp
            ];
        } else {
            $filename = $this->acakhuruf(15) . '.' . $foto->getClientOriginalExtension();
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'nomor_hp' => $request->no_hp,
                'foto_profil' => $filename
            ];
            $foto->move('assets/foto_profil_konsumen', $filename);
        }


        $fix_role = $role == 'konsumen' ? 'App\Models\Konsumen' : 'App\Models\Pelapak';
        $init = $fix_role::where($sessionId, $id);
        $d = $init->first();
        $ubah = $init->update($data);

        if ($ubah) {
            File::delete('assets/foto_profil_konsumen/' . $d->foto_profil);
            return redirect(URL::to('profile'));
        }
    }

    public static function acakhuruf($length)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public function rekening()
    {
        return view('web/web_profile');
    }

    public function alamat()
    {
        $role = Session::get('role');
        $sessionId = Session::get('id');
        $user_id = Auth::guard($role)->user()->$sessionId;

        $data['alamat'] = Alamat::with('user')
            ->where('user_id', $user_id)
            ->where('user_type', $role == 'konsumen' ? 'App\Models\Konsumen' : 'App\Models\Pelapak')
            ->get();

        $response = $this->client->get('http://guzzlephp.org');
        $request = $this->client->get('https://api.rajaongkir.com/starter/province', [
            'headers' => [
                'key' => $this->token
            ]
        ])->getBody()->getContents();
        $data['provinsi'] = json_decode($request, false);

        $request = $this->client->get('https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => $this->token
            ]
        ])->getBody()->getContents();

        $data['kota'] = json_decode($request, false);

        return view('web/web_profile', $data);
    }

    public function simpan_alamat(Request $request)
    {
        $role = Session::get('role');
        $sessionId = Session::get('id');
        $user_id = Auth::guard($role)->user()->$sessionId;

        $data = [
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'provinsi_id' => $request->provinsi,
            'nama_provinsi' => $request->nama_provinsi,
            'city_id' => $request->kota,
            'nama_kota' => $request->nama_kota,
            'kode_pos' => $request->kode_pos,
            'kecamatan_id' => 0,
            'alamat_lengkap' => $request->alamat_lengkap,
            'alamat_santri' => 'wilayah : ' . $request->wilayah . ', Gang : ' . $request->gang,
            'user_id' => $user_id,
            'user_type' => $role == 'konsumen' ? 'App\Models\Konsumen' : 'App\Models\Pelapak'
        ];

        $simpan = Alamat::create($data);
        if ($simpan) {
            return redirect()->back();
        }
    }

    public function ubah_alamat(Request $request, $id)
    {
        $role = Session::get('role');
        $sessionId = Session::get('id');
        $user_id = Auth::guard($role)->user()->$sessionId;

        $data = [
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'provinsi_id' => $request->provinsi,
            'nama_provinsi' => $request->nama_provinsi,
            'city_id' => $request->kota,
            'nama_kota' => $request->nama_kota,
            'kode_pos' => $request->kode_pos,
            'kecamatan_id' => 0,
            'alamat_lengkap' => $request->alamat_lengkap,
            'user_id' => $user_id,
            'user_type' => $role == 'konsumen' ? 'App\Models\Konsumen' : 'App\Models\Pelapak'
        ];

        $ubah = Alamat::where('id_alamat', $id)->update($data);
        if ($ubah) {
            return redirect()->back();
        }
    }

    public function hapus_alamat($id)
    {
        $hapus = Alamat::where('id_alamat', $id)->delete();
        if ($hapus) {
            return redirect()->back();
        }
    }

    public function ubah_alamat_utama($id)
    {
        $role = Session::get('role');
        $sessionId = Session::get('id');
        $user_id = Auth::guard($role)->user()->$sessionId;

        $fix_role = $role == 'konsumen' ? 'App\Models\Konsumen' : 'App\Models\Pelapak';

        $ubah = $fix_role::where($sessionId, $user_id)->update(['alamat_utama' => $id]);
        if ($ubah) {
            return redirect()->back();
        }
    }
}
