<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Car extends Model
{
    use HasFactory;
    protected $table = 'table_car';
    protected $primaryKey = 'id_car';
    protected $fillable = [
        'model','id_owner', 'merek', 'transmisi', 'jenis', 'tahun', 'bahan_bakar', 'no_plat', 'foto','tarif','tersedia'
    ];

    public function owner()
    {
        return $this->belongsTo(Model_User::class, 'id_owner', 'id_user');
    }

    public function transaksiCar()
    {
        return $this->hasMany(Model_Transaksi::class, 'id_car', 'id_car');
    }


}
