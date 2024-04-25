<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model_User;
use App\Models\Model_Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Controller_Car extends Controller{

    public function Car_Add(Request $request){
        if(Auth::check()){
            $validator = Validator::make($request -> all(),[
            'model' => 'required',
            'merek' => 'required',
            'transmisi' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'bahan_bakar' => 'required',
            'no_plat' => 'required',
            'foto' => 'required|image',
            'tarif' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'messages' => $validator->messages()
            ]);
        }
        $file = $request->file('foto');
        if($request->hasFile('foto') && $file->isValid() && in_array($file->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'gif','webp'])){
            $nama_file = time()."foto".$file->getClientOriginalName();
            $folder_upload = 'data_file';
            if($file->move($folder_upload, $nama_file)){
                $data['foto'] = $nama_file;
                $newCar = Model_Car::create([
                    'model'=> $request->model,
                    'merek'=>$request->merek,
                    'transmisi'=>$request->transmisi,
                    'jenis'=>$request->jenis,
                    'tahun'=> $request->tahun,
                    'bahan_bakar'=> $request->bahan_bakar,
                    'no_plat'=> $request->no_plat,
                    'foto'=> $nama_file,
                    'tarif'=> $request->tarif,
                    'id_owner'=> Auth::user()->id_user,
                ]);
                return redirect('/home');
            }else{
                return response()->json([
                    'status' => 'failed',
                    'messages' => 'failed save data'
                ]);
            }
        }
    }else{
        return response()->json([
            'status' => 'failed',
            'messages' => 'belum login'
        ]);
    }
    }

    public function Get_All_Cars(){
        if(Auth::check()){
            $dataAllCars = Model_Car::with(['owner' => function($query) {
                $query->select('id_user', 'name');
            }])
            ->where('id_owner','<>', Auth::user()->id_user)
            ->get();
            // dd($dataAllCars);
            return view('home',compact('dataAllCars'));
        }else{
            return redirect('/');
        }
    }
    
    public function SeachCar(Request $request){
        if(Auth::check()){
            if(Auth::check()){
                // Ambil inputan pencarian dari form
                $query = $request->input('query');
                // Lakukan pencarian berdasarkan merek atau model mobil
                $dataAllCars = Model_Car::where('merek', 'like', '%'.$query.'%')
                                ->orWhere('model', 'like', '%'.$query.'%')
                                ->get();
                return view('home', compact('dataAllCars'));
        }else{
            return redirect('/');
        }

    }

    }
}

