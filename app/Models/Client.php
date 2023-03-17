<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'phone_number',
        'email',
    ];

     /**
     * The roles that belong to the user.
     */
    public function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class);
    }
}
