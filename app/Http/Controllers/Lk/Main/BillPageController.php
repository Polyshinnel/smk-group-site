<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Lk\BillService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillPageController extends Controller
{
    private BillService $billService;

    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function __invoke()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $userBills = $this->billService->getBills($user);

        $pageInfo = [
            'title' => 'Личный кабинет | Счета',
            'description' => 'Страница счетов'
        ];

        return view('lk.work.bill-page', compact('pageInfo', 'userBills'));
    }
}
