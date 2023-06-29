<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Lieu;

class Placelieu extends Model
{
    protected $table = 'placelieu';
    protected $fillable = [
        'id',
        'lieuid',
        'vip',
        'reserve',
        'normal'
    ];
    public $timestamps = false;
    use HasFactory;

    public function lieu()
    {
        return $this->belongsTo(Lieu::class, 'lieuid');
    }
}