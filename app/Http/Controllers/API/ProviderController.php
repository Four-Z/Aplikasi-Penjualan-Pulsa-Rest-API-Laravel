<?php

namespace App\Http\Controllers\API;

use App\Helpers\JsonFormatter;
use App\Http\Controllers\Controller;
use App\Models\DaftarHarga;
use App\Models\penjualan;
use App\Models\Providers;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Menampilkan semua provider dan daftar harga
    public function index()
    {
        try {
            $data_provider = Providers::all();
            $data_daftarHarga = DaftarHarga::all();

            $data = [
                'providers' => $data_provider,
                'daftar_harga' => $data_daftarHarga
            ];
            return JsonFormatter::create_api(200, 'Success', $data);
        } catch (Exception $error) {
            return JsonFormatter::create_api(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Menampilkan provider & daftar harga berdasarkan id
    public function show($id)
    {
        try {
            $data_provider = Providers::where('id', $id)->first();
            $data_daftarHarga = DaftarHarga::where('id_provider', '=', $data_provider->id)->get();


            $data = [
                'providers' => $data_provider,
                'daftar_harga' => $data_daftarHarga
            ];

            return JsonFormatter::create_api(200, 'Success', $data);
        } catch (Exception $error) {
            return JsonFormatter::create_api(400, 'Failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'id_provider' => 'required',
                'harga' => 'required'
            ]);

            $daftarHarga = DaftarHarga::create([
                'id_provider' => (int) $request->id_provider,
                'harga' => $request->harga
            ]);

            $data = DaftarHarga::where('id', '=', $daftarHarga->id)->get();

            return JsonFormatter::create_api(200, 'Success Menambah Daftar Harga', $data);
        } catch (Exception $error) {

            return JsonFormatter::create_api(400, 'Failed Menambah Daftar Harga');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Melakukan Edit Daftar Harga Pulsa berdasarkan ID
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'id_provider' => 'required',
                'harga' => 'required'
            ]);

            $daftarHarga = DaftarHarga::findOrFail($id);

            $daftarHarga->update([
                'id_provider' => (int) $request->id_provider,
                'harga' => $request->harga
            ]);

            $data = DaftarHarga::where('id', '=', $daftarHarga->id)->get();

            return JsonFormatter::create_api(200, 'Success mengedit daftar harga', $data);
        } catch (Exception $error) {
            return JsonFormatter::create_api(400, 'Failed mengedit daftar harga');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Melakukan hapus daftar harga berdasarkan id
    public function destroy($id)
    {
        try {
            $daftarHarga = DaftarHarga::findOrFail($id);
            $daftarHarga->delete();
            return JsonFormatter::create_api(200, 'Success menghapus daftar harga');
        } catch (Exception $error) {
            return JsonFormatter::create_api(400, 'Failed menghapus daftar harga');
        }
    }

    public function laporan_penjualan()
    {
        try {
            $laporan_penjualan = Penjualan::all();
            return JsonFormatter::create_api(200, 'Success mendapatkan laporan penjualan', $laporan_penjualan);
        } catch (Exception $error) {
            return JsonFormatter::create_api(400, 'Failed mendapatkan laporan penjualan');
        }
    }
}
