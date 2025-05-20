<?php

namespace App\Service\Lk;

use App\Models\Research;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ResearchService
{
    public function getDoneResearch(User $user): ?Collection
    {
        return Research::where(['user_id' => $user->id])
            ->whereHas('status', function ($query) {
                $query->where('researched', true);
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getAllUserResearch(User $user): Collection
    {
        return Research::where(['user_id' => $user->id])
            ->with('status')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
