<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Evenement;
use App\Models\Autreparam;

class Evenementautreparam extends Model
{
    protected $table = 'evenementautreparam';
    protected $fillable = [
        'id',
        'evenementid',
        'autreparamid',
        'prix'
    ];
    public $timestamps = false;
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'evenementid');
    }

    public function autreparam()
    {
        return $this->belongsTo(Autreparam::class, 'autreparamid');
    }
}