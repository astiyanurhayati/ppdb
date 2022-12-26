<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dashboard;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{



    public function pembayaran_all(){
      $students =   User::all();
        return view('dashboard.admin.student_all', compact('students'));
    }
    public function validasi($user_id){
   
        Pembayaran::where('user_id', '=', $user_id)->update([
            'status' => 1,
        ]);
        return redirect()->back()->with('done', 'Berhasil Validasi');
    }


    public function tolak($user_id){
        Pembayaran::where('user_id', '=', $user_id)->update([
            'status' => 2,
            // 'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'Permintaan Di tolak');
    }

    

    public function detail_pembayaran($user_id){
        // $pem = Pembayaran::find($user_id);
        $detailUser = User::findOrFail($user_id);
        $pem = Pembayaran::where('user_id', $user_id)->first();
        return view('dashboard.admin.detail_bukti_pembayaran', compact('pem', 'detailUser'));
    }






    public function detail_pendaftaran($user_id){

        $detailUser = User::findOrFail($user_id);
        return view('dashboard.admin.detail_pendaftaran', compact('detailUser'));
    }
    
    public function admin_pembayaran(){

        $students = Pembayaran::with('user')->paginate(5);
        return view('dashboard.admin.admin_pembayaran', compact('students'));
    }
   

    public function pembayaran(){
        return view('dashboard.pembayaran');
    }

    public function profile_store(Request $request){
        $request->validate([
            'image_profile' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $image = $request->file('image_profile');
        $imgName = time().rand().'.'.$image->extension();
        if(!file_exists(public_path('/assets/img/'.$image->getClientOriginalName()))){
            $destinationPath = public_path('/assets/img/');
            $image->move($destinationPath, $imgName);
            $uploaded = $imgName;
        }else{
            $uploaded = $image->getClientOriginalName();
        }

        User::where('id', Auth::user()->id)->update([
            'image_profile' => $uploaded
        ]);

        return redirect()->route('profile')->with('successUploadImg', 'Foto Profile Berhasil diperbarui');

    }

    public function profile_edit(){
        $id = Auth::user()->id;
        $editdata = User::find($id);
        
        return view('dashboard.account.edit', compact('editdata'));
    }
     public function profile(){

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard.account.index', compact('user'));
     }

   
    public function index()
    {
        return view('dashboard.index');
    }

    
    
}
