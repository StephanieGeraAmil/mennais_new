<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupInscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'quantity',
        'institution',
        'payment_id',
        'code'
    ];

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
    

    public function codes()
    {
        return $this->hasMany(Code::class);
    }

    public function validCode($code){        
            return $this->code == $code;
    }

    public function getUrl(){
            return env('APP_URL').'/admin_group_inscription/'.$this->id.'/'.$this->code;
    }

    public function usedCodes(){
        $count = 0;
        foreach($this->codes as $code){
            if($code->status > 0){
                $count ++;
            }
        }
        return $count;
    }
    
    public function inscriptedCodes(){
        $count = 0;
        foreach($this->codes as $code){
            if($code->status == 2){
                $count ++;
            }
        }
        return $count;
    }

}
