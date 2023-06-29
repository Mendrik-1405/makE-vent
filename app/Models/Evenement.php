<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    protected $table = 'evenement';
    protected $fillable = [
        'id',
        'designation',
        'datedebut',
        'datefin',
        'etat'
    ];
    public $timestamps = false;
    use HasFactory;
}