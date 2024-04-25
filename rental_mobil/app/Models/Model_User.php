<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'table_user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['name', 'email', 'password', 'address', 'no_hp', 'no_SIM', 'status_login'];

 public function cars()
    {
        return $this->hasMany(Model_Car::class, 'id_owner', 'id_user');
    }

    public function transaksiUser()
    {
        return $this->hasMany(Model_Transaksi::class, 'id_owner', 'id_user');
    }

}
