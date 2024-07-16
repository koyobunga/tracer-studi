<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['alumni'];

    /**
     * Get the alumni that owns the Riwayat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
