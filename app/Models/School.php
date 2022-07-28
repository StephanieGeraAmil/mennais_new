<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'map_link'
    ];

    public function firstWorkshopGroups(){
        return $this->hasOne(FirstWorkshopGroup::class);
    }

    public function secondWorkshopGroups(){
        return $this->hasOne(SecondWorkshopGroup::class);
    }

    public function shortName(){
        return str_replace("COLEGIO ","",strtoupper($this->name));
    }


}
