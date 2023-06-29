<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sonorisation extends Model
{
    protected $table = 'sonorisation';
    protected $fillable = [
        'id',
        'typesono',
        'tarif'
    ];
    public $timestamps = false;
    use HasFactory;
}