<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResearchResult extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function research(): BelongsTo
    {
        return $this->belongsTo(Research::class, 'research_id', 'id');
    }
}
