<?php

namespace App\Http\Controllers\Lk\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Lk\ResearchResultService;
use App\Service\Lk\ResearchService;
use App\Service\Lk\BillService;
use App\Service\Lk\ClosedDocumentsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultPageController extends Controller
{
    private ResearchService $researchService;
    private BillService $billService;
    private ClosedDocumentsService $closedDocumentsService;

    public function __construct(
        ResearchService $researchService,
        BillService $billService,
        ClosedDocumentsService $closedDocumentsService
    ) {
        $this->researchService = $researchService;
        $this->billService = $billService;
        $this->closedDocumentsService = $closedDocumentsService;
    }

    public function __invoke()
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $researchResult = $this->researchService->getAllUserResearch($user);

        $pageInfo = [
            'title' => 'Личный кабинет | Результаты исследований',
            'description' => 'Страница результатов исследований'
        ];

        return view('lk.work.result-page', compact('pageInfo', 'researchResult'));
    }
}
