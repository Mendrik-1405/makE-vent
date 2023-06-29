<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lieu extends Model
{
    protected $table = 'lieu';
    protected $fillable = [
        'id',
        'designation',
        'nbrplace'
    ];
    public $timestamps = false;
    use HasFactory;
}