<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $fillable = ['tanggal_mulai', 'tanggal_akhir', 'jam_mulai', 'jam_akhir'];
}
