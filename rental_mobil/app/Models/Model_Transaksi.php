<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Transaksi extends Model
{
    use HasFactory;
    protected $table = 'table_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_car','mulai_pinjam', 'selesai_pinjam', 'tarif_per_hari', 'total_tarif', 'id_owner', 'id_user', 'status'
    ];
    
    public function carsDetails()
    {
        return $this->belongsTo(Model_Car::class, 'id_car', 'id_car');
    }

    public function ownerDetails()
    {
        return $this->belongsTo(Model_User::class, 'id_owner', 'id_user');
    }

}
