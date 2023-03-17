<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id_client',
        'total_value',
        'start_date',
        'end_date'
    ];

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Films::class);
    }
}
