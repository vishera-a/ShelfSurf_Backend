<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class StavkaPorudzbine extends Model
{
    use HasFactory;

    protected $table='stavkaPorudzbine';
    public $timestamps = false;
    protected $primaryKey = 'StavkaPorudzbineID';
    protected $fillable = [
        'PorudzbinaID',
        'KnjigaID',
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
