<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
// use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Stmt\Return_;
use PDF;

class UserController extends Controller
{
    public function pages(){
        return view('pages.index');
    }
    public function index()
    {
        $response = Http::get('https://akmalweb.my.id/api/daftar_smp.php');
        $data = $response->json();
        // dd($data);
        
        return view('form.form', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request->all()); 
        $select = $request->asal_sekolah;

        if($select == "sekolah_lainnya" ){
            $ambil = $request->asal_sekolah_lainnya;
        }else{
            $ambil = $request->asal_sekolah;
        }
       
        $request->validate([
            'nisn' => 'required',
            'jk' => 'required',
            'nama_lengkap' => 'required',
            'asal_sekolah' => 'required',
            'email'=> 'required|unique:users',
            'no_phone' => 'required',
            'no_phone_ayah' => 'required',
            'no_phone_ibu' => 'required'
          
        ]);

             User::create([            
                'nisn' => $request->nisn,
                'jk' => $request->jk,
                'nama_lengkap' => $request->nama_lengkap,
                'asal_sekolah' => $ambil,
                'email'=> $request->email,
                'no_phone' => $request->no_phone,
                'no_phone_ayah' => $request->no_phone_ayah,
                'no_phone_ibu' =>$request->no_phone_ibu,
                'password' =>  Hash::make($request->nisn),
                'role' => 'user',
             ]);

        // dd($data);
        // $pdf = PDF::loadView("form.output", [
        //     'user' => User::latest()->first(),
           
        // ]);
        $item = User::latest()->first();
        // return $pdf->stream('ppdb.pdf');
        return view('form.output', compact('item'));
        // return redirect()->route('/');

       


    
    }
    
}
