<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Evenement;

class Placevendu extends Model
{
    protected $table = 'placevendu';
    protected $fillable = [
        'id',
        'evenementid',
        'vip',
        'reserve',
        'normal'
    ];
    public $timestamps = false;
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'evenementid');
    }
}