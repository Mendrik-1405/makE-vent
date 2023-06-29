<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Evenement;
use App\Models\Lieu;

class Evenementlieu extends Model
{
    protected $table = 'evenementlieu';
    protected $fillable = [
        'id',
        'evenementid',
        'lieuid',
        'prix'
    ];
    public $timestamps = false;
    use HasFactory;

    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'evenementid');
    }

    public function lieu()
    {
        return $this->belongsTo(Lieu::class, 'lieuid');
    }
}