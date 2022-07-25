<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url_payment',
        'amount_deposited',
        'reference'
    ];

    public function group_inscription(){
        return $this->hasOne(GroupInscription::class);
    }
    
    public function inscription(){
        return $this->hasOne(Inscription::class);
    }


}
