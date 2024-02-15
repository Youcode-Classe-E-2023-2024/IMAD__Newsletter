<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photose extends Model
{
    use HasFactory;
    protected $table = 'photose';

    protected $fillable = [
        'name',
        // Add other fields that you want to be mass-assigned
    ];
}
