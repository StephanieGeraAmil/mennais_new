<?php

namespace App\Models;

use App\Enums\InscriptionTypeEnum;
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
        'quantity_remote',
        'quantity_hybrid
        ',
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

    public function usedPresencialCodes() : string
    {    
        return ucfirst(InscriptionTypeEnum::PRESENCIAL->value) . " " .$this->codes->where('status',">",0)->where('type', InscriptionTypeEnum::PRESENCIAL)->count() ."/". $this->codes->where('type', InscriptionTypeEnum::PRESENCIAL)->count();        
    }

    public function usedRemoteCodes() : string
    {    
        return ucfirst(InscriptionTypeEnum::REMOTO->value) . " " .$this->codes->where('status',">",0)->where('type', InscriptionTypeEnum::REMOTO)->count() ."/". $this->codes->where('type', InscriptionTypeEnum::REMOTO)->count();        
    }
    public function usedHybridCodes() : string
    {    
        return ucfirst(InscriptionTypeEnum::HIBRIDO->value). " " .$this->codes->where('status',">",0)->where('type', InscriptionTypeEnum::HIBRIDO)->count() ."/". $this->codes->where('type', InscriptionTypeEnum::HIBRIDO)->count();        
    }

}
