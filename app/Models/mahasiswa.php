<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['Name', 'Address'];
}
