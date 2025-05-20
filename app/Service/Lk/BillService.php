<?php

namespace App\Service\Lk;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


class BillService
{
    public function getNewBills(User $user): ?Collection
    {
        return Bill::where(['user_id' => $user->id])
            ->whereHas('billStatus', function($query){
                $query->where('payed', false);
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getBills(User $user): Collection
    {
        return Bill::where(['user_id' => $user->id])
            ->with('billStatus')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
