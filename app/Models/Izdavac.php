<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Izdavac extends Model
{
    use HasFactory;

    protected $table='izdavac';
    public $timestamps = false;
    protected $fillable = [
        'Naziv',
        'id'
    ];

    public function Knjiga(): HasMany
    {
        return $this->hasMany(Knjiga::class);
    }
}
