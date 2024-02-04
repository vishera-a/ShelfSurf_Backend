<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;

    protected $table='knjiga';
    protected $primaryKey = 'KnjigaID';
    public $timestamps = false;
    protected $fillable = [
        'Naziv',
        'KategorijaID',
        'Cena',
        'Stanje',
        'Slika',
        'IzdavacID',
    ];

    public function Kategorija(): HasOne
    {
        return $this->hasOne(Kategorija::class);
    }

    public function Izdavac(): HasOne
    {
        return $this->hasOne(Izdavac::class);
    }

    public function AutoriKnjige(): HasMany
    {
        return $this->hasMany(AutoriKnjige::class);
    }

    public function StavkaPorudzbine(): HasMany
    {
        return $this->hasMany(StavkaPorudzbine::class);
    }
}
