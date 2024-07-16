<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the alumni that owns the Pesan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
