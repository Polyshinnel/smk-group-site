<?php

namespace App\Service\Lk;

use App\Models\ClosedDocuments;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ClosedDocumentsService
{
    public function getClosedDocuments(User $user): Collection
    {
        return ClosedDocuments::where(['user_id' => $user->id])
            ->with('research')
            ->orderBy('created_at', 'desc')
            ->get();
    }
} 