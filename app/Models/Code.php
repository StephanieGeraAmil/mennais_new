<?php

namespace App\Models;

use App\Enums\InscriptionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_inscription_id',
        'institution',
        'email',
        'code',
        'inscription_id',
        'status',
        'type'
    ];

    protected $casts = ["type"=>InscriptionTypeEnum::class];

    public function inscription(){
        return $this->belongsTo(Inscription::class);
    }
    
    public function groupInscription()
    {
        return $this->belongsTo(GroupInscription::class);
    }

    public function validCode($group_inscription_id,$code){        
        if($this->group_inscription_id == $group_inscription_id){
            return $this->code == $code;
        }
        return false;
    }

    public function getUrl(){
        return env('APP_URL').'/code_inscription/'.$this->id."/".$this->group_inscription_id."/".$this->code;
    }

}
