<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat';
    protected $primaryKey = 'kandidat_id';
    protected $fillable = ['nama_kandidat', 'no_paslon', 'foto'];

    public function visimisi()
    {
        return $this->hasMany(VisiMisi::class);
    }

    public function Suara()
    {
        return $this->hasMany(Suara::class, 'suara_id');
    }
}
