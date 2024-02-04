<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class StavkaPorudzbine extends Model
{
    use HasFactory;

    protected $table='stavkaPorudzbine';
    protected $fillable = [
        'Kolicina',
        'UkupnaCena'
    ];

    public function Porudzbina(): HasOne
    {
        return $this->hasOne(Porudzbina::class);
    }

    public function Knjiga(): HasOne
    {
        return $this->hasOne(Knjiga::class);
    }
}
