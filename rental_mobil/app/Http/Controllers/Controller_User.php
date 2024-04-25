<?php

namespace App\Http\Controllers;

use App\Models\Model_User;
use App\Models\Model_Transaksi;
use App\Models\Model_Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Controller_User extends Controller{
    public function User_Register(Request $request){
        $validator = Validator::make($request -> all(),[
            'name' => 'required',
            'email' => 'required | unique:table_user',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required',
            'address' => 'required',
            'no_hp' => 'required',
            'no_SIM' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'messages' => $validator->messages()
            ]);
        }
        if(Model_User::create([
            'name' => $request-> name,
            'email' => $request-> email,
            'password' => Hash::make($request->password),
            'address' => $request-> address,
            'no_hp' => $request-> no_hp,
            'no_SIM' => $request-> no_SIM,
        ])){
            return redirect('/');
        }else{
            return response()->json([
                'status' => 'failed',
                'messages' => 'failed save data'
            ]);
        }
    } 
    public function User_Login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user) {
                $user->status_login = 1; // Set nilai status_login menjadi 1
                $user->save(); // Simpan perubahan ke database
            }
            return redirect('/home');
        } else {
            return response()->json([
                'status' => 'failed',
                'messages' => 'gagal login...'
            ]);
        }
    }

    public function User_Logout(){
        $user = Auth::user();
        if ($user) {
            $user->status_login = 0; // Set nilai status_login menjadi 1
            $user->save(); // Simpan perubahan ke database
        }
            Auth::logout();
            return redirect('/');
       
    }

    public function User_Profile(){
        if(Auth::check()){
            $detailtransaksi = Model_Transaksi::where('id_user', Auth::user()->id_user)->get(); //transaksi user
            $dataProfile = Model_User::where('id_user', Auth::user()->id_user)->get();
            $daftarkonfirmasi = Model_Transaksi::where('id_owner', Auth::user()->id_user)->where('status','waiting')->get();
            $daftarmobildisewa = Model_Transaksi::where('id_owner', Auth::user()->id_user)->get();

            return view('profile',compact('dataProfile','detailtransaksi','daftarkonfirmasi','daftarmobildisewa'));
        }else{
            return redirect('/');
        }
    }
}