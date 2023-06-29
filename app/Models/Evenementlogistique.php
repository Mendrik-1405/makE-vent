<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Evenement;
use App\Models\Logistique;

class Evenementlogistique extends Model
{
    protected $table = 'evenementlogistique';
    protected $fillable = [
        'id',
        'evenementid',
        'logistiqueid',
        'duree'
    ];
    public $timestamps = false;
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'evenementid');
    }

    public function logistique()
    {
        return $this->belongsTo(Logistique::class, 'logistiqueid');
    }
}