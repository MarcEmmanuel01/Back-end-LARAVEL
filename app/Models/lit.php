<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class lit extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_lit',
        'id_chambre',
    ];


    public function chambre(): BelongsTo
    {
        return $this->belongsTo(Chambre::class, 'id_chambre', 'id');
    }

}
