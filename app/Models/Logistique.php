<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logistique extends Model
{
    protected $table = 'logistique';
    protected $fillable = [
        'id',
        'typesono',
        'tarif'
    ];
    public $timestamps = false;
    use HasFactory;
}