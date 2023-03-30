<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Tunggakan;
use App\Models\Siswa;
use App\Models\spp;
use App\Models\Pembayaran;
use PDF;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunggakans = Pembayaran::orderBy('created_at', 'desc')->get();
        return view('tunggakan.index', compact('tunggakans'))
            ->with('i', (request()->input('tunggakan', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //   dd($request->all());
        // $request->validate([
        //     'id_siswa' => 'required',
        //     'bulan' => 'required',
        //     'total_tunggakan' => 'required',
        //     'sisa_tunggakan' => 'required',
        //     'sisa_bulan' => 'required',
        // ]);

        // Tunggakan::create($request->all());

        // return redirect()->route('tunggakan.index')
        //     ->with('success', 'Berhasil Menyimpan !');
        // $validatedData = $request->validate([
        //     'id_siswa' => ['required', 'string'],
        //     'nama_siswa' => ['required', 'string'],
        //     'nama_kelas' => ['required', 'string'],
        //     'id_spp' => ['required',],
        //     'bulan' => ['required', 'string'],
        //     'total_tunggakan' => ['required', 'string'],
        // ]);
        // $validatedData['sisa_bulan'] = $request->bulan;
        // $validatedData['sisa_tunggakan'] = $request->total_tunggakan;
        // Tunggakan::create( $validatedData );
        // return redirect()->route('tunggakan.index')
        //     ->with('success', 'Berhasil Menyimpan !');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tunggakan $tunggakan)
    {
        // $nama = Siswa::all();
        // // $kelas = Kelas::all();

        // return view('tunggakan.edit', compact('nama','tunggakan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'id_siswa' => ['required', 'string'],
        //     'nama_siswa' => ['required', 'string'],
        //     'nama_kelas' => ['required', 'string'],
        //     'id_spp' => ['required', ],
        //     'bulan' => ['required', 'string'],
        //     'total_tunggakan' => ['required', 'string'],
        // ]);
        // $validatedData['sisa_bulan'] = $request->bulan;
        // $validatedData['sisa_tunggakan'] = $request->total_tunggakan;
        // Tunggakan::create( $validatedData );
        // return redirect()->route('tunggakan.index')
        //     ->with('success', 'Berhasil Di edit !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tunggakan)
    {
        // $tunggakanid = Tunggakan::find($tunggakan);
        // $tunggakanid->delete();
        // return redirect()->route('tunggakan.index')
        //     ->with('success', 'Berhasil Hapus !');
    }
    public function struk($id) 
    {
        
        $laporans = Pembayaran::find($id);
        // return $laporans;
        return view('laporan.struk', compact('laporans'));
    }

    public function exportpdf() 
    {
        
        $laporans = Pembayaran::orderBy('created_at', 'desc')->get();
        // return $laporans;
        return view('laporan.print', compact('laporans'));
    }
}
