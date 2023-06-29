<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Evenement;
use App\Models\Artiste;

class Evenementartiste extends Model
{
    protected $table = 'evenementartiste';
    protected $fillable = [
        'id',
        'evenementid',
        'artisteid',
        'duree'
    ];
    public $timestamps = false;
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'evenementid');
    }

    public function artiste()
    {
        return $this->belongsTo(Artiste::class, 'artisteid');
    }
}