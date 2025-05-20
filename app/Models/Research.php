<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Research extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function status(): HasOne
    {
        return $this->hasOne(ResearchStatus::class, 'id', 'status_id');
    }

    public function results(): HasMany
    {
        return $this->hasMany(ResearchResult::class, 'research_id', 'id');
    }
}
