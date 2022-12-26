<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $response = Http::get('https://akmalweb.my.id/api/payment/');
        $data = $response->json();
        // dd($data);
        

        $item = Pembayaran::where('user_id', '=', Auth::user()->id)->first();
        return view('dashboard.pembayaran', compact('item', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->bukti_pembayaran);
        // dd('berhasil');

        $select = $request->asal_sekolah;
        
        if($select == "namabank_lainnya" ){
            $ambil = $request->nama_bank_lainnya;
        }else{
            $ambil = $request->nama_bank;
        }

        $request->validate([
            'nama_bank' => 'required',
            'pemilik_bank' => 'required',
            'nominal' => 'required',
            'bukti_pembayaran' => 'required',
          
        ]);
        $image = $request->file('bukti_pembayaran');
        $imgName = time().rand().'.'.$image->extension();
        if(!file_exists(public_path('/buktipembayaran'.$image->getClientOriginalName()))){
            $destinationPath = public_path('/buktipembayaran');
            $image->move($destinationPath, $imgName);
            $uploaded = $imgName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }
        
        
        
         Pembayaran::create([            
            'nama_bank' => $ambil,
            'pemilik_bank' => $request->pemilik_bank,
            'nominal' => $request->nominal, 
            'bukti_pembayaran' => $uploaded,
            'status' => 0,
            'user_id' => Auth::user()->id,
          
        ]);

        

        return redirect()->route('dashboard')->with('success', 'Pembayaran sedang di verifikasi, harap tuggu informasi selanjutnya');
        

       
     

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        
     
        $item = Pembayaran::where('user_id', '=', Auth::user()->id)->first();
        return view('dashboard.pembayaran', compact('item'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
         
        $select = $request->asal_sekolah;
        
        if($select == "namabank_lainnya" ){
            $ambil = $request->nama_bank_lainnya;
        }else{
            $ambil = $request->nama_bank;
        }

        $request->validate([
            'nama_bank' => 'required',
            'pemilik_bank' => 'required',
            'nominal' => 'required',
            'bukti_pembayaran' => 'required',
            
        ]);

        Pembayaran::where('user_id', Auth::user()->id)->update([
            'nama_bank' => $request->nama_bank,
            'pemilik_bank'=> $request->pemilik_bank,
            'nominal' => $request->nominal,
            'user_id' => Auth::user()->id,
            'status' => 0
        ]);

        return redirect()->back()->with('error', 'gagal upload bukti pembayaran silahkan coba ulang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
