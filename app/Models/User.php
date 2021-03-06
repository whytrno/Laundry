<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // Fillable digunakan untuk apa aja yang boleh diisi
    // protected $fillable = [
    //     'full_name',
    //     'email',
    //     'phone',
    //     'password',
    // ];
    protected $primaryKey = 'user_id';

    // Guarded digunakan untuk apa aja yang tidak boleh diisi
    // Jadi daripada ribet menulis semua kolom pada fillable, isi saja id pada guarded
    protected $guarded = ['laundry_id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function laundry(){
        return $this->hasOne(Laundry::class);
    }
    
    public function hasLaundry()
    {
        $data = Laundry::where('user_id', $this->user_id)->count();
        // dd($data);
        if($data == 1){
            return true;
        } else{
            return false;
        }
    }

    public function laundryStatus(){
        $data = Laundry::where('user_id', $this->user_id)->first();
        return $data->status;
    }

    public function laundryId(){
        $data = Laundry::where('user_id', $this->user_id)->first();
        return $data->laundry_id;
    }
}
