<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Evenement;
use App\Models\Sonorisation;

class Evenementsonorisation extends Model
{
    protected $table = 'evenementsonorisation';
    protected $fillable = [
        'id',
        'evenementid',
        'sonorisationid',
        'duree'
    ];
    public $timestamps = false;
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'evenementid');
    }

    public function sonorisation()
    {
        return $this->belongsTo(Sonorisation::class, 'sonorisationid');
    }
}