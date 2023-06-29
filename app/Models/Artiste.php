<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artiste extends Model
{
    protected $table = 'artiste';
    protected $fillable = [
        'id',
        'nom',
        'tarif',
        'photo'
    ];
    public $timestamps = false;
    use HasFactory;
}