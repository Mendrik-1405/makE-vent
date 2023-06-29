<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Taxe extends Model
{
    protected $table = 'taxe';
    protected $fillable = [
        'id',
        'pourcentage'
    ];
    public $timestamps = false;
    use HasFactory;
}