<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model_User;
use App\Models\Model_Car;
use App\Models\Model_Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Controller_Transaksi extends Controller
{
    public function New_Transaksi(Request $request){
        if(Auth::check()){
            $validator = Validator::make($request -> all(),[
            'id_car' => 'required',
            'mulai_pinjam' => 'required',
            'selesai_pinjam' => 'required',
            'tarif_per_hari' => 'required',
            'total_tarif' => 'required',
            'id_owner' => 'required',
            'id_user' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'messages' => $validator->messages()
            ]);
        }

        $dataTransaksi = [
            'id_car' => $request->id_car,
            'mulai_pinjam' =>  $request->mulai_pinjam,
            'selesai_pinjam' =>  $request->selesai_pinjam,
            'tarif_per_hari' =>  $request->tarif_per_hari,
            'total_tarif' =>  $request->total_tarif,
            'id_owner' =>  $request->id_owner,
            'id_user' =>  $request->id_user,
        ];
        if($dataTransaksi){
            $newTransaction = Model_Transaksi::create($dataTransaksi);
            $getID = $newTransaction->id_transaksi;
        }else{
            return response()->json([
                'status' => 'failed',
                'messages' => "gagal melakukan transaksi"
            ]);
        }

        $detailtransaksi = Model_Transaksi::find($getID);
        if($detailtransaksi){
            $user = Model_User::find($detailtransaksi->id_owner);
            $user->load('transaksiUser');
            foreach ($user->transaksiUser as $transaction) {
                $ownerDetails = $transaction->ownerDetails;
            }
        }
        return view('transaksipage', compact('detailtransaksi','ownerDetails'));
    }else{
        return redirect('/');
    }
}

public function konfirmasi(Request $request){
    if(Auth::check()){
        $transaksi = Model_Transaksi::find($request->id_transaksi);
        $transaksi->status = $request->status;
        $transaksi->save();
        return redirect()->back();
    }
}


}
