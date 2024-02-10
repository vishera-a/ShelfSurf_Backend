<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    use HasFactory;

    protected $table='kategorija';
    protected $primaryKey = 'KategorijaID';
    public $timestamps = false;
    protected $fillable = [
        'Naziv'
    ];

    public function Knjiga(): HasMany
    {
        return $this->hasMany(Knjiga::class);
    }
}
