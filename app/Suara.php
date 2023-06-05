<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    protected $table = 'suara';
    protected $primaryKey = 'suara_id';
    protected $fillable = ['user_id', 'kandidat_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }
}
