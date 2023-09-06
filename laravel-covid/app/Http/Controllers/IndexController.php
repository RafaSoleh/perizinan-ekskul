<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $nik = Auth::guard('masyarakat')->user()->nik;
        $data = Perjalanan::where('nik', $nik)->latest();
        $panas = Perjalanan::where('nik', $nik)
            ->where('suhu_tubuh', '>=', '37,2')
            ->count();

        $normal = Perjalanan::where('nik', $nik)
            ->where('suhu_tubuh', '>=', '35,5')
            ->where('suhu_tubuh', '<=', '37,2')
            ->count();

        $dingin = Perjalanan::where('nik', $nik)
            ->where('suhu_tubuh', '<=', '35,5')
            ->count();

        $total = Perjalanan::where('nik', $nik)
            ->count();

        $normalCard = Perjalanan::where('nik', $nik)
            ->where('suhu_tubuh', '>=', '35,5')
            ->where('suhu_tubuh', '<=', '37,2')
            ->get();

        $dinginCard = Perjalanan::where('nik', $nik)
            ->where('suhu_tubuh', '<=', '35,5')
            ->get();

        $panasCard = Perjalanan::where('nik', $nik)
            ->where('suhu_tubuh', '>=', '37,2')
            ->get();


        return view('home.index', [
            'data' => $data->get(),
            'panas' => $panas,
            'normal' => $normal,
            'dingin' => $dingin,
            'total' => $total,
            'normalCard' => $normalCard,
            'dinginCard' => $dinginCard,
            'panasCard' => $panasCard,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jumlah = 6;
        $nik = Auth::guard('masyarakat')->user()->nik;
        $data = Perjalanan::where('nik', $nik)->latest();
        return view('home.create', [
            'data' => $data->paginate($jumlah)

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'suhu_tubuh' => 'required',
                'lokasi' => 'required',
                'tempat' => 'required',
            ],
            [
                'suhu_tubuh.required' => 'suhu tubuh wajib di isi.',
                'tempat.required' => 'tempat wajib di isi.',

                'lokasi.required' => 'lokasi wajib di isi.',
            ]
        );

        $data = [
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'suhu_tubuh' => $request->suhu_tubuh,
            'tempat' => $request->tempat,
            'tgl_perjalanan' => date('Y-m-d H:i:s'),
            'lokasi' => $request->lokasi,



        ];


        Perjalanan::create($data);
        if ($request->suhu_tubuh >= '37,5') {



            alert()->warning('Suhu Tubuh Panas', 'Sebaiknya anda istirahat dan periksakan kesehatan anda ke dokter')->showConfirmButton('Oke', '#3085d6');

            return back();
        } elseif ($request->suhu_tubuh <= '35,5') {

            alert()->info('Suhu Tubuh Dingin', 'Cek kesehatan anda,tubuh anda terlalu dingin')->showConfirmButton('Oke', '#3085d6');

            return back();
        } else {
            alert()->success('suhu tubuh anda normal');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
