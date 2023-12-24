<?php

namespace App\Models;

use App\Enums\InscriptionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inscription_id',
        'date',
        'user_id',
        'type'
    ];

    protected $casts = ["type"=>InscriptionTypeEnum::class];

    public function inscription(){
        return $this->belongsTo(Inscription::class);
    }


}
