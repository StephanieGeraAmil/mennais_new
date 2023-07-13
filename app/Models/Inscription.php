<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Inscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_data_id',
        'payment_id',
        'status'
    ];



    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function userData(){
        return $this->belongsTo(UserData::class);
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function generateToken(){
        return md5($this->id . "SecurityKey" . $this->userData->document);        
    }

    public function url(){
        return env('APP_URL')."/attendance/".$this->id."/".$this->generateToken();
    }

    public function certificateUrl(){
        return env('APP_URL')."/certificate/".$this->id."/".$this->generateToken();
    }

    public function validateToken($token){       
        return $this->generateToken() == $token;
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }

}
