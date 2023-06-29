<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Evenement;

class Prixplaceevenement extends Model
{
    protected $table = 'prixplaceevenement';
    protected $fillable = [
        'id',
        'evenementid',
        'prixvip',
        'prixreserve',
        'prixnormal'
    ];
    public $timestamps = false;
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'evenementid');
    }
}