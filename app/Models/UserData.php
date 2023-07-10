<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'document',
        'email',
        'phone',
        'extra',        
    ];

    public function inscription(){
        return $this->hasOne(Inscription::class);
    }


    public function gravatar(){
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim( $this->email )))."?s=360&d=https%3A%2F%2Fevent.isf-uy.com%2Fimages%2Fprofile.jpg";
    }
    
    
    public function getJsonextraAttribute($data = null){
        if($data == null){
            return json_decode($this->extra, true);
        }   
        return json_decode($this->extra, true)[$data]; 
    }

    

}
