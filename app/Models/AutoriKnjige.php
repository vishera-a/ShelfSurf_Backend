<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Database\Eloquent\Model;

class AutoriKnjige extends Model
{
    use HasFactory;

    protected $table='autoriKnjige';

    public function Autor(): HasOne
    {
        return $this->hasOne(Autor::class);
    }

    public function Knjiga(): HasOne
    {
        return $this->hasOne(Knjiga::class);
    }
}
