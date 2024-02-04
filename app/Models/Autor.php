<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table='autor';
    protected $fillable = [
        'Ime',
        'Prezime',
        'Biografija'
    ];

    public function AutoriKnjige(): HasMany
    {
        return $this->hasMany(AutoriKnjige::class);
    }
}

