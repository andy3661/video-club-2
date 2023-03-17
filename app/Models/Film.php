<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'synopsis',
        'unitary_price',
        'premiere_date',
        'type'

    ];

     public function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class);
    }
}
