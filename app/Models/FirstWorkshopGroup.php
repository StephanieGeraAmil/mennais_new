<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstWorkshopGroup extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start_at',
        'end_at',
        'school_id',
        'capacity',
        'has_vacant',
        'additional_text'
    ];

    public function inscription(){
        return $this->hasMany(Inscription::class);
    }

    public function school(){
        return $this->belongsTo(School::class);
    }


    public function refresh_vacant(){
        if($this->inscription->count() >= $this->capacity){
            $this->has_vacant = false;
            $this->save();
        }
    }
    
    public function getFullNameAttribute(){
        return $this->school->name." ".$this->additional_text." (".Carbon::parse($this->start_at)->format('H:i')." - ".Carbon::parse($this->end_at)->format('H:i').")";
    }    

    public function getString(){        
        $pre_text = "";
        if($this->additional_text != ""){
            $pre_text = $this->additional_text." - ";
        }
        return  $pre_text.$this->school->name." (".Carbon::parse($this->start_at)->format('H:i')." - ".Carbon::parse($this->end_at)->format('H:i').")";
    }           


    
}
