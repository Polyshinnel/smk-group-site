<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Lk\BillService;
use App\Service\Lk\ResearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    private BillService $billService;
    private ResearchService  $researchService;

    public function __construct(BillService $billService, ResearchService $researchService)
    {
        $this->billService = $billService;
        $this->researchService = $researchService;
    }

    public function __invoke()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $unpaidBill = $this->billService->getNewBills($user);
        $unpaidCount = 0;

        if(!$unpaidBill->isEmpty()){
            $unpaidCount = $unpaidBill->count();
        }

        $doneResearch = $this->researchService->getDoneResearch($user);
        $doneCount = 0;
        if(!$doneResearch->isEmpty()){
            $doneCount = $doneResearch->count();
        }

        $commonData = [
            'unpaidCount' => $unpaidCount,
            'doneResearchCount' => $doneCount,
        ];



        $pageInfo = [
            'title' => 'Личный кабинет | Главная',
            'description' => 'Главная страница кабинета'
        ];

        return view('lk.work.main-page', compact('pageInfo', 'commonData'));
    }
}
