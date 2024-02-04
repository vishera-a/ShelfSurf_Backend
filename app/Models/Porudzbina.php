<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Porudzbina extends Model
{
    use HasFactory;

    protected $table='porudzbina';
    protected $fillable = [
        'Datum',
        'KonacnaCena'
    ];

    public function User(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function StavkaPorudzbine(): HasMany
    {
        return $this->hasMany(StavkaPorudzbine::class);
    }
}
