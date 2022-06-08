<?php

namespace App\Http\Controllers\API;

use App\Helpers\JsonFormatter;
use App\Http\Controllers\Controller;
use App\Mail\HousetEmail;
use App\Models\DaftarHarga;
use App\Models\pelanggan;
use App\Models\penjualan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try {
            $request->validate([
                'no_hp' => 'required'
            ]);

            $pelanggan = Pelanggan::where('no_hp', $request->no_hp)->first();

            $data = [
                'no_hp' => $pelanggan->no_hp,
                'pulsa' => $pelanggan->pulsa
            ];

            return JsonFormatter::create_api(200, 'Success mengecek pulsa', $data);
        } catch (Exception $error) {
            return JsonFormatter::create_api(400, 'Failed mengecek pulsa');
        }
    }

    public function beliPulsa(Request $request)
    {
        try {

            $request->validate([
                'no_hp' => 'required',
                'harga' => 'required'
            ]);

            $pelanggan = Pelanggan::where('no_hp', $request->no_hp)->first();
            $daftarHarga = DaftarHarga::where('id_provider', $pelanggan->provider_id)->where('harga', $request->harga)->first();

            Pelanggan::where('no_hp', $request->no_hp)->update([
                'pulsa' => $pelanggan->pulsa + $daftarHarga->harga
            ]);

            Penjualan::create([
                'no_hp' => $pelanggan->no_hp,
                'harga' => $request->harga
            ]);

            $data = [
                'no_hp' => $pelanggan->no_hp,
                'harga' => $daftarHarga->harga,
            ];


            return JsonFormatter::create_api(200, 'Success Membeli Pulsa', $data);
        } catch (Exception $error) {

            return JsonFormatter::create_api(400, 'Failed Membeli Pulsa');
        }
    }
}
