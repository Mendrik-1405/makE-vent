<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autreparam extends Model
{
    protected $table = 'autreparam';
    protected $fillable = [
        'id',
        'designation'
    ];
    public $timestamps = false;
    use HasFactory;
}